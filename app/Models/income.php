<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;    
    protected $fillable = [
      'name',
      'unique_id', 
    ];

    // Relation Data
    public function income_years()
    {
      return $this->hasMany(IncomeYear::class, 'income_id', 'id');
    }
}
