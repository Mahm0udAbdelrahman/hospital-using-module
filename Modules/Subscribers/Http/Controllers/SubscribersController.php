<?php

namespace Modules\Subscribers\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use Modules\Subscribers\Models\Subscriber;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class SubscribersController extends Controller
{
    public function index()
    {
        $x['title']     = "Subscriber";
        $x['data']      = Subscriber::get();


        return view('subscribers::index', $x);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'the_organization'  => ['required', 'string', 'max:255'],
            'name'      => ['required', 'string', 'max:255'],
            'email'      => ['required', 'email'],
            'address'      => ['required', 'string', 'max:255'],
            'image'      => ['required', 'image'],
            'phone'      => ['required', 'string', 'max:255'],
            'facebook'      => ['required', 'string', 'max:255'],
            'instagram'      => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }
        try {
            $subscriber = Subscriber::create([
                'the_organization'  => $request->the_organization,
                'name'  => $request->name,
                'email'  => $request->email,
                'address'  => $request->address,
                'image'  => $request->image,
                'phone'  => $request->phone,
                'facebook'  => $request->facebook,
                'instagram'  => $request->instagram,
            ]);
            Alert::success('Pemberitahuan', 'Data <b>' . $subscriber->name . '</b> berhasil dibuat')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $subscriber->name . '</b> gagal dibuat : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }

    public function show(Request $request)
    {
        $subscriber = Subscriber::find($request->id);
        return response()->json([
            'status'    => Response::HTTP_OK,
            'message'   => 'Data subscriber by id',
            'data'      => $subscriber
        ], Response::HTTP_OK);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'the_organization'  => [ 'string', 'max:255'],
            'name'      => [ 'string', 'max:255'],
            'email'      => [ 'email'],
            'address'      => [ 'string', 'max:255'],
            'image'      => [ 'image'],
            'phone'      => [ 'string', 'max:255'],
            'facebook'      => [ 'string', 'max:255'],
            'instagram'      => [ 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }
        try {
            $subscriber = Subscriber::find($request->id);
            $subscriber->update([
                'the_organization'  => $request->the_organization,
                'name'  => $request->name,
                'email'  => $request->email,
                'address'  => $request->address,
                'image'  => $request->image,
                'phone'  => $request->phone,
                'facebook'  => $request->facebook,
                'instagram'  => $request->instagram,
            ]);
            Alert::success('Pemberitahuan', 'Data <b>' . $subscriber->name . '</b> berhasil disimpan')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $subscriber->name . '</b> gagal disimpan : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }

    public function destroy(Request $request)
    {
        try {
            $subscriber = Subscriber::find($request->id);
            $subscriber->delete();
            Alert::success('Pemberitahuan', 'Data <b>' . $subscriber->name . '</b> berhasil dihapus')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $subscriber->name . '</b> gagal dihapus : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }
}