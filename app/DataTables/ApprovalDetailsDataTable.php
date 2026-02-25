<?php

namespace App\DataTables;

use App\Models\ApprovalDetail;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ApprovalDetailsDataTable extends DataTable
{
  /**
   * Build the DataTable class.
   *
   * @param QueryBuilder $query Results from query() method.
   */
  protected $financial_id;

  public function __construct()
  {
    $this->financial_id = base64_decode(request()->route('finance'));
  }

  public function dataTable(QueryBuilder $query): EloquentDataTable
  {
    return (new EloquentDataTable($query))
      ->editColumn('status', function ($row) {
        if ($row->status == 'Menunggu') {
          return '<span class="badge badge-warning">Menunggu</span>';
        } elseif ($row->status == 'Ditolak') {
          return '<span class="badge badge-danger">Ditolak</span>';
        } else {
          return '<span class="badge badge-success">Diterima</span>';
        }
      })
      ->editColumn('action_date', function ($row) {
        return $row->action_date ? date('d-m-Y H:i', strtotime($row->action_date)) : '-';
      })
      ->addColumn('approver_name', function ($row) {
        return ucwords($row->approver_name);
      })
      ->rawColumns(['status'])
      ->setRowId('id');
  }

  /**
   * Get the query source of dataTable.
   */
  public function query(Approval $model): QueryBuilder
  {
    return $model->newQuery()
      ->join('users', 'users.id', '=', 'approvals.approver')
      ->where('financial_id', $this->financial_id)
      ->select([
        'approvals.*',
        'users.name as approver_name'
      ]);
  }

  /**
   * Optional method if you want to use the html builder.
   */
  public function html(): HtmlBuilder
  {
    return $this->builder()
      ->setTableId('approval-details-table')
      ->columns($this->getColumns())
      ->minifiedAjax()
      ->dom('rt') // Only show table
      ->orderBy(0)
      ->selectStyleSingle();
  }

  /**
   * Get the dataTable columns definition.
   */
  public function getColumns(): array
  {
    return [
      Column::make('approver_name')->title('Nama'),
      Column::make('action_date')->title('Tanggal Aksi'),
      Column::make('status')->title('Status Pengajuan'),
      Column::make('comment')->title('Komentar'),
    ];
  }

  /**
   * Get the filename for export.
   */
  protected function filename(): string
  {
    return 'ApprovalDetails_' . date('YmdHis');
  }
}
