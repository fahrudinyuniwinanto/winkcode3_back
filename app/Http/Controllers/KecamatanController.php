<?php //generated at 2021-05-17 09:01:17
namespace App\Http\Controllers;

use App\Helpers\MeHelper;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
/**
 * Display listing of the resource.
 *
 * @return  \Illuminate\Http\Response
 */
    public function index()
    {
        logSystem('/kecamatan', 0, "Open page kecamatan", 'index', request()->ip());
        return view("kecamatan.kecamatan_frm");
    }

    function list(Request $request) {
        if (!MeHelper::allowed('KECAMATAN_R')) {
            return response()->json(MeHelper::reason(), 401);
        }
        logSystem('/kecamatan', 0, "List tabel kecamatan", 'list', $request->ip());

        $kecamatan = Kecamatan::select("*")
            ->where(function ($q) use ($request) {
                $q->orWhere('id_kecamatan', 'like', "%" . @$request->q . "%");
            })
            ->orderBy(isset($request->order_by) ? substr($request->order_by, 1) : 'id_kecamatan', substr(@$request->order_by, 0, 1) ==
                '-' ?
                'desc' : 'asc');
        $kecamatan = $kecamatan->paginate(isset($request->limit) ? $request->limit : 10);
        header('Content-Type: application/json');
        echo json_encode(compact(['kecamatan']));
    }

    public function lookup(Request $request)
    {
        logSystem('/kecamatan', 0, "Lookup tabel kecamatan", 'lookup', $request->ip());
        $q = str_replace(" ", "%", @$request->q);

        $request->q = str_replace(" ", "%", @$request->q);
        $data       = Kecamatan::selectRaw('id_kecamatan, kecamatan,note as keterangan')
            ->where(function ($q) use ($request) {
                $q->orWhere('id_kecamatan', 'like', "%" . @$request->q . "%");
            })
            ->orderBy(isset($request->order_by) ? substr($request->order_by, 1) : 'id_kecamatan', substr(@$request->order_by, 0, 1) ==
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
            if (!MeHelper::allowed('KECAMATAN_C')) {
                return response()->json(MeHelper::reason(), 401);
            }
            unset($arr['id_kecamatan']);
            $arr['created_at'] = date('Y-m-d H:i:s');
//$arr['created_by']=Auth::user()->userid;
            $data = new Kecamatan();
            $data->create($arr);
            logSystem('/kecamatan', $data->id_kecamatan, "Create data kecamatan
" . $data->id_kecamatan, 'create', request()->ip());
        } else {
            if (!MeHelper::allowed('KECAMATAN_U')) {
                return response()->json(MeHelper::reason(), 401);
            }
            $arr['updated_at'] = date('Y-m-d H:i:s');
//$arr['updated_by']=Auth::user()->userid;
            $data = Kecamatan::find($arr['id_kecamatan']);
            $data->update($arr);
            logSystem('/kecamatan', $data->id_kecamatan, "Update data kecamatan
" . $data->id_kecamatan, 'update', request()->ip());
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

        logSystem('/kecamatan', $id, "Read data kecamatan $id", 'read', request()->ip());
        $h = Kecamatan::find($id);
        header('Content-Type: application/json');
        echo json_encode(compact(['h']));
    }

    public function delete($id)
    {
        if (!MeHelper::allowed('KECAMATAN_D')) {
            return response()->json(MeHelper::reason(), 401);
        }
        logSystem('/kecamatan', $id, "Delete data kecamatan $id", 'delete', request()->ip());
        $data = Kecamatan::find($id);
        $data->delete();
    }
}
