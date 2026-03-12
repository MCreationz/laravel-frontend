<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            __DIR__ . '/../routes/web.php',
            __DIR__ . '/../routes/superadmin.php'
        ],

        api: __DIR__ . '/../routes/api.php',


        commands: __DIR__ . '/../routes/console.php',

        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'role' => \App\Http\Middleware\CheckRole::class,
            'auth:sanctum' => \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'superadmin' => \App\Http\Middleware\SuperAdminMiddleware::class,
            'check.onboarding' => \App\Http\Middleware\CheckOrganizationOnboarding::class,


        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {

        $exceptions->render(function (Throwable $e, $request) {

            $status = method_exists($e, 'getStatusCode') ? $e->getStatusCode() : 500;

            // If app debug is ON → show full error
            if (config('app.debug')) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage(),
                    'exception' => class_basename($e),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'trace' => $e->getTrace(),
                ], $status);
            }

            // If APP_DEBUG = false → show generic error
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.',
            ], $status);
        });
    })

    ->create();
