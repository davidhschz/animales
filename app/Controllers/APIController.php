<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class APIController extends ResourceController
{
    protected $modelName = 'App\Models\AnimalModelo';
    protected $format    = 'json';

    public function index(){
        return $this->respond($this->model->findAll());
    }

    public function registrarAnimal(){
        
        $datosEnviar = array(
            /* 'id'=>$this->request->getPost('id'),  --Borrado por AI de database*/
            /* Tipo es booleano*/
            'nombre'=>$this->request->getPost('nombre'),
            'edad'=>$this->request->getPost('edad'),
            'tipo'=>$this->request->getPost('tipo'),
            'descripcion'=>$this->request->getPost('descripcion'),
            'comida'=>$this->request->getPost('comida')
        );
        
        if($this->validate('registroAnimal')){
            
            $this->model->insert($datosEnviar);
            $mensaje=array('estado'=>true,'mensaje'=>"registro agregado con exito");
            return $this->respond($mensaje);

        }else{
            $validation =  \Config\Services::validation();
            return $this->respond($validation->getErrors(),400);

        }
    }

    public function editarAnimal($id){
        $datosPeticion = $this->request->getRawInput();
        
        $datosEnvio = array(
            'nombre'=>$datosPeticion['nombre'],
            'edad'=>$datosPeticion['edad'],
            'tipo'=>$datosPeticion['tipo'],
            'descripcion'=>$datosPeticion['descripcion'],
            'comida'=>$datosPeticion['comida']
        );

        //return $this->respond($datosEnvio);
        if($this->validate('registroAnimal')){
            
            $this->model->update($id,$datosEnvio);
            $mensaje=array('estado'=>true,'mensaje'=>"Registro editado con exito");
            return $this->respond($mensaje);

        }else{
            $validation =  \Config\Services::validation();
            return $this->respond($validation->getErrors(),400);

        }
    }

    public function eliminarAnimal($id){
        $consulta=$this->model->where('id',$id)->delete();
        $filasAfectadas=$consulta->connID->affected_rows;
        if($filasAfectadas==1){

            $mensaje=array('estado'=>true,'mensaje'=>"Registro eliminado con exito");
            return $this->respond($mensaje);

        }else{
            $mensaje=array('estado'=>false,'mensaje'=>"El animal a eliminar no se encontró en BD");
            return $this->respond($mensaje,400);
        }
    }
}