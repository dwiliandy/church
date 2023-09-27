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
}
