<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
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
        $btn .= '<button type="button" class="btn btn-sm btn-info mr-1" title="Edit" onclick="editData(' . $row->id . ')"><i class="fas fa-edit"></i></button>';
        $btn .= '<button type="button" class="btn btn-sm btn-danger" title="Delete" onclick="deleteData(' . $row->id . ')"><i class="fas fa-trash"></i></button>';
        $btn .= '</div>';
        return $btn;
      })
      ->rawColumns(['action'])
      ->setRowId('id');
  }

  /**
   * Get the query source of dataTable.
   */
  public function query(User $model): QueryBuilder
  {
    return $model->newQuery();
  }

  /**
   * Optional method if you want to use the html builder.
   */
  public function html(): HtmlBuilder
  {
    return $this->builder()
      ->setTableId('users-table')
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
      Column::make('name')->title('Nama'),
      Column::make('username')->title('Username'),
      Column::make('email')->title('Email'),
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
    return 'Users_' . date('YmdHis');
  }
}
