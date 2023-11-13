
<!DOCTYPE html>

<html lang="en" >
    <!-- begin::Head -->
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <style type="text/css">
       .box{
        width:600px;
        margin:0 auto;
       }

       th{text-align:center;}
       @page {
        height: 1122.5px;
        width: 793.7px;
        /* to centre page on screen*/
        margin-left: auto;
        margin-right: auto;
    }
      </style>
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{$customer->company_name}} Unverified Data</title>
        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700">        <!--end::Fonts -->

        <!--end:: Global Mandatory Vendors -->
    </head>
    <!-- end::Head -->
    <body onload="window.print()" style="padding:10px;" >
    <h3 style="font-family: Roboto;" align="center" >{{$customer->company_name}}<br> {{ __('ID Card Data - Unverified ') }}</h3>

      @isset($search)
              @foreach ($fields as $field)
                @if($field->type == 'Options' && isset($search[$field->name]))
                @php $fn = $field->name;@endphp
                @if($search[$fn])
                  <h5 style="font-family: Roboto;"  align="center" >
                  @php $fn = $field->name; echo $fn .":". $search[$fn] ;@endphp
                </h5>
                @endif
              @endif
              @endforeach
            @endisset

    <table width='100%' class="table table-striped table-bordered" style="text-align:center;">
      <thead >
        <tr>
          <th ><font family="Roboto">Sr no</font></th>
          <th ><font family="Roboto">ID</font></th>
          <th ><font family="Roboto">Photo</font></th>
          @foreach ($fields as $field)
          @php
           $field_name = str_replace(' ', '_', $field->name);
          @endphp
            <th><font family="Roboto">{{$field_name}}</font></th>
          @endforeach
        </tr>
      </thead>
      <tbody>
        @foreach ($datas as $data)
          <tr>
            <td><font family="Roboto">{{$loop->index +1}}</font></td>
            <td><font family="Roboto">{{$data->id}}</font></td>
            <td>
              <img src="data:image/png;base64,{{$data->photo}}" alt="No photo" height="60" width="50"><br>
          {{$data->photo_no}}</td>
            @foreach ($fields as $field)
              @php
                $f_name = $field->name;
              @endphp
              <td><font family="Roboto">{{$data->$f_name}}</font></td>
            @endforeach
          </tr>
        @endforeach
      </tbody>
    </table>
    </body>
    <!-- end::Body -->
</html>
