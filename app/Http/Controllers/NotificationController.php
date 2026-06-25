<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $organization = Auth::guard('organization')->user();

        $notifications = Notification::where('organization_id', $organization->id)
            ->latest()
            ->paginate(20);

        return response()->json([
            'success' => true,
            'notifications' => $notifications,
            'unread_count' => Notification::where(
                'organization_id',
                $organization->id
            )
                ->where('is_read', false)
                ->count(),
        ]);
    }

    public function unreadCount()
    {
        $organization = Auth::guard('organization')->user();

        $count = Notification::where(
            'organization_id',
            $organization->id
        )
            ->where('is_read', false)
            ->count();

        return response()->json([
            'success' => true,
            'count' => $count,
        ]);
    }

    public function markAsRead($id)
    {
        $organization = Auth::guard('organization')->user();

        $notification = Notification::where('organization_id', $organization->id)
            ->findOrFail($id);

        $notification->update([
            'is_read' => true,
            'read_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Notification marked as read.',
        ]);
    }

    public function markAllAsRead()
    {
        $organization = Auth::guard('organization')->user();

        Notification::where('organization_id', $organization->id)
            ->where('is_read', false)
            ->update([
                'is_read' => true,
                'read_at' => now(),
            ]);

        return response()->json([
            'success' => true,
            'message' => 'All notifications marked as read.',
        ]);
    }

    public function destroy($id)
    {
        $organization = Auth::guard('organization')->user();

        $notification = Notification::where('organization_id', $organization->id)
            ->findOrFail($id);

        $notification->delete();

        return response()->json([
            'success' => true,
            'message' => 'Notification deleted successfully.',
        ]);
    }
}
