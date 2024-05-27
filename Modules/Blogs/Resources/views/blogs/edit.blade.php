@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">@lang('admin.Dashboard')</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        {{-- Modal tambah --}}
        <div class="" id="">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">@lang('admin.add')</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="email">Choose Category</label>
                                <select class="form-control custom-select mt-15" name="section_id" id="">
                                    <option @selected($blog->section_id == null) value="">No Category</option>
                                    @foreach ( $sections as $cat )
                                    <option value="{{ $cat->id }}" @selected($blog->section_id == $cat->id) >{{
                                        $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('section_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="form-group">
                                <label for="email">Choose Country</label>
                                <select class="form-control custom-select mt-15" name="section_id" id="">
                                    <option value="">No Category</option>
                                    @foreach ($sections as $section)
                                        <option value="{{  $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('section_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="input-group">
                                <label>@lang('admin.title')</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        placeholder="title" name="title" value="{{ $blog->title }}">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-group">
                                <label>@lang('admin.description')</label>
                                <div class="input-group">
                                    <textarea  class="form-control @error('description') is-invalid @enderror"
                                    placeholder="description" name="description" id="menubar">{!! $blog->description !!}</textarea>

                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <script>
                                tinymce.init
                                ({
                                        selector: 'textarea#menubar',
                                        menubar: 'file edit view'
                                });
                            </script>

                            <div class="input-group">
                                <label>@lang('admin.image')</label>
                                <div class="input-group">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        placeholder="image" name="image" value="{{ $blog->image }}">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-group">
                                <label>@lang('admin.date')</label>
                                <div class="input-group">
                                    <input type="date" class="form-control @error('date') is-invalid @enderror"
                                        placeholder="date" name="date" value="{{  $blog->date }}">
                                    @error('date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-group">
                                <label>@lang('admin.editor')</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('editor') is-invalid @enderror"
                                        placeholder="editor" name="editor" value="{{ Auth::user()->name }}">
                                    @error('editor')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>





                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default"
                                    data-dismiss="modal">@lang('admin.Cancel')</button>
                                <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
@endsection
