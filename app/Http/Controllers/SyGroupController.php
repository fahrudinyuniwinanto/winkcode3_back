<?php //generated at 2021-04-04 10:26:39
namespace App\Http\Controllers;

use App\Models\SyGroup;
use Illuminate\Http\Request;

class SyGroupController extends Controller
{
/**
 * Display listing of the resource.
 *
 * @return  \Illuminate\Http\Response
 */
    public function index()
    {
        logSystem('/sy_group', 0, "Open page sy_group", 'index', request()->ip());
        return view("sy_group.sy_group_frm");
    }

    function list(Request $request) {
        logSystem('/sy_group', 0, "List tabel sy_group", 'list', $request->ip());

        $sy_group = SyGroup::select("*")
            ->where(function ($q) use ($request) {
                $q->orWhere('name', 'like', "%" . @$request->q . "%");
                $q->orWhere('note', 'like', "%" . @$request->q . "%");
            })
            ->orderBy(isset($request->order_by) ? substr($request->order_by, 1) : 'id', substr(@$request->order_by, 0, 1) ==
                '-' ?
                'desc' : 'asc');
        $sy_group = $sy_group->paginate(isset($request->limit) ? $request->limit : 10);
        header('Content-Type: application/json');
        echo json_encode(compact(['sy_group']));
    }

    public function lookup(Request $request)
    {
        logSystem('/sy_group', 0, "Lookup tabel sy_group", 'lookup', $request->ip());
        $q = str_replace(" ", "%", @$request->q);

        $request->q = str_replace(" ", "%", @$request->q);
        $data       = SyGroup::select('*')
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
            $data = new SyGroup();
            $data->create($arr);
            logSystem('/sy_group', $data->id, "Create data sy_group
$data->id", 'create', request()->ip());
        } else {
            $arr['updated_at'] = date('Y-m-d H:i:s');
//$arr['updated_by']=Auth::user()->userid;
            $data = SyGroup::find($arr['id']);
            $data->update($arr);
            logSystem('/sy_group', $data->id, "Update data sy_group
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
        logSystem('/sy_group', $id, "Read data sy_group $id", 'read', request()->ip());
        $h = SyGroup::find($id);
        header('Content-Type: application/json');
        echo json_encode(compact(['h']));
    }

    public function delete($id)
    {
        logSystem('/sy_group', $id, "Delete data sy_group $id", 'delete', request()->ip());
        $data = SyGroup::find($id);
        $data->delete();
    }
}
