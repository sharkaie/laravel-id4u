<form class="kt-form" id="kt_form" enctype="multipart/form-data" method="post" action="{{route('data.getedit')}}">
  @csrf
  <a href="{{ url()->previous() }}" class="btn btn-outline-success"> << Back </a>
  <input type="hidden" name="form_id" value="{{ $form_id }}">
  <!--begin: Form Wizard Step 1-->
  <div class="kt-wizard-v3__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
    <div class="kt-heading kt-heading--md">Choose your Photo</div>
    <div class="kt-form__section kt-form__section--first" >
      <div class="kt-wizard-v3__form" >
        <div class="slim"
        data-label="Choose or Select your Photo"
        data-ratio="270:330"
        data-size="270,330"
        data-instant-edit="true"
        data-save-initial-image="true"
         id="my-cropper" >
            @isset($values)
              @foreach ($values as $value)
                @if($value->photo != 'empty')
                <img src="data:image/png;base64,@php echo $value->photo; @endphp" alt=""/>
              @endif
                <input type="file" name="photo" accept="image/png, image/jpeg" required/>
              @endforeach
            @endisset





        </div>

      </div>
    </div>
  </div>
  <!--end: Form Wizard Step 1-->

  <!--begin: Form Wizard Step 2-->
  <div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
    <div class="kt-heading kt-heading--md">Fill ID Form Carefully </div>
    <div class="kt-form__section kt-form__section--first">
      <div class="kt-wizard-v3__form">
        @foreach ($fields as $field)
          @switch($field->type)
            @case('Text')
            <div class="form-group">
              <label>{{ $field->name }} *</label>

                  @foreach ($values as $value)
                    @php
                    $field_name = $field->name;
                    @endphp
                    <input type="text" class="form-control" name="{{ $field->name }}" value="{{ $value->$field_name }}" placeholder="Type here ..." required>
                  @endforeach


            </div>
              @break

            @case('Number')
            <div class="form-group">
              <label>{{ $field->name }} *</label>

                  @foreach ($values as $value)
                    @php
                    $field_name = $field->name;
                    @endphp
                    <input type="number" class="form-control" name="{{ $field->name }}" value="{{ $value->$field_name }}" placeholder="Type here ..." required>
                  @endforeach

            </div>
              @break

            @case('Mobile')
            <div class="form-group">
              <label>{{ $field->name }} *</label>

                  @foreach ($values as $value)
                    @php
                    $field_name = $field->name;
                    @endphp
                    <input type="tel" class="form-control" name="{{ $field->name }}" id="{{ $field->name }}" value="{{ $value->$field_name }}" placeholder="Type here ..." required>
                  @endforeach

            </div>
              @break

            @case('Date')
             <div class="form-group">
              <label>{{ $field->name }} *</label>
              <table>
                <tr>
                  <td><select name="{{$field->name}}dt" class="form-control" required>
                    <option value="">DD</option>
                    @for ($i = 1; $i <= 31; $i++)

                          @foreach ($values as $value)
                            @php
                            $field_name = $field->name;
                            $dex = explode( '.', $value->$field_name);
                            $dt = $dex['0'];
                            if(strlen($i)== '1'){
                              $i = "0".$i;
                            }
                            @endphp
                            @if($dt == $i)
                              <option value="{{$i}}" selected>{{$i}}</option>
                            @else
                              <option value="{{$i}}">{{$i}}</option>
                            @endif
                          @endforeach

                    @endfor
                  </select></td>
                  <td><select name="{{$field->name}}mt" class="form-control" required>
                    <option value="">MM</option>
                    @for ($i = 01; $i <= 12; $i++)

                          @foreach ($values as $value)
                            @php
                            $field_name = $field->name;
                            $mex = explode( '.', $value->$field_name);
                            $mt = $mex['1'];
                            if(strlen($i)== '1'){
                              $i = "0".$i;
                            }
                            @endphp
                            @if($mt == $i)
                              <option value="{{$i}}" selected>{{$i}}</option>
                            @else
                              <option value="{{$i}}">{{$i}}</option>
                            @endif
                          @endforeach

                    @endfor
                  </select></td>
                  <td><select name="{{$field->name}}yr" class="form-control" required>
                    <option value="">YY</option>
                    @for ($i = now()->year - 2; $i >= 1950; $i--)

                          @foreach ($values as $value)
                            @php
                            $field_name = $field->name;
                            $yex = explode( '.', $value->$field_name);
                            $yr = $yex['2'];
                            @endphp
                            @if($yr == $i)
                              <option value="{{$i}}" selected>{{$i}}</option>
                            @else
                              <option value="{{$i}}">{{$i}}</option>
                            @endif
                          @endforeach

                    @endfor
                  </select></td>
                </tr>
              </table>
            </div>
              @break

            @case('Email')
            <div class="form-group">
              <label>{{ $field->name }} *</label>

                  @foreach ($values as $value)
                    @php
                    $field_name = $field->name;
                    @endphp
                    <input type="email" class="form-control" name="{{ $field->name }}" value="{{ $value->$field_name }}" placeholder="Type here ..." required>
                  @endforeach

            </div>
              @break

            @case('Options')
            <div class="form-group">
              <label>{{ $field->name }}</label>
               <select name="{{ $field->name }}" class="form-control" required>
                <option value="">Select {{ $field->name }}</option>
                @foreach ($field_options as $field_option)
                  @if ($field->id == $field_option->field_id)

                        @foreach ($values as $value)
                          @php
                          $field_name = $field->name;
                          $field_opt = $field_option->option_name;
                          @endphp
                          @if($field_opt == $value->$field_name)
                            <option value="{{$field_option->option_name}}" selected >{{$field_option->option_name}}</option>
                          @else
                            <option value="{{$field_option->option_name}}" >{{$field_option->option_name}}</option>
                          @endif

                        @endforeach

                  @endif
                @endforeach
              </select>
            </div>
              @break

            @case('Blood-Group')
            <div class="form-group">
              <label>Blood Group</label>
              <select name="{{ $field->name }}" class="form-control" required>
                <option value="" selected disabled>Select Blood Group</option>
                @foreach ($values as $value)
                  @php
                  $field_name = $field->name;
                  @endphp

                <option value="A + ve" @if('A + ve' == $value->$field_name) {{'selected'}} @endif>A + ve</option>
                <option value="A - ve" @if('A - ve' == $value->$field_name) {{'selected'}} @endif>A - ve</option>
                <option value="B + ve" @if('B + ve' == $value->$field_name) {{'selected'}} @endif>B + ve</option>
                <option value="B - ve" @if('B - ve' == $value->$field_name) {{'selected'}} @endif>B - ve</option>
                <option value="AB + ve" @if('A + ve' == $value->$field_name) {{'selected'}} @endif>AB + ve</option>
                <option value="AB - ve" @if('A - ve' == $value->$field_name) {{'selected'}} @endif>AB - ve</option>
                <option value="O + ve" @if('O + ve' == $value->$field_name) {{'selected'}} @endif>O + ve</option>
                <option value="O - ve" @if('O - ve' == $value->$field_name) {{'selected'}} @endif>O - ve</option>
                <option value="-" @if('-' == $value->$field_name) {{'selected'}} @endif>-</option>
                  @endforeach
              </select>
            </div>
              @break

            @default
              Error Field
          @endswitch
        @endforeach
        <div class="form-group">
            <div class="kt-checkbox-inline">
              <label class="kt-checkbox">
              <input type="checkbox" name="accept" required> I accept this Form details are true and sure
              <span></span>
              </label>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!--end: Form Wizard Step 2-->

  <!--begin: Form Actions -->
  <div class="kt-form__actions">

    <button type="submit">
      Submit
    </button>
  </div>
  <!--end: Form Actions -->
</form>
