<?php //generated at 2021-04-04 10:27:02
namespace App\Http\Controllers;

use App\Models\SyAccess;
use Illuminate\Http\Request;

class SyAccessController extends Controller
{
/**
 * Display listing of the resource.
 *
 * @return  \Illuminate\Http\Response
 */
    public function index()
    {
        logSystem('/sy_access', 0, "Open page sy_access", 'index', request()->ip());
        return view("sy_access.sy_access_frm");
    }

    function list(Request $request) {
        logSystem('/sy_access', 0, "List tabel sy_access", 'list', $request->ip());

        $sy_access = SyAccess::select("*")
            ->where(function ($q) use ($request) {
                $q->orWhere('accessname', 'like', "%" . @$request->q . "%");
                $q->orWhere('accessgroup', 'like', "%" . @$request->q . "%");
            })
            ->orderBy(isset($request->order_by) ? substr($request->order_by, 1) : 'id', substr(@$request->order_by, 0, 1) ==
                '-' ?
                'desc' : 'asc');
        $sy_access = $sy_access->paginate(isset($request->limit) ? $request->limit : 10);
        header('Content-Type: application/json');
        echo json_encode(compact(['sy_access']));
    }

    public function lookup(Request $request)
    {
        logSystem('/sy_access', 0, "Lookup tabel sy_access", 'lookup', $request->ip());
        $q = str_replace(" ", "%", @$request->q);

        $request->q = str_replace(" ", "%", @$request->q);
        $data       = SyAccess::select('*')
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
        $h       = $request->h;
        $f       = $request->f;
        $arr     = (array) $h;

        if ($f->crud == "c") {
            unset($arr['id']);
            $arr['created_at'] = date('Y-m-d H:i:s');
//$arr['created_by']=Auth::user()->userid;
            $data = new SyAccess();
            $data->create($arr);
            logSystem('/sy_access', $data->id, "Create data sy_access
$data->id", 'create', request()->ip());
        } else {
            $arr['updated_at'] = date('Y-m-d H:i:s');
//$arr['updated_by']=Auth::user()->userid;
            $data = SyAccess::find($arr['id']);
            $data->update($arr);
            logSystem('/sy_access', $data->id, "Update data sy_access
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
        logSystem('/sy_access', $id, "Read data sy_access $id", 'read', request()->ip());
        $h = SyAccess::find($id);
        header('Content-Type: application/json');
        echo json_encode(compact(['h']));
    }

    public function delete($id)
    {
        logSystem('/sy_access', $id, "Delete data sy_access $id", 'delete', request()->ip());
        $data = SyAccess::find($id);
        $data->delete();
    }
}
