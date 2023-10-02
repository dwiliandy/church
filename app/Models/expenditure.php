<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
  use HasFactory;    
  protected $fillable = [
    'name',
    'unique_id', 
    'status'
  ];


  // Relation Data
  public function expenditure_years()
  {
    return $this->hasMany(ExpenditureYear::class, 'exenditure_id', 'id');
  }
}
