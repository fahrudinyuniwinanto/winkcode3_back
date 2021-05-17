<?php //generated at 2021-02-08 13:47:03
namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display  listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    { //die(public_path());
        return view("users.users_frm");
    }

    function list(Request $request) {
        // dd($req);
        // $users = Users::latest()->where('id','LIKE',"%$req->q%")->paginate(isset($req->limit) ? $req->limit : 10);
        $users = Users::select("*")
            ->where(function ($q) use ($request) {
                $q->orWhere('username', 'like', "%" . @$request->q . "%");
                $q->orWhere('nama_lengkap', 'like', "%" . @$request->q . "%");
                $q->orWhere('email', 'like', "%" . @$request->q . "%");
            })
            ->orderBy(isset($request->order_by) ? substr($request->order_by, 1) : 'id', substr(@$request->order_by, 0, 1) == '-' ? 'desc' : 'asc');
        $users = $users->paginate(isset($request->limit) ? $request->limit : 10);

        $users->getCollection()->transform(function ($value) {
            $value->group_name = @$value->group->name;
            unset($value->group);
            return $value;
        });

        header('Content-Type: application/json');
        echo json_encode(compact(['users']));
    }

    public function lookup(Request $request)
    {
        $q    = str_replace(" ", "%", @$request->q);
        $data = Users::select('id', 'username', 'nama_lengkap', "email")
            ->where(function ($q) use ($request) {
                $q->orWhere('username', 'like', "%" . @$request->q . "%");
                $q->orWhere('nama_lengkap', 'like', "%" . @$request->q . "%");
                $q->orWhere('email', 'like', "%" . @$request->q . "%");
            })
            ->orderBy(isset($request->order_by) ? substr($request->order_by, 1) : 'id', substr(@$request->order_by, 0, 1) == '-' ? 'desc' : 'asc');
        $data = $data->paginate(isset($request->limit) ? $request->limit : 10);

        return view("system/dialog/sflookup", compact(['data', 'request']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
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
            $data = new Users;
            $data->create($arr);
        } else {
            $arr['updated_at'] = date('Y-m-d H:i:s');
            //$arr['updated_by']=Auth::user()->userid;
            $data = Users::find($arr['id']);
            $data->update($arr);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        $h             = Users::find($id);
        $h->group_name = @$h->group->name;
        header('Content-Type: application/json');
        echo json_encode(compact(['h']));
    }

    public function delete($id)
    {
        $data = Users::find($id);
        $data->delete();
    }

    public function profil()
    {
        $me = Auth::user();
        return view('users.users_profil', compact(['me']));
    }
}
