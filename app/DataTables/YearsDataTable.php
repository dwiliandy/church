<?php

namespace App\DataTables;

use App\Models\Year;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class YearsDataTable extends DataTable
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
        $btn = '<div class="btn-group">';
        $btn .= '<a href="' . route('get-incomes', $row->id) . '" class="btn btn-sm btn-success mr-1" title="Incomes"><i class="fas fa-hand-holding-usd"></i></a>';
        $btn .= '<a href="' . route('get-expenditures', $row->id) . '" class="btn btn-sm btn-danger mr-1" title="Expenditures"><i class="fas fa-file-invoice-dollar"></i></a>';
        $btn .= '<a href="' . route('get-data-incomes', $row->id) . '" class="btn btn-sm btn-info mr-1" title="Data Incomes"><i class="fas fa-list"></i></a>';
        $btn .= '<a href="' . route('get-data-expenditures', $row->id) . '" class="btn btn-sm btn-warning" title="Data Expenditures"><i class="fas fa-clipboard-list"></i></a>';
        $btn .= '</div>';
        return $btn;
      })
      ->rawColumns(['action'])
      ->setRowId('id');
  }

  /**
   * Get the query source of dataTable.
   */
  public function query(Year $model): QueryBuilder
  {
    return $model->newQuery();
  }

  /**
   * Optional method if you want to use the html builder.
   */
  public function html(): HtmlBuilder
  {
    return $this->builder()
      ->setTableId('years-table')
      ->columns($this->getColumns())
      ->minifiedAjax()
      ->dom("<'row'<'col-md-6'B><'col-md-6'f>>" .
        "<'row'<'col-md-12'tr>>" .
        "<'row'<'col-md-5'i><'col-md-7'p>>")
      ->orderBy(1)
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
      Column::make('id')->title('ID')->width(50),
      Column::make('name')->title('Tahun'),
      Column::computed('action')
        ->exportable(false)
        ->printable(false)
        ->width(200)
        ->addClass('text-center'),
    ];
  }

  /**
   * Get the filename for export.
   */
  protected function filename(): string
  {
    return 'Years_' . date('YmdHis');
  }
}
