<?php

namespace Modules\Countries\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Countries\Models\Country;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;
use Symfony\Component\HttpFoundation\Response;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $x['title']     = "Country";
        $x['data']      = Country::get();

        return view('countries::countries.index', $x);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => ['required', 'string', 'max:255']
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }
        try {
            $country = Country::create([
                'name'=> $request->name
            ]);
            Alert::success('Pemberitahuan', 'Data <b>' . $country->name . '</b> berhasil dibuat')->toToast()->toHtml();
        } catch (\Throwable $th) {
            // Alert::error('Pemberitahuan', 'Data <b>' . $country->name . '</b> gagal dibuat : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();

        // $request->validate([
        //     'name'=> 'required|string|max:255',
        // ]);

        // Country::create([
        //         'name'=> $request->name,
        //  ]);
        //  return back();



    }

    public function show(Request $request)
    {
        $country = Country::find($request->id);
        return response()->json([
            'status'    => Response::HTTP_OK,
            'message'   => 'Data country by id',
            'data'      => $country
        ], Response::HTTP_OK);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => ['required', 'string', 'max:255']
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }
        try {
            $country = Country::find($request->id);
            $country->update([
                'name'  => $request->name
            ]);
            Alert::success('Pemberitahuan', 'Data <b>' . $country->name . '</b> berhasil disimpan')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $country->name . '</b> gagal disimpan : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }

    public function destroy(Request $request)
    {
        try {
            $country = Country::find($request->id);
            $country->delete();
            Alert::success('Pemberitahuan', 'Data <b>' . $country->name . '</b> berhasil dihapus')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $country->name . '</b> gagal dihapus : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }
}