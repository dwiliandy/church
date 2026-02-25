<?php

namespace App\DataTables;

use App\Models\Financial;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FinancialsDataTable extends DataTable
{
  /**
   * Build the DataTable class.
   *
   * @param QueryBuilder $query Results from query() method.
   */
  protected $yearId;

  public function __construct()
  {
    $this->yearId = base64_decode(request()->route('year'));
  }

  public function dataTable(QueryBuilder $query): EloquentDataTable
  {
    return (new EloquentDataTable($query))
      ->editColumn('date', function ($row) {
        return date('d-m-Y', strtotime($row->date));
      })
      ->editColumn('total_income', function ($row) {
        return $row->type == 'Pemasukkan' ? 'Rp ' . number_format($row->total_income, 0, ',', '.') : '-';
      })
      ->editColumn('total_expenditure', function ($row) {
        return $row->type == 'Pengeluaran' ? 'Rp ' . number_format($row->total_expenditure, 0, ',', '.') : '-';
      })
      ->addColumn('income_code', function ($row) {
        return $row->income_code ?? '-';
      })
      ->addColumn('income_name', function ($row) {
        return $row->type == 'Pemasukkan' ? $row->income_name : '-';
      })
      ->addColumn('expenditure_code', function ($row) {
        return $row->expenditure_code ?? '-';
      })
      ->addColumn('expenditure_name', function ($row) {
        return $row->type == 'Pengeluaran' ? $row->expenditure_name : '-';
      })
      ->addColumn('description_income', function ($row) {
        return $row->type == 'Pemasukkan' ? $row->description : '-';
      })
      ->addColumn('description_expenditure', function ($row) {
        return $row->type == 'Pengeluaran' ? $row->description : '-';
      })
      ->rawColumns([])
      ->setRowId('id');
  }

  /**
   * Get the query source of dataTable.
   */
  public function query(Financial $model): QueryBuilder
  {
    return $model->newQuery()
      ->leftJoin('income_years', 'income_years.id', '=', 'financials.income_year_id')
      ->leftJoin('expenditure_years', 'expenditure_years.id', '=', 'financials.expenditure_year_id')
      ->leftJoin('incomes', 'incomes.id', '=', 'income_years.income_id')
      ->leftJoin('expenditures', 'expenditures.id', '=', 'expenditure_years.expenditure_id')
      ->where('financials.status', 'Diterima')
      ->where(function ($query) {
        $query->where('income_years.year_id', $this->yearId)
          ->orWhere('expenditure_years.year_id', $this->yearId);
      })
      ->select([
        'financials.*',
        'incomes.unique_id as income_code',
        'incomes.name as income_name',
        'expenditures.unique_id as expenditure_code',
        'expenditures.name as expenditure_name'
      ]);
  }

  /**
   * Optional method if you want to use the html builder.
   */
  public function html(): HtmlBuilder
  {
    return $this->builder()
      ->setTableId('financials-table')
      ->columns($this->getColumns())
      ->minifiedAjax()
      ->dom("<'row'<'col-md-6'B><'col-md-6'f>>" .
        "<'row'<'col-md-12'tr>>" .
        "<'row'<'col-md-5'i><'col-md-7'p>>")
      ->orderBy(0)
      ->buttons([
        Button::make('excel')->className('btn btn-success')->text('<i class="fas fa-file-excel"></i> Excel'),
        Button::make('csv')->className('btn btn-info')->text('<i class="fas fa-file-csv"></i> CSV'),
        Button::make('pdf')->className('btn btn-danger')->text('<i class="fas fa-file-pdf"></i> PDF'),
        Button::make('print')->className('btn btn-secondary')->text('<i class="fas fa-print"></i> Print'),
        Button::make('reload')->className('btn btn-primary')->text('<i class="fas fa-sync"></i> Refresh'),
      ]);
  }

  /**
   * Get the dataTable columns definition.
   */
  public function getColumns(): array
  {
    return [
      Column::make('date')->title('Tanggal'),
      Column::make('income_code')->title('Kode Pemasukkan'),
      Column::make('income_name')->title('Uraian'),
      Column::make('description_income')->title('Deskripsi Pemasukkan'),
      Column::make('total_income')->title('Jumlah Pemasukkan'),
      Column::make('expenditure_code')->title('Kode Pengeluaran'),
      Column::make('expenditure_name')->title('Pembebanan Anggaran'),
      Column::make('description_expenditure')->title('Deskripsi Pengeluaran'),
      Column::make('total_expenditure')->title('Jumlah Pengeluaran'),
    ];
  }

  /**
   * Get the filename for export.
   */
  protected function filename(): string
  {
    return 'Financials_' . date('YmdHis');
  }
}
