<?php //generated at 2021-05-09 08:26:16
namespace App\Http\Controllers;

use App\Helpers\MeHelper;
use Illuminate\Http\Request;
use App\Models\SyChangelog;
use Illuminate\Support\Facades\Auth;

class SyChangelogController extends Controller
{
/**
* Display listing of the resource.
*
* @return  \Illuminate\Http\Response
*/
public function index()
{
logSystem('/sy_changelog',0,"Open page sy_changelog",'index',request()->ip());
return view("sy_changelog.sy_changelog_frm");
}

public function list(Request $request){
if (!MeHelper::allowed('SY_CHANGELOG_R')) {
return response()->json(MeHelper::reason(), 401);
}
logSystem('/sy_changelog',0,"List tabel sy_changelog",'list',$request->ip());

$sy_changelog = SyChangelog::select("*")
->where(function ($q) use ($request) {
$q->orWhere('id', 'like', "%" . @$request->q . "%");
})
->orderBy(isset($request->order_by) ? substr($request->order_by, 1) : 'id', substr(@$request->order_by, 0, 1) ==
'-' ?
'desc' : 'asc');
$sy_changelog = $sy_changelog->paginate(isset($request->limit) ? $request->limit : 10);
header('Content-Type: application/json');
echo json_encode(compact(['sy_changelog']));
}

public function lookup(Request $request)
{
logSystem('/sy_changelog', 0, "Lookup tabel sy_changelog", 'lookup', $request->ip());
$q = str_replace(" ", "%", @$request->q);

$request->q = str_replace(" ", "%", @$request->q);
$data = SyChangelog::select('*')
->where(function ($q) use ($request) {
$q->orWhere('id', 'like', "%" . @$request->q . "%");
})
->orderBy(isset($request->order_by) ? substr($request->order_by, 1) : 'id', substr(@$request->order_by, 0, 1) ==
'-' ?
'desc' : 'asc');
$data = $data->paginate(isset($request->limit) ? $request->limit : 10);

return view("system/dialog/sflookup", compact(['data', 'request']));
}


/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request $request
* @return  \Illuminate\Http\Response
*/
public function store(Request $request)
{

$request = json_decode(file_get_contents('php://input'));
$h=$request->h;
$f=$request->f;
$arr = (array) $h;


if($f->crud=="c"){
if (!MeHelper::allowed('SY_CHANGELOG_C')) {
return response()->json(MeHelper::reason(), 401);
}
unset($arr['id']);
$arr['created_at']=date('Y-m-d H:i:s');
//$arr['created_by']=Auth::user()->userid;
$data=new SyChangelog();
$data->create($arr);
logSystem('/sy_changelog',$data->id,"Create data sy_changelog
".$data->id,'create',request()->ip());
}else{
if (!MeHelper::allowed('SY_CHANGELOG_U')) {
return response()->json(MeHelper::reason(), 401);
}
$arr['updated_at']=date('Y-m-d H:i:s');
//$arr['updated_by']=Auth::user()->userid;
$data=SyChangelog::find($arr['id']);
$data->update($arr);
logSystem('/sy_changelog',$data->id,"Update data sy_changelog
".$data->id,'update',request()->ip());
}
}

/**
* Display the specified resource.
*
* @param  int $id
* @return  \Illuminate\Http\Response
*/
public function show($id)
{

logSystem('/sy_changelog',$id,"Read data sy_changelog $id",'read',request()->ip());
$h=SyChangelog::find($id);
header('Content-Type: application/json');
echo json_encode(compact(['h']));
}

public function delete($id)
{
if (!MeHelper::allowed('SY_CHANGELOG_D')) {
return response()->json(MeHelper::reason(), 401);
}
logSystem('/sy_changelog',$id,"Delete data sy_changelog $id",'delete',request()->ip());
$data = SyChangelog::find($id);
$data->delete();
}
}