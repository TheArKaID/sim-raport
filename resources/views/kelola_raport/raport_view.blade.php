<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SIM RAPORT</title>
  <link rel="shortcut icon" href="{{ asset('icon/icon-1.png') }}">
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('font/nunito.css') }}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"></link>
  <style type="text/css">
  	@media print {
  		.logo_wk{
  			position: absolute !important;
  			margin-top: 0px !important;
  			width: 75px !important;
  		}
  	}
  	.near-margin p{
	    margin: 0.2px;
	  }
	  .black-color{
	    color: #000;
	  }
	  .header-raport p{
	    font-size: 12px;
	    color: #000;
	    margin: -0.5px;
	  }
  </style>
</head>
<body>
  <div class="row d-flex justify-content-between">
    <div class="col-lg-2">
      <img src="{{ asset('icon/logo_wk.png') }}" class="w-50 logo_wk">
    </div>
    <div class="col-lg-10 text-right header-raport">
      <p class="font-weight-bold">YAYASAN PRAWIRAMA</p>
      <p class="font-weight-bold">SMK WIKRAMA BOGOR</p>
      <p>Jalan Raya Wangun Kel. Sindangsari - Bogor, Telp/Fax(0251)8242411</p>
      <p>Website : www.smkwikrama.sch.id, e-mail : prohumas@smkwikrama.net</p>
    </div>
  </div><hr style="border: 1.5px solid #000;">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 text-center black-color font-weight-bold">
      <p>LAPORAN PENCAPAIAN KOMPETENSI PESETA DIDIK</p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 black-color near-margin">
      <p>NIS</p>
      <p>Nama</p>
      <p>Kompetensi Keahlian</p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 black-color near-margin">
      <p>: {{ $siswas->nis}} </p>
      <p>: {{ $siswas->nama}}</p>
      <p>: {{ $rombels->jurusan}}</p>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 black-color near-margin">
      <p>Tahun Pelajaran</p>
      <p>Semester</p>
      <p>Kelas</p>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 black-color near-margin">
      <p id="tahun-ajar">: 
      </p>
      <p>:
        @if($ulangan == 'UTS1' || $ulangan == 'UAS')
        1
        @elseif($ulangan == 'UTS2' || $ulangan == 'UKK')
        2
        @endif
      </p>
      <p>:
        @if($rombels->tingkat == 1)
        X
        @elseif($rombels->tingkat == 2)
        XI
        @elseif($rombels->tingkat == 3)
        XII
        @endif
      </p>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 text-left mt-4">
      <p class="font-weight-bold black-color">A. Nilai Akademik</p>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 pl-5">
      <table class="table table-bordered black-color table-nilai">
        <thead>
          <tr class="text-center">
            <th colspan="2" scope="col">Mata Pelajaran</th>
            <th scope="col">Pengetahuan</th>
            <th scope="col">Keterampilan</th>
            <th scope="col">Nilai Akhir</th>
            <th scope="col">Predikat</th>
          </tr>
        </thead>
        <tbody>
          @foreach($semes1s as $semes1)
          @if($ulangan == 'UTS1')
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $semes1->mapel }}</td>
            <td>{{ $semes1->uts_1p }}</td>
            <td>{{ $semes1->uts_1k }}</td>
            <td class="nilai_akhir">{{ (($semes1->uts_1p * 1) + ($semes1->uh_1p * 3) + ($semes1->uh_2p * 3)) / 7}}</td>
            <td class="predikat"></td>
          </tr>
          @elseif($ulangan == 'UAS')
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $semes1->mapel }}</td>
            <td>{{ $semes1->uas_p }}</td>
            <td>{{ $semes1->uas_k }}</td>
            <td class="nilai_akhir">{{ (($semes1->uts_1p * 1) + ($semes1->uh_3p * 3) + ($semes1->uh_4p * 3) + ($semes1->uas_p * 1)) / 8}}</td>
            <td class="predikat"></td>
          </tr>
          @elseif($ulangan == 'UTS2')
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $semes1->mapel }}</td>
            <td>{{ $semes1->uts_2p }}</td>
            <td>{{ $semes1->uts_2k }}</td>
            <td class="nilai_akhir">{{ (($semes1->uts_2p * 1) + ($semes1->uh_5p * 3) + ($semes1->uh_6p * 3) + ($semes1->uas_p * 1)) / 8}}</td>
            <td class="predikat"></td>
          </tr>
          @elseif($ulangan == 'UKK')
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $semes1->mapel }}</td>
            <td>{{ $semes1->ukk_p }}</td>
            <td>{{ $semes1->ukk_k }}</td>
            <td class="nilai_akhir">{{ (($semes1->uts_2p * 1) + ($semes1->uh_7p * 3) + ($semes1->uh_8p * 3) + ($semes1->ukk_p * 1)) / 8}}</td>
            <td class="predikat"></td>
          </tr>
          @endif
          @endforeach
          <tr>
            <th scope="row" id="number_senbud"></th>
            <td>Seni Budaya</td>
            <td class="senbud-nilai">{{ $senbud }}</td>
            <td class="senbud-nilai">{{ $senbud }}</td>
            <td class="nilai_akhir">{{ $senbud }}</td>
            <td class="predikat"></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 text-left mt-4">
      <p class="font-weight-bold black-color">B. Catatan Akademik</p>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 pl-5">
      <table class="table table-bordered black-color">
        <tr>
          <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
        </tr> 
      </table>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 text-left mt-4">
      <p class="font-weight-bold black-color">C. Nilai Ekstrakulikuler</p>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 pl-5">
      <table class="table table-bordered black-color">
        <tr>
          <td class="font-weight-bold text-center">Ekstrakulikuler</td>
          <td class="font-weight-bold text-center">Keterangan</td>
        </tr>
        <tr>
          <td>UPD</td>
          <td id="upd-nilai" class="text-center"></td>
        </tr>
        <tr>
          <td>PRAMUKA</td>
          <td id="pramuka-nilai" class="text-center"></td>
        </tr>
        <tr>
          <td>SIKAP</td>
          <td id="sikap-nilai" class="text-center"></td>
        </tr>
      </table>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6"></div>
    <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-md-4 black-color text-center">
          Kepala Sekolah
        </div>
        <div class="col-lg-4 col-md-4 col-md-4 black-color text-center">
          Pembimbing Rayon
        </div>
        <div class="col-lg-4 col-md-4 col-md-4 black-color text-center">
          Orang Tua
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-lg-4 col-md-4 col-md-4 black-color text-center">
          <hr style="border: 1px solid #000; width: 150px;">
        </div>
        <div class="col-lg-4 col-md-4 col-md-4 black-color text-center">
          <hr style="border: 1px solid #000; width: 150px;">
        </div>
        <div class="col-lg-4 col-md-4 col-md-4 black-color text-center">
          <hr style="border: 1px solid #000; width: 150px;">
        </div>
      </div>
    </div>
  </div>
</body>
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {
    var year = "{{ date('Y') }}";
    var year_1 = parseInt(year, 10) + 1;
    var tahun_ajar = ": " + year + " - " + year_1;
    $('#tahun-ajar').html(tahun_ajar);

    $('.nilai_akhir').filter(function() {
      var nilai_akhir = $(this).text();
      $(this).text(parseInt(nilai_akhir));
      if($(this).text() < 70){
        $(this).next('.predikat').text('D').focus();
      }else if($(this).text() < 79){
        $(this).next('.predikat').text('C').focus();
      }else if($(this).text() < 89){
        $(this).next('.predikat').text('B').focus();
      }else if($(this).text() < 100){
        $(this).next('.predikat').text('A').focus();
      }
    });

    $('#number_senbud').text($('.table-nilai tr').length - 1);

      var nilai_upd = "{{ $upd }}";

      if(nilai_upd == 'A'){
        $('#upd-nilai').text('Sangat Baik');
      }else if(nilai_upd == 'B'){
        $('#upd-nilai').text('Baik');
      }else if(nilai_upd == 'C'){
        $('#upd-nilai').text('Cukup');
      }else if(nilai_upd == 'D'){
        $('#upd-nilai').text('Kurang');
      }else{
        $('#upd-nilai').text('');
      }

      var nilai_pramuka = "{{ $pramuka }}";

      if(nilai_pramuka == 'A'){
        $('#pramuka-nilai').text('Sangat Baik');
      }else if(nilai_pramuka == 'B'){
        $('#pramuka-nilai').text('Baik');
      }else if(nilai_pramuka == 'C'){
        $('#pramuka-nilai').text('Cukup');
      }else if(nilai_pramuka == 'D'){
        $('#pramuka-nilai').text('Kurang');
      }else{
        $('#pramuka-nilai').text('');
      }

      var nilai_sikap = "{{ $sikap }}";

	  if(nilai_sikap == 'A'){
	    $('#sikap-nilai').text('Sangat Baik');
	  }else if(nilai_sikap == 'B'){
	    $('#sikap-nilai').text('Baik');
	  }else if(nilai_sikap == 'C'){
	    $('#sikap-nilai').text('Cukup');
	  }else if(nilai_sikap == 'D'){
	    $('#sikap-nilai').text('Kurang');
	  }else{
	    $('#sikap-nilai').text('');
	  }

	  window.print();
  });
</script>
</html>