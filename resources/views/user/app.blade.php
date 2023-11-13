<!DOCTYPE html>
<html lang="en-US">

@include('user/layouts/head')
<style media="screen">
#page-container {
position: relative;
min-height: 100vh;
}


</style>
<body data-spy="scroll" data-target=".inner-link" data-offset="60">
    
          @include('user/layouts/header')
    <main>
        
      <div id="page-container">

          @section('content')
          @show
          
      </div>
    </main>
    @include('user/layouts/footer')
    
    @include('user/layouts/scripts')
</body>

</html>
