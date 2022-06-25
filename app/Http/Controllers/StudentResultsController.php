<?php

namespace App\Http\Controllers;

use App\Models\Stages;
use App\Models\StudentResults;
use App\Models\Students;
use App\Models\StudyStatus;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class StudentResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $userToken = Cookie::get('userToken');
        if ($userToken != false && Auth::user()) {
            return view('administration.studentSetResult');
        } else {
            return view('login');
        }

    }

    public function showStudentResult()
    {
        //
        $userToken = Cookie::get('userToken');
        if ($userToken != false && Auth::user()) {
            return view('administration.showStudentResult');
        } else {
            return view('login');
        }

    }

    public function getStudentResultSet(Request $request)
    {
        //
        $data = '';
        if ($request->subject == "") {
            $data = '<div class="card shadow">
            <div class="card-body"><table class="table datatables" id="dataTable-studentStudentSubjectSemesterExamandactivty">
            <thead>
                <tr>

                    <th>#</th>
                    <th>' . __('language.student') . ' </th>
                    <th>' . __('language.activity') . '</th>
                    <th>' . __('language.final') . ' </th>
                    <th>' . __('language.result') . '  </th>

                </tr>
            </thead>
            <tbody>
            </tbody>
            </table>  </div>
            </div>';
            return $data;
        } else {
            $count = 1;
            $subject = Subjects::find($request->subject);
            $stage = Stages::find($request->stage);
            $count = 1;
            $data .= '<div class="card shadow">
            <div class="card-body"><table class="table datatables" id="dataTable-studentStudentSubjectSemesterExamandactivty">
            <thead>
                <tr>

                    <th>#</th>
                    <th>' . __('language.student') . ' </th>
                    <th>' . __('language.activity') . '</th>
                    <th>' . __('language.final') . ' </th>
                    <th>' . __('language.result') . '  </th>


                </tr>
            </thead>
            <tbody>';

            $objStudents = Students::join('departments', 'students.department', '=', 'departments.id')
                ->join('set_student_stages', 'students.id', '=', 'set_student_stages.student')
                ->select('students.*', 'set_student_stages.id as setStudentStage', 'set_student_stages.study_status as study_status')
                ->where('students.department', $request->department)->where('set_student_stages.stage', $request->stage)->get();

            foreach ($objStudents as $obj) {

                $objResult = StudentResults::join('set_student_stages', 'student_results.setStudentStage', '=', 'set_student_stages.id')
                    ->join('subjects_and_departments', 'student_results.subjects_and_departments', '=', 'subjects_and_departments.id')
                    ->select('student_results.*')->where('set_student_stages.stage', $request->stage)->where('set_student_stages.student', $obj->id)->where('subjects_and_departments.subject', $request->subject)
                    ->where('subjects_and_departments.department', $request->department)->first();
                $study_status = StudyStatus::find($obj->study_status);
                if ($objResult == null) {
                    $objS = new StudentResults();
                    $objS->setStudentStage = $obj->setStudentStage;
                    $objS->subjects_and_departments = $subject->subjectAndDepartments()->where("department", $request->department)->first()->id;
                    $objS->save();

                }
                $objResult = StudentResults::join('set_student_stages', 'student_results.setStudentStage', '=', 'set_student_stages.id')
                    ->join('subjects_and_departments', 'student_results.subjects_and_departments', '=', 'subjects_and_departments.id')
                    ->select('student_results.*')->where('set_student_stages.stage', $request->stage)->where('set_student_stages.student', $obj->id)->where('subjects_and_departments.subject', $request->subject)
                    ->where('subjects_and_departments.department', $request->department)->first();
                $activity = $objResult->activity;
                $final = $objResult->final;
                $result = $objResult->result;
                $data .= '<tr><td  data-id="' . $objResult->id . '" id="' . $count . '_id">' . $count . '</td>';
                $data .= '<td>' . $obj->name_kr . '</td>';
                if ($study_status->stop == 1) {
                    $data .= '<td colspan="2"> ' . $study_status->name_kr . '</td>';
                    $data .= '<td> <div class="form-row" style="margin-top: 1%;">
                     <div class="col-md-10 ">
                         <input type="number" class="form-control" id="' . $count . '_result_mark" required="" min="0" max="50" value="' . $result . '" disabled>
                         <div class="invalid-feedback">' . __('language.markRequired') . '</div>
                         <div class="valid-feedback"> ' . __('language.correctInfo') . ' </div>
                     </div>
                    </div></td>';
                } else {
                    $data .= '<td> <div class="form-row" style="margin-top: 1%;">
                     <div class="col-md-10 ">
                         <input type="number" class="form-control" id="' . $count . '_activity_mark"  required="" min="0" max="50" value="' . $activity . '" onchange="updateResultShow(' . $count . ')">
                         <div class="invalid-feedback">' . __('language.markRequired') . '</div>
                         <div class="valid-feedback"> ' . __('language.correctInfo') . ' </div>
                     </div>
                    </div></td>';
                    $data .= '<td> <div class="form-row" style="margin-top: 1%;">
                     <div class="col-md-10 ">
                         <input type="number" class="form-control" id="' . $count . '_final_mark" required="" min="0" max="50" value="' . $final . '" onchange="updateResultShow(' . $count . ')">
                         <div class="invalid-feedback">' . __('language.markRequired') . '</div>
                         <div class="valid-feedback"> ' . __('language.correctInfo') . ' </div>
                     </div>
                    </div></td>';
                    $data .= '<td> <div class="form-row" style="margin-top: 1%;">
                     <div class="col-md-10 ">
                         <input type="number" class="form-control" id="' . $count . '_result_mark" required="" min="0" max="50" value="' . $result . '" disabled>
                         <div class="invalid-feedback">' . __('language.markRequired') . '</div>
                         <div class="valid-feedback"> ' . __('language.correctInfo') . ' </div>
                     </div>
                    </div></td>';
                }

                $data .=
                    '</tr>';

                $count = $count + 1;
            }
        }
        if ($count > 1) {
            $data .= '<tr><td colspan="8">  <td>  <button studyStatuss="button" class="btn mb-2 btn-primary" onclick="setStudentMarks(' . $count . ')" >' . __('language.updateAll') . '</button></td></tr>
                </tbody>
                </table>  </div>
                </div>';
        } else {
            $data .= '
                </tbody>
                </table>  </div>
                </div>';
        }

        return $data;

    }

    public function getStudentResultShow(Request $request)
    {
        //
        $data = '';
        $count = 1;
        $numberOfPassedStudent = 0;
        $numberOfFailedStudent = 0;
        $numberOfPassedStudentGirl = 0;
        $numberOfPassedStudentBoy = 0;
        $numberOfFailedStudentGirl = 0;
        $numberOfFailedStudentBoy = 0;

        if ($request->stage != "" && is_null($request->subject)) {
            $stage = Stages::find($request->stage);
            $subjects = $stage->subjectAndDepartments()->where('department', $request->department)->get();
            $objStudents = Students::join('departments', 'students.department', '=', 'departments.id')
                ->join('set_student_stages', 'students.id', '=', 'set_student_stages.student')
                ->select('students.*', 'set_student_stages.id as setStudentStage')->where('students.department', $request->department)->where('set_student_stages.stage', $request->stage)->get();
            $data = '<div class="card shadow">
            <div class="card-body"><table class="table datatables" id="dataTable-studentStudentSubjectSemesterExamandactivty">
            <thead>
                <tr>

                    <th>#</th>
                    <th>' . __('language.student') . ' </th>';

            foreach ($subjects as $subject) {

                $data .= '     <th>' . $subject->subject()->first()->name_kr . ' </th>';
            }
            $data .= '
                    <th>' . __('language.examResult') . '  </th>
                     <th>' . __('language.numberSubjectFailed') . '  </th>
                        <th>' . __('language.wantedMark') . '  </th>
                </tr>
            </thead>
            <tbody>';
            foreach ($objStudents as $obj) {
                $passed = true;
                $numberSubjectFailed = 0;
                $wantedMark = 0;
                $data .= '<tr><td  data-id="' . $obj->id . '" id="' . $count . '_id">' . $count . '</td>';
                $data .= '<td>' . $obj->name_kr . '</td>';

                foreach ($subjects as $subject) {
                    $objResult = StudentResults::join('set_student_stages', 'student_results.setStudentStage', '=', 'set_student_stages.id')
                        ->join('subjects_and_departments', 'student_results.subjects_and_departments', '=', 'subjects_and_departments.id')
                        ->select('student_results.*')->where('set_student_stages.stage', $request->stage)->where('set_student_stages.student', $obj->id)->where('subjects_and_departments.subject', $subject->subject)
                        ->where('subjects_and_departments.department', $request->department)->first();
                    $activity = $objResult->activity;
                    $final = $objResult->final;
                    $result = $objResult->result;
                    $final_result = $objResult->final_result;
                    if ($result < 50 && $final_result == 0) {
                        $wantedMark = $wantedMark + (50 - $result);
                        $data .= '<td style="color: red;">' . $result . '</td>';
                        $numberSubjectFailed++;
                        $passed = false;
                    } else if ($final_result < 50) {
                        $wantedMark = $wantedMark + (50 - $final_result);
                        $data .= '<td style="color: red;">' . $final_result . '</td>';
                        $numberSubjectFailed++;
                        $passed = false;
                    } else if ($final_result >= 50) {
                        $data .= '<td>' . $final_result . '</td>';
                    } else {
                        $data .= '<td>' . $result . '</td>';
                    }
                }
                if ($passed) {
                    $numberOfPassedStudent++;
                    if ($obj->gender == "female") {
                        $numberOfPassedStudentGirl++;
                    } else {
                        $numberOfPassedStudentBoy++;
                    }
                    $data .= '<td>' . __('language.passed') . '</td>';
                } else {
                    $numberOfFailedStudent++;
                    if ($obj->gender == "female") {
                        $numberOfFailedStudentGirl++;
                    } else {
                        $numberOfFailedStudentBoy++;
                    }
                    $data .= '<td>' . __('language.failed') . '</td>';
                }
                $data .= '<td>' . $numberSubjectFailed . '</td>';
                $data .= '<td>' . $wantedMark . '</td>';
                $data .= '</tr>';
                $count = $count + 1;
            }
            if ($count > 1) {
                $data .= '
                </tbody>
                </table>  </div>
                </div>';
            } else {
                $data .= '
                </tbody>
                </table>  </div>
                </div>';
            }
            $boyResult = '<div class="col pr-0">
                                                    <p class="small text-muted mb-0" >' . __("language.passedStudent") . ' : ' . $numberOfPassedStudentBoy . '</p>

                                                </div>';
            $boyResult .= '<div class="col pr-0">
                                                    <p class="small text-muted mb-0" >' . __("language.failedStudent") . ' : ' . $numberOfFailedStudentBoy . '</p>

                                                </div>';

            $girlResult = '<div class="col pr-0">
                                                    <p class="small text-muted mb-0" >' . __("language.passedStudent") . ': ' . $numberOfPassedStudentGirl . '</p>

                                                </div>';
            $girlResult .= '<div class="col pr-0">
                                                    <p class="small text-muted mb-0" >' . __("language.failedStudent") . ' : ' . $numberOfFailedStudentGirl . '</p>

                                                </div>';
            $output = [
                "data" => $data,
                "numberOfPassedStudent" => $numberOfPassedStudent,
                "numberOfFailedStudent" => $numberOfFailedStudent,
                "boyResult" => $boyResult,
                "girlResult" => $girlResult,

            ];
            return json_encode($output);
        } else if ($request->subject != "") {

            $count = 1;
            $subject = Subjects::find($request->subject);
            $stage = Stages::find($request->stage);
            $count = 1;
            $data .= '<div class="card shadow">
            <div class="card-body"><table class="table datatables" id="dataTable-studentStudentSubjectSemesterExamandactivty">
            <thead>
                <tr>

                    <th>#</th>
                    <th>' . __('language.student') . ' </th>
                    <th>' . __('language.activity') . '</th>
                    <th>' . __('language.final') . ' </th>
                    <th>' . __('language.result') . '  </th>
                     <th>' . __('language.second_semester') . ' </th>
                    <th>' . __('language.final_result') . '  </th>


                </tr>
            </thead>
            <tbody>';

            $objStudents = Students::join('departments', 'students.department', '=', 'departments.id')
                ->join('set_student_stages', 'students.id', '=', 'set_student_stages.student')
                ->select('students.*', 'set_student_stages.id as setStudentStage', 'set_student_stages.study_status as study_status')
                ->where('students.department', $request->department)->where('set_student_stages.stage', $request->stage)->get();

            foreach ($objStudents as $obj) {
                $passed = true;
                $objResult = StudentResults::join('set_student_stages', 'student_results.setStudentStage', '=', 'set_student_stages.id')
                    ->join('subjects_and_departments', 'student_results.subjects_and_departments', '=', 'subjects_and_departments.id')
                    ->select('student_results.*')->where('set_student_stages.stage', $request->stage)->where('set_student_stages.student', $obj->id)->where('subjects_and_departments.subject', $request->subject)
                    ->where('subjects_and_departments.department', $request->department)->first();
                $study_status = StudyStatus::find($obj->study_status);
                if ($objResult == null) {
                    $objS = new StudentResults();
                    $objS->setStudentStage = $obj->setStudentStage;
                    $objS->subjects_and_departments = $subject->subjectAndDepartments()->where("department", $request->department)->first()->id;
                    $objS->save();

                }
                $objResult = StudentResults::join('set_student_stages', 'student_results.setStudentStage', '=', 'set_student_stages.id')
                    ->join('subjects_and_departments', 'student_results.subjects_and_departments', '=', 'subjects_and_departments.id')
                    ->select('student_results.*')->where('set_student_stages.stage', $request->stage)->where('set_student_stages.student', $obj->id)->where('subjects_and_departments.subject', $request->subject)
                    ->where('subjects_and_departments.department', $request->department)->first();
                $activity = $objResult->activity;
                $final = $objResult->final;
                $result = $objResult->result;
                $second_semester = $objResult->second_semester;
                $final_result = $objResult->final_result;
                $data .= '<tr><td  data-id="' . $objResult->id . '" id="' . $count . '_id">' . $count . '</td>';
                $data .= '<td>' . $obj->name_kr . '</td>';
                if ($study_status->stop == 1) {

                    $data .= '<td colspan="2"> ' . $study_status->name_kr . '</td>';
                    $data .= '<td> <div class="form-row" style="margin-top: 1%;">
                     <div class="col-md-10 ">
                         <input type="number" class="form-control" id="' . $count . '_result_mark" required="" min="0" max="50" value="' . $result . '" disabled>
                         <div class="invalid-feedback">' . __('language.markRequired') . '</div>
                         <div class="valid-feedback"> ' . __('language.correctInfo') . ' </div>
                     </div>
                    </div></td>';
                } else {
                    $data .= '<td> <div class="form-row" style="margin-top: 1%;">
                     <div class="col-md-10 ">
                         <input type="number" class="form-control" id="' . $count . '_activity_mark"  required="" min="0" max="50" value="' . $activity . '" onchange="updateResultShow(' . $count . ')">
                         <div class="invalid-feedback">' . __('language.markRequired') . '</div>
                         <div class="valid-feedback"> ' . __('language.correctInfo') . ' </div>
                     </div>
                    </div></td>';
                    $data .= '<td> <div class="form-row" style="margin-top: 1%;">
                     <div class="col-md-10 ">
                         <input type="number" class="form-control" id="' . $count . '_final_mark" required="" min="0" max="50" value="' . $final . '" onchange="updateResultShow(' . $count . ')">
                         <div class="invalid-feedback">' . __('language.markRequired') . '</div>
                         <div class="valid-feedback"> ' . __('language.correctInfo') . ' </div>
                     </div>
                    </div></td>';
                    $data .= '<td> <div class="form-row" style="margin-top: 1%;">
                     <div class="col-md-10 ">
                         <input type="number" class="form-control" id="' . $count . '_result_mark" required="" min="0" max="50" value="' . $result . '" disabled>
                         <div class="invalid-feedback">' . __('language.markRequired') . '</div>
                         <div class="valid-feedback"> ' . __('language.correctInfo') . ' </div>
                     </div>
                    </div></td>';
                    if ($result < 50) {
                        $data .= '<td> <div class="form-row" style="margin-top: 1%;">
                     <div class="col-md-10 ">
                         <input type="number" class="form-control" id="' . $count . '_second_semester" required="" min="0" max="50" value="' . $second_semester . '" onchange="updateResultShowSecondSemester(' . $count . ')">
                         <div class="invalid-feedback">' . __('language.markRequired') . '</div>
                         <div class="valid-feedback"> ' . __('language.correctInfo') . ' </div>
                     </div>
                    </div></td>';
                        $data .= '<td> <div class="form-row" style="margin-top: 1%;">
                     <div class="col-md-10 ">
                         <input type="number" class="form-control" id="' . $count . '_final_result" required="" min="0" max="50" value="' . $final_result . '" disabled>
                         <div class="invalid-feedback">' . __('language.markRequired') . '</div>
                         <div class="valid-feedback"> ' . __('language.correctInfo') . ' </div>
                     </div>
                    </div></td>';
                    }
                    if ($result < 50) {
                        $passed = false;
                        if ($final_result > 50) {
                            $passed = true;
                        }
                    }


                }

                $data .=
                    '</tr>';

                $count = $count + 1;
                if ($passed) {
                    $numberOfPassedStudent++;
                    if ($obj->gender == "female") {
                        $numberOfPassedStudentGirl++;
                    } else {
                        $numberOfPassedStudentBoy++;
                    }

                } else {
                    $numberOfFailedStudent++;
                    if ($obj->gender == "female") {
                        $numberOfFailedStudentGirl++;
                    } else {
                        $numberOfFailedStudentBoy++;
                    }
                }
            }
        }
        if ($count > 1) {
            $data .= '<tr><td colspan="8">  <td>  <button studyStatuss="button" class="btn mb-2 btn-primary" onclick="setStudentMarksShow(' . $count . ')" >' . __('language.updateAll') . '</button></td></tr>
                </tbody>
                </table>  </div>
                </div>';
        } else {
            $data .= '
                </tbody>
                </table>  </div>
                </div>';
        }
        $boyResult = '<div class="col pr-0">
                                                    <p class="small text-muted mb-0" >' . __("language.passedStudent") . ' : ' . $numberOfPassedStudentBoy . '</p>

                                                </div>';
        $boyResult .= '<div class="col pr-0">
                                                    <p class="small text-muted mb-0" >' . __("language.failedStudent") . ' : ' . $numberOfFailedStudentBoy . '</p>

                                                </div>';

        $girlResult = '<div class="col pr-0">
                                                    <p class="small text-muted mb-0" >' . __("language.passedStudent") . ': ' . $numberOfPassedStudentGirl . '</p>

                                                </div>';
        $girlResult .= '<div class="col pr-0">
                                                    <p class="small text-muted mb-0" >' . __("language.failedStudent") . ' : ' . $numberOfFailedStudentGirl . '</p>

                                                </div>';
        $output = [
            "data" => $data,
            "numberOfPassedStudent" => $numberOfPassedStudent,
            "numberOfFailedStudent" => $numberOfFailedStudent,
            "boyResult" => $boyResult,
            "girlResult" => $girlResult,

        ];
        return json_encode($output);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        $studentResultList = json_decode($request->studentResultList);
        $activityList = json_decode($request->activityList);
        $finalList = json_decode($request->finalList);
        for ($i = 0; $i < count($studentResultList); $i++) {
            $obj = StudentResults::find($studentResultList[$i]);
            if ($obj == null) {
                $obj = new StudentResults();
            }
            $obj->activity = $activityList[$i];
            $obj->final = $finalList[$i];
            $obj->result = $activityList[$i] + $finalList[$i];
            $obj->second_semester = 0;
            $obj->final_result = 0;
            $obj->admin = Auth::User()->id;
            $result = $obj->save();
        }

        return __('language.addSuccessfully');
    }

    public function update(Request $request)
    {
        //
        $studentResultList = json_decode($request->studentResultList);
        $activityList = json_decode($request->activityList);
        $finalList = json_decode($request->finalList);
        $second_semesterList = json_decode($request->second_semesterList);
        $final_resultList = json_decode($request->final_resultList);
        for ($i = 0; $i < count($studentResultList); $i++) {
            $obj = StudentResults::find($studentResultList[$i]);
            if ($obj == null) {
                $obj = new StudentResults();
            }
            $obj->activity = $activityList[$i];
            $obj->final = $finalList[$i];
            $obj->result = $activityList[$i] + $finalList[$i];
            $obj->second_semester = $second_semesterList[$i];
            $obj->final_result = $final_resultList[$i];
            $obj->admin = Auth::User()->id;
            $result = $obj->save();
        }

        return __('language.addSuccessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(Request $request)
    {
        //
        $obj = Subjects::find($request->id);
        if ($obj != null) {
            return json_encode($obj);
        } else {
            return '';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */

    public function getSubjectsAllData(Request $request)
    {
        //
        $obj = Subjects::where('deleted_at', null)->get();
        if ($obj != null) {
            return json_encode($obj);
        } else {
            return '';
        }
    }

    public function getSubjectsAllDataByDepartmentsAndStages(Request $request)
    {
        //

        $obj = Subjects::join('subjects_and_departments', 'subjects_and_departments.subject', '=', 'subjects.id')->select('subjects_and_departments.id as subjects_and_departmentsID', 'subjects.*')
            ->where('subjects_and_departments.department', $request->department)->where('subjects_and_departments.stage', $request->stage)->where('subjects_and_departments.deleted_at', null)->get();
        if ($obj != null) {
            return json_encode($obj);
        } else {
            return '';
        }
    }

    public function getSubjectsAllDataByDepartments(Request $request)
    {
        //

        $obj = Subjects::join('subjects_and_departments', 'subjects_and_departments.subject', '=', 'subjects.id')->select('subjects_and_departments.id as subjects_and_departmentsID', 'subjects.*')
            ->where('subjects_and_departments.department', $request->department)->where('subjects_and_departments.deleted_at', null)->get();
        if ($obj != null) {
            return json_encode($obj);
        } else {
            return '';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request,)
    {
        //
        $obj = Subjects::find($request->id);
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
