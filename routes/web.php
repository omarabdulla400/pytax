<?php

use App\Http\Controllers\SemestersController;
use App\Http\Controllers\StudentResultsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComponentsController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\EducationYearsController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\StagesController;
use App\Http\Controllers\EducationTypesController;
use App\Http\Controllers\EducationLevelsController;

use App\Http\Controllers\CovermentRolesController;

use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\SubjectsAndDepartmentsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\StudyTypesController;
use App\Http\Controllers\StudyStatussController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SetSubjectsController;

use App\Http\Controllers\RolesController;

use App\Http\Controllers\RoleNamesController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Cookie;

Route::POST('/userLogin', [AuthController::class, 'login']);
Route::get('/login', function () {
    return view('login');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {

    $userToken =  Cookie::get('userToken');
    if ( $userToken != false && Auth::user()) {
        return view('admin');
    }else{
        return view('login');
    }
});
Route::get('/admin', function () {
    $userToken =  Cookie::get('userToken');
    if ( $userToken != false && Auth::User()) {
        return view('admin');
    }else{
        return view('login');
    }

});
Route::middleware('auth:sanctum')->group(function () {

    $userToken =  Cookie::get('userToken');
    if ( $userToken != false) {

        Route::get('/user', [AuthController::class, 'user']);
        Route::get('/logout', [AuthController::class, 'logout']);

        Route::get('/header', [ComponentsController::class, 'index']);
        Route::get('/getDashbordData', [ComponentsController::class, 'getDashbordData']);

        Route::get('/admins', [AdminsController::class, 'index']);
        Route::get('/getAdmins', [AdminsController::class, 'getAdmins']);
        Route::get('/getAdminData', [AdminsController::class, 'show']);
        Route::get('/validateEmail', [AdminsController::class, 'validateEmail']);
        Route::get('/AdminLogin', [AdminsController::class, 'AdminLogin']);
        Route::post('/storeAdmin', [AdminsController::class, 'store']);
        Route::post('/destroyAdmin', [AdminsController::class, 'destroy']);
        Route::post('/updateAdmin', [AdminsController::class, 'update']);

        Route::get('/years', [EducationYearsController::class, 'index']);
        Route::get('/getYears', [EducationYearsController::class, 'getYears']);
        Route::get('/getEducationYears', [EducationYearsController::class, 'getEducationYears']);
        Route::get('/getEducationYearsData', [EducationYearsController::class, 'show']);
        Route::post('/storeEducationYears', [EducationYearsController::class, 'store']);
        Route::post('/updateEducationYears', [EducationYearsController::class, 'update']);
        Route::post('/destroyEducationYears', [EducationYearsController::class, 'destroy']);

        Route::get('/departments', [DepartmentsController::class, 'index']);
        Route::get('/getDepartments', [DepartmentsController::class, 'getDepartments']);
        Route::get('/getDepartmentsData', [DepartmentsController::class, 'show']);
        Route::get('/getDepartmentsAllData', [DepartmentsController::class, 'getDepartmentsAllData']);
        Route::post('/storeDepartments', [DepartmentsController::class, 'store']);
        Route::post('/destroyDepartments', [DepartmentsController::class, 'destroy']);
        Route::post('/updateDepartments', [DepartmentsController::class, 'update']);


        Route::get('/stages', [StagesController::class, 'index']);
        Route::get('/getStages', [StagesController::class, 'getStages']);
        Route::get('/getStagesData', [StagesController::class, 'show']);
        Route::get('/getStageAllData', [StagesController::class, 'getStageAllData']);
        Route::post('/storeStages', [StagesController::class, 'store']);
        Route::post('/destroyStages', [StagesController::class, 'destroy']);
        Route::post('/updateStages', [StagesController::class, 'update']);


        Route::get('/educationTypes', [EducationTypesController::class, 'index']);
        Route::get('/getEducationTypes', [EducationTypesController::class, 'getEducationTypes']);
        Route::get('/getEducationTypesData', [EducationTypesController::class, 'show']);
        Route::get('/getEducationTypesAllData', [EducationTypesController::class, 'getEducationTypesAllData']);

        Route::post('/storeEducationTypes', [EducationTypesController::class, 'store']);
        Route::post('/destroyEducationTypes', [EducationTypesController::class, 'destroy']);
        Route::post('/updateEducationTypes', [EducationTypesController::class, 'update']);

        Route::get('/educationLevels', [EducationLevelsController::class, 'index']);
        Route::get('/getEducationLevels', [EducationLevelsController::class, 'getEducationLevels']);
        Route::get('/getEducationLevelsData', [EducationLevelsController::class, 'show']);
        Route::get('/getAllEducationLevel', [EducationLevelsController::class, 'getAllEducationLevel']);
        Route::post('/storeEducationLevels', [EducationLevelsController::class, 'store']);
        Route::post('/destroyEducationLevels', [EducationLevelsController::class, 'destroy']);
        Route::post('/updateEducationLevels', [EducationLevelsController::class, 'update']);


        Route::get('/covermentRole', [CovermentRolesController::class, 'index']);
        Route::get('/getCovermentRoles', [CovermentRolesController::class, 'getCovermentRoles']);
        Route::get('/getCovermentRolesData', [CovermentRolesController::class, 'show']);
        Route::post('/storeCovermentRoles', [CovermentRolesController::class, 'store']);
        Route::post('/destroyCovermentRoles', [CovermentRolesController::class, 'destroy']);
        Route::post('/updateCovermentRoles', [CovermentRolesController::class, 'update']);



        Route::get('/subjects', [SubjectsController::class, 'index']);
        Route::get('/getSubjects', [SubjectsController::class, 'getSubjects']);
        Route::get('/getSubjectsData', [SubjectsController::class, 'show']);
        Route::get('/getSubjectsAllData', [SubjectsController::class, 'getSubjectsAllData']);
        Route::get('/getSubjectsAllData', [SubjectsController::class, 'getSubjectsAllData']);
        Route::get('/getSubjectsAllDataByDepartments', [SubjectsController::class, 'getSubjectsAllDataByDepartments']);
        Route::get('/getSubjectsAllDataByDepartmentsAndStages', [SubjectsController::class, 'getSubjectsAllDataByDepartmentsAndStages']);
        Route::post('/storeSubjects', [SubjectsController::class, 'store']);
        Route::post('/destroySubjects', [SubjectsController::class, 'destroy']);
        Route::post('/updateSubjects', [SubjectsController::class, 'update']);

        Route::get('/getSubjectsAndDepartments', [SubjectsAndDepartmentsController::class, 'getSubjectsAndDepartments']);
        Route::post('/storeSubjectsAndDepartments', [SubjectsAndDepartmentsController::class, 'store']);
        Route::post('/destroySubjectsAndDepartmentsController', [SubjectsAndDepartmentsController::class, 'destroy']);

        Route::get('/teachers', [TeachersController::class, 'index']);
        Route::get('/getTeachers', [TeachersController::class, 'getTeachers']);
        Route::get('/getTeacherData', [TeachersController::class, 'show']);
        Route::get('/getTeachersAllData', [TeachersController::class, 'getTeachersAllData']);
        Route::get('/validateTeacherEmail', [TeachersController::class, 'validateEmail']);
        Route::get('/TeacherLogin', [TeachersController::class, 'teacherLogin']);
        Route::post('/storeTeacher', [TeachersController::class, 'store']);
        Route::post('/destroyTeacher', [TeachersController::class, 'destroy']);
        Route::post('/updateTeacher', [TeachersController::class, 'update']);


        Route::get('/studyTypes', [StudyTypesController::class, 'index']);
        Route::get('/getStudyTypes', [StudyTypesController::class, 'getStudyTypes']);
        Route::get('/getStudyTypesData', [StudyTypesController::class, 'show']);
        Route::get('/getStudyTypesAllData', [StudyTypesController::class, 'getStudyTypesAllData']);
        Route::post('/storeStudyTypes', [StudyTypesController::class, 'store']);
        Route::post('/destroyStudyTypes', [StudyTypesController::class, 'destroy']);
        Route::post('/updateStudyTypes', [StudyTypesController::class, 'update']);


        Route::get('/studyStatuss', [StudyStatussController::class, 'index']);
        Route::get('/getStudyStatuss', [StudyStatussController::class, 'getStudyStatuss']);
        Route::get('/getStudyStatussData', [StudyStatussController::class, 'show']);
        Route::get('/getStudyStatusAllData', [StudyStatussController::class, 'getStudyStatusAllData']);
        Route::post('/storeStudyStatuss', [StudyStatussController::class, 'store']);
        Route::post('/destroyStudyStatuss', [StudyStatussController::class, 'destroy']);
        Route::post('/updateStudyStatuss', [StudyStatussController::class, 'update']);


        Route::get('/students', [StudentsController::class, 'index']);
        Route::get('/getStudents', [StudentsController::class, 'getStudents']);
        Route::get('/getStudentData', [StudentsController::class, 'show']);
        Route::post('/storeStudent', [StudentsController::class, 'store']);
        Route::post('/destroyStudent', [StudentsController::class, 'destroy']);
        Route::post('/updateStudent', [StudentsController::class, 'update']);


        Route::get('/setSubjects', [SetSubjectsController::class, 'index']);
        Route::get('/getSetSubjects', [SetSubjectsController::class, 'getSetSubjects']);
        Route::get('/getSetSubjectsData', [SetSubjectsController::class, 'show']);

        Route::post('/storeSetSubjects', [SetSubjectsController::class, 'store']);
        Route::post('/destroySetSubjects', [SetSubjectsController::class, 'destroy']);
        Route::post('/updateSetSubjects', [SetSubjectsController::class, 'update']);

       

        Route::get('/studentResult', [StudentResultsController::class, 'index']);
        Route::get('/getStudentResultSet', [StudentResultsController::class, 'getStudentResultSet']);
        Route::post('/storeStudentResult', [StudentResultsController::class, 'store']);
        Route::post('/updateStudentResult', [StudentResultsController::class, 'update']);

        Route::get('/semester', [SemestersController::class, 'index']);
        Route::get('/getSemesters', [SemestersController::class, 'getSemesters']);
        Route::get('/getSemestersData', [SemestersController::class, 'show']);
        Route::get('/getSemestersAllData', [SemestersController::class, 'getSemestersData']);
        Route::post('/storeSemesters', [SemestersController::class, 'store']);
        Route::post('/destroySemesters', [SemestersController::class, 'destroy']);
        Route::post('/updateSemesters', [SemestersController::class, 'update']);
        Route::get('/showStudentResult', [StudentResultsController::class, 'showStudentResult']);
        Route::get('/getStudentResultShow', [StudentResultsController::class, 'getStudentResultShow']);


        Route::get('/getRolesAllData', [RolesController::class, 'getRolesAllData']);
        Route::get('/roles', [RolesController::class, 'index']);
        Route::get('/getRoles', [RolesController::class, 'getRoles']);
        Route::post('/storeRoles', [RolesController::class, 'store']);
        Route::post('/updateRoles', [RolesController::class, 'update']);
        Route::get('/getRolesData', [RolesController::class, 'show']);
        Route::post('/destroyRoles', [RolesController::class, 'destroy']);


        Route::get('/getRoleNamesAllData', [RoleNamesController::class, 'getRoleNamesAllData']);
        Route::get('/roleNames', [RoleNamesController::class, 'index']);
        Route::get('/getRoleNames', [RoleNamesController::class, 'getRoleNames']);
        Route::post('/storeRoleNames', [RoleNamesController::class, 'store']);
        Route::post('/updateRoleNames', [RoleNamesController::class, 'update']);
        Route::get('/getRoleNamesData', [RoleNamesController::class, 'show']);
        Route::post('/destroyRoleNames', [RoleNamesController::class, 'destroy']);
    } else {
        return view('login');
    }
});
