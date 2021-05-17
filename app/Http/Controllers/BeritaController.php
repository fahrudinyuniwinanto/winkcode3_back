<?php //generated at 2021-04-12 11:32:49
namespace App\Http\Controllers;

use App\Helpers\MeHelper;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
/**
 * Display listing of the resource.
 *
 * @return  \Illuminate\Http\Response
 */
    public function index()
    {
        logSystem('/berita', 0, "Open page berita", 'index', request()->ip());
        return view("berita.berita_frm");
    }

    function list(Request $request) {
        if (!MeHelper::allowed('BERITA_R')) {
            return response()->json(MeHelper::reason(), 401);
        }
        logSystem('/berita', 0, "List tabel berita", 'list', $request->ip());

        $berita = Berita::select("*")
            ->where(function ($q) use ($request) {
                $q->orWhere('id_berita', 'like', "%" . @$request->q . "%");
            })
            ->orderBy(isset($request->order_by) ? substr($request->order_by, 1) : 'id_berita', substr(@$request->order_by, 0, 1) ==
                '-' ?
                'desc' : 'asc');
        $berita = $berita->paginate(isset($request->limit) ? $request->limit : 10);
        header('Content-Type: application/json');
        echo json_encode(compact(['berita']));
    }

    public function lookup(Request $request)
    {
        logSystem('/berita', 0, "Lookup tabel berita", 'lookup', $request->ip());
        $q = str_replace(" ", "%", @$request->q);

        $request->q = str_replace(" ", "%", @$request->q);
        $data       = Berita::select('*')
            ->where(function ($q) use ($request) {
                $q->orWhere('id_berita', 'like', "%" . @$request->q . "%");
            })
            ->orderBy(isset($request->order_by) ? substr($request->order_by, 1) : 'id_berita', substr(@$request->order_by, 0, 1) ==
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
            if (!MeHelper::allowed('BERITA_C')) {
                return response()->json(MeHelper::reason(), 401);
            }
            unset($arr['id_berita']);
            $arr['created_at'] = date('Y-m-d H:i:s');
            $arr['created_by'] = Auth::user()->userid;
            $data              = new Berita();
            $data->create($arr);
            logSystem('/berita', $data->id_berita, "Create data berita " .
                $data->id_berita, 'create', request()->ip());
        } else {
            if (!MeHelper::allowed('BERITA_U')) {
                return response()->json(MeHelper::reason(), 401);
            }
            $arr['updated_at'] = date('Y-m-d H:i:s');
            $arr['updated_by'] = Auth::user()->userid;
            $data              = Berita::find($arr['id_berita']);
            $data->update($arr);
            logSystem('/berita', $data->id_berita, "Update data berita " .
                $data->id_berita, 'update', request()->ip());
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

        logSystem('/berita', $id, "Read data berita $id", 'read', request()->ip());
        $h = Berita::find($id);
        header('Content-Type: application/json');
        echo json_encode(compact(['h']));
    }

    public function delete($id)
    {
        if (!MeHelper::allowed('BERITA_D')) {
            return response()->json(MeHelper::reason(), 401);
        }
        logSystem('/berita', $id, "Delete data berita $id", 'delete', request()->ip());
        $data = Berita::find($id);
        $data->delete();
    }

    public function web()
    {
        $sys     = new SystemController();
        $last    = Berita::latest('created_at')->first();
        $terkini = Berita::latest('created_at')->limit(10)->get();
        foreach ($terkini as $k => $v) {
            $files               = $sys->getUploadList('berita', $v->id);
            $terkini[$k]->gambar = $files;
        }
        return view("berita.berita_web", compact(['last', 'terkini']));
    }
}
