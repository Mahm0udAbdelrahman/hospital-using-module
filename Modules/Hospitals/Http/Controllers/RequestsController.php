<?php

namespace Modules\Hospitals\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Support\Renderable;
use Modules\Hospitals\Entities\Request as EntitiesRequest;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __construct()
    {
        $this->middleware(['permisson:read requests'])->only('index');
        $this->middleware(['permisson:create requests'])->only('store');
        $this->middleware(['permisson:read requests'])->only('show');
        $this->middleware(['permisson:update requests'])->only('update');
        $this->middleware(['permisson:delete requests'])->only('destroy');
    }
    public function index()
    {
        $data = EntitiesRequest::all();
        return view('hospitals::requests.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('hospitals::requests.create');
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
            'age' => 'required|string',
            'date' => 'required|string',
            'descrtiption' => 'required|string',
        ]);

        $entitiesRequest =   EntitiesRequest::create($request->all());
        Alert::success('Pemberitahuan', 'Data <b>' . $entitiesRequest->name . '</b> berhasil dibuat')->toToast()->toHtml();
        return redirect()->route('requests.index');
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
    public function edit($id)
    {
        $entitiesRequest =EntitiesRequest::find($id);


        return view('hospitals::requests.edit',compact('entitiesRequest'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'string',
            'age' => 'string',
            'date' => 'string',
            'descrtiption' => 'string',

        ]);
        $entitiesRequest =EntitiesRequest::find($id);
        $entitiesRequest->update($request->all());
        Alert::success('Pemberitahuan', 'Data <b>' . $entitiesRequest->name . '</b> berhasil dibuat')->toToast()->toHtml();

        return redirect()->route('requests.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $entitiesRequest =EntitiesRequest::find($id);
        $entitiesRequest->delete();
        Alert::success('Pemberitahuan', 'Data <b>' . $entitiesRequest->name . '</b> berhasil dibuat')->toToast()->toHtml();
        return redirect()->route('requests.index');
    }
}