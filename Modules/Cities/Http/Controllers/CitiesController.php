<?php

namespace Modules\Cities\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Cities\Models\City;
use Illuminate\Routing\Controller;
use Modules\Countries\Models\Country;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Support\Renderable;
use Symfony\Component\HttpFoundation\Response;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $title = "Cities";
        $countries = Country::all();
        $city = City::all();

        return view('cities::index',compact('title','city' , 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $countries = Country::all();
        return view('cities::create' , compact('$countries'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request , Country $countries )
    {
        $request->validate([
            'country_id' => "required",
            "name"=>"required|string",
        ]);
       $city =  City::create([
            'country_id'=> $request->country_id,
            'name'=> $request->name,
       ]);

       Alert::success('Pemberitahuan', 'Data <b>' . $city->name . '</b> berhasil dibuat')->toToast()->toHtml();
       return back();

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Request $request)
    {
        $city = City::find($request->id);
        return response()->json([
            'status'    => Response::HTTP_OK,
            'message'   => 'Data city by id',
            'data'      => $city
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(City $city)
    {
        return view('cities::edit',compact('city'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, City $city)
    {
        $request->validate([
            'country_id' => "nullable",
            "name"=>"string",
        ]);
        $city = City::find($request->id);
       $city->update([
            'name'=> $request->name,
       ]);

       Alert::success('Pemberitahuan', 'Data <b>' . $city->name . '</b> berhasil dibuat')->toToast()->toHtml();
       return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        $city =City::findOrFail($request->id);
            $city->delete();

            Alert::success('Pemberitahuan', 'Data <b>' . $city->name . '</b> berhasil dihapus')->toToast()->toHtml();
            return back();


        }

}