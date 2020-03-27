@foreach($mapels as $mapel)
<tr>
  <th>{{ $loop->iteration }}</th>
  <td>{{ $mapel->kd_mapel }}</td>
  <td>{{ $mapel->mapel }}</td>
  <td>
    <button class="btn hapusmapel btn-icon-split" id="{{ $mapel->kd_mapel }}" style="background-color: #5700e2; color: #fff;">
      <span class="icon text-white-50">
          <i class="fas fa-trash"></i>
        </span>
        <span class="text">Hapus</span>
    </button>
  </td>
</tr>
@endforeach