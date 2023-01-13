<?php

namespace App\Http\Livewire;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class UsersTable extends LivewireDatatable
{
    public $model = User::class;
    public $exportable = true;
    public $clearSearchButton = true;
    public $hideable = 'select';

    public function columns()
    {
        return [

          Column::name('name')
              ->label('Nama')
              ->searchable()
              ->filterable(),

          Column::name('username')
              ->label('Username')
              ->searchable()  
              ->filterable(),

          Column::name('email')
              ->label('Email')    
              ->searchable()
              ->filterable(),
        ];
    }
}