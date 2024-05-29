@extends('hospitals::layouts.master')
@section('content')
<div class="container">
<div class="mdc-layout-grid">
    <div class="mdc-layout-grid__inner">
<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
            <div class="mdc-card">
                @can('create sicks')
                <section class="mdc-card__primary">
                    <a href="{{ route('sicks.create') }}" class="mdc-button mdc-button--raised" data-mdc-auto-init="MDCRipple">
                        Add Sick
                      </a>
                </section>
                @endcan
<div class="template-demo">
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>@lang('admin.Name')</th>
        <th>@lang('admin.Address')</th>
        <th>@lang('admin.Phone')</th>
        <th>@lang('admin.Age')</th>
        <th>@lang('admin.Country')</th>
        <th>@lang('admin.City')</th>
        <th>@lang('admin.description_disease')</th>
        @canany(['update sicks', 'delete sicks'])
        <th>@lang('admin.Action')</th>
        @endcanany

      </tr>
    </thead>
    <tbody>
        @foreach($data as $sick)


      <tr>

        <td>{{ $loop->index +1 }}</td>
        <td>{{ $sick->name }}</td>
        <td>{{ $sick->address }}</td>
        <td>{{ $sick->phone }}</td>
        <td>{{ $sick->age }}</td>
        <td>{{ $sick->country }}</td>
        <td>{{ $sick->city }}</td>
        <td>{{ $sick->description_disease }}</td>
        @canany(['update sicks', 'delete sicks'])

        <td>
            @can('update sicks')
            <a href="{{ route('sicks.edit',$sick->id) }}" class="mdc-button mdc-button--raised" data-mdc-auto-init="MDCRipple">
                Update
              </a>
              @endcan

              @can('delete sicks')
              <form method="POST" action="{{ route('sicks.destroy',$sick->id) }}">
                @method('delete')
                <button class="mdc-button mdc-button--raised secondary-filled-button" data-mdc-auto-init="MDCRipple">
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
