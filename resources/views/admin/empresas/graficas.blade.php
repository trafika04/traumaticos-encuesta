@extends('admin.layouts.app')

{{-- waitme --}}

<link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />

<style>

</style>

@section('content')
    <div class="content">

        <div class="container-fluid">
            <div class="card p-4">
                <div class="row justify-content-between">
                    <h2>Datos generales de la empresa: <b>{{ $NombreEmpresa->empresa->nombre ?? '' }}</b></h2>
                </div>

                <div class="row">
                    <div class="col-12">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                    role="tab" aria-controls="nav-profile" aria-selected="false">Graficas</a>
                                <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                                    role="tab" aria-controls="nav-contact" aria-selected="true">Registros</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <div class="col-12 col-md-12 mt-4">
                                    <div class="row">
                                        @include('admin.empresas.graficas.estudios')
                                        @include('admin.empresas.graficas.sexo')
                                        @include('admin.empresas.graficas.estado_civil')
                                        @include('admin.empresas.graficas.evento_traumatico')
                                        @include('admin.empresas.graficas.edad')
                                        @include('admin.empresas.graficas.tipo_puesto')
                                        @include('admin.empresas.graficas.tipo_empleado')
                                        @include('admin.empresas.graficas.area')
                                        @include('admin.empresas.graficas.experiencia')
                                        @include('admin.empresas.graficas.antiguedad')
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="col-12 mt-4">
                                    <a href="{{ route('registro.export', ['id' => $empresa->id]) }}"
                                        class="btn btn-success"><i class="fas fa-file-excel mr-2"></i>Exportar reporte</a>
                                </div>
                                <div class="col-12 col-md-12 mt-4">
                                    <table class="table table-stripped table-responsive table-bordered w-100">

                                        <thead class="thead-dark">

                                            <tr>

                                                <th scope="col" class="text-center">#</th>

                                                <th scope="col" class="text-center">Correo Electr??nico</th>

                                                <th scope="col" class="text-center">Edad</th>

                                                <th scope="col" class="text-center">Estudios</th>

                                                <th scope="col" class="text-center">Tipo de puesto</th>

                                                <th scope="col" class="text-center">??rea</th>

                                                <th scope="col" class="text-center">Antig??edad</th>

                                                <th scope="col" class="text-center">Estado Civil</th>
                                                <th scope="col" class="text-center" width="10%">Tiempo que tardo en
                                                    contestar la encuesta</th>
                                                <th scope="col" class="text-center">Acciones</th>

                                            </tr>

                                        </thead>

                                        <tbody>
                                            @foreach ($registros as $registro)
                                                <tr>
                                                    <td>{{ $registro->id }}</td>
                                                    <td>{{ $registro->email }}</td>
                                                    <td>{{ $registro->edad }}</td>
                                                    <td>{{ $registro->estudios }}</td>
                                                    <td>{{ $registro->tipo_puesto }}</td>
                                                    <td>{{ $registro->area }}</td>
                                                    <td>{{ $registro->antiguedad }}</td>
                                                    <td>{{ $registro->estado_civil }}</td>
                                                    {{-- <td>{{$registro->fecha_inicio->format('h:i:s')}}</td>
                                                    <td>{{$registro->created_at->format('h:i:s')}}</td> --}}
                                                    <td>@php
                                                        $time2 = strtotime($registro->fecha_inicio->format('h:i:s'));
                                                        $time1 = strtotime($registro->created_at->format('h:i:s'));

                                                        echo date('H:i:s', $time1 - $time2);
                                                    @endphp</td>
                                                    <td>
                                                        <a target="_blank" href="/resultados/{{ $registro->token }}"
                                                            class="btn btn-success">Ver resultados</a>
                                                        <a href="javascript:void()" class="btn btn-danger deleteRegister"
                                                            data-id="{{ $registro->id }}">Eliminar registro</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('body').on('click', '.deleteRegister', function(e) {

                e.preventDefault();

                var id = $(this).attr('data-id');

                Swal.fire({

                    title: '??Est??s seguro?',

                    text: "??No podr??s revertir esto!",

                    icon: 'warning',

                    showCancelButton: true,

                    confirmButtonColor: '#3085d6',

                    cancelButtonColor: '#d33',

                    confirmButtonText: 'S??, eliminar',

                    cancelButtonText: 'Cancelar'

                }).then((result) => {

                    if (result.value) {

                        $.ajax({
                            url: '/registro/delete/' + id,
                            type: 'GET',
                            success: function(data) {

                                if (data.status == 'success') {
                                    location.reload();
                                } else {
                                    alert(data.status)
                                }

                            },
                            error: function(data) {

                                console.log(data);

                            }
                        });

                    }

                });
            })
        });
    </script>
@endsection
