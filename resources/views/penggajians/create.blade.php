@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
	    <div class="col-md-0 col-md-offset-0">
	        <div class="panel panel-success">
	            <div class="panel-heading"><h2> PENGGAJIAN </h2></div>

	            	<div class="panel-body">
						{!! Form::open(['url' => 'penggajian']) !!}

						<div class="form-group">
						{!! Form::label('tunjangan', 'Tunjangan:') !!}
						<select class="form-control" name="tunjangan_pegawai_id">
							<option>-- Pilih Tunjangan --</option>
							@foreach($tunjangpegawai as $data)
								<option value="{{ $data->id }}"> {{ $data->Tunjangans->Besaran_uang }} </option>
							@endforeach
						</select>
						</div>

						<div class="form-group">
						{!! Form::label('pegawai', 'Nama Pegawai:') !!}
						<select class="form-control" name="pegawai_id">
							<option>-- Pilih Pegawai --</option>
							@foreach($pegawai as $data)
								<option value="{{ $data->id }}"> {{ $data->User->name }} || {{ $data->Jabatan->Nama_jabatan }} || {{ $data->Golongan->Nama_golongan }} </option>
							@endforeach
						</select>
						</div>

						<div class="form-group">
						{!! Form::label('jam', 'Jumlah Jam Lembur:') !!}
						<select class="form-control" name="tunjangan_pegawai_id">
							<option>-- Pilih Jam --</option>
							@foreach($tunjangpegawai as $data)
								<option value="{{ $data->id }}"> {{ $data->Lembur_pegawai->Jumlah_jam }} </option>
							@endforeach
						</select>
						</div>

						<div class="form-group">
							{!! Form::label('Statusambil', 'Status Pengambilan:') !!}
							<select class="form-control" name="Status_penganmbilan">
								<option>Sudah</option>
								<option>Belum</option>
							</select> 
						</div>

						<div class="form-group">
							{!! Form::label('petugas', 'Petugas Penerima:') !!}
							<input type="text" name="Petugas_penerima" class="form-control" required> 
						</div>

						<div class="form-group">
							{!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop