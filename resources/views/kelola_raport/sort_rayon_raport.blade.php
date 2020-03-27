@foreach($rayons as $rayon)
<tr>
	<td>{{ $loop->iteration }}</td>
	<td>{{ $rayon->rayon }}</td>
	<td>{{ $rayon->daerah }}</td>
	<td>{{ $rayon->pembimbing }}</td>
	<td>{{ App\Siswa::select('siswas.*')->where('rayon', $rayon->singkatan_rayon)->count() }}</td>
	<td class="text-center">
		<a href="{{ url('/kelola_raport/data_siswa/'.$rayon->kd_rayon) }}" class="btn" style="background-color: #7a00e2; color: #fff;">Data Siswa</a>
	</td>
</tr>
@endforeach