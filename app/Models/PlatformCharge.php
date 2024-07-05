<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatformCharge extends Model
{
    use HasFactory;
    protected $fillable = ['year_id', 'yearly_amount'];
    protected $connection = 'mysql2';
    protected $table = 'platform_charges';
}
