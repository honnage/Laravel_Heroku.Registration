<?php

namespace App\Http\Middleware;

use Closure;
use App\SubjectModel;
use Symfony\Component\HttpFoundation\Session\Session;

class VerifySubjects
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
        if(SubjectModel::all()->count()==0){
            Session::flash('warning',"ต้องมีประเภทวิชาอย่างน้อย 1 รายการ");
            return redirect('subjects');
        }
        return $next($request);
    }
}
