<?php
namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class BaseController extends Controller
{
    /**
     * get All Database Data Status
     */
    public function getDBInfo() {
        $majorCount  = DB::table("major")->count();
        $subjectCount  = DB::table("subject")->count();
        $contentCount  = DB::table("content")->count();
        $dbinfo = array(
            "major" => array(
                "all" => $majorCount
            ),
             "subject" => array(
                "all" => $subjectCount
            ),
             "content" => array(
                "all" => $contentCount
            )
        );
        return $dbinfo;
    }
    public static function colors() {
        return array("w3-red","w3-pink","w3-purple","w3-deep-purple","w3-indigo","w3-blue","w3-light-blue","w3-cyan"
            ,"w3-teal","w3-green","w3-light-green"," w3-lime","w3-khaki","w3-yellow","w3-amber","w3-orange","w3-deep-orange"
            ,"w3-blue-grey","w3-brown","w3-light-grey","w3-grey","w3-dark-grey","w3-black");
    }
}
