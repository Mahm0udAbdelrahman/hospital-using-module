<?php

namespace App\Http\Controllers\Auth;

use App\Models\Verification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerificationCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.verification');
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
        $verification = Verification::where('code' , $request->code)->first();
        if(!isset($verification))
        {
            return redirect()->back()->withErrors(['code' => 'كود غير صحيح']);
        }else{
            return redirect('admin/dashboard');

        }

    //    $verification = Verification::get();

    //     if($request->input('code') == $verification->code )
    //     {
    //         return redirect()->route('admin');
    //     }
    //     return redirect()->back()->withErrors(['code' => 'كود غير صحيح']);

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