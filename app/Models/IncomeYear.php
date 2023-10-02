<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IncomeYear extends Model
{
    use HasFactory;    
    
    protected $fillable = [
      'year_id',
      'income_id',
      'target',
  ];

  // Relation Data
  public function income()
  {
    return $this->belongsTo(Income::class,'income_id','id');
  }

  public function year()
  {
    return $this->belongsTo(Year::class,'year_id','id');
  }
}
