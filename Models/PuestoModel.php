<?php

namespace App\Models;

use CodeIgniter\Model;

class PuestoModel extends Model
{
    
    protected $table = 'puestos';
    protected $primaryKey = 'id_puesto';
    protected $allowedFields = ['nombre_puesto'];

}
