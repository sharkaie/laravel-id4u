<table>

  <thead>
    <tr>
      <td>photo_no</td>
      @foreach ($fields as $field)
        <td>{{$field->name}}</td>
      @endforeach
    </tr>
  </thead>

</table>
