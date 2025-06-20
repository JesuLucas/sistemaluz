<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\PuestoModel;


class PuestoController extends BaseController
{
    public function index()
    {
        //
        $puestoModel = new PuestoModel();
        $data['puestos'] = $puestoModel->findAll();

        return view('puestos/index', $data);

    }

    public function crear()
    {
        // Creando puesto
        return view('puestos/crear');
    }
    public function guardar(){
        
        $puestoModel = new PuestoModel();
        $data=[
            'nombre_puesto' => $this->request->getPost('nombre_puesto')
        ];

        $puestoModel->insert($data);
        return redirect()->to('/puestos');
       
    }
    public function eliminar($id){

        $puestoModel = new PuestoModel();
        $puestoModel->delete($id);
        return redirect()->to('/puestos');

    }
    public function editar($id){
        
        $puestoModel = new PuestoModel();
        $data['puesto'] = $puestoModel->find($id);
        return view('puestos/editar', $data);
    }
    public function actualizar($id){

        $puestoModel = new PuestoModel();
        $data = [
            'id_puesto' => $id,
            'nombre_puesto' => $this->request->getPost('nombre_puesto'),
        ];
        $puestoModel->save($data);
        return redirect()->to('/puestos');
    }

}
