<?php

namespace Modules\Doctors\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Doctors\Entities\Sick;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Support\Renderable;

class SicksController extends Controller
{
 /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __construct()
    {
        $this->middleware(['permisson:read sicks'])->only('index');
        $this->middleware(['permisson:create sicks'])->only('store');
        $this->middleware(['permisson:read sicks'])->only('show');
        $this->middleware(['permisson:update sicks'])->only('update');
        $this->middleware(['permisson:delete sicks'])->only('destroy');
    }
    public function index()
    {
        $data = Sick::all();
        return view('doctors::sicks.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('doctors::sicks.create');
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
            'email' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'age' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'description_disease' => 'required|string',

        ]);

        $sick =   Sick::create($request->all());
        Alert::success('Pemberitahuan', 'Data <b>' . $sick->name . '</b> berhasil dibuat')->toToast()->toHtml();

        return redirect()->route('sicks.index');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('doctors::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Sick $sick)
    {
        return view('doctors::sicks.edit',compact('sick'));

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Sick $sick)
    {
        $request->validate([
            'name' => 'string',
            'email' => 'email',
            'address' => 'string',
            'phone' => 'string',
            'age' => 'string',
            'country' => 'string',
            'city' => 'string',
            'description_disease' =>'string',
        ]);

        $sick->update($request->all());
        Alert::success('Pemberitahuan', 'Data <b>' . $sick->name . '</b> berhasil dibuat')->toToast()->toHtml();
        return redirect()->route('sicks.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $sick = Sick::find($id);
        $sick->delete();
        Alert::success('Pemberitahuan', 'Data <b>' . $sick->name . '</b> berhasil dibuat')->toToast()->toHtml();
        return redirect()->route('sicks.index');
    }
}