<?php

namespace App\Http\Controllers;
use App\Models\SetSubjects;
use Illuminate\Http\Request;
use App\Models\Education_Years;
use App\Models\EducationTypes;
use App\Models\Teachers;
use App\Models\Subjects;
use App\Models\Departments;
use App\Models\Stages;
use App\Models\SubjectsAndDepartments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
class SetSubjectsController extends Controller
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
            return view('administration.setSubjects');
        }else{
            return view('login');
        }


    }
    public function getSetSubjects(Request $request)
    {
        //
        $objs = SetSubjects::where('deleted_at', null)->get();
        if ($objs != null) {
            $data = [];
            $count = 1;
            foreach ($objs as $obj) {
                $sub_array = [];

                $sub_array[] = '<tr><td>' . $count . '</td>';
                $sub_array[] = '<td>' . $obj->subjectsAndDepartments()->first()->subject()->first()->name_kr  . '</td>';
                $sub_array[] = '<td>' . $obj->subjectsAndDepartments()->first()->department()->first()->name_kr  . '</td>';
                $sub_array[] = '<td>' . $obj->subjectsAndDepartments()->first()->stage()->first()->name_kr . '</td>';
                $sub_array[] = '<td>' . $obj->teacher()->first()->name_kr . '</td>';
                $sub_array[] ='<td> <a  href="javascript:void(0);" onclick="setSubjectsRemove(' .$obj->id .
                ');"><i class="feather icon-trash-2 f-w-600 m-r-20  f-24 text-c-red"></i></a>
                <a href="javascript:void(0);"  onclick="setSubjectsEdit(' .$obj->id .
                 ');"><i class="icon feather icon-edit f-w-600 f-24 m-r-20 m-l-20 text-c-green"></i></a>
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
        $obj = new SetSubjects();
        $obj->subjects_and_departments = $request->setSubjects_subject;
        $obj->teacher = $request->setSubjects_teacher;

           $obj->admin = Auth::User()->id;
        $result = $obj->save();
        if ($result) {
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
        $obj = SetSubjects::find($request->id);
        if ($obj != null) {
            return json_encode($obj);
        } else {
            return '';
        }
    }
    public function getSetSubjectsData(Request $request)
    {
        //
        $obj = SetSubjects::where('deleted_at', null)->get();
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
        $obj = SetSubjects::find($request->id);
        if ($obj != null) {
            $obj->subjects_and_departments = $request->setSubjects_subject;
            $obj->teacher = $request->setSubjects_teacher;

               $obj->admin = Auth::User()->id;
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
        $obj = SetSubjects::find($request->id);
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
}
