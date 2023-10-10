<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;
    protected $fillable = [
      'status',
      'comment', 
      'action_date',
      'approver',
      'financial_id'
    ];

}
