<table>

  <thead>
    <tr>
      <td>Sr no</td>
      <td>ID</td>
      <td>Photo_No</td>
      @foreach ($fields as $field)
        <td>{{$field->name}}</td>
      @endforeach
      <td>Created At</td>
      <td>Updated At</td>
    </tr>
  </thead>
  <tbody>
    @foreach ($datas as $data)
      <tr>
        <td>{{$loop->index +1}}</td>
        <td>{{$data->id}}</td>
        <td>{{$data->photo_no}}</td>
        @foreach ($fields as $field)
          @php
            $f_name = $field->name;
          @endphp
          <td>{{$data->$f_name}}</td>
        @endforeach
        <td>{{$data->created_at}}</td>
        <td>{{$data->updated_at}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
