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
                            @can('create subscriptions')
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
                                            <th>@lang('admin.Package_name')</th>
                                            <th>@lang('admin.payment_system')</th>
                                            <th>@lang('admin.the_currency')</th>
                                            <th>@lang('admin.prefix')</th>
                                            <th>@lang('admin.price')</th>
                                            <th>@lang('admin.Updated')</th>
                                            @canany(['update subscriptions', 'delete subscriptions'])
                                                <th>@lang('admin.Action')</th>
                                            @endcanany
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $i)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $i->package->name }}</td>
                                                <td>{{ $i->payment_system }}</td>
                                                <td>{{ $i->the_currency }}</td>
                                                <td>{{ $i->prefix }}</td>
                                                <td>{{ $i->price }}</td>
                                                <td>{{ $i->updated_at }}</td>
                                                @canany(['update subscriptions', 'delete subscriptions'])
                                                    <td>
                                                        <div class="btn-group">
                                                            @can('update subscriptions')
                                                                <button class="btn btn-sm btn-primary btn-edit"
                                                                    data-id="{{ $i->id }}"><i
                                                                        class="fas fa-pencil-alt"></i></button>
                                                            @endcan
                                                            @can('delete subscriptions')
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
                    url: "{{ route('subscriptions.show') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        var data = data.data;
                        $("#package_id").val(data.package_id);
                        $("#payment_system").val(data.payment_system);
                        $("#the_currency").val(data.the_currency);
                        $("#prefix").val(data.prefix);
                        $("#price").val(data.price);
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
                    <form action="{{ route('subscriptions.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf




                        <div class="form-group">
                            <label for="package_id">Choose Packages</label>
                            <select class="form-control custom-select mt-15" name="package_id" id="">
                                <option value="">No Package</option>
                                @foreach ( $packages as $package )
                                <option value="{{ $package->id }}">{{ $package->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('package_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="input-group">
                            <label>@lang('admin.payment_system')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('payment_system') is-invalid @enderror"
                                    placeholder="payment_system" name="payment_system" value="{{ old('payment_system') }}">
                                @error('payment_system')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>






                        <div class="input-group">
                            <label>@lang('admin.the_currency')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('the_currency') is-invalid @enderror"
                                    placeholder="the_currency" name="the_currency" value="{{ old('the_currency') }}">
                                @error('the_currency')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <label>@lang('admin.prefix')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('prefix') is-invalid @enderror"
                                    placeholder="prefix" name="prefix" value="{{ old('prefix') }}">
                                @error('prefix')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <label>@lang('admin.price')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    placeholder="price" name="price" value="{{ old('price') }}">
                                @error('price')
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
                    <form action="{{ route('subscriptions.update') }}" method="POST" enctype="multipart/form-data">
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


                        <div class="form-group">
                            <label for="package_id">Packages</label>
                            <select class="form-control custom-select mt-15"  name="package_id" id="package_id">
                                <option value="">No Category</option>
                                @foreach ( $packages as $package )
                                <option value="{{ $package->id }}">{{ $package->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('package_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="input-group">
                            <label>@lang('admin.payment_system')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('payment_system') is-invalid @enderror"
                                    placeholder="payment_system" name="payment_system" id="payment_system" value="{{ old('payment_system') }}">
                                @error('payment_system')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>










                        <div class="input-group">
                            <label>@lang('admin.the_currency')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('the_currency') is-invalid @enderror"
                                    placeholder="the_currency" name="the_currency" id="the_currency" value="{{ old('the_currency') }}">
                                @error('the_currency')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <label>@lang('admin.prefix')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('prefix') is-invalid @enderror"
                                    placeholder="Emial" name="prefix" id="prefix" value="{{ old('prefix') }}">
                                @error('prefix')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <label>@lang('admin.price')</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    placeholder="price" id="price" name="price" value="{{ old('price') }}">
                                @error('price')
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
                    <form action="{{ route('subscriptions.destroy') }}" method="POST" enctype="multipart/form-data">
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
