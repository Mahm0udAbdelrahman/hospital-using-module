<?php

namespace Modules\Blogs\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Blogs\Entities\Blog;
use Illuminate\Routing\Controller;
use Modules\Blogs\Entities\Section;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Support\Renderable;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $title = "Blog";
        $data = Blog::all();
        return view('blogs::blogs.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $title = "Create Blog";
        $sections = Section::all();

        return view('blogs::blogs.create', compact('title', 'sections'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'section' => "required|string",
            'title' => "required|string",
            'description' => "required|string",
            'image' => "required|image",
            'date' => "required|string",
            'editor' => "required|string",

        ]);

        $blog = Blog::create($request->all());

        Alert::success('Pemberitahuan', 'Data <b>' . $blog->name . '</b> berhasil dibuat')->toToast()->toHtml();

        return redirect()->route('blogs.index');



    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('blogs::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $title = "Blog";
        $blog = Blog::find($id);
        $sections = Section::all();
        return view('blogs::blogs.edit', compact('blog','title','sections'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'section' => "nullable|string",
            'title' => "nullable|string",
            'description' => "nullable|string",
            'image' => "nullable|image",
            'date' => "nullable|string",
            'editor' => "nullable|string",

        ]);
        $blog = Blog::find($request->id);

        $blog->update($request->all());
        Alert::success('Pemberitahuan', 'Data <b>' . $blog->name . '</b> berhasil dibuat')->toToast()->toHtml();

        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {

        $blog =Blog::find($id);
        $blog->delete();

            Alert::success('Pemberitahuan', 'Data <b>' . $blog->name . '</b> berhasil dihapus')->toToast()->toHtml();

            return redirect()->route('blogs.index');


    }
}