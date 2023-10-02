<a class="btn p-1 rounded btn-income" data-toggle="tooltip" data-placement="bottom" title="Data Pemasukkan" href="{{ route('get-incomes',['id' => base64_encode($id)]) }}">
  <button>
    <i class="fas fa-money-bill-wave-alt"></i>
  </button>
</a>

<a class="btn p-1 rounded btn-expenditure" data-toggle="tooltip" data-placement="bottom" title="Data Pengeluaran" href="{{ route('get-expenditures',['id' => base64_encode($id)]) }}">
  <button>
    <i class="fas fa-hand-holding-usd fa-flip-vertical"></i>
  </button>
</a>
