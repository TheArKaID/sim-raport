@foreach($mapels as $mapel)
  <option value="{{ $mapel->kd_mapel }}" class="{{ $mapel->kd_mapel }}">{{ $mapel->mapel }}</option>
@endforeach
<option value="-" class="-" hidden="">-</option>