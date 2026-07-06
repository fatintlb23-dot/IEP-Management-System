<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ParentApprovedMail;
use App\Mail\ParentRejectedMail;

class ParentController extends Controller
{
    public function index()
    {
        $parents = User::where('role', 'parent')
                       ->orderBy('created_at', 'desc')
                       ->paginate(10);
        
        return view('admin.parents.index', compact('parents'));
    }

    public function approve($id)
    {
        $parent = User::findOrFail($id);
        $parent->status = 'active';
        $parent->save();

        try {
            Mail::to($parent->email)->send(new ParentApprovedMail($parent));
            return back()->with('success', '✅ Parent approved! Approval email sent.');
        } catch (\Exception $e) {
            \Log::error('Failed to send approval email: ' . $e->getMessage());
            return back()->with('success', '⚠️ Parent approved but email failed to send.');
        }
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'reason' => 'required|string|max:500',
            'notes' => 'nullable|string|max:500',
        ]);

        $parent = User::findOrFail($id);
        
        $fullReason = $request->reason;
        if ($request->notes) {
            $fullReason .= "\n\nAdditional Notes: " . $request->notes;
        }
        
        $parent->status = 'rejected';
        $parent->save();

        try {
            Mail::to($parent->email)->send(new ParentRejectedMail($parent, $fullReason));
            return back()->with('success', 'Parent rejected. Rejection email sent.');
        } catch (\Exception $e) {
            \Log::error('Failed to send rejection email: ' . $e->getMessage());
            return back()->with('success', 'Parent rejected but email failed to send.');
        }
    }

    public function destroy($id)
    {
        User::where('id', $id)->where('role', 'parent')->delete();
        return back()->with('success', 'Parent deleted successfully.');
    }
}