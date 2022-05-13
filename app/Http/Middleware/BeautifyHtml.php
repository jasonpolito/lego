<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BeautifyHtml
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
        $response = $next($request);


        // $dom = new \DOMDocument();

        // $html = $response->getContent();
        // $dom->preserveWhiteSpace = false;
        // $dom->loadHTML($html);
        // $dom->formatOutput = true;

        // $response->setContent($dom->saveXML($dom->documentElement));

        // // $response->setContent(preg_replace('/\s+(?=(?:(?:[^"]*"){2})*[^"]*"[^"]*$)/', ' ', $response->getContent()));

        return $response;
    }
}