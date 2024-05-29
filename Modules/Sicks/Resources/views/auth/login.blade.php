<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Material Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('dashboard/node_modules/mdi/css/materialdesignicons.min.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('dashboard/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('dashboard/images/favicon.png')}}" />
</head>

<body>
  <div class="body-wrapper">
    <div class="page-wrapper">
      <main class="content-wrapper auth-screen">
        <div class="mdc-layout-grid">
					<div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
						</div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
							<div class="mdc-card">
								<section class="mdc-card__primary bg-white">
                    <form method="POST" id="#recaptcha-form" action="{{ route('login') }}">
                                        @csrf
                    <div class="mdc-layout-grid">
            					<div class="mdc-layout-grid__inner">
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <label class="mdc-text-field w-100">
                            <input type="text" class="mdc-text-field__input">
                            <span class="mdc-text-field__label">Phone</span>
                            <div class="mdc-text-field__bottom-line"></div>
                          </label>
            						</div>
                        
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                          <div class="mdc-form-field">
                            <div class="mdc-checkbox">
                              <input type="checkbox" id="my-checkbox" class="mdc-checkbox__native-control"/>
                              <div class="mdc-checkbox__background">
                                <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                  <path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                </svg>
                                <div class="mdc-checkbox__mixedmark"></div>
                              </div>
                            </div>
                            <label for="my-checkbox">Remember me</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6 d-flex align-item-center justify-content-end">
                          <a href="#">Forgot Password</a>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <button class="mdc-button mdc-button--raised w-100" data-mdc-auto-init="MDCRipple">
                            Login
                          </button>
                        </div>
            					</div>
            				</div>
                  </form>
								</section>
							</div>
						</div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
						</div>
					</div>
				</div>
      </main>
    </div>
  </div>
  <!-- body wrapper -->
  <!-- plugins:js -->
  <script src="{{ asset('dashboard/node_modules/material-components-web/dist/material-components-web.min.js')}}"></script>
  <script src="{{ asset('dashboard/node_modules/jquery/dist/jquery.min.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
	<script src="{{ asset('dashboard/js/misc.js')}}"></script>
	<script src="{{ asset('dashboard/js/material.js')}}"></script>
	<!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
