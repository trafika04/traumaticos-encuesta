<style>

    .badge-success-low {

        color: #000;

        background-color: #92d050;

    }

    .badge-warning-low {

        color: #000;

        background-color: #ffff00;

    }

</style>

<table>

    <thead>

        <tr>

            <th style="width: 25px;">ID</th>

            <th style="width: 350px;">Empresa</th>

            <th style="width: 250px;">Email</th>

            <th style="width: 100px;">Sexo</th>

            <th style="width: 100px;">Estado civil</th>

            <th style="width: 100px;">Edad</th>

            <th style="width: 100px;">Antiguedad</th>

            <th style="width: 100px;">Estudios</th>

            <th style="width: 180px;">Tipo de puesto</th>

            <th style="width: 180px;">Área</th>

            <th style="width: 180px;">Tipo de contratacion</th>

            <th style="width: 180px;">Tipo de Empleado</th>

            <th style="width: 180px;">Jornada de trabajo</th>

            <th style="width: 180px;">Rotacion de turnos</th>

            <th style="width: 180px;">Experiencia laboral</th>

            <th style="width: 180px;">¿Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave?</th>
            <th style="width: 180px;">¿Asaltos?</th>
            <th style="width: 180px;">¿Actos violentos que derivaron en lesiones graves?</th>
            <th style="width: 180px;">¿Secuestro?</th>
            <th style="width: 180px;">¿Amenazas?</th>
            <th style="width: 250px;">¿Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas?</th>
            <th style="width: 250px;">¿Ha tenido recuerdos recurrentes sobre el acontecimiento que le provocan malestares?</th>
            <th style="width: 250px;">¿Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le producen malestar?</th>
            <th style="width: 250px;">¿Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o situaciones que le puedan recordar el acontecimiento?</th>
            <th style="width: 250px;">¿Se ha esforzado por evitar todo tipo de actividades, lugares o personas que motivan recuerdos del acontecimiento?</th>
            <th style="width: 250px;">¿Ha tenido dificultad para recordar alguna parte importante del evento?</th>
            <th style="width: 250px;">¿Ha disminuido su interés en sus actividades cotidianas?</th>
            <th style="width: 250px;">¿Se ha sentido usted alejado o distante de los demás?</th>
            <th style="width: 250px;">¿Ha notado que tiene dificultad para expresar sus sentimientos?</th>
            <th style="width: 250px;">¿Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras personas o que tiene un futuro limitado?</th>
            <th style="width: 250px;">¿Ha tenido usted dificultades para dormir?</th>
            <th style="width: 250px;">¿Ha estado particularmente irritable o le han dado arranques de coraje?</th>
            <th style="width: 250px;">¿Ha tenido dificultad para concentrarse?</th>
            <th style="width: 250px;">¿Ha estado nervioso o constantemente en alerta?</th>
            <th style="width: 250px;">¿Se ha sobresaltado fácilmente por cualquier cosa?</th>



        </tr>

    </thead>

    <tbody>



    @foreach($registros as $registro)

        <tr>

            <td>{{ $registro->id }}</td>

            <td>{{ $registro->empresa->nombre }}</td>

            <td>{{ $registro->email }}</td>

            <td>{{ $registro->sexo }}</td>

            <td>{{ $registro->estado_civil }}</td>

            <td>{{ $registro->edad }}</td>

            <td>{{ $registro->antiguedad }}</td>

            <td>{{ $registro->estudios }}</td>

            <td>{{ $registro->tipo_puesto }}</td>

            <td>{{ $registro->area }}</td>

            <td>{{ $registro->tipo_contratacion }}</td>

            <td>{{ $registro->tipo_empleado }}</td>

            @if ( $registro->jornada_trabajo === 'Otro' )
                <td>{{ $registro->jornada_trabajo }}: {{ $registro->jornada_trabajo_opcional }}</td>
                @else
                <td>{{ $registro->jornada_trabajo }}</td>
            @endif

            <td>{{ $registro->rotacion_turnos }}</td>

            <td>{{ $registro->experiencia_laboral }}</td>

            {{-- ¿Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave? --}}
            <td>{{ $registro->ets_1 }}</td>

            {{-- ¿Asaltos? --}}
            <td>{{ $registro->ets_2 }}</td>

            {{-- ¿Actos violentos que derivaron en lesiones graves? --}}
            <td>{{ $registro->ets_3 }}</td>

            {{-- ¿Secuestro? --}}
            <td>{{ $registro->ets_4 }}</td>

            {{-- ¿Amenazas? --}}
            <td>{{ $registro->ets_5 }}</td>

            {{-- ¿Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas? --}}
            <td>{{ $registro->ets_6 }}</td>

            {{-- ¿Ha tenido recuerdos recurrentes sobre el acontecimiento que le provocan malestares? --}}
            <td>{{ $registro->ets_7 }}</td>

            {{-- ¿Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le producen malestar? --}}
            <td>{{ $registro->ets_8 }}</td>

            {{-- ¿Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o situaciones que le puedan recordar el acontecimiento? --}}
            <td>{{ $registro->ets_9 }}</td>

            {{-- ¿Se ha esforzado por evitar todo tipo de actividades, lugares o personas que motivan recuerdos del acontecimiento? --}}
            <td>{{ $registro->ets_10 }}</td>

            {{-- ¿Ha tenido dificultad para recordar alguna parte importante del evento? --}}
            <td>{{ $registro->ets_11 }}</td>

            {{-- ¿Ha disminuido su interés en sus actividades cotidianas? --}}
            <td>{{ $registro->ets_12 }}</td>

            {{-- ¿Se ha sentido usted alejado o distante de los demás? --}}
            <td>{{ $registro->ets_13 }}</td>

            {{-- ¿Ha notado que tiene dificultad para expresar sus sentimientos? --}}
            <td>{{ $registro->ets_14 }}</td>

            {{-- ¿Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras personas o que tiene un futuro limitado? --}}
            <td>{{ $registro->ets_15 }}</td>

            {{-- ¿Ha tenido usted dificultades para dormir? --}}
            <td>{{ $registro->ets_16 }}</td>

            {{-- ¿Ha estado particularmente irritable o le han dado arranques de coraje? --}}
            <td>{{ $registro->ets_17 }}</td>

            {{-- ¿Ha tenido dificultad para concentrarse? --}}
            <td>{{ $registro->ets_18 }}</td>

            {{-- ¿Ha estado nervioso o constantemente en alerta? --}}
            <td>{{ $registro->ets_19 }}</td>

            {{-- ¿Se ha sobresaltado fácilmente por cualquier cosa? --}}
            <td>{{ $registro->ets_20 }}</td>

        </tr>

    @endforeach

    </tbody>

</table>
