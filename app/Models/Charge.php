<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'year_id', 'amount', 'financialTransactionId', 'item_id', 'transaction_id', 'used', 'type'];
    protected $connection = 'mysql2';
    protected $table = 'charges';
}
