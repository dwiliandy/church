  @if ($status == 'Diterima')
    <small style="background:#82d616; border-bottom: none; border-radius: 30px; padding:8px">{{ $status }}</small>
  @elseif ($status == 'Ditolak')
    <small style="background:#ea0606; border-bottom: none; border-radius: 30px; padding:8px">{{ $status }}</small>
  @else
    <small style="background:#eeb441; border-bottom: none; border-radius: 30px; padding:8px">{{ $status }}</small>
  @endif