<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class ApiException extends Exception
{
    protected $status;

    public function __construct(string $message = "", int $status = 500)
    {
        parent::__construct($message);
        $this->status = $status;
    }

    public function render($request): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $this->getMessage(),
            'exception' => get_class($this),
        ], $this->status);
    }
}
