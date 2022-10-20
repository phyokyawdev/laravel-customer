<?php

namespace App\Exceptions;

use App\Http\Resources\FailResource;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            return (new FailResource(['message' => 'Not Found!']))->response()->setStatusCode(404);
        }

        if($exception instanceof AuthenticationException) {
            $message = $exception->getMessage();
            return (new FailResource(['message' => $message]))->response()->setStatusCode(401);
        }
        
        if($exception instanceof ValidationException) {
            return (new FailResource($exception->errors()))->response()->setStatusCode($exception->status);
        }

        // uncomment for debugging
        // error_log($exception);
        // return parent::render($request, $exception);
        return (new FailResource(['message' => 'Something went wrong!']))->response()->setStatusCode(500);
    }
}
