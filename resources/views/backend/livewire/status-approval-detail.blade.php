  @if ($status == 'Diterima')
    <small style="background:#82d616; color:white; border-bottom: none; border-radius: 5px;font-size:.7rem; padding:8px">{{ $status }}</small>
  @elseif ($status == 'Ditolak')
    <small style="background:#ea0606; color:white; border-bottom: none; border-radius: 5px;font-size:.7rem; padding:8px">{{ $status }}</small>
  @else
    <small style="background:#fff; border-bottom: none; border-radius: 5px;font-size:.7rem; padding:8px">{{ $status }}</small>
  @endif