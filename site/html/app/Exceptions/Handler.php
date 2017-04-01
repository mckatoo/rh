<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        $msg = explode('(', $e->getMessage());
        if ($msg[0]==='unlink') {
            return back()->withErrors('erro','Arquivo não encontrado.');
        }
        
        if ($e instanceof \Illuminate\Session\TokenMismatchException) {
            return view('auth.login')->withErrors('erro', 'Sessão expirada.');
        }

        if ($e instanceof \Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException) {
            return back()->withErrors('erro','Arquivo não encontrado.');
        }

        return parent::render($request, $e);
    }
}
