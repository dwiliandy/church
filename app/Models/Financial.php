<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
  use HasFactory;
  protected $fillable = [
    'date',
    'description',
    'type',
    'total_income',
    'total_expenditure',
    'status',
    'expenditure_year_id',
    'income_year_id',
    'action_user'
  ];

  public function income_year()
  {
    return $this->belongsTo(IncomeYear::class,'income_year_id','id');
  }

  public function expenditure_year()
  {
    return $this->belongsTo(ExpenditureYear::class,'expenditure_year_id','id');
  }

  public function user()
  {
    return $this->belongsTo(User::class,'action_user','id');
  }
}
