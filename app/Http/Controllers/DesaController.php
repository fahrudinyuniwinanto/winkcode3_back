<?php //generated at 2021-05-17 09:04:16
namespace App\Http\Controllers;

use App\Helpers\MeHelper;
use App\Models\Desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
/**
 * Display listing of the resource.
 *
 * @return  \Illuminate\Http\Response
 */
    public function index()
    {
        logSystem('/desa', 0, "Open page desa", 'index', request()->ip());
        return view("desa.desa_frm");
    }

    function list(Request $request) {
        if (!MeHelper::allowed('DESA_R')) {
            return response()->json(MeHelper::reason(), 401);
        }
        logSystem('/desa', 0, "List tabel desa", 'list', $request->ip());

        $desa = Desa::select("*")
            ->where(function ($q) use ($request) {
                $q->orWhere('id_desa', 'like', "%" . @$request->q . "%");
            })
            ->orderBy(isset($request->order_by) ? substr($request->order_by, 1) : 'id_desa', substr(@$request->order_by, 0, 1) ==
                '-' ?
                'desc' : 'asc')
            ->with(['rel_kecamatan']);
        $desa = $desa->paginate(isset($request->limit) ? $request->limit : 10);
        header('Content-Type: application/json');
        echo json_encode(compact(['desa']));
    }

    public function lookup(Request $request)
    {
        logSystem('/desa', 0, "Lookup tabel desa", 'lookup', $request->ip());
        $q = str_replace(" ", "%", @$request->q);

        $request->q = str_replace(" ", "%", @$request->q);
        $data       = Desa::selectRaw('id_desa,desa,id_kecamatan as kecamatan, note as keterangan')
            ->where(function ($q) use ($request) {
                $q->orWhere('id_desa', 'like', "%" . @$request->q . "%");
            })
            ->where('id_kecamatan', $request->id_kecamatan)
            ->orderBy(isset($request->order_by) ? substr($request->order_by, 1) : 'id_desa', substr(@$request->order_by, 0, 1) ==
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
            if (!MeHelper::allowed('DESA_C')) {
                return response()->json(MeHelper::reason(), 401);
            }
            unset($arr['id_desa']);
            $arr['created_at'] = date('Y-m-d H:i:s');
//$arr['created_by']=Auth::user()->userid;
            $data = new Desa();
            $data->create($arr);
            logSystem('/desa', $data->id_desa, "Create data desa
" . $data->id_desa, 'create', request()->ip());
        } else {
            if (!MeHelper::allowed('DESA_U')) {
                return response()->json(MeHelper::reason(), 401);
            }
            $arr['updated_at'] = date('Y-m-d H:i:s');
//$arr['updated_by']=Auth::user()->userid;
            $data = Desa::find($arr['id_desa']);
            $data->update($arr);
            logSystem('/desa', $data->id_desa, "Update data desa
" . $data->id_desa, 'update', request()->ip());
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

        logSystem('/desa', $id, "Read data desa $id", 'read', request()->ip());
        $h = Desa::find($id);
        header('Content-Type: application/json');
        echo json_encode(compact(['h']));
    }

    public function delete($id)
    {
        if (!MeHelper::allowed('DESA_D')) {
            return response()->json(MeHelper::reason(), 401);
        }
        logSystem('/desa', $id, "Delete data desa $id", 'delete', request()->ip());
        $data = Desa::find($id);
        $data->delete();
    }
}
