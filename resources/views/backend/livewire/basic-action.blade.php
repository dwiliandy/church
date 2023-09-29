
<button type="button" class="btn p-1 text-blue-600 hover:bg-blue-600 hover:text-white rounded btn-edit" data-toggle="tooltip" data-placement="bottom" title="Ubah Data" data-id="{{ Base64_encode($id) }}">
  <i class="fas fa-fw fa-pencil-alt"></i>
</button>

<button type="button" class="btn p-1 text-red-600 hover:bg-red-600 hover:text-white rounded btn-delete" data-toggle="tooltip" data-placement="bottom" title="Hapus Data" data-id="{{ Base64_encode($id) }}">
  <i class="fas fa-fw fa-trash"></i>
</button>
