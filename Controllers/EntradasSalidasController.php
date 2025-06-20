<?php 

namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\EntradasSalidas;


class EntradasSalidasController extends BaseController
{
    public function index()
    {
        //
        $model = new EntradasSalidas();
        
        //$data['entradas_salidas'] = $model->findAll();

        $builder=$model->db->table('entradas_salidas')
        ->select('entradas_salidas.*, empleados.nombre AS nombre_empleado')
        ->join('empleados', 'empleados.id_empleado = entradas_salidas.id_empleado');

        $data['entradas_salidas'] = $builder->get()->getResultArray();



        foreach( $data['entradas_salidas'] as &$registro){

            $registro['total_horas']="N/A";

            if(!empty( $registro['hora_entrada']) && !empty( $registro['hora_salida']) && $registro['hora_salida']!=='00:00:00'){

                $horaEntrada=new \DateTime($registro['hora_entrada']);
                $horaSalida=new \DateTime($registro['hora_salida']);
                $interval=$horaEntrada->diff($horaSalida);
                $registro['total_horas']=$interval->format('%h:%i:%s');

            }

        }

        return view('entradas_salidas/index', $data);
        
    }
    public function listar($id_empleado){

        $model = new EntradasSalidas();

       // $data['entradas_salidas'] = $model->where('id_empleado', $id_empleado)->findAll();

       $builder=$model->db->table('entradas_salidas')
       ->select('entradas_salidas.*, empleados.nombre AS nombre_empleado')
       ->join('empleados', 'empleados.id_empleado = entradas_salidas.id_empleado')
       ->where('entradas_salidas.id_empleado', $id_empleado);

       $data['entradas_salidas'] = $builder->get()->getResultArray();


        foreach( $data['entradas_salidas'] as &$registro){

            $registro['total_horas']="N/A";

            if(!empty( $registro['hora_entrada']) && !empty( $registro['hora_salida']) && $registro['hora_salida']!=='00:00:00'){

                $horaEntrada=new \DateTime($registro['hora_entrada']);
                $horaSalida=new \DateTime($registro['hora_salida']);
                $interval=$horaEntrada->diff($horaSalida);
                $registro['total_horas']=$interval->format('%h:%i:%s');

            }

        }

        return view('entradas_salidas/index_empleado',$data);

    }
    public function reportes(){
        $datos=[];
        
        if($this->request->getPost()){
        $fechaInicio=$this->request->getPost('fecha_inicio'); 
        $fechaFin=$this->request->getPost('fecha_fin'); 
        $entradaSalidaModel = new EntradasSalidas();
        
        $entradasSalidas=$entradaSalidaModel
        ->select('
        empleados.nombre,puestos.nombre_puesto,
        COUNT(DISTINCT entradas_salidas.fecha) as dias_trabajados, 
        SUM(TIME_TO_SEC(TIMEDIFF(entradas_salidas.hora_salida,entradas_salidas.hora_entrada))) 
        as total_segundos_trabajados')
        ->join('empleados', 'empleados.id_empleado = entradas_salidas.id_empleado')
        ->join('puestos', 'puestos.id_puesto = empleados.id_puesto')
        ->where('entradas_salidas.fecha >=', $fechaInicio)
        ->where('entradas_salidas.fecha <=', $fechaFin)
        ->where('entradas_salidas.hora_salida !=','00:00:00')
        ->groupBy('empleados.id_empleado, puestos.id_puesto');

        $resultado= $entradasSalidas->get()->getResultArray();

        foreach($resultado as &$row){
           
            $totalSegundos=$row['total_segundos_trabajados']; 
            $horas=floor($totalSegundos/3600);
            $minutos=floor(($totalSegundos%3600)/60);
            $segundos=$totalSegundos%60;

            $row['horas_trabajadas']=sprintf('%02d:%02d:%02d', $horas, $minutos, $segundos);

        }


        $datos=['entradas_salidas'=>$resultado];

        


        /*->select('empleados.nombre,entradas_salidas.*')
        ->join('empleados', 'empleados.id_empleado = entradas_salidas.id_empleado')
        ->where('fecha >=', $fechaInicio)
        ->where('fecha <=', $fechaFin)
        ->findAll();
        $datos['entradas_salidas']=$entradasSalidas;
        */

        }
        return view('entradas_salidas/reportes', $datos);
    }
}

