<?php

namespace App\Http\Livewire;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class UsersTable extends LivewireDatatable
{
    public $model = User::class;

    public function columns()
    {
        return [
          NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('asc')
                ->sortBy('id')
                ->filterable(),

          Column::name('name')
              ->label('Name')
              ->filterable(),
        ];
    }
}