<?php

namespace App\Http\Livewire;

use App\Models\Income;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class IncomesTable extends LivewireDatatable
{
    public $model = Income::class;
    public $exportable = true;
    public $clearSearchButton = true;
    public $hideable = 'select';

    public function columns()
    {
        return [

          Column::name('unique_id')
              ->label('Kode')
              ->searchable()
              ->filterable(),

          Column::name('name')
              ->label('Nama')
              ->searchable()
              ->filterable(),

          Column::callback(['id'], function ($id) {
            return 1;
            // return view('livewire.status-user-action', ['id' => $id]);
            })->unsortable()->label('Aksi')->excludeFromExport()
        ];
    }
}