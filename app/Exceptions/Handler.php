<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use  Illuminate\Auth\AuthenticationException as AuthenticationException;

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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {  
        switch($e){
            case ($e instanceof ModelNotFoundException):
               return response()->view('errors.404', [], 404);
            break;
            case ($e instanceof \Illuminate\Session\TokenMismatchException):
               return redirect()
                  ->back()
                  ->withInput($request->except('_token'))
                  ->withMessage('Sorry, the form you used expired. Kindly, re-enter all the details again in the form.');
            break;
            case ($e instanceof ErrorException):
                return redirect('/')->withMessage('Sorry, the session expired. Kindly, login in again.');
            break;
            default:
                return parent::render($request, $e);
        }

    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect('/')->with('error', 'Kindly, login in to continue.');
    }
}
