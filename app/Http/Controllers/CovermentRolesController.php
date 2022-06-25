<?php

namespace App\Http\Controllers;
use App\Models\CovermentRoles;
use Illuminate\Http\Request;
use App\Models\Education_Years;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
class CovermentRolesController extends Controller
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
            return view('administration.covermentRoles');
        }else{
            return view('login');
        }

    }
    public function getCovermentRoles(Request $request)
    {
        //
        $objs = CovermentRoles::where('deleted_at', null)->get();
        if ($objs !=null) {
            $data = [];
            $count = 1;
            foreach ($objs as $obj) {
                $sub_array = [];

                $sub_array[] = '<tr><td>' . $count . '</td>';
                $sub_array[] = '<td>' . $obj->number . '</td>';
                $sub_array[] = '<td>' . $obj->name_kr . '</td>';
                $sub_array[] = '<td>' . $obj->semester()->first()->name_kr . '</td>';
                $sub_array[] = '<td>' . $obj->mark . '</td>';
                $sub_array[] = '<td>' . $obj->ranges . '</td>';
                $sub_array[] = '<td>' . $obj-> education_years()->first()->start .' - '.$obj-> education_years()->first()->end . '</td>';

                $sub_array[] =
                    '   <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                type="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <span class="text-muted sr-only">Action</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right" >
                <a class="dropdown-item" href="javascript:void(0);" onclick="covermentRolesEdit(' .
                    $obj->id .
                    ');">' .
                    __('language.update') .
                    '</a>
                <a class="dropdown-item" href="javascript:void(0);"  onclick="covermentRolesRemove(' .
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
        $obj = new CovermentRoles();
        $obj->number = $request->covermentRoles_number;
        $obj->mark = $request->covermentRoles_mark;
        $obj->ranges = $request->covermentRoles_ranges;
        $obj->name_kr = $request->covermentRoles_name_kr;
        $obj->name_ar = $request->covermentRoles_name_ar;
        $obj->name_en = $request->covermentRoles_name_en;
        $obj->year = $request->covermentRoles_year;
        $obj->year = $request->covermentRoles_semester;
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
        $obj = CovermentRoles::find($request->id);
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
        $obj = CovermentRoles::find($request->id);
        if ($obj !=null) {
            $obj->number = $request->covermentRoles_number;
            $obj->mark = $request->covermentRoles_mark;
            $obj->ranges = $request->covermentRoles_ranges;
            $obj->name_kr = $request->covermentRoles_name_kr;
            $obj->name_ar = $request->covermentRoles_name_ar;
            $obj->name_en = $request->covermentRoles_name_en;
            $obj->year = $request->covermentRoles_year;
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
        $obj = CovermentRoles::find($request->id);
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
