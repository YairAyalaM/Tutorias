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
    public function render()
    {
        $this->users = User::all();
        return view('livewire.users');
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
}
