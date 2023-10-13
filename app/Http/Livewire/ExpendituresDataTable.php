<?php

namespace App\Http\Livewire;

use App\Models\Year;
use App\Models\Financial;
use Illuminate\Support\Str;
use App\Models\ExpenditureYear;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ExpendituresDataTable extends LivewireDatatable
{
    public $model = Expenditure::class;
    public $exportable = true;
    public $clearSearchButton = true;
    public $hideable = 'select';
    public $year;

    public function builder()
    {
      return ExpenditureYear::leftJoin('expenditures','expenditures.id','=','expenditure_years.expenditure_id')
                      ->leftJoin('years','years.id','=','expenditure_years.year_id')
                      ->where('years.id', $this->year->id);
    }
    public function columns()
    {
        return [

          Column::name('expenditures.unique_id')
              ->label('ID')
              ->searchable()
              ->filterable(),

          Column::name('expenditures.name')
              ->label('Pembebanan')
              ->searchable()
              ->filterable(),

          NumberColumn::callback(['expenditure_years.target'], function ($target) {
              return Str::currency((int)$target);
          })
            ->label('Perkiraan Pengeluaran')
            ->searchable()
            ->filterable('expenditure_years.target'),
          
          Column::callback(['expenditure_years.id'], function ($id) {
            $sum = Financial::where('expenditure_year_id', $id)->where('status','Diterima')->sum('total_expenditure');
            return Str::currency((int)$sum);
          })
            ->label('Jumlah Pengeluaran')
            ->unsortable(''),
        ];
    }
}