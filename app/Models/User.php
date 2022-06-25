<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function admin()
    {
        return $this->belongsTo(Admins::class,'accountId','id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teachers::class,'accountId','id');
    }
    public function adminAccount()
    {
        return $this->hasMany(Admins::class,'admin','id');
    }
    public function teachersAccount()
    {
        return $this->hasMany(Teachers::class,'admin','id');
    }
    public function covermentRoles()
    {
        return $this->hasMany(CovermentRoles::class,'admin','id');
    }
    public function departments()
    {
        return $this->hasMany(Departments::class,'admin','id');
    }

    public function education_Years()
    {
        return $this->hasMany(Education_Years::class,'admin','id');
    }
    public function educationLevels()
    {
        return $this->hasMany(EducationLevels::class,'admin','id');
    }

    public function roles()
    {
        return $this->hasMany(Roles::class,'admin','id');
    }
    public function semester_examandactivty()
    {
        return $this->hasMany(Semester_examandactivty::class,'admin','id');
    }

    public function semesters()
    {
        return $this->hasMany(Semesters::class,'admin','id');
    }
    public function setStudentStages()
    {
        return $this->hasMany(SetStudentStages::class,'admin','id');
    }
    public function SetSubjects()
    {
        return $this->hasMany(SetSubjects::class,'admin','id');
    }
    public function Stages()
    {
        return $this->hasMany(Stages::class,'admin','id');
    }
    public function Students()
    {
        return $this->hasMany(Students::class,'admin','id');
    }
    public function StudentSubjectSemesterExamandactivty()
    {
        return $this->hasMany(StudentSubjectSemesterExamandactivty::class,'admin','id');
    }
    public function StudyStatus()
    {
        return $this->hasMany(StudyStatus::class,'admin','id');
    }
    public function StudyTypes()
    {
        return $this->hasMany(StudyTypes::class,'admin','id');
    }
    public function Subjects()
    {
        return $this->hasMany(Subjects::class,'admin','id');
    }
    public function SubjectsAndDepartments()
    {
        return $this->hasMany(SubjectsAndDepartments::class,'admin','id');
    }
    public function SubjectSemesterExamandactivty()
    {
        return $this->hasMany(SubjectSemesterExamandactivty::class,'admin','id');
    }
    public function studentResults()
    {
        return $this->hasMany(StudentResults::class,'admin','id');
    }

}
