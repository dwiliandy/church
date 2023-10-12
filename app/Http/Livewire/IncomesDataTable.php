<?php

namespace App\Http\Livewire;

use App\Models\Year;
use App\Models\Income;
use App\Models\Financial;
use App\Models\IncomeYear;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class IncomesDataTable extends LivewireDatatable
{
    public $model = Income::class;
    public $exportable = true;
    public $clearSearchButton = true;
    public $hideable = 'select';
    public $year;

    public function builder()
    {
      return IncomeYear::leftJoin('incomes','incomes.id','=','income_years.income_id')
                      ->leftJoin('years','years.id','=','income_years.year_id')
                      ->where('years.id', $this->year->id);
    }
    public function columns()
    {
        return [

          Column::name('incomes.unique_id')
              ->label('Iuran ID')
              ->searchable()
              ->filterable(),

          Column::name('incomes.name')
              ->label('Iuran')
              ->searchable()
              ->filterable(),

          NumberColumn::callback(['income_years.target'], function ($target) {
              return Str::currency((int)$target);
          })
            ->label('Jumlah Pemasukkan')
            ->searchable()
            ->filterable('income_years.target'),
          
          Column::callback(['income_years.id'], function ($id) {
            $sum = Financial::where('income_year_id', $id)->where('status','Diterima')->sum('total_income');
            return Str::currency((int)$sum);
          })
            ->label('Jumlah Tercapai')
            ->sortable(),
        ];
    }
}