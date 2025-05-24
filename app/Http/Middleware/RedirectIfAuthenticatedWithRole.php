<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Permission\Traits\HasRoles;

class RedirectIfAuthenticatedWithRole
{

    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            $user = auth()->user();

            if ($user->hasRole('pendaftaran')) {
                return redirect('/dashboard/pendaftaran');
            } elseif ($user->hasRole('dokter')) {
                return redirect('/dashboard/dokter');
            } elseif ($user->hasRole('perawat')) {
                return redirect('/dashboard/perawat');
            } elseif ($user->hasRole('apoteker')) {
                return redirect('/dashboard/apoteker');
            }
        }

        return $next($request);
    }
}
