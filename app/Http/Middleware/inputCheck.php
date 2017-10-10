<?php

namespace App\Http\Middleware;

use Closure;

class inputCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->name == '' || $request->kelas == '' || $request->jurusan ==''){
            $request->session()->flash('alert-danger','Input salah');
            return redirect()->route('test.create');
        }
        return $next($request);
    }
}
