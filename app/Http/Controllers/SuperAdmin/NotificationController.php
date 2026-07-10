<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index(): JsonResponse
    {
        $user = Auth::guard('web')->user();

        $notifications = $user->notifications()
            ->latest()
            ->paginate(20);

        return response()->json([
            'success' => true,
            'notifications' => $notifications,
            'unread_count' => $user->notifications()
                ->where('is_read', false)
                ->count(),
        ]);
    }

    public function unreadCount(): JsonResponse
    {
        $user = Auth::guard('web')->user();

        return response()->json([
            'success' => true,
            'count' => $user->notifications()
                ->where('is_read', false)
                ->count(),
        ]);
    }

    public function markAsRead(int $id): JsonResponse
    {
        $user = Auth::guard('web')->user();

        $notification = $user->notifications()
            ->findOrFail($id);

        if (! $notification->is_read) {
            $notification->update([
                'is_read' => true,
                'read_at' => now(),
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Notification marked as read.',
        ]);
    }

    public function markAllAsRead(): JsonResponse
    {
        $user = Auth::guard('web')->user();

        $user->notifications()
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

    public function destroy(int $id): JsonResponse
    {
        $user = Auth::guard('web')->user();

        $notification = $user->notifications()
            ->findOrFail($id);

        $notification->delete();

        return response()->json([
            'success' => true,
            'message' => 'Notification deleted successfully.',
        ]);
    }
}