
<label class="control-label">{{$label}}</label>
<select  class="custom-select mb-4" id="{{$componentType}}_id" name="{{$componentType}}_id">

<option selected disabled value="">--Select {{$label}}--</option>

@foreach($options as $option)
    <option value="{{$option->id}}">{{$option->name}}</option>
@endforeach

</select>


