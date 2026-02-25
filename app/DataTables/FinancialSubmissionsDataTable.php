<?php

namespace App\DataTables;

use App\Models\FinancialSubmission;
use App\Models\Approval;
use App\Models\Financial;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FinancialSubmissionsDataTable extends DataTable
{
  /**
   * Build the DataTable class.
   *
   * @param QueryBuilder $query Results from query() method.
   */
  public function dataTable(QueryBuilder $query): EloquentDataTable
  {
    return (new EloquentDataTable($query))
      ->addColumn('action', function ($row) {
        return '<a href="' . route('submissions-detail', base64_encode($row->id)) . '" class="btn btn-sm btn-primary" title="Detail"><i class="fas fa-eye"></i> Detail</a>';
      })
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
      ->addColumn('stuck_approvals', function ($row) {
        $approvers = Approval::where('financial_id', $row->id)
          ->where('status', 'Menunggu')
          ->with('user')
          ->get()
          ->pluck('user.name')
          ->toArray();
        return implode(', ', array_map('ucwords', $approvers));
      })
      ->rawColumns(['action'])
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
      ->where('financials.status', 'Menunggu')
      ->where('financials.action_user', auth()->id())
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
      ->setTableId('financial-submissions-table')
      ->columns($this->getColumns())
      ->minifiedAjax()
      ->dom("<'row'<'col-md-6'B><'col-md-6'f>>" .
        "<'row'<'col-md-12'tr>>" .
        "<'row'<'col-md-5'i><'col-md-7'p>>")
      ->orderBy(0)
      ->buttons([
        Button::make('excel')->className('btn btn-success')->text('<i class="fas fa-file-excel"></i> Excel'),
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
      Column::make('total_income')->title('Jumlah Pemasukkan'),
      Column::make('expenditure_code')->title('Kode Pengeluaran'),
      Column::make('expenditure_name')->title('Pembebanan Anggaran'),
      Column::make('total_expenditure')->title('Jumlah Pengeluaran'),
      Column::make('stuck_approvals')->title('Stuck Pemberi Izin'),
      Column::computed('action')
        ->exportable(false)
        ->printable(false)
        ->width(100)
        ->addClass('text-center'),
    ];
  }

  /**
   * Get the filename for export.
   */
  protected function filename(): string
  {
    return 'FinancialSubmissions_' . date('YmdHis');
  }
}
