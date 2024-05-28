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
                            @can('create subscribers')
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
                                            <th>@lang('admin.the_organization')</th>
                                            <th>@lang('admin.Name')</th>
                                            <th>@lang('admin.email')</th>
                                            <th>@lang('admin.address')</th>
                                            <th>@lang('admin.phone')</th>
                                            <th>@lang('admin.facebook')</th>
                                            <th>@lang('admin.instagram')</th>
                                            <th>@lang('admin.image')</th>
                                            <th>@lang('admin.Updated')</th>
                                            @canany(['update subscribers', 'delete subscribers'])
                                                <th>@lang('admin.Action')</th>
                                            @endcanany
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $i)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $i->the_organization }}</td>
                                                <td>{{ $i->name }}</td>
                                                <td>{{ $i->email }}</td>
                                                <td>{{ $i->address }}</td>
                                                <td>{{ $i->phone }}</td>
                                                <td>{{ $i->facebook }}</td>
                                                <td>{{ $i->instagram }}</td>
                                                <td><img width="100" height="100" src="{{ $i->image }}"</td>
                                                <td>{{ $i->updated_at }}</td>
                                                @canany(['update subscribers', 'delete subscribers'])
                                                    <td>
                                                        <div class="btn-group">
                                                            @can('update subscribers')
                                                                <button class="btn btn-sm btn-primary btn-edit"
                                                                    data-id="{{ $i->id }}"><i
                                                                        class="fas fa-pencil-alt"></i></button>
                                                            @endcan
                                                            @can('delete subscribers')
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
                    url: "{{ route('subscribers.show') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        var data = data.data;
                        $("#the_organization").val(data.the_organization);
                        $("#name").val(data.name);
                        $("#email").val(data.email);
                        $("#address").val(data.address);
                        $("#image").val(data.image);
                        $("#phone").val(data.phone);
                        $("#facebook").val(data.facebook);
                        $("#instagram").val(data.instagram);
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
                    <form action="{{ route('subscribers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="input-group">
                            <label>@lang('admin.Name')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('the_organization') is-invalid @enderror"
                                    placeholder="the_organization" name="the_organization" value="{{ old('the_organization') }}">
                                @error('the_organization')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>





                        <div class="input-group">
                            <label>@lang('admin.Name')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <label>@lang('admin.email')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Emial" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <label>@lang('admin.address')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    placeholder="Address" name="address" value="{{ old('address') }}">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <label>@lang('admin.phone')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    placeholder="phone" name="phone" value="{{ old('phone') }}">
                                @error('phone')
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
                            <label>@lang('admin.facebook')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('facebook') is-invalid @enderror"
                                    placeholder="facebook" name="facebook" value="{{ old('facebook') }}">
                                @error('facebook')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <label>@lang('admin.instagram')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('instagram') is-invalid @enderror"
                                    placeholder="instagram" name="instagram" value="{{ old('instagram') }}">
                                @error('instagram')
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
                    <form action="{{ route('subscribers.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="input-group">
                            <label>@lang('admin.Name')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Name" name="name" id="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <label>@lang('admin.email')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Emial" name="email" id="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <label>@lang('admin.address')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    placeholder="Address" name="address" id="address" value="{{ old('address') }}">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <label>@lang('admin.phone')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    placeholder="phone" name="phone" id="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="input-group">
                            <label>@lang('admin.image')</label>
                            <div class="input-group">
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    placeholder="image" name="image" id="image" value="{{ old('image') }}">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <label>@lang('admin.facebook')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('facebook') is-invalid @enderror"
                                    placeholder="facebook" name="facebook" id="facebook" value="{{ old('facebook') }}">
                                @error('facebook')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <label>@lang('admin.instagram')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('instagram') is-invalid @enderror"
                                    placeholder="instagram" name="instagram" id="instagram" value="{{ old('instagram') }}">
                                @error('instagram')
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
                    <form action="{{ route('subscribers.destroy') }}" method="POST" enctype="multipart/form-data">
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
