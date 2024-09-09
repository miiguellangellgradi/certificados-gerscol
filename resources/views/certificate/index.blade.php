@extends('layouts.app')

@section('title', 'certificate')

@section('content')
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-4">
						<h2 class="table-head-title">Gestionar <b>Certificados</b></h2>
					</div>

                    <form action="{{ route('certificate.index') }}" method="GET">
                        <div class="form-row">
                            <div class="col">
                                <input name="BusquedaFecha" data-date-format="yyyy-mm-dd" id="datepicker" class="form-control">
                            </div>
                            <div class="col">
                                <input name="BusquedaCedula" class="form-search form-control" placeholder="Buscar por cédula" type="search" id="search1" aria-label="Search">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-verde"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>

					</div>

					<div class="col-sx-6">
						<a href="{{ route('certificate.create')}}" class="btn btn-verde" ><i class="fa fa-plus-circle" aria-hidden="true"></i> <span>NUEVO CERTIFICADO</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-azul" data-toggle="modal"><i class="fa fa-upload" aria-hidden="true"></i> <span>IMPORTAR</span></a>
                        <a href="{{ route('certificate.create')}}" class="btn btn-azul" data-toggle="modal"><i class="fa fa-download" aria-hidden="true"></i> <span>EXPORTAR</span></a>
					</div>
				</div>
			</div>

			<table id="tableData" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>
                <span class="custom-checkbox">
                    <input type="checkbox" id="selectAll">
                    <label for="selectAll"></label>
                </span>
            </th>
            <th>Cédula de estudiante</th>
            <th>Nombre de estudiante</th>
            <th>Curso</th>
            <th>Horas del curso</th>
            <th>Expedición</th>
            <th>Vencimiento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($certificate as $cert)
        <tr>
            <td>
                <span class="custom-checkbox">
                    <input type="checkbox" id="checkbox{{ $loop->index }}" name="options[]" value="{{ $cert->id }}">
                    <label for="checkbox{{ $loop->index }}"></label>
                </span>
            </td>
            <td>{{ $cert->students['id'] }}</td>
            <td>{{ $cert->students['student_name'] }}</td>
            <td>{{ $cert->courses['course_name'] }}</td>
            <td>{{ $cert->courses['course_duration'] }}</td>
            <td>{{ date('d-m-Y', strtotime($cert->certificate_expedition)) }}</td>
            @php
            $validation = $cert->courses['course_validation'];
            @endphp
            <td>{{ date('d-m-Y', strtotime($cert->certificate_expedition . " + $validation year")) }}</td>
            <td>
                <a class="pencil" href="{{ route('certificate.show', $cert) }}">
                    <i style="color:#58bb15;" class="fa fa-file-o" aria-hidden="true"></i>
                </a>
                <form method="POST" action="{{ route('certificate.destroy', $cert) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="butondel" style="background:none; border:none;">
                        <i style="color:#b42222;" class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $certificate->links("pagination::bootstrap-4") }}

	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
    $('#datepicker').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
    $('#datepicker').datepicker("setDate", new Date());
</script>


@endsection


