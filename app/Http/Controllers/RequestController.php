<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Psr\Http\Message\ServerRequestInterface;

class RequestController extends Controller
{
    public  function request(Request $request)
    {
        $token = $request->bearerToken();
        $uri = $request->path();
        $url = $request->url();
        $host = $request->host();
        $httpHost = $request->httpHost();
        $schemeAndHttpHost = $request->schemeAndHttpHost();
        $xHeaderName = $request->header('X-Header-Name', 'default-value');
        $ipAddress = $request->ip();
        $ipAddresses = $request->ips();
        $contentTypes = $request->getAcceptableContentTypes();
        $preferred = $request->prefers(['text/html', 'application/json']);

        echo "Token: " . $token . "<br>";
        echo "URI: " . $uri . "<br>";
        echo "URL: " . $url . "<br>";
        echo "Host: " . $host . "<br>";
        echo "HTTP Host: " . $httpHost . "<br>";
        echo "Scheme and HTTP Host: " . $schemeAndHttpHost . "<br>";
        echo "X-Header-Name: " . $xHeaderName . "<br>";
        echo "IP Address: " . $ipAddress . "<br>";
        echo "IP Addresses: " . implode(', ', $ipAddresses) . "<br>";
        echo "Content Types: " . implode(', ', $contentTypes) . "<br>";
        echo "Preferred Content Type: " . $preferred . "<br>";

        if ($request->expectsJson()) {
            return response()->json(['message' => 'JSON expected']);
        }

        if ($request->accepts(['text/html', 'application/json'])) {
            echo "Accepts HTML or JSON.<br>";
        }
    }
    public function psr7Example(ServerRequestInterface $request)
    {
    }
}
