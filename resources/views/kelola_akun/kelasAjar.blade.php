@foreach($rombel as $r)
	<option id="rombel_id" value="{{ $r->kd_rombel }}">{{ $r->rombel }}</option>
@endforeach
@foreach($rombel_ajar as $ra)
	<option id="rombel_id" value="{{ $ra->kd_rombel }}">{{ $ra->rombel }}</option>
@endforeach