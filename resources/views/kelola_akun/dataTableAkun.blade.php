@foreach($user as $u)
<tr>
  <th scope="row">{{ $loop->iteration }}</th>
  <td>{{ $u->kd_guru }}</td>
  <td>{{ $u->name }}</td>
  <td>{{ $u->role }}</td>
  <td class="text-center">
    <button id="{{ $u->id }}" class="btn detailakun" style="background-color: #b854f5; color: #fff;">Detail</button>  
    <button id="{{ $u->kd_guru }}" class="btn hapusakun" style="background-color: #5700e2; color: #fff;">Hapus</button>
  </td>
</tr>
@endforeach