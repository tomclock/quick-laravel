<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $url=": ".$request->fullUrl();
        if(!file_exists('../storage/logs/access.log')){
            file_put_contents('../storage/logs/access.log', date('Y-m-d H:i:s'). $url."\n", LOCK_EX);
        }
        else {
            file_put_contents('../storage/logs/access.log', date('Y-m-d H:i:s'). $url."\n", FILE_APPEND);
        }
        $response = $next($request);

        //Here is dangerous as the following action.
        //it will upperAllthe characters in the response's content.
        //$response->setContent(mb_strtoupper($response->content()));
        return $response;
    }
}
