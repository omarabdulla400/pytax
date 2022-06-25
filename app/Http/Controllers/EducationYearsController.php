<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education_Years;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
class EducationYearsController extends Controller
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
            return view('administration.years');
        }else{
            return view('login');
        }

    }
    public function getEducationYears(Request $request)
    {
        //
        $objs = Education_Years::where('deleted_at', null)->get();
        if ($objs != null) {
            $data = [];
            $count = 1;
            foreach ($objs as $obj) {
                $sub_array = [];
                $state = '';
                switch ($obj->state) {
                    case 1:
                        $state= __('language.active');
                        break;
                    case 2:
                        $state= __('language.unActive');
                        break;
                    case 3:
                        $state= __('language.archive');
                        break;
                }
                $sub_array[] = '<tr><td>' . $count . '</td>';
                $sub_array[] = '<td>' . $obj->start . '</td>';
                $sub_array[] = '<td>' . $obj->end . '</td>';
                $sub_array[] = '<td>' . $state . '</td>';

                $sub_array[] =
                    '   <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                type="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <span class="text-muted sr-only">Action</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right" >
                <a class="dropdown-item" href="javascript:void(0);" onclick="educationYearsEdit(' .
                    $obj->id .
                    ');">' .
                    __('language.update') .
                    '</a>
                <a class="dropdown-item" href="javascript:void(0);"  onclick="educationYearsRemove(' .
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
        $obj = new Education_Years();
        $obj->start = $request->educationYears_start;
        $obj->end = $request->educationYears_end;
        $obj->state = $request->educationYears_state;
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
        $obj = Education_Years::find($request->id);
        if ($obj != null) {
            return json_encode($obj);
        } else {
            return '';
        }
    }
    public function getYears(Request $request)
    {
        //
        $obj = Education_Years::where('deleted_at', null)->where('state', 1)->get();
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
        $obj = Education_Years::find($request->id);
        if ($obj != null) {
            $obj->start = $request->educationYears_start;
            $obj->end = $request->educationYears_end;
            $obj->state = $request->educationYears_state;
            $obj->admin = Auth::User()->id;
            $obj->updated_at=Now();
            $result = $obj->save();
            if ($result) {
                return __('language.updateSuccessfully');
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
        $obj = Education_Years::find($request->id);
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
