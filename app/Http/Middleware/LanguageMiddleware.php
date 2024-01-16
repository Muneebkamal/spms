<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
// app/Http/Middleware/LanguageMiddleware.php

    public function handle($request, Closure $next)
    {
        $locale = $request->session()->get('locale', config('app.locale'));

        if ($request->has('language') && in_array($request->language, config('app.available_locales'))) {
            $locale = $request->language;
            $request->session()->put('locale', $locale);
        }

        app()->setLocale($locale);

        return $next($request);
    }

}
