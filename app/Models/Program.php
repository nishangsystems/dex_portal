<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'programs';
    protected $fillable = ['name'];

    public function applications()
    {
        # code...
        return $this->hasMany(ApplicationForm::class, 'program');
    }

}
