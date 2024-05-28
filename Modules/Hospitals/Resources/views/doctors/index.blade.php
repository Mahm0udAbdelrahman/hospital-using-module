@extends('hospitals::layouts.master')
@section('content')

<div class="mdc-layout-grid">
    <div class="mdc-layout-grid__inner">
<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
            <div class="mdc-card">
                <section class="mdc-card__primary">
                    <a href="{{ route('doctors.create') }}" class="mdc-button mdc-button--raised" data-mdc-auto-init="MDCRipple">
                        Add Doctor
                      </a>
                </section>
<div class="template-demo">
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>@lang('admin.Name')</th>
        <th>@lang('admin.Email')</th>
        <th>@lang('admin.Address')</th>
        <th>@lang('admin.Phone')</th>
        <th>@lang('admin.Age')</th>
        <th>@lang('admin.Specialization')</th>
        <th>@lang('admin.Country')</th>
        <th>@lang('admin.City')</th>

      </tr>
    </thead>
    <tbody>
        @foreach($data as $doctor)


      <tr>

        <td>{{ $loop->index() +1 }}</td>
        <td>{{ $doctor->name }}</td>
        <td>{{ $doctor->email }}</td>
        <td>{{ $doctor->address }}</td>
        <td>{{ $doctor->phon }}</td>
        <td>{{ $doctor->age }}</td>
        <td>{{ $doctor->specialization }}</td>
        <td>{{ $doctor->country }}</td>
        <td>{{ $doctor->city }}</td>

        <td>
            <a href="{{ route('doctors.edit',$doctor->id) }}" class="mdc-button mdc-button--raised" data-mdc-auto-init="MDCRipple">
                Update
              </a>

              <form method="POST" action="{{ route('doctors.destroy',$doctor->id) }}">
                @method('delete')
                <button class="mdc-button mdc-button--raised secondary-filled-button" data-mdc-auto-init="MDCRipple">
                    Delete
                  </button>

              </form>


        </td>
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
</div>



@endsection
