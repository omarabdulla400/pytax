<?php

namespace App\Http\Controllers;
use App\Models\SubjectsAndDepartments;
use App\Models\Departments;
use App\Models\Stages;
use App\Models\Subjects;
use App\Models\Education_Years;
use Illuminate\Http\Request;
use App\Models\EducationTypes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
class SubjectsAndDepartmentsController extends Controller
{

    public function getSubjectsAndDepartments(Request $request)
    {
        //
        $objs = SubjectsAndDepartments::where('deleted_at', null)->get();
        if ($objs !=null) {
            $data = [];
            $count = 1;
            foreach ($objs as $obj) {
                $sub_array = [];
                $obj1 = Departments::find($obj->department);
                $obj2 = Subjects::find($obj->subject);
                $obj3 = Stages::find($obj->stage);
                $obj4 = EducationTypes::find($obj->education_type);
                $sub_array[] = '<tr><td>' . $count . '</td>';
                $sub_array[] = '<td>' . $obj2->name_kr . '</td>';
                $sub_array[] = '<td>' . $obj1->name_kr . '</td>';
                $sub_array[] = '<td>' . $obj3->name_kr . '</td>';
                $sub_array[] = '<td>' . $obj->theory . '</td>';
                $sub_array[] = '<td>' . $obj->practice . '</td>';
                $sub_array[] = '<td>' . $obj4->name_kr . '</td>';
                $sub_array[] =
                    '   <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                type="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <span class="text-muted sr-only">Action</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right" >
                <a class="dropdown-item" href="javascript:void(0);"  onclick="subjectsAndDepartmentsRemove(' .
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


        $multiSelectSubjects = $request->multiSelectSubjects ;
        $multiSelectDepartments = $request->multiSelectDepartments ;
        foreach($multiSelectSubjects as $subject){
            foreach($multiSelectDepartments as $department){
                $obj = SubjectsAndDepartments::where('deleted_at', null)->where('department', $department)->where('subject', $subject)->first();
                $education_Years = Education_Years::where('deleted_at', null)->orderBy('id', 'DESC')->first();
                if (empty($obj)) {
                    $obj = new SubjectsAndDepartments();
                    $obj->subject = $subject;
                    $obj->department = $department;
                    $obj->stage = $request->stage ;
                    $obj->theory = $request->subjectStage_theory;
                    $obj->practice = $request->subjectStage_practice;
                    $obj->education_type = $request->subjectStage_educationType;
                    $obj->education_years = $education_Years->id;
                       $obj->admin = Auth::User()->id;
                    $result = $obj->save();
                }
            }
        }
        return __('language.addSuccessfully');

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
        $obj = SubjectsAndDepartments::find($request->id);
        if ($obj !=null) {
            return json_encode($obj);
        } else {
            return '';
        }
    }
    public function getSubjectsAndDepartmentsAllData(Request $request)
    {
        //
        $obj = SubjectsAndDepartments::where('deleted_at', null)->get();
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $obj = SubjectsAndDepartments::find($request->id);
        if ($obj !=null) {
            $obj->code = $request->subjectsAndDepartments_code;
            $obj->name_kr = $request->subjectsAndDepartments_name_kr;
            $obj->name_ar = $request->subjectsAndDepartments_name_ar;
            $obj->name_en = $request->subjectsAndDepartments_name_en;
            $obj->state = $request->subjectsAndDepartments_state;
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
        $obj = SubjectsAndDepartments::find($request->id);
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
