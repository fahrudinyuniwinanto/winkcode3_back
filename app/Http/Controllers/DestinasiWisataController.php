<?php //generated at 2021-04-30 10:36:13
namespace App\Http\Controllers;

use App\Helpers\MeHelper;
use App\Models\DestinasiWisata;
use App\Models\PaketWisata;
use Illuminate\Http\Request;

class DestinasiWisataController extends Controller
{
/**
 * Display listing of the resource.
 *
 * @return  \Illuminate\Http\Response
 */
    public function index()
    {
        logSystem('/destinasi_wisata', 0, "Open page destinasi_wisata", 'index', request()->ip());
        return view("destinasi_wisata.destinasi_wisata_frm");
    }

    function list(Request $request) {
        if (!MeHelper::allowed('DESTINASI_WISATA_R')) {
            return response()->json(MeHelper::reason(), 401);
        }
        logSystem('/destinasi_wisata', 0, "List tabel destinasi_wisata", 'list', $request->ip());

        $destinasi_wisata = DestinasiWisata::select("*")
            ->where(function ($q) use ($request) {
                $q->orWhere('id', 'like', "%" . @$request->q . "%");
            })
            ->orderBy(isset($request->order_by) ? substr($request->order_by, 1) : 'id', substr(@$request->order_by, 0, 1) ==
                '-' ?
                'desc' : 'asc')
            ->with(['kecamatan', 'desa']);
        $destinasi_wisata = $destinasi_wisata->paginate(isset($request->limit) ? $request->limit : 10);
        header('Content-Type: application/json');
        echo json_encode(compact(['destinasi_wisata']));
    }

    public function lookup(Request $request)
    {
        logSystem('/destinasi_wisata', 0, "Lookup tabel destinasi_wisata", 'lookup', $request->ip());
        $q = str_replace(" ", "%", @$request->q);

        $request->q = str_replace(" ", "%", @$request->q);
        $data       = DestinasiWisata::select('*')
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
        $d       = $request->d;
        $f       = $request->f;
        $arr     = (array) $h;

        if ($f->crud == "c") {
            if (!MeHelper::allowed('DESTINASI_WISATA_C')) {
                return response()->json(MeHelper::reason(), 401);
            }
            unset($arr['id']);
            $arr['created_at'] = date('Y-m-d H:i:s');
//$arr['created_by']=Auth::user()->userid;
            $data = new DestinasiWisata();
            $data->create($arr);
            if ($d) {
                $this->storeD($data->id, $d);
            }
            logSystem('/destinasi_wisata', $data->id, "Create data destinasi_wisata
" . $data->id, 'create', request()->ip());
        } else {
            if (!MeHelper::allowed('DESTINASI_WISATA_U')) {
                return response()->json(MeHelper::reason(), 401);
            }
            $arr['updated_at'] = date('Y-m-d H:i:s');
//$arr['updated_by']=Auth::user()->userid;
            $data = DestinasiWisata::find($arr['id']);
            $data->update($arr);
            if ($d) {
                $this->storeD($data->id, $d);
            }
            logSystem('/destinasi_wisata', $data->id, "Update data destinasi_wisata
" . $data->id, 'update', request()->ip());
        }
    }

    public function storeD($id_h, $d)
    {
        $paketWisata = new PaketWisata();
        foreach ($d as $k1 => $v1) {
            $arr = [];
            foreach ($paketWisata->getFillable() as $k => $v) {
                $arr[$v] = @$v1->$v;
            }
            if (@$arr['id'] != '') {
                // print_r($d);die('detil');
                $paket                    = $paketWisata->find($arr['id']);
                $paket->nama_paket_wisata = $arr['nama_paket_wisata'];
                $paket->deskripsi         = $arr['deskripsi'];
                $paket->harga             = $arr['harga'];
                $paket->alamat            = $arr['alamat'];
                $paket->kontak_person     = $arr['kontak_person'];
                $paket->titik_koordinat   = $arr['titik_koordinat'];
                $paket->note              = $arr['note'];
                $paket->updated_at        = date("Y-m-d H:i:s");
                $paket->deleted_at        = $arr['deleted_at'];
                $paket->save();
            } else {
                unset($arr['id']);
                $arr['id_destinasi'] = $id_h;
                $paketWisata::insert($arr);
            }
        }

        $arr['id'] = $id_h;
        PaketWisata::create();

    }

/**
 * Display the specified resource.
 *
 * @param  int $id
 * @return  \Illuminate\Http\Response
 */
    public function show($id)
    {

        logSystem('/destinasi_wisata', $id, "Read data destinasi_wisata $id", 'read', request()->ip());
        $h = DestinasiWisata::with(['kecamatan', 'desa'])->find($id);
        $d = PaketWisata::where(['id_destinasi' => $id])->get();
        header('Content-Type: application/json');
        echo json_encode(compact(['h', 'd']));
    }

    public function delete($id)
    {
        if (!MeHelper::allowed('DESTINASI_WISATA_D')) {
            return response()->json(MeHelper::reason(), 401);
        }
        logSystem('/destinasi_wisata', $id, "Delete data destinasi_wisata $id", 'delete', request()->ip());
        $data = DestinasiWisata::find($id);
        $data->delete();
    }
}
