@extends('layouts.app')

@section('title', 'certificate')

@section('content')
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2 class="table-head-title">Buscar <b>Certificados</b></h2>
                    </div>

                    <div class="col-xs-6">
                        <form action="{{ route('front.search') }}" method="GET">
                            <div class="md-form active-pink active-pink-2 mb-3">
                                <input name="Busqueda" class="form-search" placeholder="Buscar..." type="search" id="search1" aria-label="Search" mdbInput>
                            </div>
                        </form>
                    </div>

                    <div class="col-sx-6">
                        <!-- Refresh button -->
                        <a href="{{ route('front.search') }}" class="btn btn-azul">
                            <i class="fa fa-refresh" aria-hidden="true"></i> <span>REFRESCAR</span>
                        </a>
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
                        <td>{{ $cert->students->id }}</td>
                        <td>{{ $cert->students->student_name }}</td>
                        <td>{{ $cert->courses->course_name }}</td>
                        <td>{{ $cert->courses->course_duration }}</td>
                        <td>{{ date('d-m-Y', strtotime($cert->certificate_expedition)) }}</td>
                        @php
                        $validation = $cert->courses->course_validation;
                        @endphp
                        <td>{{ date('d-m-Y', strtotime($cert->certificate_expedition . " + $validation year")) }}</td>
                        <td>
                            <a class="pencil" href="{{ route('certificate.show', $cert) }}">
                                <i style="color:#58bb15;" class="fa fa-file-o" aria-hidden="true"></i>
                            </a>
                            <form method="POST" action="{{ route('certificate.destroy', $cert) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="butondel">
                                    <i style="color:#b42222;" class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- Uncomment if pagination is enabled --}}
            {{-- {{ $certificate->links('pagination::bootstrap-4') }} --}}
        </div>
    </div>
</div>
@endsection
