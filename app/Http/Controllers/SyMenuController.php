<?php //generated at 2021-04-12 13:37:04
namespace App\Http\Controllers;

use App\Helpers\MeHelper;
use App\Models\SyMenu;
use Illuminate\Http\Request;

class SyMenuController extends Controller
{
/**
 * Display listing of the resource.
 *
 * @return  \Illuminate\Http\Response
 */
    public function index()
    {
        logSystem('/sy_menu', 0, "Open page sy_menu", 'index', request()->ip());
        return view("sy_menu.sy_menu_frm");
    }

    function list(Request $request) {
        if (!MeHelper::allowed('SY_MENU_R')) {
            return response()->json(MeHelper::reason(), 401);
        }
        logSystem('/sy_menu', 0, "List tabel sy_menu", 'list', $request->ip());

        $sy_menu = SyMenu::select("*")
            ->where(function ($q) use ($request) {
                $q->orWhere('label', 'like', "%" . @$request->q . "%");
                $q->orWhere('url', 'like', "%" . @$request->q . "%");

            })
            ->with(['rel_parent'])
            ->orderBy(isset($request->order_by) ? substr($request->order_by, 1) : 'id', substr(@$request->order_by, 0, 1) ==
                '-' ?
                'desc' : 'asc');
        $sy_menu = $sy_menu->paginate(isset($request->limit) ? $request->limit : 10);
        header('Content-Type: application/json');
        echo json_encode(compact(['sy_menu']));
    }

    public function lookup(Request $request)
    {
        logSystem('/sy_menu', 0, "Lookup tabel sy_menu", 'lookup', $request->ip());
        $q = str_replace(" ", "%", @$request->q);

        $request->q = str_replace(" ", "%", @$request->q);
        $data       = SyMenu::select('*')
            ->where(function ($q) use ($request) {
                $q->orWhere('label', 'like', "%" . @$request->q . "%");
                $q->orWhere('url', 'like', "%" . @$request->q . "%");
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
            if (!MeHelper::allowed('SY_MENU_C')) {
                return response()->json(MeHelper::reason(), 401);
            }
            unset($arr['id']);
            $arr['created_at'] = date('Y-m-d H:i:s');
//$arr['created_by']=Auth::user()->userid;
            $data = new SyMenu();
            $data->create($arr);
            logSystem('/sy_menu', $data->id, "Create data sy_menu
$data->id", 'create', request()->ip());
        } else {
            if (!MeHelper::allowed('SY_MENU_U')) {
                return response()->json(MeHelper::reason(), 401);
            }
            $arr['updated_at'] = date('Y-m-d H:i:s');
//$arr['updated_by']=Auth::user()->userid;
            $data = SyMenu::find($arr['id']);
            $data->update($arr);
            logSystem('/sy_menu', $data->id, "Update data sy_menu
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

        logSystem('/sy_menu', $id, "Read data sy_menu $id", 'read', request()->ip());
        $h = SyMenu::find($id);
        header('Content-Type: application/json');
        echo json_encode(compact(['h']));
    }

    public function delete($id)
    {
        if (!MeHelper::allowed('SY_MENU_D')) {
            return response()->json(MeHelper::reason(), 401);
        }
        logSystem('/sy_menu', $id, "Delete data sy_menu $id", 'delete', request()->ip());
        $data = SyMenu::find($id);
        $data->delete();
    }
}
