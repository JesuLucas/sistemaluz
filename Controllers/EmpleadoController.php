<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\EmpleadoModel;
use App\Models\PuestoModel;


class EmpleadoController extends BaseController
{
    public function index()
    {
        //
        $empleadoModel = new EmpleadoModel();
        //$data['empleados'] = $empleadoModel->findAll();
        $data['empleados'] = $empleadoModel->obtenerEmpleadosConPuesto();
        return view('empleados/index',$data);
    }

    public function crear()
    {
        //
       $puestoModel = new PuestoModel();
       $data['puestos'] = $puestoModel->findAll();
       return view('empleados/crear', $data);
       
    }

    public function guardar()
    {
        helper(['form','url','text']);
        $EmpleadoModel = new EmpleadoModel();
        // Genera una contraseña aleatoria de 4 caracteres (letras y números)
        $clave = random_string('alnum', 4);
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'correo' => $this->request->getPost('correo'),
            'clave' => $clave, PASSWORD_DEFAULT,
            'id_puesto' => $this->request->getPost('id_puesto'),
        ];
        
        if ($this->request->getFile('foto')->isValid()) {
            $fotoFile = $this->request->getFile('foto');
            $fotoName = $fotoFile->getRandomName();
            $fotoFile->move(ROOTPATH . 'public/uploads', $fotoName);
            $data['foto'] = $fotoName;
        }

        $EmpleadoModel->save($data);

        return redirect()->to(base_url('/empleados'));
        
    }
    public function eliminar($id){

        $empleadoModel = new EmpleadoModel();

        $empleado = $empleadoModel->find($id);
        if (!empty($empleado['foto']) && file_exists(ROOTPATH . 'public/uploads/' . $empleado['foto'])) {
            unlink(ROOTPATH . 'public/uploads/' . $empleado['foto']);
        }
        $empleadoModel->delete($id);
        return redirect()->to(base_url('/empleados'));

    }

    public function editar($id)
    {
        $empleadoModel = new EmpleadoModel();
        $data['empleado'] = $empleadoModel->find($id);
        
        $puestoModel = new PuestoModel();
        $data['puestos'] = $puestoModel->findAll();
        return view('empleados/editar', $data);
    }

    public function actualizar($id)
    {
        helper(['form', 'url', 'text']);
        $empleadoModel = new EmpleadoModel();

        $empleado = $empleadoModel->find($id);
        
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'correo' => $this->request->getPost('correo'),
            'id_puesto' => $this->request->getPost('id_puesto'),
        ];

        if ($this->request->getFile('foto')->isValid()) {

            if (!empty($empleado['foto']) && file_exists(ROOTPATH . 'public/uploads/' . $empleado['foto'])) {
                unlink(ROOTPATH . 'public/uploads/' . $empleado['foto']);
            }

            $fotoFile = $this->request->getFile('foto');
            $fotoName = $fotoFile->getRandomName();
            $fotoFile->move(ROOTPATH . 'public/uploads', $fotoName);
            $data['foto'] = $fotoName;
        }
        $empleadoModel->update($id, $data);
        return redirect()->to(base_url('/empleados'));


    }

}
