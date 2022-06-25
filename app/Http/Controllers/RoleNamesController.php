<?php

namespace App\Http\Controllers;
use App\Models\RoleNames;
use Illuminate\Http\Request;
use App\Http\Helpers\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
class RoleNamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userToken =  Cookie::get('userToken');
        if ( $userToken != false && Auth::user()) {
            return view('administration.roleNames');
        }else{
            return view('login');
        }

    }
    public function getRoleNames(Request $request)
    {
        //
        $objs = RoleNames::where('deleted_at', null)->get();
        if ($objs !=null) {
            $data = [];
            $count = 1;
            foreach ($objs as $obj) {
                $sub_array = [];

                $sub_array[] = '<tr><td>' . $count . '</td>';
                $sub_array[] = '<td>' . $obj->name_kr . '</td>';
               
                $sub_array[] =
                    '   <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                type="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <span class="text-muted sr-only">Action</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right" >
                <a class="dropdown-item" href="javascript:void(0);" onclick="roleNamesEdit(' .
                    $obj->id .
                    ');">' .
                    __('language.update') .
                    '</a>
                <a class="dropdown-item" href="javascript:void(0);"  onclick="roleNamesRemove(' .
                    $obj->id .
                    ');">' .
                    __('language.delete') .
                    '</a>
            </div>
        </td></tr>';
                $data[] = $sub_array;
                $count = $count + 1;
            }
            $output = [
                'data' => $data,
            ];
            return json_encode($output);
        } else {
            return '';
        }
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
        $obj = new RoleNames();
        $obj->name_kr = $request->roleNames_name_kr;
        $obj->name_ar = $request->roleNames_name_ar;
        $obj->name_en = $request->roleNames_name_en;
        $obj->admin = Auth::User()->id;
      
        $result = $obj->save();
        if ($result) {
            return __('language.addSuccessfully');
        } else {
            return __('language.error');
        }
    }
    public function getRoleNamesAllData(Request $request)
    {
        $obj = RoleNames::where('deleted_at', null)->get();
        if ($obj !=null) {

            return json_encode($obj);
        } else {
            return '';
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $obj = RoleNames::find($request->id);
        if ($obj !=null) {
            return json_encode($obj);
        } else {
            return '';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Translation\Translator|string
     */
    public function update(Request $request)
    {
        //
        $obj = RoleNames::find($request->id);
        if ($obj !=null) {
            $obj->name_kr = $request->roleNames_name_kr;
            $obj->name_ar = $request->roleNames_name_ar;
            $obj->name_en = $request->roleNames_name_en;
            $obj->admin = Auth::User()->id;
            // if ($request->has("roleNames_view")) {
            //     $obj->viewData =1;
            // }else{
            //     $obj->viewData =0;
            // }
            // if ($request->has("roleNames_add")) {
            //     $obj->addData = 1;
            // }else{
            //     $obj->addData =0;
            // }
            // if ($request->has("roleNames_update")) {
            //     $obj->updateData = 1;
            // }else{
            //     $obj->updateData =0;
            // }
            // if ($request->has("roleNames_filter")) {
            //     $obj->filterData = 1;
            // }else{
            //     $obj->filterData =0;
            // }
            
            // if ($request->has("roleNames_extract")) {
            //     $obj->extractData =1;
            // }else{
            //     $obj->extractData =0;
            // }
            // if ($request->has("roleNames_delete")) {
            //     $obj->deleteData = 1;
            // }else{
            //     $obj->deleteData =0;
            // }
            $obj->updated_at=Now();
            $result = $obj->save();
            if ($result) {
                return __('language.updatedSuccessfully');
            } else {
                return __('language.error');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,)
    {
        //
        $obj = RoleNames::find($request->id);
        if ($obj !=null) {
            $obj->deleted_at = Now();
            $result = $obj->save();
            if ($result) {
                return __('language.deletedSuccessfully');
            } else {
                return __('language.error');
            }
        }
    }
}