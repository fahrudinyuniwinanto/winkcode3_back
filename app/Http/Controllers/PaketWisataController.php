<?php //generated at 2021-02-23 14:48:27
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketWisata;
use Illuminate\Support\Facades\Auth;

class PaketWisataController extends Controller
{
    /**
     * Display  listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {   
        return view("paket_wisata.paket_wisata_frm");
    }

    public function list(Request $req){
        // dd($req);
        $paket_wisata = PaketWisata::latest()->where('id','LIKE',"%$req->q%")->paginate(5);
        header('Content-Type: application/json');
        echo json_encode(compact(['paket_wisata']));
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
        $h=$request->h;
        $f=$request->f;
        $arr = (array) $h;

        
        if($f->crud=="c"){
            unset($arr['id']);
                        $arr['created_at']=date('Y-m-d H:i:s');
            //$arr['created_by']=Auth::user()->userid;
                        $data=new PaketWisata;
            $data->create($arr);
        }else{
                        $arr['updated_at']=date('Y-m-d H:i:s');
            //$arr['updated_by']=Auth::user()->userid;
                        $data=PaketWisata::find($arr['id']);
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
        $h=PaketWisata::find($id);
        header('Content-Type: application/json');
        echo json_encode(compact(['h']));
    }

    public function delete($id)
    {
        $data = PaketWisata::find($id);
        $data->delete();
    }   
}