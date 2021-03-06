<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Portal Akademik | Login</title>
    <link href="{{ asset('template') }}/css/styles.css" rel="stylesheet" />
    <link href="{{ asset('css') }}/style.css" rel="stylesheet" />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body class="bg-login">
    <div id="layoutAuthentication">
      <div id="layoutAuthentication_content">
        <main>
            <div id="layoutAuthentication">
              <div id="layoutAuthentication_content">
                <main>
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                          <div class="card-header login-header">
                            <h3 class="text-center font-weight-light">
                              <img src="https://www.ulm.ac.id/id/wp-content/uploads/2015/05/Logo-Unlam.png" width="150" height="150">  
                            </h3>
                            <ul class="tab-group">
                              <li class="tab active"><a href="#signup"><h4>Halaman Login</h4></a></li>
                            </ul>
                          </div>
                          <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                              @csrf
                              <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress"
                                  >Username</label
                                >
                                <input
                                  class="form-control py-4 @error('email') is-invalid @enderror " id="inputEmailAddress" type="text" name="email" placeholder="Enter NIM or NIP" value="{{ old('email') }}"
                                />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label class="small mb-1" for="inputPassword"
                                  >Password</label
                                >
                                <input
                                  class="
                                    form-control
                                    py-4
                                    @error('password')
                                    is-invalid
                                    @enderror
                                  "
                                  id="inputPassword"
                                  type="password"
                                  name="password"
                                  placeholder="Enter password"
                                />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>

                              <div
                                class="
                                  form-group
                                  d-flex
                                  align-items-center
                                  justify-content-between
                                  mt-4
                                  mb-0
                                "
                              >
                                <a class="small" href="password.html"
                                  >Forgot Password?</a
                                >
                                <button type="submit" class="btn btn-primary">
                                  Login
                                </button>
                              </div>
                            </form>
                          </div>
                          {{-- <div class="card-footer text-center">
                            <div class="small">
                              <a href="{{ route('register') }}"
                                >Need an account? Register now!</a
                              >
                            </div>
                          </div> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                </main>
              </div>
              <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                  <div class="container-fluid">
                    <div
                      class="
                        d-flex
                        align-items-center
                        justify-content-between
                        small
                      "
                    >
                      <div class="text-muted">
                        Copyright &copy; Your Website 2020
                      </div>
                      <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                      </div>
                    </div>
                  </div>
                </footer>
              </div>
            </div>
            {{--
            <script
              src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
              crossorigin="anonymous"
            ></script>
            <script
              src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
              crossorigin="anonymous"
            ></script>
            --}} {{--
            <script src="{{ asset('template')}}/js/scripts.js"></script>
            --}}
        </main>
      </div>
    </div>
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    {{--
    <script src="js/scripts.js"></script>
    --}}
  </body>
</html>
