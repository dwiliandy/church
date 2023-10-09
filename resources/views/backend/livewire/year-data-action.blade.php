<a class="btn p-1 rounded text-blue-600 hover:bg-blue-600 hover:text-white" data-toggle="tooltip" data-placement="bottom" title="Data Keuangan" href="{{ route('financials.index',['year' => base64_encode($id)]) }}">
  <button>
    <i class="fas fa-balance-scale"></i>
  </button>
</a>

<a class="btn p-1 rounded btn-income" data-toggle="tooltip" data-placement="bottom" title="Data Pemasukkan" href="{{ route('get-incomes',['id' => base64_encode($id)]) }}">
  <i class="bi bi-wallet2" style="font-weight: bold;"></i>
</a>

<a class="btn p-1 rounded btn-expenditure" data-toggle="tooltip" data-placement="bottom" title="Data Pengeluaran" href="{{ route('get-expenditures',['id' => base64_encode($id)]) }}">
  <button>
    <i class="bi bi-basket2-fill" style="font-weight: bold;"></i>
  </button>
</a>
