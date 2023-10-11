<?php

namespace App\Http\Livewire;

use App\Models\Approval;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ApprovalDetailsTable extends LivewireDatatable
{
    public $model = Approval::class;
    public $financial_id;

    public function builder()
    {
      return Approval::leftJoin('users','users.id','=','approvals.approver')
                    ->where('financial_id', $this->financial_id);
    }

    public function columns()
    {
        return [

          Column::name('users.name')
              ->label('Nama')->alignCenter(),

          Column::name('approvals.action_date')
              ->label('Tanggal Aksi')->alignCenter(),

          Column::callback(['approvals.status'], function ($status) {
            return view('backend.livewire.status-approval-detail', ['status' => $status]);
          })->label('Status Pengajuan')->alignCenter(),

          Column::name('approvals.comment')
              ->label('Komentar')->alignCenter(),
        ];
    }
}