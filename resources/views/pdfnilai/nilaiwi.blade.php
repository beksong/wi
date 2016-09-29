@extends('layouts.reportmaster')
@section('content')
<table border="0">
	<tr>
		<td>
			<img  id="img-header" src="{{url('/images/image001.png')}}" alt="logo" width="80px" height="130px"  />
		</td>
		<td style="padding-left:30px">
			<center>
				<h4 style="margin-bottom:0px; text-align:center;">PEMERINTAH PROVINSI SULAWESI TENGAH</h4>
			<h4 style="margin-top:0px;text-align:center;">BADAN PENDIDIKAN DAN PELATIHAN DAERAH</h4>
			<p style="text-align:center;font-size:12px;">Jalan S. Parman No. 67 Palu, Kode Pos 94111, Telepon (0451) 421292, Faximile (0451) 428116<br>
				Website : www.bandiklat.sulteng.go.id
			</p>
			</center>
		</td>
	</tr>
</table>
<center>
	<hr style="weight:5px;background-color:#000000;">
</center>
<center><h5>EVALUASI TERHADAP TENAGA PENGAJAR/WIDYAISWARA</h5></center>
<table border="0">
	<tr>
		<td style="50px;"></td>
		<td style="width:300px;"></td>
	</tr>
	<tr>
		<td style="width:50px;">NAMA DIKLAT</td>
		<td style="width:300px;">: {{$nilai->angkatan->nama_diklat}}</td>
	</tr>
	<tr>
		<td style="width:50px;">LEMBAGA PENYELENGGARA</td>
		<td style="width:400px;">: {{$nilai->angkatan->lembaga->nama}}</td>
	</tr>
	<tr>
		<td style="width:50px;">NAMA PENGAJAR/WIDYAISWARA</td>
		<td style="width:300px;">: {{$nilai->widyaiswara->nama}}</td>
	</tr>
	<tr>
		<td style="width:50px;">MATA DIKLAT</td>
		<td style="width:300px;">: {{$nilai->matadiklat->nama}}</td>
	</tr>
	<tr>	
		<td style="width:50px;">HARI/TANGGAL</td>
		<td style="width:300px;">: {{$nilai->tgl}}</td>
	</tr>
	<tr>	
		<td style="width:50px;">WAKTU/SESI/JP</td>
		<td style="width:300px;">: {{$nilai->jp}}</td>
	</tr>
</table>
<table class="table table-bordered">
	<tbody>
		<tr>
			<td class="col-sm-1"><strong>No.</strong></td>
			<td class="col-sm-5"><strong>Uraian</strong></td>
			<td class="col-sm-2"><strong>Nilai</strong></td>
		</tr>	
		@foreach($detilnilais as $key=>$detil)
			<tr>
			@foreach($detil as $key=>$data)
				<td>{{$data}}</td>
			@endforeach
			</tr>
		@endforeach
		<tr>
			<td colspan="2" style="text-align: center;"><strong>Nilai Rata-Rata </strong></td>
			<td>
				{{$rata}}
			</td>
		</tr>
	</tbody>
</table>
@endsection
