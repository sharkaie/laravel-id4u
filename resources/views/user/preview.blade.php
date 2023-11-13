<!doctype html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <title>{{ config('app.name', 'ID4U') }} | Preview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ID4U Digital ID Card/ID Form Portal">
    <!-- Begin loading animation -->
    <style>
      @keyframes hideLoader{ 0%{ width: 100%; height: 100%; } 100%{ width: 0; height: 0; } } body > div.loader{ position: fixed; background: white; width: 100%; height: 100%; z-index: 1071; opacity: 0; transition: opacity .5s ease; overflow: hidden; pointer-events: none; display: flex; align-items: center; justify-content: center; } body:not(.loaded) > div.loader{ opacity: 1; } body:not(.loaded){ overflow: hidden; } body.loaded > div.loader{ animation: hideLoader .5s linear .5s forwards; } .loading-animation{width:40px;height:40px;margin:100px auto;background-color:#2568ef;border-radius:100%;animation:pulse 1s infinite ease-in-out}@keyframes pulse{0%{-webkit-transform:scale(0);transform:scale(0)}100%{-webkit-transform:scale(1);transform:scale(1);opacity:0}}
    </style>
    <script type="text/javascript">
      window.addEventListener("load",function(){document.querySelector('body').classList.add('loaded');});
    </script>
    <!-- End loading animation -->
    <link href="{{asset('user/assets/css/theme.min.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,600,700&display=swap" rel="stylesheet">
    <style>
        table, td, tr, th{
                border-collapse: collapse;
        }
    </style>   
  </head>

  <body style="background:#dadada;">
    <div class="loader">
      <div class="loading-animation"></div>
    </div>
    
        
    
    <div style="padding: 0.5rem;margin-bottom: 0rem;" class="alert alert-dismissible  d-md-block  rounded-0 border-0">
    <div class="container">
        <div class="row no-gutters align-items-md-center justify-content-center">
            <div class="col-lg-11 col-md d-flex flex-column flex-md-row align-items-md-center justify-content-lg-center">
                <div style="text-align:center;font-size:25px;"><strong>Preview</strong></div>
            </div>

        </div>
    </div>
    </div>


    <div data-overlay class="min-vh-50 d-flex flex-column justify-content-md-center" >
          <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-9 col-md-10 col-sm-12">
                @isset($data)
                  @foreach ($fields as $field)
                    @php
                      $span_no = $loop->index+2;
                    @endphp
                  @endforeach
                  <style>
                  table, tr, td{
                    border-collapse: collapse;
                    border:0px;
                  }
                  </style>
              <table   style="width: 100%;background-color: white;">
                <tr>
                <td style="background-color:#87b8f3;padding: 0rem" class="text-white"  align="center" colspan="4">
                <font size="5">{{ $customer_info->company_name }}</font><font size="2"><br>{{ $customer_info->address }}</font>
                </td>
                </tr>

                <tr>
                  <td valign="center" align="center" colspan="3">
                    {{-- <br> --}}
              			<img src="@php echo 'data:'.$data->photo_type.';base64,'.$data->photo; @endphp"  style="width:auto;height:120px;border:2px solid BLACK;">
              	</td>
                </tr>
                @foreach ($fields as $field)
                  @php
                    $field_name = $field->name;
                  @endphp
                  <tr>
                		<td style="padding: inherit;padding-left:10px;padding-right:10px;" valign="top"  align="left" width="30%" ><b><font face="Arial" size="2"color="black">{{$field_name}}</font></b></td>
                		<td style="padding: inherit;"  valign="top" style="padding: 0.2px;" align="left"><font face="Arial" color="black" size="2"width="1%">:</font></td>
                		<td style="padding: inherit;" valign="top" style="padding: 0.2px;" align="left"><font face="Arial" color="black" size="2">{{$data->$field_name}}</font></td>
                	</tr>
                @endforeach
                <tr>
                  <td class="text-white"  style="background-color:#f0b935;padding: 10px;" colspan="4" align="center"></td>
                </tr>
              </table>
                @endisset

            </div>

          </div>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          


    </div>
    
    <div style="padding-top:0px;" class="row justify-content-center">
            <a href="{{ route('new_form') }}" class="btn btn-warning"><div class="d-flex align-items-center">

            <img src="{{asset('user/assets/img/icons/interface/icon-plus.svg')}}" alt="Icon" class="icon bg-white" data-inject-svg>
            <span>New</span>
            </div></a>
            &nbsp;&nbsp;
            <a href="{{route('form_edit')}}" class="btn btn-success"><div class="d-flex align-items-center">

           
            <span>Edit</span>
            </div></a>
            &nbsp;&nbsp;
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-primary">
            <div class="d-flex align-items-center">
            <span>OK</span>
            
            </div>
            </a>
          </div>

    <!-- Required vendor scripts (Do not remove) -->
    <script type="text/javascript" src="{{asset('user/assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('user/assets/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('user/assets/js/bootstrap.js')}}"></script>

    <script type="text/javascript" src="{{asset('user/assets/js/jquery.smartWizard.min.js')}}"></script>
    <!-- ScrollMonitor (manages events for elements scrolling in and out of view) -->
    <script type="text/javascript" src="{{asset('user/assets/js/scrollMonitor.js')}}"></script>
    <!-- Required theme scripts (Do not remove) -->
    <script type="text/javascript" src="{{asset('user/assets/js/theme.js')}}"></script>
    <!-- This script appears only on the demo.  It is used to delay unnecessary image loading until after the main page content is loaded. -->
    <script type="text/javascript">
      window.addEventListener("load",function(){
            setTimeout(function() {
              const delayedImages = document.querySelectorAll('[data-delay-src]');
              theme.mrUtil.forEach(delayedImages, (index, elem) => {
                const source = elem.getAttribute('data-delay-src');
                elem.removeAttribute('data-delay-src');
                elem.setAttribute('src', source);
              });
            }, 500);
          });
    </script>


  </body>

</html>
