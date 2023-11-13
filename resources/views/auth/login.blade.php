@extends('user.app')

@section('title', 'Digital Form Login')

@section('content')
  <section class="py-0 font-1">
      <div class="container-fluid">
          <div class="row align-items-center text-center justify-content-center h-full">
              <div class="col-sm-6 col-md-5 col-lg-6 col-xl-6">
                  <h4 style="text-shadow:0px 0px 18px rgb(0 0 0 / 0.35);" class="fw-300 ">Enter UserID & Password</h4>
                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                      <div class="form-group">
                      <input style="border-radius:0px; border:0px;box-shadow:0px 0px 18px 0px rgb(0 0 0 / 0.15);" id="username" class="form-control @error('username') is-invalid @enderror" type="text" placeholder="Type Username ..."name="username" value="{{ old('username') }}" required autofocus autocomplete="new-password">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="form-group">
                      <input style="border-radius:0px; border:0px;box-shadow:0px 0px 18px 0px rgb(0 0 0 / 0.15);" id="password" class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Type Password ..." name="password" required  autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="row align-items-center">
                          <div class="col text-middle">
                              <button style="border:0px;background-color:dodgerblue;box-shadow:0px 0px 18px 0px rgb(0 0 0 / 0.20);" class="btn btn btn-primary" type="submit">Login</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
          <!--/.row-->
      </div>
      <!--/.container-->
  </section>
@endsection
