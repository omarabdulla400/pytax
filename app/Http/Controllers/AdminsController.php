<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Facades\Cookie;
class AdminsController extends Controller
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
            return view('administration.admins');
        }else{
            return view('login');
        }
    }

    public function getAdmins(Request $request)
    {
        //
        $objs = Admins::where('deleted_at', null)->get();
        $data = [];
        if ($objs->isNotEmpty()) {
            $count = 1;
            foreach ($objs as $obj) {
                $sub_array = [];
                $sub_array[] = '<tr><td>' . $count . '</td>';
                $sub_array[] = '<td>' . $obj->name . '</td>';
                $sub_array[] = '<td>' . $obj->phone . '</td>';
                $sub_array[] = '<td>' . $obj->email . '</td>';
                $sub_array[] = '<td>' . $obj->adminRole()->first()->name_kr . '</td>';
                $sub_array[] =
                    '   <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                type="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <span class="text-muted sr-only">Action</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right" >
                <a class="dropdown-item" href="javascript:void(0);" onclick="adminEdit(' .
                    $obj->id .
                    ');">' .
                    __('language.update') .
                    '</a>
                <a class="dropdown-item" href="javascript:void(0);"  onclick="adminRemove(' .
                    $obj->id .
                    ');">' .
                    __('language.delete') .
                    '</a>
            </div>
        </td></tr>';
                $data[] = $sub_array;
                $count = $count + 1;
            }

        }
        $output = [
            'data' => $data,
        ];
        return json_encode($output);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('admin_image');
        $fileName = date('mdYHis') . $file->getClientOriginalName();
        $destinationPath = public_path() . '/appImage/admins';
        $file->move($destinationPath, $fileName);
        $obj = new Admins();
        $obj->name = $request->admin_name;
        $obj->phone = $request->admin_phone;
        $obj->email = $request->admin_email;
        $obj->password = Hash::make($request->admin_password);
        $obj->role = $request->admin_role;
        $obj->admin = Auth::User()->id;
        $obj->image = $fileName;
        $result = $obj->save();
        if ($result) {
            $objUser = new User();
            $objUser->email = $request->admin_email;
            $objUser->password = Hash::make($request->admin_password);
            $objUser->accountId = $obj->id;
            $objUser->type = 1;
            $objUser->save();
            return __('language.addSuccessfully');
        } else {
            return __('language.error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $obj = Admins::find($request->id);
        if ($obj->exists()) {
            return json_encode($obj);
        } else {
            return '';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $obj = Admins::find($request->id);
        if ($obj->exists()) {
            $fileName = '';
            $file = $request->file('admin_image');
            if (!empty($file)) {
                $fileName = date('mdYHis') . $file->getClientOriginalName();
                $destinationPath = public_path() . '/appImage/admins';
                $file->move($destinationPath, $fileName);
            }
            $obj->name = $request->admin_name;
            $obj->phone = $request->admin_phone;
            $obj->email = $request->admin_email;

            if ($request->admin_password != $request->oldPassword) {
                $obj->password = Hash::make($request->admin_password);
            }
            $obj->role = $request->admin_role;
            if ($fileName != '') {
                $obj->image = $fileName;
            }
            $obj->updated_at = Now();
            $result = $obj->save();
            if ($result) {
                $objUser = User::where('id', $obj->id)->first();
                $objUser->email = $request->admin_email;
                if ($request->admin_password != $request->oldPassword) {
                    $objUser->password = Hash::make($request->admin_password);
                }
                $objUser->save();
                return __('language.updatedSuccessfully');
            } else {
                return __('language.error');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $obj = Admins::find($request->id);
        if ($obj->exists()) {
            $obj->deleted_at = Now();
            $result = $obj->save();
            if ($result) {
                $objUser = User::where('id', $obj->id)->first();
                $objUser->delete();
                return __('language.deletedSuccessfully');
            } else {
                return __('language.error');
            }
        }
    }

    public function validateEmail(Request $request)
    {
        $obj = Admins::get();
        if ($obj->isNotEmpty()) {
            if (Admins::where('email', $request->email)->first() != null) {
                return json_encode(1);
            } else {
                return json_encode(0);
            }
        } else {
            return json_encode(0);
        }
    }
}
