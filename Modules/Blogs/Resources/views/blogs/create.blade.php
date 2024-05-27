@extends('admin.layouts.master')
@section('content')
    @push('style')
        <style>
            #editor {
                width: 1000px;
                margin: 20px auto;
            }
        </style>
    @endpush
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
                        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="email">Choose Country</label>
                                <select class="form-control custom-select mt-15" name="section_id" id="">
                                    <option value="">No Category</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
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
                                        placeholder="title" name="title" value="{{ old('title') }}">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-group">
                                <label>@lang('admin.description')</label>
                                <div class="input-group">
                                    <textarea class="form-control  @error('description') is-invalid @enderror" placeholder="description"  name="description" id="editor">{{ old('description') }}</textarea>

                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <script>
                                tinymce.init({
                                    selector: 'textarea#menubar',
                                    menubar: 'file edit view'
                                });
                            </script>

                            <div class="input-group">
                                <label>@lang('admin.image')</label>
                                <div class="input-group">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        placeholder="image" name="image" value="{{ old('image') }}">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-group">
                                <label>@lang('admin.date')</label>
                                <div class="input-group">
                                    <input type="date" class="form-control @error('date') is-invalid @enderror"
                                        placeholder="date" name="date" value="{{ old('date') }}">
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
@push('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
