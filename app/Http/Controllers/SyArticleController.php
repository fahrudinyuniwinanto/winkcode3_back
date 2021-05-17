<?php //generated at 2021-03-28 21:06:01
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SyArticle;
use Illuminate\Support\Facades\Auth;

class SyArticleController extends Controller
{
/**
* Display listing of the resource.
*
* @return  \Illuminate\Http\Response
*/
public function index()
{
logSystem('/sy_article',0,"Open page sy_article",'index',request()->ip());
return view("sy_article.sy_article_frm");
}

public function list(Request $req){
logSystem('/sy_article',0,"List tabel sy_article",'list',$req->ip());
// dd($req);
$sy_article =
SyArticle::latest()->where('id','LIKE',"%$req->q%")->paginate(@$req->limit==0?5:$req->limit);
header('Content-Type: application/json');
echo json_encode(compact(['sy_article']));
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
$data=new SyArticle();
$data->create($arr);
logSystem('/sy_article',$data->id,"Create data sy_article
$data->id",'create',request()->ip());
}else{
$arr['updated_at']=date('Y-m-d H:i:s');
//$arr['updated_by']=Auth::user()->userid;
$data=SyArticle::find($arr['id']);
$data->update($arr);
logSystem('/sy_article',$data->id,"Update data sy_article
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
logSystem('/sy_article',$id,"Read data sy_article $id",'read',request()->ip());
$h=SyArticle::find($id);
header('Content-Type: application/json');
echo json_encode(compact(['h']));
}

public function delete($id)
{
logSystem('/sy_article',$id,"Delete data sy_article $id",'delete',request()->ip());
$data = SyArticle::find($id);
$data->delete();
}
}