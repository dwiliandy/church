<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeYear extends Model
{
    use HasFactory;    
    
    protected $fillable = [
      'year_id',
      'income_id',
      'target',
  ];
}
