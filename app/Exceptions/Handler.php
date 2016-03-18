<?php

namespace Blooddivision\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
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
        return parent::render($request, $e);
    }

    // public function convertExceptionToResponse(Exception $e){

    //     if (config('app.debug')) {
    //        $whoops = new \Whoops\Run;

    //             $handler = new \Whoops\Handler\PrettyPageHandler();
    //             //$handler->setEditor('phpstorm');
    //             $handler->setEditor(
    //                 function ($file, $line) {
    //                     // if your development server is not local it's good to map remote files to local
    //                     $translations = array('^' . env('SERVER_HOME') => env('LOCAL_HOME')); // change to your path
    //                     foreach ($translations as $from => $to) {
    //                         $file = rawurlencode(preg_replace('#' . $from . '#', $to, $file, 1));
    //                     }
    //                     return array(
    //                         'url' => "subl://open?url=file://$file&line=$line",
    //                         'ajax' => false
    //                     );
    //                 }
    //             );
    //             $handler->addResourcePath(base_path('app/Exceptions'));
                
    //             $whoops->pushHandler($handler);

    //             return response()->make(
    //                 $whoops->handleException($e),
    //                 method_exists($e, 'getStatusCode') ? $e->getStatusCode() : 500,
    //                 method_exists($e, 'getHeaders') ? $e->getHeaders() : []
    //             );
        
    //     }
    //         return parent::convertExceptionToResponse($e);
        
    // }
}
