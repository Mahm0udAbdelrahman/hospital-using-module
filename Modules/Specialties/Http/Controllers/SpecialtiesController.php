<?php

namespace Modules\Specialties\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Specialties\Entities\Specialty;
use Illuminate\Contracts\Support\Renderable;
use Modules\Specialties\Entities\Subspecialty;
use Symfony\Component\HttpFoundation\Response;

class SpecialtiesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $title = "Specialty";
        $specialties = Specialty::all();
        $subspecialties = Subspecialty::all();

        return view('specialties::specialty.index',compact('title','specialties','subspecialties'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('specialties::specialty.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',

        ]);

       $Specialty = Specialty::create([
            'name'=>$request->name,

        ]);

        Alert::success('Pemberitahuan', 'Data <b>' . $Specialty->name . '</b> berhasil dibuat')->toToast()->toHtml();

    return back();


    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Request $request)
    {
        $specialty = Specialty::find($request->id);
        return response()->json([
            'status'    => Response::HTTP_OK,
            'message'   => 'Data Specialty by id',
            'data'      => $specialty
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('specialties::specialty.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        $specialty = Specialty::find($request->id);
        $request->validate([
            'name'=>'required|string',

        ]);

       $specialty->update([
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
        $specialty = Specialty::find($request->id);

        $specialty->delete();
        Alert::success('Pemberitahuan', 'Data <b>' . $specialty->name . '</b> berhasil dibuat')->toToast()->toHtml();

        return back();
    }
}