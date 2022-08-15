<?php

namespace App\Http\Controllers;

use App\Empresas;
use App\Registro;
use App\Calificaciones;
use App\AvisoPrivacidad;
use App\Configuracion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Exports\RegistroExport;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class RegistroController extends Controller
{

    public function index($token){
        // Empresa activa
        $empresa = Empresas::where('token', $token)->where('activo', 1)->first();
        $aviso = AvisoPrivacidad::first();
        $configuraciones = Configuracion::first();
        return view('index', compact('empresa', 'token', 'configuraciones'));
    }

    public function registroDatos(Request $request)
    {

        if($request->item_sc == "Sí"){
            // Validar campos
            $messages=[
                'email.required' => 'El campo Correo electrónico es obligatorio.',
                'email.email' => 'El campo Correo electrónico no es válido.',
                'email.unique' => 'El campo Correo electrónico ya existe.',
                'sexo.required' => 'El campo Sexo es obligatorio.',
                'estado_civil.required' => 'El campo Estado civil es obligatorio.',
                'edad.required' => 'El campo Edad en años es obligatorio.',
                'antiguedad.required' => 'El campo Antigüedad en puesto actual es obligatorio.',
                'estudios.required' => 'El campo Estudios es obligatorio.',
                'tipo_puesto.required' => 'El campo Tipo de puesto es obligatorio.',
                'area.required' => 'El campo Área es obligatorio.',
                'tipo_contratacion.required' => 'El campo Tipo de contratación es obligatorio.',
                'jornada_trabajo.required' => 'El campo Jornada de trabajo es obligatorio.',
                'rotacion_turnos.required' => 'El campo Rotación de turnos es obligatorio.',
                'experiencia_laboral.required' => 'El campo Eperiencia laboral es obligatorio.',
                'item_sc.required' => 'El campo En mi trabajo debo brindar servicio a clientes o usuarios es obligatorio.',
                'item_jefe.required' => 'El campo Soy jefe de otros trabajadores es obligatorio.',
                'ets_1.required' => 'El campo ¿Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave? es obligatorio.',
                'ets_2.required' => 'El campo ¿Asaltos? es obligatorio.',
                'ets_3.required' => 'El campo ¿Actos violentos que derivaron en lesiones graves? es obligatorio.',
                'ets_4.required' => 'El campo ¿Secuestro? es obligatorio.',
                'ets_5.required' => 'El campo ¿Amenazas? es obligatorio.',
                'ets_6.required' => 'El campo ¿Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas? es obligatorio.',
                'ets_7.required' => 'El campo ¿Ha tenido recuerdos recurrentes sobre el acontecimiento que le provocan malestares? es obligatorio.',
                'ets_8.required' => 'El campo ¿Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le producen malestar? es obligatorio.',
                'ets_9.required' => 'El campo ¿Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o situaciones que le puedan recordar el acontecimiento? es obligatorio.',
                'ets_10.required' => 'El campo ¿Se ha esforzado por evitar todo tipo de actividades, lugares o personas que motivan recuerdos del acontecimiento? es obligatorio.',
                'ets_11.required' => 'El campo ¿Ha tenido dificultad para recordar alguna parte importante del evento? es obligatorio.',
                'ets_12.required' => 'El campo ¿Ha disminuido su interés en sus actividades cotidianas? es obligatorio.',
                'ets_13.required' => 'El campo ¿Se ha sentido usted alejado o distante de los demás? es obligatorio.',
                'ets_14.required' => 'El campo ¿Ha notado que tiene dificultad para expresar sus sentimientos? es obligatorio.',
                'ets_15.required' => 'El campo ¿Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras personas o que tiene un futuro limitado? es obligatorio.',
                'ets_16.required' => 'El campo ¿Ha tenido usted dificultades para dormir? es obligatorio.',
                'ets_17.required' => 'El campo ¿Ha estado particularmente irritable o le han dado arranques de coraje? es obligatorio.',
                'ets_18.required' => 'El campo ¿Ha tenido dificultad para concentrarse? es obligatorio.',
                'ets_19.required' => 'El campo ¿Ha estado nervioso o constantemente en alerta? es obligatorio.',
                'ets_20.required' => 'El campo ¿Se ha sobresaltado fácilmente por cualquier cosa? es obligatorio.',
            ];

            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:registros',
                'sexo' => 'required',
                'estado_civil' => 'required',
                'edad' => 'required',
                'antiguedad' => 'required',
                'estudios' => 'required',
                'tipo_puesto' => 'required',
                'area' => 'required',
                'tipo_contratacion' => 'required',
                'jornada_trabajo' => 'required',
                'experiencia_laboral' => 'required',
                'item_sc' => 'required',
                'item_jefe' => 'required',
                'ets_1' => 'required',
                'ets_2' => 'required',
                'ets_3' => 'required',
                'ets_4' => 'required',
                'ets_5' => 'required',
                'ets_6' => 'required',
                'ets_7' => 'required',
                'ets_8' => 'required',
                'ets_9' => 'required',
                'ets_10' => 'required',
                'ets_11' => 'required',
                'ets_12' => 'required',
                'ets_13' => 'required',
                'ets_14' => 'required',
                'ets_15' => 'required',
                'ets_16' => 'required',
                'ets_17' => 'required',
                'ets_18' => 'required',
                'ets_19' => 'required',
                'ets_20' => 'required',

            ], $messages);
        }else{
            $messages=[
                'email.required' => 'El campo Correo electrónico es obligatorio.',
                'email.email' => 'El campo Correo electrónico no es válido.',
                'email.unique' => 'El campo Correo electrónico ya existe.',
                'sexo.required' => 'El campo Sexo es obligatorio.',
                'estado_civil.required' => 'El campo Estado civil es obligatorio.',
                'edad.required' => 'El campo Edad en años es obligatorio.',
                'antiguedad.required' => 'El campo Antigüedad en puesto actual es obligatorio.',
                'estudios.required' => 'El campo Estudios es obligatorio.',
                'tipo_puesto.required' => 'El campo Tipo de puesto es obligatorio.',
                'area.required' => 'El campo Área es obligatorio.',
                'tipo_contratacion.required' => 'El campo Tipo de contratación es obligatorio.',
                'jornada_trabajo.required' => 'El campo Jornada de trabajo es obligatorio.',
                'rotacion_turnos.required' => 'El campo Rotación de turnos es obligatorio.',
                'experiencia_laboral.required' => 'El campo Eperiencia laboral es obligatorio.',
                'item_sc.required' => 'El campo En mi trabajo debo brindar servicio a clientes o usuarios es obligatorio.',
                'item_jefe.required' => 'El campo Soy jefe de otros trabajadores es obligatorio.',


            ];
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:registros',
                'sexo' => 'required',
                'estado_civil' => 'required',
                'edad' => 'required',
                'antiguedad' => 'required',
                'estudios' => 'required',
                'tipo_puesto' => 'required',
                'area' => 'required',
                'tipo_contratacion' => 'required',
                'jornada_trabajo' => 'required',
                'experiencia_laboral' => 'required',
                'item_sc' => 'required',
                'item_jefe' => 'required',

            ], $messages);
        }

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages(),
                'message' => 'Algunos campos estan vacios, favor de verificar.',
                'status' => 400
            ]);
        }else{
            $registro = Registro::create($request->all());
            return response()->json(['data' => $registro, 'message' => 'Registro creado correctamente', 'status' => 201]);
        }

    }

    public function resultados($token)
    {
        // $registro = Registro::find($token);
        $registro = Registro::where('token', $token)->first();

        Paginator::useBootstrap();

        if ($registro) {
            return view('resultados', compact('registro'));
        } else {
            return view('resultado_inexistente');
        }
    }



    public function registroAdmin(){
        if(request()->ajax())
        {
            $registros = Registro::all();
            $registros = Registro::with('empresa')->get();
            return DataTables()->of($registros)
                ->make(true);
        }
        return view('admin.registros.index');
    }

    // Exportar registros generales
    public function export($id)
    {
        $registro = Registro::where('id_empresa', $id)->get();
        $empresa = Empresas::where('id', $id)->first();
        // return Excel::download(new RegistroExport, "Registros-".date("Y-m-d H:i:s").".xlsx");
        return (new RegistroExport($registro))->download("Registros de la empresa $empresa->nombre-".date("Y-m-d H:i:s").".xlsx");
    }

    // Eliminar registro
    public function delete($id)
    {
        $registro = Registro::find($id);

        if($registro){
            $registro->delete();
            $calificacion;
            return response()->json(['message' => 'Registro eliminado correctamente.', 'status' => 'success']);
        }else{
            return response()->json(['message' => 'El registro no se ah eliminado.', 'status' => 'error']);
        }

    }

}
