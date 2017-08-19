<?php
namespace App\Modules\Major\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
     public function __construct()
    {
        $this->middleware('role')->except('logout');
    }
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */   
   
    
    public function index(Request $request) {
        $majors = DB::select('select m.id as mid,m.name as mname,m.description,c.name as cname,c.class from major as m left join color as c on c.type = m.id');
        return view('/welcome', ['majors' => $majors]);
    }
}
