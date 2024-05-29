@extends('doctors::layouts.master')
@section('content')
<div class="mdc-layout-grid">
    <div class="mdc-layout-grid__inner">

      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-8">
        <div class="mdc-layout-grid__inner">
          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
            <div class="mdc-card py-3 pl-2 d-flex flex-row align-item-center">
              <div class="mdc--tile mdc--tile-danger rounded">
                <i class="mdi mdi-account-settings text-white icon-md"></i>
              </div>
              <div class="text-wrapper pl-1">
                <h3 class="mdc-typography--display1 font-weight-bold mb-1">7459</h3>
                <p class="font-weight-normal mb-0 mt-0">New projects</p>
              </div>
            </div>
          </div>
          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
            <div class="mdc-card py-3 pl-2 d-flex flex-row align-item-center">
              <div class="mdc--tile mdc--tile-success rounded">
                <i class="mdi mdi-basket text-white icon-md"></i>
              </div>
              <div class="text-wrapper pl-1">
                <h3 class="mdc-typography--display1 font-weight-bold mb-1">$7783</h3>
                <p class="font-weight-normal mb-0 mt-0">Total Sales</p>
              </div>
            </div>
          </div>
          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
            <div class="mdc-card py-3 pl-2 d-flex flex-row align-item-center">
              <div class="mdc--tile mdc--tile-warning rounded">
                <i class="mdi mdi-ticket text-white icon-md"></i>
              </div>
              <div class="text-wrapper pl-1">
                <h3 class="mdc-typography--display1 font-weight-bold mb-1">569</h3>
                <p class="font-weight-normal mb-0 mt-0">Open Tickets</p>
              </div>
            </div>
          </div>
          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
            <div class="mdc-card py-3 pl-2 d-flex flex-row align-item-center">
              <div class="mdc--tile mdc--tile-primary rounded">
                <i class="mdi mdi-account-star text-white icon-md"></i>
              </div>
              <div class="text-wrapper pl-1">
                <h3 class="mdc-typography--display1 font-weight-bold mb-1">5785</h3>
                <p class="font-weight-normal mb-0 mt-0">New Visitors</p>
              </div>
            </div>
          </div>

        </div>
      </div>


    </div>
  </div>
@endsection
