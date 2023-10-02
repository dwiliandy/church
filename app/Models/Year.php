<?php

namespace App\Models;

use App\Models\IncomeYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Year extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];


    // Relation Data
    public function income_years()
    {
      return $this->hasMany(IncomeYear::class, 'year_id', 'id');
    }

    public function expenditure_years()
    {
      return $this->hasMany(ExpenditureYear::class, 'year_id', 'id');
    }
}
