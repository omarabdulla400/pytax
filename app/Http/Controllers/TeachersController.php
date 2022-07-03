<?php

namespace App\Http\Controllers;
use App\Models\Teachers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
class TeachersController extends Controller
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
            return view('administration.teachers');
        }else{
            return view('login');
        }

    }

    public function getTeachers(Request $request)
    {
        //
        $objs = Teachers::where('deleted_at', null)->get();
        if ($objs != null) {
            $data = [];
            $count = 1;
            foreach ($objs as $obj) {
                $sub_array = [];
                $sub_array[] = '<tr><td>' . $count . '</td>';
                $sub_array[] = '<td>' . $obj->name_kr . '</td>';
                $sub_array[] = '<td>' . $obj->phone . '</td>';
                $sub_array[] = '<td>' . $obj->email . '</td>';
                $sub_array[] = '<td>' . $obj->teacherRole()->first()->name_kr . '</td>';

                if( $obj->id==Auth::User()->accountId && Auth::User()->type =2){
                    $sub_array[] = '<td></td></tr>';
                }else{
                $sub_array[] ='<td> <a  href="javascript:void(0);" onclick="teacherRemove(' .$obj->id .
                ');"><i class="feather icon-trash-2 f-w-600 m-r-20  f-24 text-c-red"></i></a>
                <a href="javascript:void(0);"  onclick="teacherEdit(' .$obj->id .
                 ');"><i class="icon feather icon-edit f-w-600 f-24 m-r-20 m-l-20 text-c-green"></i></a>
                </td></tr>';
                }
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
        $file = $request->file('teacher_image');
        $fileName = date('mdYHis') . $file->getClientOriginalName();
        $destinationPath = public_path() . '/appImage/teachers';
        $file->move($destinationPath, $fileName);
        $obj = new Teachers();
        $obj->name_kr = $request->teacher_name_kr;
        $obj->name_ar = $request->teacher_name_ar;
        $obj->name_en = $request->teacher_name_en;
        $obj->phone = $request->teacher_phone;
        $obj->email = $request->teacher_email;
        $obj->password = Hash::make($request->teacher_password);
        $obj->role = $request->teacher_role;
        $obj->educationLevel = $request->teacher_educationLevel;
        $obj->image = $fileName;
        $obj->admin = Auth::User()->id;
        $result = $obj->save();
        if ($result) {
            $objUser = new User();
            $objUser->email = $request->teacher_email;
            $objUser->password = Hash::make($request->teacher_password);
            $objUser->accountId = $obj->id;
            $objUser->type = 2;
            $objUser->save();
            return __('language.addSuccessfully');
        } else {
            return __('language.error');
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
        $obj = Teachers::find($request->id);
        if ($obj != null) {
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $obj = Teachers::find($request->id);
        if ($obj != null) {
            $fileName = '';
            $file = $request->file('teacher_image');
            if (!empty($file)) {
                $fileName = date('mdYHis') . $file->getClientOriginalName();
                $destinationPath = public_path() . '/appImage/teachers';
                $file->move($destinationPath, $fileName);
            }
            $obj->name_kr = $request->teacher_name_kr;
            $obj->name_ar = $request->teacher_name_ar;
            $obj->name_en = $request->teacher_name_en;
            $obj->phone = $request->teacher_phone;
            $obj->email = $request->teacher_email;

            if ($request->teacher_password != $request->oldPassword) {
                $obj->password =  Hash::make($request->teacher_password);
            }
            $obj->role = $request->teacher_role;
            $obj->educationLevel = $request->teacher_educationLevel;
            if ($fileName != '') {
                $obj->image = $fileName;
            }
            $obj->updated_at = Now();
            $result = $obj->save();
            if ($result) {
                $objUser = User::where('id', $obj->id)->first();
                if( $objUser==null){
                    $objUser = new User();
                    $objUser->email = $request->teacher_email;
                    $objUser->password = Hash::make($request->teacher_password);
                    $objUser->accountId = $obj->id;
                    $objUser->type = 2;
                    $objUser->save();
                }else{
                    $objUser->email = $request->teacher_email;
                    if ($request->teacher_password != $request->oldPassword) {
                        $objUser->password = Hash::make($request->teacher_password);
                    }
                    $objUser->type = 2;
                    $objUser->save();
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
    public function destroy(Request $request)
    {
        //
        $obj = Teachers::find($request->id);
        if ($obj != null) {
            $obj->deleted_at = Now();
            $result = $obj->save();
            if ($result) {
                return __('language.deletedSuccessfully');
            } else {
                return __('language.error');
            }
        }
    }
    public function getTeachersAllData(Request $request)
    {
        //
        $obj = Teachers::where('deleted_at', null)->get();
        if ($obj ->isNotEmpty()) {
            return json_encode($obj);
        } else {
            return '';
        }
    }
    public function validateEmail(Request $request)
    {
        if (Teachers::where('email', $request->email)->first() != null) {
            return json_encode(1);
        } else {
            return json_encode(0);
        }
    }

}
