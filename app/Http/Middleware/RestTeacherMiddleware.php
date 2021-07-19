<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\AdmToken;

use App\Http\Controllers\Utility;

class RestTeacherMiddleware
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
        $admToken = AdmToken::where("token", $request->header ('Authorization'))
                            ->where("expired_at", ">=", date("Y-m-d H:i:s"))
                            ->whereNotNull("student_id")
                            ->first();
        if ($admToken) {
            return $next($request);
        } else {
            return Utility::createResponse(401, null);
        }
    }
}
