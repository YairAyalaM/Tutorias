<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Students extends Component
{
    use LivewireAlert;
    public $delete_id;
    protected $listeners = ['deleteConfirmed' => 'delete'];

    public $students,$nombre,$id_user,$id_student,$position;
    public $modal = false;
    public function render()
    {
        $this->students = Student::all();
        return view('livewire.students');
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
    }

    public function editar($id)
    {
        $student = Student::findOrFail($id);
        $this->id_student = $id;
        $this->nombre = $student->nombre;
        $this->id_user = $student->id_user;
        // Storage::url($this->image->store('public/images'));
        $this->abrirModal();
    }

    public function delete(){
        $student = Student::where('id',$this->delete_id)->first();
        $student->delete();

        $this->dispatchBrowserEvent('FileDeleted');
    }

    public function deleteConfirmation($id){
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function guardar()
    {

        // $image=$this->image->store('public/images');
        // $url = Storage::url($image);

        Student::updateOrCreate(['id'=>$this->id_student],
            [
                'nombre' => $this->nombre,
                'id_user' => auth()->id(),
                // 'position' => $position,
                // 'image' => $this->image->store('public/images')
                //Storage::url es para cambiar la ruta a storage, debemos importar: use Illuminate\Support\Facades\Storage;
                // 'image' => Storage::url($this->image->store('public/images'))
            ]);
        //  session()->flash('message',
        //     $this->id_asociacion ? '¡Actualización exitosa!' : '¡Alta Exitosa!');
        $this->alert('success', 'Alta exitosa!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
           ]);
         
         $this->cerrarModal();
         $this->limpiarCampos();
    }
}
