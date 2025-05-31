<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    /**
     * قائمة عناوين الـ IP الخاصة بالبروكسيات الموثوقة.
     * يمكن وضع '*' للسماح بكل البروكسيات.
     *
     * @var array|string|null
     */
    protected $proxies = '*';

    /**
     * الرؤوس التي يجب أن تستخدم لتحديد البروتوكول وعناوين الـ IP.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
