<?php

namespace App\Http\Livewire;

use App\Models\GroupData;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class GroupsTable extends LivewireDatatable
{
    public $model = GroupData::class;
    public $clearSearchButton = true;
    public $hideable = 'select';

    public function columns()
    {
        return [

          Column::name('name')
              ->label('Nama')
              ->searchable()
              ->filterable()
        ];
    }
}