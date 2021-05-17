<?php //generated at 2021-03-28 21:01:58
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SyCategory;
use Illuminate\Support\Facades\Auth;

class SyCategoryController extends Controller
{
/**
* Display listing of the resource.
*
* @return  \Illuminate\Http\Response
*/
public function index()
{
logSystem('/sy_category',0,"Open page sy_category",'index',request()->ip());
return view("sy_category.sy_category_frm");
}

public function list(Request $req){
logSystem('/sy_category',0,"List tabel sy_category",'list',$req->ip());
// dd($req);
$sy_category =
SyCategory::latest()->where('id','LIKE',"%$req->q%")->paginate(@$req->limit==0?5:$req->limit);
header('Content-Type: application/json');
echo json_encode(compact(['sy_category']));
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
unset($arr['id']);
$arr['created_at']=date('Y-m-d H:i:s');
//$arr['created_by']=Auth::user()->userid;
$data=new SyCategory();
$data->create($arr);
logSystem('/sy_category',$data->id,"Create data sy_category
$data->id",'create',request()->ip());
}else{
$arr['updated_at']=date('Y-m-d H:i:s');
//$arr['updated_by']=Auth::user()->userid;
$data=SyCategory::find($arr['id']);
$data->update($arr);
logSystem('/sy_category',$data->id,"Update data sy_category
$data->id",'update',request()->ip());
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
logSystem('/sy_category',$id,"Read data sy_category $id",'read',request()->ip());
$h=SyCategory::find($id);
header('Content-Type: application/json');
echo json_encode(compact(['h']));
}

public function delete($id)
{
logSystem('/sy_category',$id,"Delete data sy_category $id",'delete',request()->ip());
$data = SyCategory::find($id);
$data->delete();
}
}