<?php

namespace App\Http\Controllers;
use App\Models\Forms;
use Illuminate\Http\Request;
use App\Models\Types;
use App\Models\Users;
use Illuminate\Support\Facades\Cookie;
class ComponentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $userToken =  Cookie::get('userToken');
        if ( $userToken != false && Auth::user()) {
            return  view('components.header');
        }else{
            return view('login');
        }

    }
    public function getDashbordData(Request $request)
    {
        //
        $form =Forms::where('active','1')->get();
        $type =Types::where('active','1')->get();
        $users  =Users::where('active','1')->get();
        $outPut= [
            "form"=>$form->count(),
            "type"=>$type->count(),
            "users"=>$users->count()
        ];
       return json_encode($outPut);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
