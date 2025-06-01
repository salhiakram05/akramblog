<?php
namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    
    protected $proxies = '*';

    /**
     * هذا يسمح للارافيل بقراءة X-Forwarded-Proto و X-Forwarded-Host
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
