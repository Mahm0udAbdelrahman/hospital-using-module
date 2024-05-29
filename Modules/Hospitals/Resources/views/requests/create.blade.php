@extends('hospitals::layouts.master')
@section('content')
    <div class="mdc-layout-grid">
        <div class="mdc-layout-grid__inner">


            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
                    <section class="mdc-card__primary">
                        <h1 class="mdc-card__title mdc-card__title--large">Create</h1>
                    </section>
                    <form method="post" action="{{ route('requests.store') }}">
                        @csrf

                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                            <div class="mdc-card">

                                <section class="mdc-card__supporting-text">
                                    <div class="mdc-layout-grid__inner">
                                        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop">
                                            <div class="template-demo">
                                                <div id="demo-tf-box-wrapper">
                                                    <div id="tf-box-example"
                                                        class="mdc-text-field mdc-text-field--box w-100">
                                                        <input type="text" name="name" id="tf-box"
                                                            class="mdc-text-field__input"
                                                            aria-controls="name-validation-message">
                                                        <label for="tf-box" class="mdc-text-field__label">Your
                                                            Name</label>
                                                        <div class="mdc-text-field__bottom-line"></div>
                                                    </div>
                                                    <p class="mdc-text-field-helper-text mdc-text-field-helper-text--validation-msg"
                                                        id="name-validation-msg">
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
                                                <div id="demo-tf-box-wrapper">
                                                    <div id="tf-box-example"
                                                        class="mdc-text-field mdc-text-field--box w-100">
                                                        <input type="text" name="age" id="tf-box"
                                                            class="mdc-text-field__input"
                                                            aria-controls="name-validation-message">
                                                        <label for="tf-box" class="mdc-text-field__label">Your
                                                            age</label>
                                                        <div class="mdc-text-field__bottom-line"></div>
                                                    </div>
                                                    <p class="mdc-text-field-helper-text mdc-text-field-helper-text--validation-msg"
                                                        id="name-validation-msg">
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
                                                <div id="demo-tf-box-wrapper">
                                                    <div id="tf-box-example"
                                                        class="mdc-text-field mdc-text-field--box w-100">
                                                        <input type="date" name="date" id="tf-box"
                                                            class="mdc-text-field__input"
                                                            aria-controls="name-validation-message">
                                                        <label for="tf-box" class="mdc-text-field__label">Your
                                                            date</label>
                                                        <div class="mdc-text-field__bottom-line"></div>
                                                    </div>
                                                    <p class="mdc-text-field-helper-text mdc-text-field-helper-text--validation-msg"
                                                        id="name-validation-msg">
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
                                                <div id="demo-tf-box-wrapper">
                                                    <div id="tf-box-example"
                                                        class="mdc-text-field mdc-text-field--box w-100">
                                                        <textarea type="text" id="tf-box" name="descrtiption"

                                                            aria-controls="name-validation-message">{{ old('descrtiption') }}</textarea>
                                                        <label for="tf-box" class="mdc-text-field__label">Your
                                                            descrtiption</label>
                                                        <div class="mdc-text-field__bottom-line"></div>
                                                    </div>
                                                    <p class="mdc-text-field-helper-text mdc-text-field-helper-text--validation-msg"
                                                        id="name-validation-msg">
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
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
@endsection
