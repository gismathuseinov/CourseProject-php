<?php

namespace App\Exceptions;

use HttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param Throwable $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        if (app()->bound('sentry') && $this->shouldReport($exception)) {
            app('sentry')->captureException($exception);
        }

        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Throwable $exception
     * @return Response
     *
     * @throws Throwable
     */
   public function render($request, Throwable $exception)
    {
       if (env("APP_DEBUG")) {
           return parent::render($request, $exception);
       }
       else {

           //404
           if ($exception instanceof NotFoundHttpException ||
               $exception instanceof ModelNotFoundException) {
               return response("not found", 404);
           }

           //500
           $e = new HttpException(500);
           if ($this->isHttpException($e)) {
               return response("server error", 500);
           }

           return response("Something went wrong");
       }
       return parent::render($request, $exception);

    }
}
