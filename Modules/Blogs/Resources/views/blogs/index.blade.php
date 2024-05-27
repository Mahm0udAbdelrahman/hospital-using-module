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
                            @can('create blogs')
                            <div class="card-header">
                                <h3 class="card-title">
                                    <a href="{{ route('blogs.create') }}" class="btn btn-sm btn-success" data-toggle="" data-target="#modal-tambah" data-backdrop="static" data-keyboard="false"><i class="fas fa-plus"></i> @lang('admin.add')</a>
                                </h3>
                            </div>
             @endcan

                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-hover ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('admin.section')</th>
                                            <th>@lang('admin.title')</th>
                                            <th>@lang('admin.description')</th>
                                            <th>@lang('admin.image')</th>
                                            <th>@lang('admin.date')</th>
                                            <th>@lang('admin.editor')</th>
                                            <th>@lang('admin.updated_at')</th>
                                            @canany(['update blogs', 'delete blogs'])
                                                <th>@lang('admin.Action')</th>
                                            @endcanany
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $i)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $i->section->name }}</td>
                                                <td>{{ $i->title }}</td>
                                                <td>{!! $i->description !!}</td>
                                                <td><img src="{{ $i->image }}"></td>
                                                <td>{{ $i->date }}</td>
                                                <td>{{ $i->editor }}</td>
                                                <td>{{ $i->updated_at }}</td>
                                            @canany(['update blogs', 'delete blogs'])
                                                    <td>
                                                        <div class="btn-group">
                                                            @can('update blogs')
                                                            <a class="btn btn-sm btn-primary" href="{{ route('blogs.edit',$i->id) }}" >edit</a>
                                                            @endcan
                                                            @can('delete blogs')
                                                            <form method="post" action="{{ route('blogs.destroy' , $i->id) }}">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-sm btn-danger" ><i class="fas fa-trash"></i></button>

                                                            </form>
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



