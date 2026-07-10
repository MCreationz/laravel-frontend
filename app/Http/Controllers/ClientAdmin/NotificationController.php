<?php

namespace App\Http\Controllers\ClientAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index(): JsonResponse
    {
        $admin = Auth::guard('client_admin')->user();

        $notifications = $admin->notifications()
            ->latest()
            ->paginate(20);

        return response()->json([
            'success' => true,
            'notifications' => $notifications,
            'unread_count' => $admin->notifications()
                ->where('is_read', false)
                ->count(),
        ]);
    }

    public function unreadCount(): JsonResponse
    {
        $admin = Auth::guard('client_admin')->user();

        return response()->json([
            'success' => true,
            'count' => $admin->notifications()
                ->where('is_read', false)
                ->count(),
        ]);
    }

    public function markAsRead(int $id): JsonResponse
    {
        $admin = Auth::guard('client_admin')->user();

        $notification = $admin->notifications()->findOrFail($id);

        if (! $notification->is_read) {
            $notification->update([
                'is_read' => true,
                'read_at' => now(),
            ]);
        }

        return response()->json([
            'success' => true,
        ]);
    }

    public function markAllAsRead(): JsonResponse
    {
        $admin = Auth::guard('client_admin')->user();

        $admin->notifications()
            ->where('is_read', false)
            ->update([
                'is_read' => true,
                'read_at' => now(),
            ]);

        return response()->json([
            'success' => true,
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $admin = Auth::guard('client_admin')->user();

        $notification = $admin->notifications()->findOrFail($id);

        $notification->delete();

        return response()->json([
            'success' => true,
        ]);
    }
}