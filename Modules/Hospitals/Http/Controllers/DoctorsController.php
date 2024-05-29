<?php

namespace Modules\Hospitals\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Hospitals\Entities\Doctor;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Support\Renderable;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __construct()
    {
        $this->middleware(['permisson:read doctors'])->only('index');
        $this->middleware(['permisson:create doctors'])->only('store');
        $this->middleware(['permisson:read doctors'])->only('show');
        $this->middleware(['permisson:update doctors'])->only('update');
        $this->middleware(['permisson:delete doctors'])->only('destroy');
    }
    public function index()
    {
        $data = Doctor::all();
        return view('hospitals::doctors.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('hospitals::doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'phone' => 'required|string',
            'age' => 'required|string',
            'specialization' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',

        ]);

        $doctor =   Doctor::create($request->all());
        Alert::success('Pemberitahuan', 'Data <b>' . $doctor->name . '</b> berhasil dibuat')->toToast()->toHtml();

        return redirect()->route('doctors.index');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('hospitals::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Doctor $doctor)
    {
        return view('hospitals::doctors.edit',compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'string',
            'email' => 'email',
            'address' => 'string',
            'phone' => 'string',
            'age' => 'string',
            'specialization' => 'string',
            'country' => 'string',
            'city' => 'string',
        ]);

        $doctor->update($request->all());
        Alert::success('Pemberitahuan', 'Data <b>' . $doctor->name . '</b> berhasil dibuat')->toToast()->toHtml();
        return redirect()->route('doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $doctor =Doctor::find($id);
        $doctor->delete();
        Alert::success('Pemberitahuan', 'Data <b>' . $doctor->name . '</b> berhasil dibuat')->toToast()->toHtml();
        return redirect()->route('doctors.index');
    }
}