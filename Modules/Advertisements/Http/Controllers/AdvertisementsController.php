<?php

namespace Modules\Advertisements\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Support\Renderable;
use Symfony\Component\HttpFoundation\Response;
use Modules\Advertisements\Entities\Advertisement;

class AdvertisementsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $title = "Advertisement";
        $data = Advertisement::all();
        return view('advertisements::index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('advertisements::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required|string',
            'image'=> 'nullable',
            'start_date'=> 'required|string',
            'end_date'=> 'required|string',
            'number_of_cleats'=> 'required|string',
            'advertisement_link'=> 'required|string',
        ]);

       $advertisement = Advertisement::create([

            'title'=> $request->title,
            'image'=> 'nullable',
            'start_date'=> $request->start_date,
            'end_date'=> $request->end_date,
            'number_of_cleats'=> $request->number_of_cleats,
            'advertisement_link'=> $request->advertisement_link,

       ]);
        Alert::success('Pemberitahuan', 'Data <b>' . $advertisement->name . '</b> berhasil dihapus')->toToast()->toHtml();

    return back();

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Request $request)
    {
        $advertisement = Advertisement::find($request->id);
        return response()->json([
            'status'    => Response::HTTP_OK,
            'message'   => 'Data category by id',
            'data'      => $advertisement
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('advertisements::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        $request->validate([
            'title'=> 'string',
            'image'=> 'string',
            'start_date'=> 'string',
            'end_date'=> 'string',
            'number_of_cleats'=> 'string',
            'advertisement_link'=> 'string',
        ]);
        $advertisement = Advertisement::find($request->id);

       $advertisement->update([
            'title'=> $request->title,
            'image'=> 'nullable',
            'start_date'=> $request->start_date,
            'end_date'=> $request->end_date,
            'number_of_cleats'=> $request->number_of_cleats,
            'advertisement_link'=> $request->advertisement_link,
       ]);
        Alert::success('Pemberitahuan', 'Data <b>' . $advertisement->name . '</b> berhasil dihapus')->toToast()->toHtml();

    return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        try {
            $advertisement = Advertisement::find($request->id);
            $advertisement->delete();
            Alert::success('Pemberitahuan', 'Data <b>' . $advertisement->name . '</b> berhasil dihapus')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $advertisement->name . '</b> gagal dihapus : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }
}