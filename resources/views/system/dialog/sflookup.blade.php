<?php
$arr = $data->toArray();

?>
<div class="input-group">
    <input type="text" class="form-control input-sm clear q-search" placeholder="Search" value="{{$request->q}}">
    <span class="input-group-btn"><button type="button" class="btn btn-sm btn-default btn-search"><i
                class="fa fa-search"></i></button></span>
</div>
<br>
<div class="table-responsive">
    @if ($arr==[] || $arr['total']==0)
    <div class="alert alert-warning">Data tidak ada</div>
    @else
    <table class="table table-striped table-bordered table-hover table-condensed" style="white-space: nowrap;">
        <thead>
            <tr>
                @foreach ($arr['data'][0] as $k=>$v)
                <th>{{ucwords(str_replace('_',' ',$k))}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="{{(isset($request->isactive) && $request->isactive==0)?'text-danger':''}}">
            @foreach ($arr['data'] as $k=>$value)
            <tr class="pointer onclicktrlookup" data-id="{{reset($value)}}" data-name="{{next($value)}}"
                data-json='{{json_encode($value)}}'>
                @foreach ($value as $k=>$v)
                <td>{{$v}}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{!! $data->appends($request->all())->render() !!} @endif