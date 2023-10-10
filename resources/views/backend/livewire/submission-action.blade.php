<a class="btn p-1 rounded btn-income" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail" href="{{ route('submission-detail',['id' => base64_encode($id)]) }}">
  <button>
    <i class="fas fa-search"></i>
  </button>
</a>

<a class="btn p-1 rounded btn-expenditure" data-toggle="tooltip" data-placement="bottom" title="Tarik Pengajuan" href="{{ route('get-expenditures',['id' => base64_encode($id)]) }}">
  <button>
    <i class="fas fa-undo"></i>
  </button>
</a>
