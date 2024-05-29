@extends('doctors::layouts.master')
@section('content')
    <div class="container">

        <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                    <div class="mdc-card">
                        @can('create requests')
                            <section class="mdc-card__primary">
                                <a href="{{ route('requests.create') }}" class="mdc-button mdc-button--raised"
                                    data-mdc-auto-init="MDCRipple">
                                    Add request
                                </a>
                            </section>
                        @endcan
                        <div class="template-demo">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('admin.Name')</th>
                                        <th>@lang('admin.age')</th>
                                        <th>@lang('admin.date')</th>
                                        <th>@lang('admin.descrtiption')</th>
                                        @canany(['update requests', 'delete requests'])
                                            <th>@lang('admin.Action')</th>
                                        @endcanany

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $request)
                                        <tr>

                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $request->name }}</td>
                                            <td>{{ $request->age }}</td>
                                            <td>{{ $request->date }}</td>
                                            <td>{{ $request->descrtiption }}</td>

                                            @canany(['update requests', 'delete requests'])
                                                <td>
                                                    @can('update requests')
                                                        <a href="{{ route('requests.edit', $request->id) }}"
                                                            class="mdc-button mdc-button--raised" data-mdc-auto-init="MDCRipple">
                                                            Update
                                                        </a>
                                                    @endcan

                                                    @can('delete requests')
                                                        <form method="POST" action="{{ route('requests.destroy', $request->id) }}">
                                                            @method('delete')
                                                            <button class="mdc-button mdc-button--raised secondary-filled-button"
                                                                data-mdc-auto-init="MDCRipple">
                                                                Delete
                                                            </button>

                                                        </form>
                                                    @endcan

                                                </td>
                                            @endcanany
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
