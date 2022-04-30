<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Docentes;


class Docente extends Component
{
    
    public $nombre, $carrera, $año, $id_docentes;
    public $modal = false;

    public function render()
    {
        $this->docentes = Docentes::all();
        return view('livewire.docente');
    }

    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal() {
        $this->modal = true;
    }
    public function cerrarModal() {
        $this->modal = false;
    }
    public function limpiarCampos(){
        $this->nombre = '';
        $this->carrera = '';
        $this->id_docentes = '';
    }
    public function editar($id)
    {
        $docente = Docentes::findOrFail($id);
        $this->id_docentes = $id;
        $this->nombre = $docente->nombre;
        $this->carrera = $docente->carrera;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Docentes::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        Docentes::updateOrCreate(['id'=>$this->id_docentes],
            [
                'nombre' => $this->nombre,
                'carrera' => $this->carrera
            ]);
         
         session()->flash('message',
            $this->id_docentes ? '¡Actualización exitosa!' : '¡Alta Exitosa!');
         
         $this->cerrarModal();
         $this->limpiarCampos();
    }
}





