<?="<?php //generated at ".date("Y-m-d H:i:s")?>

namespace App\Http\Controllers;

use App\Helpers\MeHelper;
use Illuminate\Http\Request;
use App\Models\{{$h->tblUper}};
use Illuminate\Support\Facades\Auth;

class {{$h->tblUper}}Controller extends Controller
{
/**
* Display listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
logSystem('/{{$h->tblLower}}',0,"Open page {{$h->tblLower}}",'index',request()->ip());
return view("{{$h->tblLower}}.{{$h->tblLower}}_frm");
}

public function list(Request $request){
if (!MeHelper::allowed('{{$h->tblAllUper}}_R')) {
return response()->json(MeHelper::reason(), 401);
}
logSystem('/{{$h->tblLower}}',0,"List tabel {{$h->tblLower}}",'list',$request->ip());

${{$h->tblLower}} = {{$h->tblUper}}::select("*")
->where(function ($q) use ($request) {
$q->orWhere('{{$h->pk}}', 'like', "%" . @$request->q . "%");
})
->orderBy(isset($request->order_by) ? substr($request->order_by, 1) : '{{$h->pk}}', substr(@$request->order_by, 0, 1) ==
'-' ?
'desc' : 'asc');
${{$h->tblLower}} = ${{$h->tblLower}}->paginate(isset($request->limit) ? $request->limit : 10);
header('Content-Type: application/json');
echo json_encode(compact(['{{$h->tblLower}}']));
}

public function lookup(Request $request)
{
logSystem('/{{$h->tblLower}}', 0, "Lookup tabel {{$h->tblLower}}", 'lookup', $request->ip());
$q = str_replace(" ", "%", @$request->q);

$request->q = str_replace(" ", "%", @$request->q);
$data = {{$h->tblUper}}::select('*')
->where(function ($q) use ($request) {
$q->orWhere('{{$h->pk}}', 'like', "%" . @$request->q . "%");
})
->orderBy(isset($request->order_by) ? substr($request->order_by, 1) : '{{$h->pk}}', substr(@$request->order_by, 0, 1) ==
'-' ?
'desc' : 'asc');
$data = $data->paginate(isset($request->limit) ? $request->limit : 10);

return view("system/dialog/sflookup", compact(['data', 'request']));
}


/**
* Store a newly created resource in storage.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{

$request = json_decode(file_get_contents('php://input'));
$h=$request->h;
$f=$request->f;
$arr = (array) $h;


if($f->crud=="c"){
if (!MeHelper::allowed('{{$h->tblAllUper}}_C')) {
return response()->json(MeHelper::reason(), 401);
}
@if($h->autoincrement==1)
unset($arr['{{$h->pk}}']);
@endif
@if ($h->timestamps==1)
$arr['created_at']=date('Y-m-d H:i:s');
//$arr['created_by']=Auth::user()->userid;
@endif
$data=new {{$h->tblUper}}();
$data->create($arr);
logSystem('/{{$h->tblLower}}',$data->{{$h->pk}},"Create data {{$h->tblLower}}
".$data->{{$h->pk}},'create',request()->ip());
}else{
if (!MeHelper::allowed('{{$h->tblAllUper}}_U')) {
return response()->json(MeHelper::reason(), 401);
}
@if ($h->timestamps==1)
$arr['updated_at']=date('Y-m-d H:i:s');
//$arr['updated_by']=Auth::user()->userid;
@endif
$data={{$h->tblUper}}::find($arr['{{$h->pk}}']);
$data->update($arr);
logSystem('/{{$h->tblLower}}',$data->{{$h->pk}},"Update data {{$h->tblLower}}
".$data->{{$h->pk}},'update',request()->ip());
}
}

/**
* Display the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{

logSystem('/{{$h->tblLower}}',$id,"Read data {{$h->tblLower}} $id",'read',request()->ip());
$h={{$h->tblUper}}::find($id);
header('Content-Type: application/json');
echo json_encode(compact(['h']));
}

public function delete($id)
{
if (!MeHelper::allowed('{{$h->tblAllUper}}_D')) {
return response()->json(MeHelper::reason(), 401);
}
logSystem('/{{$h->tblLower}}',$id,"Delete data {{$h->tblLower}} $id",'delete',request()->ip());
$data = {{$h->tblUper}}::find($id);
$data->delete();
}
}