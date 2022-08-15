@extends('layouts.app')

<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>

<style>
    .pace {
        -webkit-pointer-events: none;
        pointer-events: none;

        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;

        position: fixed;
        top: 0;
        left: 0;
        width: 100%;

        -webkit-transform: translate3d(0, -50px, 0);
        -ms-transform: translate3d(0, -50px, 0);
        transform: translate3d(0, -50px, 0);

        -webkit-transition: transform .5s ease-out;
        -ms-transition: transform .5s ease-out;
        transition: transform .5s ease-out;
    }

    .pace.pace-active {
        -webkit-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    .pace .pace-progress {
        display: block;
        position: fixed;
        z-index: 2000;
        top: 0;
        right: 100%;
        width: 100%;
        height: 10px;
        background: {{ $registro->empresa->colores_principales }} !important;

        pointer-events: none;
    }

    nav.navbar.navbar-expand-md.navbar-light.bg-white.shadow-sm {

        display: none;

    }

    thead.thead-dark {

        color: #fff;

        background-color: #343a40;

        border-color: #454d55;

        vertical-align: bottom;

        border-bottom: 2px solid #dee2e6;

        text-align: center;

    }

    .bg-custom {
        background-color: {{ $registro->empresa->colores_principales }} !important;
    }

    .badge-success-low {

        color: #000;

        background-color: #92d050;

    }

    .badge-warning-low {

        color: #000;

        background-color: #ffff00;

    }



    .badge {

        width: -webkit-fill-available;

        border: 1px solid #000;

    }
</style>

<link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">

@section('content')
    <div class="container bg-white mt-5 p-5">

        <div class="row justify-content-center">

            <div class="col-12 mb-5">

                <h2>Resultados</h2>

                <h4 class="font-weight-bold">información general</h4>

            </div>



            <div class="col-12 col-md-3">

                <p class="mb-3">

                    <b>Correo electrónico:</b>

                    {{ $registro->email }}

                </p>

                <p class="mb-3">

                    <b>Sexo:</b>

                    <br>

                    {{ $registro->sexo }}

                </p>



                <p class="mb-3">

                    <b>Estado civil:</b>

                    <br>

                    {{ $registro->estado_civil }}

                </p>

            </div>



            <div class="col-12 col-md-3">

                <p class="mb-3">

                    <b>Edad en años:</b>

                    <br>

                    {{ $registro->edad }}

                </p>

                <p class="mb-3">

                    <b>Antigüedad en puesto actual:</b>

                    <br>

                    {{ $registro->antiguedad }}

                </p>



                <p class="mb-3">

                    <b>Estudios:</b>

                    <br>

                    {{ $registro->estudios }}

                </p>

            </div>



            <div class="col-12 col-md-3">

                <p class="mb-3">

                    <b>Tipo de puesto:</b>

                    <br>

                    {{ $registro->tipo_puesto }}

                </p>

                <p class="mb-3">

                    <b>Área:</b>

                    <br>

                    {{ $registro->area }}

                </p>



                <p class="mb-3">

                    <b>Tipo de contratación:</b>

                    <br>

                    {{ $registro->tipo_contratacion }}

                </p>

                <p class="mb-3">

                    <b>Tipo de Empleado:</b>

                    <br>

                    {{ $registro->tipo_empleado }}

                </p>

            </div>



            <div class="col-12 col-md-3">

                <p class="mb-3">

                    <b>Jornada de trabajo:</b>

                    <br>

                    @if ( $registro->jornada_trabajo === 'Otro' )
                        {{ $registro->jornada_trabajo }}: {{ $registro->jornada_trabajo_opcional }}
                        @else
                        {{ $registro->jornada_trabajo }}
                    @endif
                </p>

                <p class="mb-3">

                    <b>Rotación de turnos:</b>

                    <br>

                    {{ $registro->rotacion_turnos }}

                </p>

                <p class="mb-3">

                    <b>Rotación de personal:</b>

                    <br>

                    {{ $registro->rotacion_personal }}

                </p>



                <p class="mb-3">

                    <b>Experiencia Laboral:</b>

                    <br>

                    {{ $registro->experiencia_laboral }}

                </p>

            </div>

        </div>

        <div class="mt-4">

            <table class="table table-stripped table-bordered w-100">

                <thead class="thead-dark">

                    <tr>

                        <th scope="col" class="text-center">#</th>

                        <th scope="col" class="text-center">Calificaciones</th>

                        <th scope="col" class="text-center">Puntaje</th>

                        <th scope="col" class="text-center">Resultado</th>

                    </tr>

                </thead>



                <tbody>

                    <tr class="text-center bg-custom text-white">
                        <td colspan="4"><b>Eventos Traumáticos</b></td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">42</th>
                        <td scope="row">¿Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una
                            lesión grave?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_1 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">43</th>
                        <td scope="row">¿Asaltos?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_2 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">44</th>
                        <td scope="row">¿Actos violentos que derivaron en lesiones graves?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_3 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">45</th>
                        <td scope="row">¿Secuestro?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_4 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">46</th>
                        <td scope="row">¿Amenazas?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_5 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">47</th>
                        <td scope="row">¿Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas?
                        </td>
                        <td colspan="2" scope="row">{{ $registro->ets_6 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">48</th>
                        <td scope="row">¿Ha tenido recuerdos recurrentes sobre el acontecimiento que le provocan
                            malestares?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_7 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">49</th>
                        <td scope="row">¿Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le
                            producen malestar?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_8 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">50</th>
                        <td scope="row">¿Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o
                            situaciones que le puedan recordar el acontecimiento?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_9 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">51</th>
                        <td scope="row">¿Se ha esforzado por evitar todo tipo de actividades, lugares o personas que
                            motivan recuerdos del acontecimiento?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_10 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">52</th>
                        <td scope="row">¿Ha tenido dificultad para recordar alguna parte importante del evento?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_11 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">53</th>
                        <td scope="row">¿Ha disminuido su interés en sus actividades cotidianas?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_12 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">54</th>
                        <td scope="row">¿Se ha sentido usted alejado o distante de los demás?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_13 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">55</th>
                        <td scope="row">¿Ha notado que tiene dificultad para expresar sus sentimientos?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_14 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">56</th>
                        <td scope="row">¿Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que
                            otras personas o que tiene un futuro limitado?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_15 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">57</th>
                        <td scope="row">¿Ha tenido usted dificultades para dormir?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_16 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">58</th>
                        <td scope="row">¿Ha estado particularmente irritable o le han dado arranques de coraje?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_17 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">59</th>
                        <td scope="row">¿Ha tenido dificultad para concentrarse?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_18 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">60</th>
                        <td scope="row">¿Ha estado nervioso o constantemente en alerta?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_19 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">61</th>
                        <td scope="row">¿Se ha sobresaltado fácilmente por cualquier cosa?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_20 }}</td>
                    </tr>

                </tbody>

            </table>
        </div>
    </div>
@endsection



@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('js/waitMe.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>



    <script>
        $(function() {


        });
    </script>
@endsection
