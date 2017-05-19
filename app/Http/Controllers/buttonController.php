<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\test;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Storage;
class buttonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function cookiebtn(Request $request)
    {   

        $val = $request->cookie('cookieVal');
        $val = $val+1;
        return response()->view('index')->withCookie(Cookie::forget('cookieVal'))->withCookie(Cookie::make('cookieVal', (int)$val, 3600));//->withCookie($cookie);

    }

    public function sesbtn(Request $request){
        $sessionVal = $request->session()->get('sesVal');
        $sessionVal = $sessionVal+1;
        $request->session()->forget('sesVal');
        $request->session()->put('sesVal', $sessionVal);
        return view('index');
    }

    public function lsbtn(){
        $lsVal = Storage::disk('local')->get('file.txt');
        $lsVal = $lsVal+1;
        Storage::disk('local')->put('file.txt', $lsVal);


        return view('index');


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $val = test::find(1);
        $val->value = $val->value+1;
        $val->save();
        return view('index');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
