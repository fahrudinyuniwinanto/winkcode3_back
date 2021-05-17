<?php //generated at 2021-03-28 21:00:14
namespace App\Http\Controllers;

use App\Models\SyParsys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SyParsysController extends Controller
{
/**
 * Display listing of the resource.
 *
 * @return  \Illuminate\Http\Response
 */
    public function dash()
    {
        logSystem('/sy_parsys', 0, "Dash page sy_parsys", 'dash', request()->ip());
        return view("sy_parsys.sy_parsys_dash");
    }

    public function index()
    {
        logSystem('/sy_parsys', 0, "Open page sy_parsys", 'index', request()->ip());
        return view("sy_parsys.sy_parsys_frm");
    }

    function list(Request $req) {
        logSystem('/sy_parsys', 0, "List tabel sy_parsys", 'list', $req->ip());
        $sy_parsys =
        SyParsys::latest()->where('id', 'LIKE', "%$req->q%")->paginate(@$req->limit == 0 ? 5 : $req->limit);
        header('Content-Type: application/json');
        echo json_encode(compact(['sy_parsys']));
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
        $h       = $request->h;
        $f       = $request->f;
        $arr     = (array) $h;

        if ($f->crud == "c") {
            unset($arr['id']);
            $arr['created_at'] = date('Y-m-d H:i:s');
//$arr['created_by']=Auth::user()->userid;
            $data = new SyParsys();
            $data->create($arr);
            logSystem('/sy_parsys', $data->id, "Create data sy_parsys
$data->id", 'create', request()->ip());
        } else {
            $arr['updated_at'] = date('Y-m-d H:i:s');
//$arr['updated_by']=Auth::user()->userid;
            $data = SyParsys::find($arr['id']);
            $data->update($arr);
            logSystem('/sy_parsys', $data->id, "Update data sy_parsys
$data->id", 'update', request()->ip());
        }
    }

    public function storeDash(Request $request)
    {
        logSystem('/sy_parsys', 0, "store dash data sy_parsys", 'StoreDash', request()->ip());

        $request = json_decode(file_get_contents('php://input'));
        $h       = $request->h;
        // $nameid  = $request->nameid;
        // dd($h);
        // $arr     = (array) $h;

        foreach ($h as $k => $v) {
            \Illuminate\Support\Facades\DB::table('sy_parsys')->where(['name' => $k])
                ->update([
                    'value'      => $v->value,
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => Auth::user()->username,
                ]);
        }
        $res = "updated";
        header('Content-Type: application/json');
        echo json_encode(['res']);

    }

    public function showDash(Request $request)
    {
        logSystem('/sy_parsys', 0, "Show dash data sy_parsys", 'showDash', request()->ip());
        $parsys = SyParsys::get();
        foreach ($parsys as $k => $v) {
            $h[$v->name]['value']      = $v->value;
            $h[$v->name]['note']       = $v->note;
            $h[$v->name]['updated_at'] = $v->updated_at;
            $h[$v->name]['updated_by'] = $v->updated_by;
        }

        header('Content-Type: application/json');
        echo json_encode(compact(['h']));
    }

/**
 * Display the specified resource.
 *
 * @param  int $id
 * @return  \Illuminate\Http\Response
 */
    public function show($id, Request $request)
    {
        logSystem('/sy_parsys', $id, "Read data sy_parsys $id", 'read', request()->ip());
        $h = SyParsys::find($id);
        header('Content-Type: application/json');
        echo json_encode(compact(['h']));
    }

    public function delete($id)
    {
        logSystem('/sy_parsys', $id, "Delete data sy_parsys $id", 'delete', request()->ip());
        $data = SyParsys::find($id);
        $data->delete();
    }
}
