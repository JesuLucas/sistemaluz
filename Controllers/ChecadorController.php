<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\EmpleadoModel;
use App\Models\EntradasSalidas;

class ChecadorController extends BaseController
{
    public function index()
    {
        //
        return view('checador/index');
    }
    public function verificarClave(){

        date_default_timezone_set('America/Mexico_City');
        
        $clave = $this->request->getPost('clave');
        $empleadoModel = new EmpleadoModel();
        $empleado = $empleadoModel->buscarPorClave($clave);
        $mensaje='Empleado no encontrado.';

        if ($empleado) {

            
            $idEmpleado=$empleado['id_empleado'];
            $entradaSalidaModel = new EntradasSalidas();

            if($this->request->getPost('entrada')){
                $entradaSalidaModel->insert(
                    [
                    'id_empleado' => $idEmpleado, 
                    'fecha' => date('Y-m-d'), 
                    'hora_entrada' => date('H:i:s'), 
                    'hora_salida' => '00:00:00'
                    ]
                );
                $mensaje='Hora de entrada registrada.';
            }
            if($this->request->getPost('salida')){
                $registroEntradas=  $entradaSalidaModel->where('id_empleado',$idEmpleado)
                ->where('fecha',date('Y-m-d'))->findAll();
                
                $data=['hora_salida'=>date('H:i')];

                foreach($registroEntradas as $entrada){

                    $entradaSalidaModel->update($entrada['id_registro'], $data);

                }
                $mensaje='Hora de salida registrada.';

            }

        }
            return view('checador/index', ['mensaje' => $mensaje ]);
        

    }

    public function revisarEntradasSalidas(){
        return view('checador/entradas_salidas');
    }
    public function buscarEntradasSalidas(){
        helper(['form','url']);
        if($this->request->getPost()){
            $fechaInicio=  $this->request->getPost('fecha_inicio');
            $fechaFin=  $this->request->getPost('fecha_fin');
            $clave= $this->request->getPost('clave');

            $empleadoModel = new EmpleadoModel();
            $empleado = $empleadoModel->where('clave',$clave)->first();

            if($empleado){
                $idEmpleado=$empleado['id_empleado'];
                $entradaSalidaModel = new EntradasSalidas();

                $revisarEntradas=$entradaSalidaModel
                ->select('entradas_salidas.fecha,entradas_salidas.hora_entrada,entradas_salidas.hora_salida')
                ->where('id_empleado',$idEmpleado)
                ->where('fecha >=',$fechaInicio)
                ->where('fecha <=',$fechaFin)
                ->findAll();

                foreach($revisarEntradas as &$registro ){

                    $registro['total_horas']='En turno';

                    if($registro['hora_salida']!='00:00:00'){
                        $horaEntrada=new \DateTime($registro['hora_entrada']);
                        $horaSalida=new \DateTime($registro['hora_salida']);
                        $interval=$horaEntrada->diff($horaSalida);
                       $registro['total_horas']=$interval->format('%h:%i:%s');
                    }

                }

            }

        }

        return view('checador/entradas_salidas',['entradas_salidas'=>$revisarEntradas] );

    }


}
