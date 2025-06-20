<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpleadoModel extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'id_empleado';
    protected $allowedFields = ['nombre', 'correo','clave', 'id_puesto', 'foto'];

    //Relación con Puesto
    public function puesto()
    {
        return $this->belongsTo(PuestoModel::class, 'id_puesto', 'id_puesto');
    }
    public function obtenerEmpleadosConPuesto(){

        return $this->select('empleados.*, puestos.nombre_puesto as nombre_puesto')
                    ->join('puestos', 'puestos.id_puesto = empleados.id_puesto')
                    ->findAll();
    }
    public function buscarPorClave($clave)
    {
        return $this->where('clave', $clave)->first();
    }
   
}
