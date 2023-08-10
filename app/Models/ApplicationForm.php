<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $fillable = [
        'student_id', 'year_id', 'gender', 'name', 'dob', 'id_card_number', 'id_date_of_issue', 'id_place_of_issue', 'nationality', 'country_of_birth', 'referer', 'pob', 'region', 'residence', 'phone', 'extra_phone', 'email',
        'program', 'guardian', 'guardian_phone', 'guardian_address', 'sponsor', 'sponsor_phone', 'sponsor_address', 'secondary_school', 'secondary_exam_center', 'secondary_candidate_number', 'secondary_exam_year', 'gce_ol_record',
        'high_school', 'high_school_exam_center', 'high_school_candidate_number', 'high_school_exam_year', 'gce_al_record', 'matric',
        'candidate_declaration', 'parent_declaration', 'degree_id', 'admitted', 'submitted', 'momo_number', 'transaction_id'
    ];

    public function student()
    {
        # code...
        return $this->belongsTo(Students::class, 'student_id');
    }

    public function degree()
    {
        # code...
        return $this->belongsTo(Degree::class);
    }

    public function year()
    {
        # code...
        return $this->belongsTo(Batch::class, 'year_id');
    }

    public function _region()
    {
        # code...
        return $this->belongsTo(Region::class, 'region');
    }

    public function campus_banks()
    {
        return CampusBank::where('campus_id', $this->campus_id);
    }

    public function _program()
    {
        # code...
        return $this->belongsTo(Program::class, 'program');
    }

}
