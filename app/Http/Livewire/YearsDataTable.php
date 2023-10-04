<?php

namespace App\Http\Livewire;

use App\Models\Year;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class YearsDataTable extends LivewireDatatable
{
    public $model = Year::class;
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

          Column::callback(['id'], function ($id) {
            return view('backend.livewire.year-data-action', ['id' => $id]);
          })->unsortable()->label('Aksi')->excludeFromExport()
        ];
    }
}