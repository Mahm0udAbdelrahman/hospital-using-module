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
                        <div class="modal-body">
                            <form action="{{ route('sms.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group">
                                    <label>@lang('admin.Name')</label>
                                    <div class="input-group">
                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="phone" value="{{ old('phone') }}">
                                        @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label>@lang('admin.Name')</label>
                                    <div class="input-group">
                                        <input type="text" name="massage" class="form-control @error('massage') is-invalid @enderror" placeholder="massage" value="{{ old('massage') }}">
                                        @error('massage')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin.Cancel')</button>
                            <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
                        </div>
                        </form>
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


