<?php

namespace App\Models;

use CodeIgniter\Model;

class EntradasSalidas extends Model
{
    protected $table='entradas_salidas'; 
    protected $primaryKey = 'id_registro';

    protected $allowedFields=['id_empleado', 'fecha','hora_entrada','hora_salida'];

  
}
