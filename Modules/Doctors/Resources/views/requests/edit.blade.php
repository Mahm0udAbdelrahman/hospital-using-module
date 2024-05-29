@extends('doctors::layouts.master')
@section('content')


<div class="mdc-layout-grid">
    <div class="mdc-layout-grid__inner">


      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
        <div class="mdc-card">
          <section class="mdc-card__primary">
            <h1 class="mdc-card__title mdc-card__title--large">Update</h1>
          </section>
          <form method="post" action="{{ route('requests.update', $entitiesRequest->id) }}">
              @csrf
              @method('PUT')
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card">

                  <section class="mdc-card__supporting-text">
                    <div class="mdc-layout-grid__inner">
                      <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop">
                          <label >Your Name</label>
                        <div class="template-demo">
                          <div id="demo-tf-box-wrapper">
                            <div id="tf-box-example" class="mdc-text-field mdc-text-field--box w-100">
                              <input  type="text" name="name" value="{{ $entitiesRequest->name }}"  id="tf-box" class="mdc-text-field__input" aria-controls="name-validation-message">
                              <div class="mdc-text-field__bottom-line"></div>
                            </div>
                            <p class="mdc-text-field-helper-text mdc-text-field-helper-text--validation-msg" id="name-validation-msg">
                              Must be at least 8 characters
                            </p>
                          </div>
                        </div>
                      </div>
                      @error('name')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror


                      {{--  age  --}}
                      <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop">
                        <div class="template-demo">
                            <label >Your age</label>
                          <div id="demo-tf-box-wrapper">
                            <div id="tf-box-example" class="mdc-text-field mdc-text-field--box w-100">
                              <input  type="text" name="age"  value="{{ $entitiesRequest->age }}" id="tf-box" class="mdc-text-field__input" aria-controls="name-validation-message">
                              <div class="mdc-text-field__bottom-line"></div>
                            </div>
                            <p class="mdc-text-field-helper-text mdc-text-field-helper-text--validation-msg" id="name-validation-msg">
                              Must be at least 8 characters
                            </p>
                          </div>
                        </div>
                      </div>
                      @error('age')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                      {{--  date  --}}
                      <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop">
                        <div class="template-demo">
                            <label>date</label>
                          <div id="demo-tf-box-wrapper">
                            <div id="tf-box-example" class="mdc-text-field mdc-text-field--box w-100">
                              <input  type="date" name="date"  value="{{ $entitiesRequest->date }}" id="tf-box" class="mdc-text-field__input" aria-controls="name-validation-message">
                              <div class="mdc-text-field__bottom-line"></div>
                            </div>
                            <p class="mdc-text-field-helper-text mdc-text-field-helper-text--validation-msg" id="name-validation-msg">
                              Must be at least 8 characters
                            </p>
                          </div>
                        </div>
                      </div>
                      @error('date')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                      {{--  descrtiption  --}}
                      <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop">
                        <div class="template-demo">
                            <label >Your descrtiption</label>
                          <div id="demo-tf-box-wrapper">
                            <div id="tf-box-example" class="mdc-text-field mdc-text-field--box w-100">
                              <textarea   id="tf-box" name="descrtiption" value=""  aria-controls="name-validation-message">{{  $entitiesRequest->descrtiption }}</textarea>
                              <div class="mdc-text-field__bottom-line"></div>
                            </div>
                            <p class="mdc-text-field-helper-text mdc-text-field-helper-text--validation-msg" id="name-validation-msg">
                              Must be at least 8 characters
                            </p>
                          </div>
                        </div>
                      </div>
                      @error('descrtiption')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror





                    </div>
                  </section>
                  <button class="mdc-button mdc-button--raised" data-mdc-auto-init="MDCRipple">
                    Update
                  </button>
                </div>
              </div>
            </form>
        </div>
      </div>


    </div>
  </div>




@endsection
