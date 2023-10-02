<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenditureYear extends Model
{
    use HasFactory;

    protected $fillable = [
      'year_id',
      'expenditure_id',
      'target',
  ];

    // Relation Data
    public function expenditure()
    {
      return $this->belongsTo(Expenditure::class,'expenditure_id','id');
    }
  
    public function year()
    {
      return $this->belongsTo(Year::class,'year_id','id');
    }
}
