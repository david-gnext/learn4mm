<?php
namespace App\Modules\Major\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
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
    use AuthenticatesUsers;
    
    public function __construct() {
        $this->middleware("auth");
    }
    
    public function index() {
        $majors = DB::select('select m.id as mid,m.name as mname,m.description,c.name as cname,c.class from major as m left join color as c on c.type = m.id');
        return view('/welcome', ['majors' => $majors]);
    }
}
