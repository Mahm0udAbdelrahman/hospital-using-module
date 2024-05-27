<?php

namespace Modules\Subscriptions\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Notifications\InvoicePaid;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Modules\Subscriptions\Entities\Package;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\HttpFoundation\Response;
use Modules\Subscriptions\Entities\Subscription;

class SubscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $x['title']     = "subscription";
        $x['data']      = Subscription::get();
        $x['packages']      = Package::get();

        return view('subscriptions::index', $x);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_id'      => ['required', 'string', 'max:255'],
            'payment_system' => [
                'required', 'string', 'max:255'
            ],

            'the_currency'      => ['required', 'string', 'max:255'],
            'prefix'      => ['required',  'string', 'max:255'],
            'price'      => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }
        try {
            $subscription = Subscription::create([
                'package_id'      => $request->package_id,
                'payment_system'      => $request->payment_system,
                'the_currency'      => $request->the_currency,
                'prefix'      => $request->prefix,
                'price'      => $request->price,
            ]);
            Alert::success('Pemberitahuan', 'Data <b>' . $subscription->the_currency . '</b> berhasil dibuat')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $subscription->the_currency . '</b> gagal dibuat : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }

    public function show(Request $request)
    {
        $subscription = Subscription::find($request->id);
        return response()->json([
            'status'    => Response::HTTP_OK,
            'message'   => 'Data subscription by id',
            'data'      => $subscription
        ], Response::HTTP_OK);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_id'      => [ 'string', 'max:255'],
            'payment_system'      => [ 'string', 'max:255'],
            'the_currency'      => [ 'string', 'max:255'],
            'prefix'      => [  'string', 'max:255'],
            'price'      => [ 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }
        try {
            $subscription = Subscription::find($request->id);
            $subscription->update([
                'package_id'      => $request->package_id,
                'payment_system'      => $request->payment_system,
                'the_currency'      => $request->the_currency,
                'prefix'      => $request->prefix,
                'price'      => $request->price,
            ]);
            Alert::success('Pemberitahuan', 'Data <b>' . $subscription->name . '</b> berhasil disimpan')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $subscription->name . '</b> gagal disimpan : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }

    public function destroy(Request $request)
    {
        try {
            $subscription = Subscription::find($request->id);
            $subscription->delete();
            Alert::success('Pemberitahuan', 'Data <b>' . $subscription->name . '</b> berhasil dihapus')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $subscription->name . '</b> gagal dihapus : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }
}