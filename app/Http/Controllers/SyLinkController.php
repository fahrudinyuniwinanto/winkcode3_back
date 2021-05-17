<?php //generated at 2021-03-28 20:24:16
namespace App\Http\Controllers;

use App\Models\SyAccess;
use App\Models\SyGroup;
use App\Models\SyLink;
use App\Models\SyMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SyLinkController extends Controller
{
/**
 * Display listing of the resource.
 *
 * @return  \Illuminate\Http\Response
 */
    public function index()
    {
        logSystem('/sy_link', 0, "Buka halaman sy_link", 'index', request()->ip());
        return view("sy_link.sy_link_frm");
    }

    public function dash()
    {
        logSystem('/sy_link', 0, "Buka halaman sy_link set", 'set', request()->ip());
        return view("sy_link.sy_link_dash");
    }

    public function getDash(Request $request)
    {
        // $request = json_decode(file_get_contents('php://input'));

        $d = json_decode($request->d);
        // print_r($d);
        // dd();

        // $d = $request->d;
        // $r = $request->r;
        // dd($r);
        // $rel     = "USER-GROUP";
        $sylink  = SyLink::where('rel', $d->rel)->where('key1', $d->key1)->get();
        $arrlink = [];
        foreach ($sylink as $k => $v) {
            // echo $v->key2 . "<br>";
            $arrlink[$v->key2] = $v;
        }
        switch ($d->rel) {
            case 'USER-GROUP':
                $data = SyGroup::select("*")
                    ->where(function ($q) use ($request) {
                        $q->orWhere('name', 'like', "%" . @$request->q . "%");
                        $q->orWhere('note', 'like', "%" . @$request->q . "%");
                    })
                    ->orderBy(isset($request->order_by) ? substr($request->order_by, 1) : 'id', substr(@$request->order_by, 0, 1) ==
                        '-' ?
                        'desc' : 'asc')
                    ->paginate(isset($request->limit) ? $request->limit : 10);
                foreach ($data as $k => $v) {
                    if (array_key_exists($v->id, $arrlink)) {
                        $data[$k]->flag = 1;
                    } else {
                        $data[$k]->flag = 0;
                    }
                }
                break;

            case 'USER-ACCESS':
                $data = SyAccess::select("*")
                    ->where('accessgroup', 'USER')
                    ->where(function ($q) use ($request) {
                        $q->orWhere('accessname', 'like', "%" . @$request->q . "%");
                        $q->orWhere('accessgroup', 'like', "%" . @$request->q . "%");
                        $q->orWhere('note', 'like', "%" . @$request->q . "%");
                    })
                    ->orderBy(isset($request->order_by) ? substr($request->order_by, 1) : 'id', substr(@$request->order_by, 0, 1) ==
                        '-' ?
                        'desc' : 'asc')
                    ->paginate(isset($request->limit) ? $request->limit : 10);
                foreach ($data as $k => $v) {
                    if (array_key_exists($v->id, $arrlink)) {
                        $data[$k]->flag = 1;
                    } else {
                        $data[$k]->flag = 0;
                    }
                }
                break;

            case 'GROUP-ACCESS':
                $data = SyAccess::select("*")
                    ->where('accessgroup', 'group')
                    ->where(function ($q) use ($request) {
                        $q->orWhere('accessname', 'like', "%" . @$request->q . "%");
                        $q->orWhere('accessgroup', 'like', "%" . @$request->q . "%");
                        $q->orWhere('note', 'like', "%" . @$request->q . "%");
                    })
                    ->orderBy(isset($request->order_by) ? substr($request->order_by, 1) : 'id', substr(@$request->order_by, 0, 1) ==
                        '-' ?
                        'desc' : 'asc')
                    ->paginate(isset($request->limit) ? $request->limit : 10);
                foreach ($data as $k => $v) {
                    if (array_key_exists($v->id, $arrlink)) {
                        $data[$k]->flag = 1;
                    } else {
                        $data[$k]->flag = 0;
                    }
                }
                break;

            case 'GROUP-MENU':
                $data = SyMenu::select("*")
                    ->where(function ($q) use ($request) {
                        $q->orWhere('label', 'like', "%" . @$request->q . "%");
                        $q->orWhere('url', 'like', "%" . @$request->q . "%");
                        $q->orWhere('icon', 'like', "%" . @$request->q . "%");
                        $q->orWhere('page', 'like', "%" . @$request->q . "%");
                    })
                    ->orderBy(isset($request->order_by) ? substr($request->order_by, 1) : 'id', substr(@$request->order_by, 0, 1) ==
                        '-' ?
                        'desc' : 'asc')
                    ->paginate(isset($request->limit) ? $request->limit : 10);
                foreach ($data as $k => $v) {
                    if (array_key_exists($v->id, $arrlink)) {
                        $data[$k]->flag = 1;
                    } else {
                        $data[$k]->flag = 0;
                    }
                }
                break;

            default:
                # code...
                break;
        }
        return response()->json(compact(['data']));

    }

    function list(Request $req) {
        logSystem('/sy_link', 0, "Lihat tabel sy_link", 'list', $req->ip());
// dd($req);
        $sy_link =
        SyLink::latest()->where('id', 'LIKE', "%$req->q%")->paginate(@$req->limit == 0 ? 5 : $req->limit);
        header('Content-Type: application/json');
        echo json_encode(compact(['sy_link']));
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
            $arr['created_by'] = @Auth::user()->userid;
            $data              = new SyLink;
            $data->create($arr);
            logSystem('/sy_link', $data->id, "Create data sy_link
$data->id", 'create', request()->ip());
        } else {
            $arr['updated_at'] = date('Y-m-d H:i:s');
            $arr['updated_by'] = @Auth::user()->userid;
            $data              = SyLink::find($arr['id']);
            $data->update($arr);
            logSystem('/sy_link', $data->id, "Update data sy_link
$data->id", 'update', request()->ip());
        }
    }

    public function set()
    {
        $req = json_decode(request()->getContent());
        $h   = $req->h;
        $f   = $req->f;

        // echo "<pre>";\print_r($h);die();

        $sylink = SyLink::where('rel', @$h->rel)
            ->where('key1', @$h->key1)
            ->where('key2', @$h->key2)
            ->where('tbl1', @$h->tbl1)
            ->where('tbl2', @$h->tbl2)
            ->withTrashed();

        // echo "<pre>";\print_r($sylink);die();

        if ($h->flag == 0) {
            $sylink->first()->delete();
            return response()->json('deleted');
        } else {
            if ($sylink->count() > 0) {
                $sylink->first()->restore();
                return response()->json('restored');
            }
        }

        try {
            $arr = array_merge((array) $h, ['updated_at' => date('Y-m-d H:i:s')]);
            if ($f->crud == 'c') {

                $data = new SyLink();
                $arr  = array_merge($arr, ['created_by' => Auth::user()->userid, 'created_at' => date('Y-m-d H:i:s')]);
                $data->create($arr);
                $id = $data->id;
                return response()->json('created');
            } else {
                $data = SyLink::find($h->id);
                $data->update($arr);
                $id = $data->id;
                return response()->json('updated');
            }

        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
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
        logSystem('/sy_link', $id, "Read data sy_link $id", 'read', request()->ip());
        $h = SyLink::find($id);
        header('Content-Type: application/json');
        echo json_encode(compact(['h']));
    }

    public function delete($id)
    {
        logSystem('/sy_link', $id, "Update data sy_link $id", 'update', request()->ip());
        $data = SyLink::find($id);
        $data->delete();
    }
}
