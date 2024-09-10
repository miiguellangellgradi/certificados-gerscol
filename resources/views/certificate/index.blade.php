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

                        <form>
                            <div class="form-row">
                              <div class="col">
                                <input name="BusquedaFecha" data-date-format="yyyy-mm-dd" id="datepicker">
                              </div>
                              <div class="col">
                                <input name="BusquedaCedula" class="form-search" placeholder="Buscar por cedula" type="search" id="search1" aria-label="Search" mdbInput>
                              </div>
                              <div class="col-auto">
                                <button type="submit" class="btn btn-verde"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                          </form>

                    <div class="col-xs-12">
                            <div class="md-form active-pink active-pink-2 mb-3">
                                <a href="{{ route('certificate.index')}}" class="btn btn-azul" ><i class="fa fa-refresh" aria-hidden="true"></i> <span>REFESCAR</span></a>
                            </div>
                        </form>
					</div>

					<div class="col-sx-6">
						<a href="{{ route('certificate.create')}}" class="btn btn-verde" ><i class="fa fa-plus-circle" aria-hidden="true"></i> <span>NUEVO CERTIFICADO</span></a>
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
            <th>Cedula de estudiante</th>
						<th>Nombre de estudiante</th>
						<th>Curso</th>
            <th>Horas del curso</th>
            <th>Expedicion</th>
            <th>Vencimiento</th>
						<th>Acciones</th>
					</tr>
				</thead>
                @foreach($certificate as $certificate)
				<tbody>
					<tr>

						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox2" name="options[]" value="1">
								<label for="checkbox2"></label>
							</span>
						</td>
            <td>{{ $certificate->students['id']}}</td>
						<td>{{ $certificate->students['student_name']}}</td>
						<td>{{ $certificate->courses['course_name']}}</td>
            <td>{{ $certificate->courses['course_duration']}}</td>
            <td>{{ date("d-m-Y",strtotime($certificate->certificate_expedition))}}</td>
                    @php
                    $validation=$certificate->courses['course_validation']
                    @endphp
            <td>{{date("d-m-Y",strtotime($certificate->certificate_expedition."+ $validation year"))}}</td>
						<td>
            <a class="pencil" href="{{route('certificate.show',$certificate)}}"><i  style="color:#58bb15;" class="fa fa-file-o" aria-hidden="true"></i></a>
                  <form method="POST" action="{{route('certificate.destroy',$certificate)}}">
                      @csrf @method('DELETE')
                      <button class="butondel"><i style="color:#b42222;" class="fa fa-trash-o" aria-hidden="true"></i></button>
                  </form>
						</td>
					</tr>
				   </tbody>
                   @endforeach
                   {{-- {{ $certificate->links("pagination::bootstrap-4") }} --}}
			</table>

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


