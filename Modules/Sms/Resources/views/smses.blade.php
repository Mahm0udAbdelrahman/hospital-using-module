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
                            {{--  action=" route('sms.store') }}"  --}}
                                @csrf
                                <div id="sender">
                                <div class="input-group">
                                    <label>@lang('admin.phone')</label>
                                    <div  class="input-group">
                                        <input type="text" name="number" id="number"  class="form-control @error('number') is-invalid @enderror" placeholder="number" value="{{ old('number') }}">
                                        @error('number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div id="recaptha-container" ></div>


                        <div class="modal-footer justify-content-between">
                            <button  onClick="phoneAuth()" id="send" type="submit" class="btn btn-primary">@lang('admin.save')</button>
                        </div>
                                </div>
                            <div id="verifier" style="display: none">
                                <div class="input-group">
                                    <label>@lang('admin.phone')</label>
                                    <div  class="input-group">
                                        <input type="text" id="verificationcode"  class="form-control @error('number') is-invalid @enderror" placeholder="OTP Code" value="{{ old('number') }}">
                                        @error('number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            <button   id="venrif" onClick="codeverify()"  type="submit" class="btn btn-primary">@lang('admin.Verify')</button>

                                <div class="p-conf"  style="color:green,display:none">Nmber Verified</div>
                                <div class="n-conf" style="color:red,display:none">OTP ERROR</div>

                                {{--  <div id="error" style="color:red,display:none" > </div>
                                <div id="sentMessage" style="color:green,display:none" ></div>  --}}

                            </div>





                        <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
                        <script>
                            const firebaseConfig = {
                                apiKey: "AIzaSyD-FeAN8AJuugXtsIjCP0ANd8Ks2cI0Ysw",
                                authDomain: "smss-dcbee.firebaseapp.com",
                                projectId: "smss-dcbee",
                                storageBucket: "smss-dcbee.appspot.com",
                                messagingSenderId: "520258665888",
                                appId: "1:520258665888:web:5b2e88727b5df4d45438c5",
                                measurementId: "G-54N71RY1DW"
                              };
                            firebase.initializeApp(firebaseConfig);
                                render();

                            function render(){
                                window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptha-container');
                                recaptchaVerifier.render();
                            }

                            function phoneAuth(){
                                var number = document.getElementById('number').value;

                                firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function(confirmationResult){
                                    window.confirmationResult = confirmationResult;
                                    coderesult = confirmationResult;
                                    document.getElementById('sender').style.display = 'none';
                                    document.getElementById('verifier').style.display = 'block';
                                }).catch(function(error){
                                   alert(error.message);
                                });

                            }
                            function codeverify(){
                                var code = document.getElementById('verificationcode').value;
                                coderesult.confirm(code).then(function(){
                                    document.getElementByClassName('p-conf')[0].style.display = 'block';
                                    document.getElementByClassName('n-conf')[0].style.display = 'none';
                                }).catch(function(){
                                    document.getElementByClassName('p-conf')[0].style.display = 'none';
                                    document.getElementByClassName('n-conf')[0].style.display = 'black';
                                 });

                            }



                        </script>
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
