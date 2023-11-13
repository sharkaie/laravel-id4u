@extends('user.app')

@section('title', 'Home')
@section('content')
<style>
    .mst:hover{
        transform: scale(1.02);
        
        
    }
</style>
  <section class="font-1 py-0" >
      <div class="container">
          <div class=" h-lg-full overflow-hidden">
              <div class="text-center pt-6">
                  <h6 class="ls text-uppercase mb-5">A fastest way to Create ID CARD</h6>
                  <!--<h6 class="ls text-uppercase ">Click </h6>-->
                  <div style="height:auto;width:auto;padding-right:2rem;padding-left:2rem;">
                   <a style="box-shadow: 0px 0px 18px 0px rgb(0 0 0 / 32%);
    background-image: linear-gradient(45deg, dodgerblue, plum);
    border: 0px;transition:transform 0.3s;" class="btn btn-primary mt-3 col mst" href="{{route('login')}}">
                       
                  <h3 class="fw-300">Click Here</h3>
                  <small class="ls ">for Digital Form</small></a>
                  </div>
                  <!--<div style="height:30px;"></div>   -->
                  
              </div>
          </div>
          <!--/.row-->
      </div>
      <!--/.container-->
  </section>
@endsection
