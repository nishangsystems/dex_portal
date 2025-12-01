<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppLisense extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $fillable = ['plan', 'expiry_date'];
    protected $table = "app_lisenses";
    protected $dates = ['expiry_date', 'created_at'];

    public function is_active(){
        $expiry = $this->expiry_date;
        $expiry->hour(23)->minute(59)->second(59);
        // dd($expiry);
        return now()->isBefore($expiry);
    }
}
