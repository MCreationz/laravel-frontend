<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('organization.{id}', function ($organization, $id) {
    return (int) $organization->id === (int) $id;
}, [
    'guards' => ['organization'],
]);

Broadcast::channel('client-admin.{id}', function ($admin, $id) {
    return (int) $admin->id === (int) $id;
}, [
    'guards' => ['client_admin'],
]);

Broadcast::channel('reviewer.{id}', function ($reviewer, $id) {
    return (int) $reviewer->id === (int) $id;
}, [
    'guards' => ['reviewer'],
]);

Broadcast::channel('super-admin.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
}, [
    'guards' => ['web'],
]);