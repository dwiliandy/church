<?php

namespace App\Http\Livewire;

use App\Models\Income;
use App\Models\Financial;
use App\Models\IncomeYear;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class FinancialSubmissionsTable extends LivewireDatatable
{
    public $model = Financial::class;
    public $exportable = true;
    public $clearSearchButton = true;
    public $hideable = 'select';
    public $year;

    public function builder()
    {
      return Financial::leftJoin('income_years','income_years.id','=','income_year_id')
                      ->leftJoin('expenditure_years','expenditure_years.id','=','expenditure_year_id')
                      ->leftJoin('users','users.id','=','action_user')
                      ->leftJoin('incomes','incomes.id','=','income_years.income_id')
                      ->leftJoin('expenditures','expenditures.id','=','expenditure_years.expenditure_id')
                      ->where('financials.status','Menunggu');
    }

    public function columns()
    {
        return [
          Column::name('date')
                  ->label('Tanggal')
                  ->searchable()
                  ->filterable(),
          // Income
          Column::name('incomes.unique_id')
              ->label('Kode Pemasukkan')
              ->searchable()
              ->filterable(),
          
          Column::name('incomes.name')
              ->label('Uraian')
              ->searchable()
              ->filterable(),
          

          Column::callback(['financials.description', 'financials.type'], function ($desc, $type) {
            if ($type == 'Pemasukkan'){
              return $desc;
            }
          })
            ->label('Deskripsi Pemasukkan')
            ->searchable()
            ->filterable()
            ->unsortable(),
          
          Column::callback(['financials.total_income','financials.type'], function ($income,$type) {
              if($type == 'Pemasukkan'){
                return Str::currency((int)$income);
              }
          })
            ->label('Jumlah Pemasukkan')
            ->searchable()
            ->filterable(),
          
            // Expenditure
            Column::name('expenditures.unique_id')
              ->label('Kode Pengeluaran')
              ->searchable()
              ->filterable(),
          
          Column::name('expenditures.name')
              ->label('Pembebanan Anggaran')
              ->searchable()
              ->filterable(),
          

          Column::callback(['financials.description', 'financials.type'], function ($desc, $type) {
            if ($type == 'Pengeluaran'){
              return $desc;
            }
          },[2])
            ->label('Deskripsi Pengeluaran')
            ->searchable()
            ->filterable()
            ->unsortable()
            ->minWidth('100px'),
          
          Column::callback(['financials.total_expenditure','financials.type'], function ($expenditure,$type) {
            if($type == 'Pengeluaran'){
              return Str::currency((int)$expenditure);
            }  
          })
            ->label('Jumlah Pengeluaran')
            ->searchable()
            ->filterable(),

            Column::callback(['financials.id'], function ($id) { 
              return view('backend.livewire.submission-action', ['id' => $id]);
            })
            ->unsortable()
            ->label('Aksi')
            ->excludeFromExport()
            ->minWidth('190px')
        ];
    }

    
    public function getIncomeYearsProperty()
    {
        return IncomeYear::all();
    }

    public function getexpendituresProperty()
    {
        return Income::all();
    }
}