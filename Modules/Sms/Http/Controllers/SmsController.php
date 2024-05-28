<?php

namespace Modules\Sms\Http\Controllers;

use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Modules\Sms\Entities\Sms;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $title = "Sms";
        // return view("sms::index", compact("title"));
        // return view("sms::sendsms", compact("title"));
        return view("sms::smses", compact("title"));





    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {


    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        $basic  = new \Vonage\Client\Credentials\Basic("e48c5d26", "QaY2bDuOJwHrdYEH");
        $client = new \Vonage\Client($basic);
        $otp = mt_rand(1000,9999);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS($request->phone, 'Mahmoud' , $request->massage.$otp)
        );



        $message = $response->current();

        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('sms::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('sms::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}