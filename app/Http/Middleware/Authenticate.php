<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\AuthenticationException;

class Authenticate extends Middleware
{


     /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

    protected function authenticate($request, array $guards)
	{
		if (empty($guards)) {
			$guards = [null];
		}

		foreach ($guards as $guard) {
			if ($this->auth->guard($guard)->check()) {
				return $this->auth->shouldUse($guard);
			}
		}


		$guard = $guards[0];

		if ($guard == 'admin'){
			$request->path = 'admin.';
		}else{
			$request->path = '';
		}

		throw new AuthenticationException(
			'Unauthenticated.', $guards, $this->redirectTo($request)
		);
	}

    
    protected function redirectTo($request)
    {
        return route($request->path . 'login');
    }
}
