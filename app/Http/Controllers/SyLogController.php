<?php //generated at 2021-03-28 20:51:55
namespace App\Http\Controllers;

use App\Models\SyLog;
use Illuminate\Http\Request;

class SyLogController extends Controller
{
/**
 * Display listing of the resource.
 *
 * @return  \Illuminate\Http\Response
 */
    public function index()
    {
        logSystem('/sy_log', 0, "Open page sy_log", 'index', request()->ip());
        return view("sy_log.sy_log_frm");
    }

    function list(Request $request) {
        logSystem('/sy_log', 0, "List tabel sy_log", 'list', $request->ip());
        $sy_log =
        SyLog::latest()->where('id', 'LIKE', "%$request->q%")
            ->orderBy(isset($request->order_by) ? substr($request->order_by, 1) : 'id', substr(@$request->order_by, 0, 1) == '-' ? 'desc' : 'desc')
            ->paginate(@$request->limit == 0 ? 5 : $request->limit);
        header('Content-Type: application/json');
        echo json_encode(compact(['sy_log']));
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
            $data = new SyLog();
            $data->create($arr);
            logSystem('/sy_log', $data->id, "Create data sy_log
$data->id", 'create', request()->ip());
        } else {
            $arr['updated_at'] = date('Y-m-d H:i:s');
//$arr['updated_by']=Auth::user()->userid;
            $data = SyLog::find($arr['id']);
            $data->update($arr);
            logSystem('/sy_log', $data->id, "Update data sy_log
$data->id", 'update', request()->ip());
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
        logSystem('/sy_log', $id, "Read data sy_log $id", 'read', request()->ip());
        $h = SyLog::find($id);
        header('Content-Type: application/json');
        echo json_encode(compact(['h']));
    }

    public function delete($id)
    {
        logSystem('/sy_log', $id, "Delete data sy_log $id", 'delete', request()->ip());
        $data = SyLog::find($id);
        $data->delete();
    }
}
