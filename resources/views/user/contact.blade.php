@extends('user.app')

@section('title', 'Contact Us')

@section('content')

  <section class="font-1">
      <div class="container">
          <div class="row">
              <div class="col-lg-5">
                  <h3 class="text-uppercase fw-300">Contact</h3>
                  <hr class="short left mb-5" align="left">
                  <div class="row">
                      <div class="col-auto" style="min-width: 16px;"><span class="fa fa-map-marker"></span></div>
                      <div class="col">
                          <p class="fw-300"><span class="fw-600">ID4U Office</span>
                              <br><span class="color-5">Nagpur (Maharastra), <br>India</span></p>
                          <p class="fw-300"><br><span class="fw-600">Email: </span><span class="color-5">&nbsp; support@id4u.in</span></p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-7">
                  <form class="zform" method="post">
                      <div class="form-group">
                          <input class="form-control" type="hidden" name="to" value="username@domain.extension">
                      </div>
                      <div class="form-group">
                          <input class="form-control" type="text" name="name" required placeholder="Name">
                      </div>
                      <div class="form-group">
                          <input class="form-control" type="email" name="from" required placeholder="Email">
                      </div>
                      <div class="form-group">
                          <textarea class="form-control" rows="8" name="message" placeholder="Message"></textarea>
                      </div>
                      <input class="btn btn-primary" type="submit" name="submit" value="Send!">
                      <div class="zform-feedback mt-3"></div>
                  </form>
              </div>
          </div>
          <!--/.row-->
      </div>
      <!--/.container-->
  </section>

@endsection
