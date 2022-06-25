<?php

namespace App\Http\Controllers;
use App\Models\Roles;
use App\Models\RoleNames;
use App\Models\RoleItems;
use Illuminate\Http\Request;
use App\Http\Helpers\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roleNames = RoleNames::where('deleted_at', null)->get();
        $userToken =  Cookie::get('userToken');
        if ( $userToken != false && Auth::user()) {
            return view('administration.roles')->with("roleNames",$roleNames);
        }else{
            return view('login');
        }

    }
    public function getRoles(Request $request)
    {
        //
        $objs = Roles::where('deleted_at', null)->get();
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
                <a class="dropdown-item" href="javascript:void(0);" onclick="rolesEdit(' .
                    $obj->id .
                    ');">' .
                    __('language.update') .
                    '</a>
                <a class="dropdown-item" href="javascript:void(0);"  onclick="rolesRemove(' .
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
      
        $obj = new Roles();
        $obj->name_kr = $request->roles_name_kr;
        $obj->name_ar = $request->roles_name_ar;
        $obj->name_en = $request->roles_name_en;
        $obj->admin = Auth::User()->id;
        $result = $obj->save();
        if ($result) {
            $roleNames = RoleNames::where('deleted_at', null)->get();
            foreach($roleNames as $item){
              $objRoleItems = new RoleItems();
              $objRoleItems->role = $obj->id;
              $objRoleItems->roleName = $item->id;
              if($request->has("roles_view_id_$item->id")) {
                 $objRoleItems->viewData = 1; 
                }
                 else{
                 $objRoleItems->viewData =0; }
              if($request->has("roles_add_id_$item->id")) {
                 $objRoleItems->addData = 1; }
                 else{
                 $objRoleItems->addData =0; }  
              if($request->has("roles_update_id_$item->id")) {
                    $objRoleItems->updateData = 1; }
                 else{
                    $objRoleItems->updateData =0; } 
              if($request->has("roles_filter_id_$item->id")) {
                    $objRoleItems->filterData = 1; }
                 else{
                    $objRoleItems->filterData =0; }    
              if($request->has("roles_extract_id_$item->id")) {
                    $objRoleItems->extractData = 1; }
                        else{
                    $objRoleItems->extractData =0; }               
              if($request->has("roles_delete_id_$item->id")) {
                        $objRoleItems->deleteData = 1; }
                            else{
                        $objRoleItems->deleteData =0; }   
             $result = $objRoleItems->save();
            }
            return __('language.addSuccessfully');
        } else {
            return __('language.error');
        }
    }
    public function getRolesAllData(Request $request)
    {
        $obj = Roles::where('deleted_at', null)->get();
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
        $roleItems = RoleItems::where('deleted_at', null)->get();
        $obj = Roles::find($request->id);
        $output = [
            "roleItems" =>json_encode($roleItems),
            "roles" =>json_encode($obj),
        ];
        if ($obj !=null) {
            return json_encode($output);
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
        $obj = Roles::find($request->id);
        if ($obj !=null) {
            $obj->name_kr = $request->roles_name_kr;
            $obj->name_ar = $request->roles_name_ar;
            $obj->name_en = $request->roles_name_en;
            $obj->admin = Auth::User()->id;
            $obj->updated_at=Now();
            $result = $obj->save();
            if ($result) {
                $roleNames = RoleNames::where('deleted_at', null)->get();
            foreach($roleNames as $item){
              $objRoleItems = RoleItems::where('role',$request->id)->where('roleName',$item->id)->where('deleted_at', null)->first();
              if($objRoleItems==null){
                $objRoleItems = new RoleItems();
              }
              
              $objRoleItems->role = $obj->id;
              $objRoleItems->roleName = $item->id;
              if($request->has("roles_view_id_$item->id")) {
                 $objRoleItems->viewData = 1; 
                }
                 else{
                 $objRoleItems->viewData =0; }
              if($request->has("roles_add_id_$item->id")) {
                 $objRoleItems->addData = 1; }
                 else{
                 $objRoleItems->addData =0; }  
              if($request->has("roles_update_id_$item->id")) {
                    $objRoleItems->updateData = 1; }
                 else{
                    $objRoleItems->updateData =0; } 
              if($request->has("roles_filter_id_$item->id")) {
                    $objRoleItems->filterData = 1; }
                 else{
                    $objRoleItems->filterData =0; }    
              if($request->has("roles_extract_id_$item->id")) {
                    $objRoleItems->extractData = 1; }
                        else{
                    $objRoleItems->extractData =0; }               
              if($request->has("roles_delete_id_$item->id")) {
                        $objRoleItems->deleteData = 1; }
                            else{
                        $objRoleItems->deleteData =0; }   
             $result = $objRoleItems->save();
            }
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
        $obj = Roles::find($request->id);
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