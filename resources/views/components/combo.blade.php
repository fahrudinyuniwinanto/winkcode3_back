<select name="{{$name}}" id="{{$name}}" class="form-control" {{$attributes}}>
    <option value="">>> Pilih {{ucwords(str_replace("_", " ",$name))}}</option>
    @foreach ($options as $v)
    <option value="{{$v}}">{{$v}}</option>
    @endforeach
</select>