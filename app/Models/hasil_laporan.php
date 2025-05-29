<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hasil_laporan extends Model
{
    protected $fillable = ['name', 'date', 'sorted_amount', 'total_weight'];
}
