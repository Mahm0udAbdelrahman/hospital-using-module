<?php

namespace Modules\Specialties\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Specialties\Entities\Specialty;
use Illuminate\Contracts\Support\Renderable;
use Modules\Specialties\Entities\Subspecialty;
use Symfony\Component\HttpFoundation\Response;

class SubspecialtiesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $title = "Subspecialty";
        $specialties = Specialty::all();
        // $subspecialties = Subspecialty::where('specialty_id' , $id)->get();
        return view('specialties::subspecialties.index',compact('title','specialties'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('specialties::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'specialty_id'=>'required|string',
            'name'=>'required|string',

        ]);

       $subspecialty = Subspecialty::create([

        'specialty_id'=>$request->specialty_id,
            'name'=>$request->name,

        ]);

        Alert::success('Pemberitahuan', 'Data <b>' . $subspecialty->name . '</b> berhasil dibuat')->toToast()->toHtml();

    return redirect()->route('specialties.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Request $request)
    {
        $subspecialty = Subspecialty::find($request->id);
        return response()->json([
            'status'    => Response::HTTP_OK,
            'message'   => 'Data Subspecialty by id',
            'data'      => $subspecialty
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('specialties::subspecialties.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        $specialty = Subspecialty::find($request->id);
        $request->validate([
            'specialty_id'=>'required|string',

            'name'=>'required|string',

        ]);

       $specialty->update([
        'specialty_id'=>$request->specialty_id,
        'name'=>$request->name,

        ]);

        Alert::success('Pemberitahuan', 'Data <b>' . $specialty->name . '</b> berhasil dibuat')->toToast()->toHtml();

    return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        $specialty = Subspecialty::find($request->id);

        $specialty->delete();
        Alert::success('Pemberitahuan', 'Data <b>' . $specialty->name . '</b> berhasil dibuat')->toToast()->toHtml();

        return back();
    }
}