@extends('hospitals::layouts.master')
@section('content')


<div class="mdc-layout-grid">
    <div class="mdc-layout-grid__inner">


      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
        <div class="mdc-card">
          <section class="mdc-card__primary">
            <h1 class="mdc-card__title mdc-card__title--large">Update</h1>
          </section>
          <form method="post" action="{{ route('sicks.update',$sick->id) }}">
              @csrf
              @method('PUT')
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card">

                  <section class="mdc-card__supporting-text">
                    <div class="mdc-layout-grid__inner">
                      <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop">
                        <div class="template-demo">
                          <div id="demo-tf-box-wrapper">
                            <div id="tf-box-example" class="mdc-text-field mdc-text-field--box w-100">
                              <input  type="text" name="name" value="{{ $sick->name }}"  id="tf-box" class="mdc-text-field__input" aria-controls="name-validation-message">
                              <label for="tf-box" class="mdc-text-field__label">Your Name</label>
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

                      {{--  address  --}}
                      <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop">
                        <div class="template-demo">
                          <div id="demo-tf-box-wrapper">
                            <div id="tf-box-example" class="mdc-text-field mdc-text-field--box w-100">
                              <input  type="text" name="address"  value="{{ $sick->address }}" id="tf-box" class="mdc-text-field__input" aria-controls="name-validation-message">
                              <label for="tf-box" class="mdc-text-field__label">Your address</label>
                              <div class="mdc-text-field__bottom-line"></div>
                            </div>
                            <p class="mdc-text-field-helper-text mdc-text-field-helper-text--validation-msg" id="name-validation-msg">
                              Must be at least 8 characters
                            </p>
                          </div>
                        </div>
                      </div>
                      @error('address')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                      {{--  phone  --}}
                      <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop">
                        <div class="template-demo">
                          <div id="demo-tf-box-wrapper">
                            <div id="tf-box-example" class="mdc-text-field mdc-text-field--box w-100">
                              <input  type="text" id="tf-box" name="phone" value="{{ $sick->phone }}"  class="mdc-text-field__input" aria-controls="name-validation-message">
                              <label for="tf-box" class="mdc-text-field__label">Your phone</label>
                              <div class="mdc-text-field__bottom-line"></div>
                            </div>
                            <p class="mdc-text-field-helper-text mdc-text-field-helper-text--validation-msg" id="name-validation-msg">
                              Must be at least 8 characters
                            </p>
                          </div>
                        </div>
                      </div>
                      @error('phone')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                      {{--  age  --}}
                      <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop">
                        <div class="template-demo">
                          <div id="demo-tf-box-wrapper">
                            <div id="tf-box-example" class="mdc-text-field mdc-text-field--box w-100">
                              <input  type="text" name="age" value="{{ $sick->age }}"   id="tf-box" class="mdc-text-field__input" aria-controls="name-validation-message">
                              <label for="tf-box" class="mdc-text-field__label">Your age</label>
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

                      {{--  country  --}}
                      <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop">
                        <div class="template-demo">
                          <div id="demo-tf-box-wrapper">
                            <div id="tf-box-example" class="mdc-text-field mdc-text-field--box w-100">
                              <input  type="text" name="country" value="{{ $sick->country }}"  id="tf-box" class="mdc-text-field__input" aria-controls="name-validation-message">
                              <label for="tf-box" class="mdc-text-field__label">Your country</label>
                              <div class="mdc-text-field__bottom-line"></div>
                            </div>
                            <p class="mdc-text-field-helper-text mdc-text-field-helper-text--validation-msg" id="name-validation-msg">
                              Must be at least 8 characters
                            </p>
                          </div>
                        </div>
                      </div>
                      @error('country')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                      {{--  city  --}}
                      <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop">
                        <div class="template-demo">
                          <div id="demo-tf-box-wrapper">
                            <div id="tf-box-example" class="mdc-text-field mdc-text-field--box w-100">
                              <input  type="text" name="city" value="{{ $sick->city }}" id="tf-box" class="mdc-text-field__input" aria-controls="name-validation-message">
                              <label for="tf-box" class="mdc-text-field__label">Your city</label>
                              <div class="mdc-text-field__bottom-line"></div>
                            </div>
                            <p class="mdc-text-field-helper-text mdc-text-field-helper-text--validation-msg" id="name-validation-msg">
                              Must be at least 8 characters
                            </p>
                          </div>
                        </div>
                      </div>
                      @error('city')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror

                      <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop">
                        <div class="template-demo">
                          <div id="demo-tf-box-wrapper">
                            <div id="tf-box-example" class="mdc-text-field mdc-text-field--box w-100">
                              <input  type="text" name="description_disease" value="{{ $sick->description_disease }}" id="tf-box" class="mdc-text-field__input" aria-controls="name-validation-message">
                              <label for="tf-box" class="mdc-text-field__label">Your city</label>
                              <div class="mdc-text-field__bottom-line"></div>
                            </div>
                            <p class="mdc-text-field-helper-text mdc-text-field-helper-text--validation-msg" id="name-validation-msg">
                              Must be at least 8 characters
                            </p>
                          </div>
                        </div>
                      </div>
                      @error('description_disease')
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
