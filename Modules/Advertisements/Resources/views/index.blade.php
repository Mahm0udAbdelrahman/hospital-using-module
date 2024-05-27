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

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @can('create advertisements')
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal"
                                            data-target="#modal-tambah" data-backdrop="static" data-keyboard="false"><i
                                                class="fas fa-plus"></i> @lang('admin.add')</a>
                                    </h3>
                                </div>
                            @endcan
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-hover datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('admin.title')</th>
                                            <th>@lang('admin.image')</th>
                                            <th>@lang('admin.start_date')</th>
                                            <th>@lang('admin.end_date')</th>
                                            <th>@lang('admin.number_of_cleats')</th>
                                            <th>@lang('admin.advertisement_link')</th>
                                            <th>@lang('admin.Updated')</th>
                                            @canany(['update advertisements', 'delete advertisements'])
                                                <th>@lang('admin.Action')</th>
                                            @endcanany
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $i)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $i->title }}</td>
                                                <td><img src="{{ $i->image }}"></td>
                                                <td>{{ $i->start_date }}</td>
                                                <td>{{ $i->end_date }}</td>
                                                <td>{{ $i->number_of_cleats }}</td>
                                                <td>{{ $i->advertisement_link }}</td>
                                                <td>{{ $i->updated_at }}</td>
                                                @canany(['update advertisements', 'delete advertisements'])
                                                    <td>
                                                        <div class="btn-group">
                                                            @can('update advertisements')
                                                                <button class="btn btn-sm btn-primary btn-edit"
                                                                    data-id="{{ $i->id }}"><i
                                                                        class="fas fa-pencil-alt"></i></button>
                                                            @endcan
                                                            @can('delete advertisements')
                                                                <button class="btn btn-sm btn-danger btn-delete"
                                                                    data-id="{{ $i->id }}" data-name="{{ $i->name }}"><i
                                                                        class="fas fa-trash"></i></button>
                                                            @endcan
                                                        </div>
                                                    </td>
                                                @endcanany
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $(document).on("click", '.btn-edit', function() {
                let id = $(this).attr("data-id");
                $('#modal-loading').modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });
                $.ajax({
                    url: "{{ route('advertisements.show') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        var data = data.data;
                        $("#name").val(data.name);
                        $("#id").val(data.id);
                        $('#modal-loading').modal('hide');
                        $('#modal-edit').modal({
                            backdrop: 'static',
                            keyboard: false,
                            show: true
                        });
                    },
                });
            });

            $(document).on("click", '.btn-delete', function() {
                let id = $(this).attr("data-id");
                let name = $(this).attr("data-name");
                $("#did").val(id);
                $("#delete-data").html(name);
                $('#modal-delete').modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });
            });
        });
    </script>
@endsection

@section('modal')
    {{-- Modal tambah --}}
    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('admin.add')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('advertisements.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

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
                            <label>@lang('admin.start_date')</label>
                            <div class="input-group">
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                    placeholder="start_date" name="start_date" value="{{ old('start_date') }}">
                                @error('start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <label>@lang('admin.end_date')</label>
                            <div class="input-group">
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                    placeholder="end_date" name="end_date" value="{{ old('end_date') }}">
                                @error('end_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <label>@lang('admin.number_of_cleats')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('number_of_cleats') is-invalid @enderror"
                                    placeholder="number_of_cleats" name="number_of_cleats" value="{{ old('number_of_cleats') }}">
                                @error('number_of_cleats')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="input-group">
                            <label>@lang('admin.advertisement_link')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('advertisement_link') is-invalid @enderror"
                                    placeholder="advertisement_link" name="advertisement_link" value="{{ old('advertisement_link') }}">
                                @error('advertisement_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>






                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin.Cancel')</button>
                    <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- Modal Update --}}
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('admin.Updated')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('advertisements.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                            <label>@lang('admin.start_date')</label>
                            <div class="input-group">
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                    placeholder="start_date" name="start_date" value="{{ old('start_date') }}">
                                @error('start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <label>@lang('admin.end_date')</label>
                            <div class="input-group">
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                    placeholder="end_date" name="end_date" value="{{ old('end_date') }}">
                                @error('end_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <label>@lang('admin.number_of_cleats')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('number_of_cleats') is-invalid @enderror"
                                    placeholder="number_of_cleats" name="number_of_cleats" value="{{ old('number_of_cleats') }}">
                                @error('number_of_cleats')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="input-group">
                            <label>@lang('admin.advertisement_link')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('advertisement_link') is-invalid @enderror"
                                    placeholder="advertisement_link" name="advertisement_link" value="{{ old('advertisement_link') }}">
                                @error('advertisement_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <input type="hidden" name="id" id="id">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin.Cancel')</button>
                    <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- Modal delete --}}
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('admin.delete')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('advertisements.destroy') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <p class="modal-text">@lang('admin.Areyousuretodelete') <b id="delete-data"></b></p>
                        <input type="hidden" name="id" id="did">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin.Cancel')</button>
                    <button type="submit" class="btn btn-danger">@lang('admin.delete')</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
