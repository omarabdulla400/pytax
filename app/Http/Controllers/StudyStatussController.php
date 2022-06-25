<?php

namespace App\Http\Controllers;
use App\Models\StudyStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
class StudyStatussController extends Controller
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
            return view('administration.studyStatuss');
        }else{
            return view('login');
        }

    }
    public function getStudyStatuss(Request $request)
    {
        //
        $objs = StudyStatus::where('deleted_at', null)->get();
        if ($objs !=null) {
            $data = [];
            $count = 1;
            foreach ($objs as $obj) {
                $sub_array = [];

                $sub_array[] = '<tr><td>' . $count . '</td>';
                $sub_array[] = '<td>' . $obj->name_kr . '</td>';
                $sub_array[] = '<td>' . $obj->stop . '</td>';

                $sub_array[] =
                    '   <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                type="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <span class="text-muted sr-only">Action</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right" >
                <a class="dropdown-item" href="javascript:void(0);" onclick="studyStatussEdit(' .
                    $obj->id .
                    ');">' .
                    __('language.update') .
                    '</a>
                <a class="dropdown-item" href="javascript:void(0);"  onclick="studyStatussRemove(' .
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
        $obj = new StudyStatus();
        $obj->name_kr = $request->studyStatuss_name_kr;
        $obj->name_ar = $request->studyStatuss_name_ar;
        $obj->name_en = $request->studyStatuss_name_en;
          $obj->admin = Auth::User()->id;
        if (isset($request->studyStatuss_stop)) {
            // checked
            $obj->stop = 1;
        }
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
        $obj = StudyStatus::find($request->id);
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
        $obj = StudyStatus::find($request->id);
        if ($obj !=null) {
            $obj->name_kr = $request->studyStatuss_name_kr;
            $obj->name_ar = $request->studyStatuss_name_ar;
            $obj->name_en = $request->studyStatuss_name_en;
            if (isset($request->studyStatuss_stop)) {
                // checked
                $obj->stop = 1;
            }
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
    public function getStudyStatusAllData(Request $request)
    {
        //
        $obj = StudyStatus::where('deleted_at', null)->get();
        if ($obj !=null) {
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
        $obj = StudyStatus::find($request->id);
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
