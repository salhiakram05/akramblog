<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * عناوين البروكسيات الموثوقة
     * يمكنك وضع '*' للثقة بكل البروكسيات (غير مستحسن في بيئات الإنتاج)
     */
    protected $proxies = '*';

    /**
     * رؤوس البروكسي الموثوقة التي يجب Laravel أن يثق بها
     */
    protected $headers = Request::HEADER_X_FORWARDED_FOR
                       | Request::HEADER_X_FORWARDED_HOST
                       | Request::HEADER_X_FORWARDED_PORT
                       | Request::HEADER_X_FORWARDED_PROTO;
}
