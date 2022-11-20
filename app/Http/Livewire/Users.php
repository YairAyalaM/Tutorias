<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use RealRashid\SweetAlert\Facades\Alert;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Users extends Component
{
    use LivewireAlert;
    public $delete_id;
    protected $listeners = ['deleteConfirmed' => 'delete'];
    public $users,$name,$email,$password,$id_user,$position;
    public $modal = false;
    public function render()
    {
        // $this->users = User::all();
        $this->users = User::orderBy('position', 'asc')->get();
        return view('livewire.users');
    }

    // abrir modal
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
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function editar($id)
    {
        $user = User::findOrFail($id);
        $this->id_user = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->position = $id;
        // Storage::url($this->image->store('public/images'));
        $this->abrirModal();
    }

    public function delete(){
        $user = User::where('id',$this->delete_id)->first();
        $user->delete();

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

        $user=User::updateOrCreate(['id'=>$this->id_user],
            [
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
                $position = $this->id_user,
                // 'position' => $position,
                // 'image' => $this->image->store('public/images')
                //Storage::url es para cambiar la ruta a storage, debemos importar: use Illuminate\Support\Facades\Storage;
                // 'image' => Storage::url($this->image->store('public/images'))
            ]);

            // funcion para igual la posicion con el id
            if(is_null($position)){
                User::where('id',$user->id)->update([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'position' => $user->id,
                ]);
            }

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
