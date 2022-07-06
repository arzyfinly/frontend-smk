<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $auth = Http::withHeaders([
            'Authorization' => 'Bearer '.substr($request->Header('cookie'),'6' , strpos(substr($request->Header('cookie'),'6'), ";")),
            'ContentType' => 'application/json',
            'Accept' => 'application/json',
            ])->get('http://localhost/PA/backend-smk/public/api/user')->json();
            $user = json_decode(json_encode($auth))->data;
        
        if($user->level_id == 1){
            return view('admin.dashboard');
        }elseif($user->level_id == 5){
            return view('student.dashboard');
        }elseif($user->level_id == 4){
            return view('counselor.dashboard');
        }
    }    
}
