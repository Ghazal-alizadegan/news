<?php

namespace App\Http\Middleware;

use App\Models\permission;
use App\Models\Role;
use Closure;
use Illuminate\Http\Request;

class checkPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$a)
    {
        $permission=permission::query()->where('title',$a)->firstOrFail();
        if (!auth()->user()->role->hasPermission($permission)){

            abort(403);
        }

        return $next($request);
    }
}
