<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\SetStudentStages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userToken = Cookie::get('userToken');
        if ($userToken != false && Auth::user()) {
            return view('administration.students');
        } else {
            return view('login');
        }
    }

    public function getStudents(Request $request)
    {
        //
        $objs = Students::where('deleted_at', null)->get();
        if ($objs != null) {
            $data = [];
            $count = 1;
            foreach ($objs as $obj) {
                $sub_array = [];
                $sub_array[] = '<tr><td>' . $count . '</td>';
                $sub_array[] = '<td>' . $obj->code . '</td>';
                $sub_array[] = '<td>' . $obj->name_kr . '</td>';
                $sub_array[] = '<td>' . $obj->phone . '</td>';
                $sub_array[] = '<td>' . $obj->address . '</td>';
                $sub_array[] = '<td>' . $obj->gender . '</td>';
                $sub_array[] =
                    '<td>' . $obj->department()->first()->name_kr . '</td>';
                $sub_array[] =
                    '<td>' .
                    $obj
                        ->setStudentStages()
                        ->first()
                        ->stage()
                        ->first()->name_kr .
                    '</td>';

                $sub_array[] =
                    '<td>' . $obj->study_type()->first()->name_kr . '</td>';
                $sub_array[] =
                    '<td>' .
                    $obj
                        ->setStudentStages()
                        ->first()
                        ->study_status()
                        ->first()->name_kr .
                    '</td>';
                $sub_array[] =
                    '<td> <a  href="javascript:void(0);" onclick="studentRemove(' .
                    $obj->id .
                    ');"><i class="feather icon-trash-2 f-w-600 m-r-20  f-24 text-c-red"></i></a>
                <a href="javascript:void(0);"  onclick="studentEdit(' .
                    $obj->id .
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

        $obj = new Students();
        $obj->code = $request->student_code;
        $obj->name_kr = $request->student_name_kr;
        $obj->name_ar = $request->student_name_ar;
        $obj->name_en = $request->student_name_en;
        $obj->phone = $request->student_phone;
        $obj->address = $request->student_address;
        $obj->gender = $request->student_gender;
        $obj->department = $request->student_department;

        $obj->study_type = $request->student_types;
        $obj->admin = Auth::User()->id;
        $result = $obj->save();
        if ($result) {
            $objSet = new SetStudentStages();
            $objSet->student = $obj->id;
            $objSet->stage = $request->student_stage;
            $objSet->study_status = $request->student_statuses;
            $objSet->education_year = $request->student_year;
            $objSet->admin = Auth::User()->id;
            $result = $objSet->save();
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
        $obj = Students::find($request->id);
        $obj->setAttribute(
            'stage',
            $obj
                ->setStudentStages()
                ->first()
                ->stage()
                ->first()->id
        );
        $obj->setAttribute(
            'study_status',
            $obj
                ->setStudentStages()
                ->first()
                ->study_status()
                ->first()->id
        );
        $obj->setAttribute(
            'education_years',
            $obj
                ->setStudentStages()
                ->first()
                ->education_year()
                ->first()->id
        );
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

        $obj = Students::find($request->id);
        if ($obj != null) {
            $obj->code = $request->student_code;
            $obj->name_kr = $request->student_name_kr;
            $obj->name_ar = $request->student_name_ar;
            $obj->name_en = $request->student_name_en;
            $obj->phone = $request->student_phone;
            $obj->address = $request->student_address;
            $obj->gender = $request->student_gender;
            $obj->department = $request->student_department;

            $obj->study_type = $request->student_types;
            $obj->admin = Auth::User()->id;

            $obj->updated_at = Now();
            $result = $obj->save();
            if ($result) {
                $objSet = $obj->setStudentStages()->first();
                $objSet->student = $obj->id;
                $objSet->stage = $request->student_stage;
                $objSet->study_status = $request->student_statuses;
                $objSet->education_year = $request->student_year;
                $obj->updated_at = Now();
                $objSet->admin = Auth::User()->id;
                $result = $objSet->save();
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
        $obj = Students::find($request->id);
        if ($obj != null) {
            $obj->deleted_at = Now();
            $result = $obj->save();
            $objSet = SetStudentStages::where('student', $request->id)->first();
            $objSet->deleted_at = Now();
            $result = $objSet->save();
            if ($result) {
                return __('language.deletedSuccessfully');
            } else {
                return __('language.error');
            }
        }
    }
}
