<?php

namespace App\Http\Controllers;
use App\Models\Subjects;
use Illuminate\Http\Request;
use App\Models\SubjectsAndDepartments;
use App\Models\Education_Years;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
class SubjectsController extends Controller
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
            return view('administration.subjects');
        }else{
            return view('login');
        }

    }
    public function getSubjects(Request $request)
    {
        //
        $objs = Subjects::where('deleted_at', null)->get();
        if ($objs!=null) {
            $data = [];
            $count = 1;
            foreach ($objs as $obj) {
                $sub_array = [];
                $state = '';
                switch ($obj->state) {
                    case 1:
                        $state = __('language.active');
                        break;
                    case 2:
                        $state = __('language.unActive');
                        break;
                }
                $sub_array[] = '<tr><td>' . $count . '</td>';
                $sub_array[] = '<td>' . $obj->code . '</td>';
                $sub_array[] = '<td>' . $obj->name_kr . '</td>';

                $sub_array[] =
                    '   <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                type="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <span class="text-muted sr-only">Action</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right" >
                <a class="dropdown-item" href="javascript:void(0);" onclick="subjectsEdit(' .
                    $obj->id .
                    ');">' .
                    __('language.update') .
                    '</a>
                <a class="dropdown-item" href="javascript:void(0);"  onclick="subjectsRemove(' .
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
        $obj = new Subjects();
        $obj->code = $request->subjects_code;
        $obj->name_kr = $request->subjects_name_kr;
        $obj->name_ar = $request->subjects_name_ar;
        $obj->name_en = $request->subjects_name_en;

          $obj->admin = Auth::User()->id;
        $result = $obj->save();
        if ($result) {
            $subject = Subjects::where('deleted_at', null)->orderBy('id', 'DESC')->first();
            $multiSelectDepartments =json_decode( $request->multiSelectDepartments) ;
            foreach($multiSelectDepartments as $department){
                $obj = SubjectsAndDepartments::where('deleted_at', null)->where('department', $department)->where('subject', $subject->id)->first();
                $education_Years = Education_Years::where('deleted_at', null)->orderBy('id', 'DESC')->first();
                if (empty($obj)) {

                    $obj = new SubjectsAndDepartments();

                    $obj->subject = $subject->id;
                    $obj->department = $department;
                    $obj->stage = $request->subjects_subjectStage ;
                    $obj->theory = $request->subjects_theory;
                    $obj->practice = $request->subjects_practice;
                    $obj->education_type = $request->setSubjects_educationType;
                    $obj->education_years	 = $education_Years->id;
                      $obj->admin = Auth::User()->id;
                    $result = $obj->save();
                }
            }
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
        $obj = Subjects::find($request->id);
        if ($obj!=null) {
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
        $obj = Subjects::find($request->id);
        if ($obj!=null) {
            $obj->code = $request->subjects_code;
            $obj->name_kr = $request->subjects_name_kr;
            $obj->name_ar = $request->subjects_name_ar;
            $obj->name_en = $request->subjects_name_en;

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
    public function getSubjectsAllData(Request $request)
    {
        //
        $obj = Subjects::where('deleted_at', null)->get();
        if ($obj!=null) {
            return json_encode($obj);
        } else {
            return '';
        }
    }
    public function getSubjectsAllDataByDepartmentsAndStages(Request $request)
    {
        //

        $obj = Subjects::join('subjects_and_departments', 'subjects_and_departments.subject', '=', 'subjects.id')  ->select('subjects_and_departments.id as subjects_and_departmentsID','subjects.*' )
        ->where('subjects_and_departments.department', $request->department)->where('subjects_and_departments.stage', $request->stage)->where('subjects_and_departments.deleted_at', null)->get();
        if ($obj!=null) {
            return json_encode($obj);
        } else {
            return '';
        }
    }
    public function getSubjectsAllDataByDepartments(Request $request)
    {
        //

        $obj = Subjects::join('subjects_and_departments', 'subjects_and_departments.subject', '=', 'subjects.id')  ->select('subjects_and_departments.id as subjects_and_departmentsID','subjects.*' )
        ->where('subjects_and_departments.department', $request->department)->where('subjects_and_departments.deleted_at', null)->get();
        if ($obj!=null) {
            return json_encode($obj);
        } else {
            return '';
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
        $obj = Subjects::find($request->id);
        if ($obj!=null) {
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
