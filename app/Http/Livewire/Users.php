<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    public function render()
    {
        $this->users = User::all();
        return view('livewire.users');
    }

    public function borrar($id)
    {
        User::find($id)->delete();
        // session()->flash('message', 'Registro eliminado correctamente');
        // $this->alert('success', 'Registro eliminado correctamente!', [
        //     'position' => 'center',
        //     'timer' => 3000,
        //     'toast' => true,
        // ]);
    }
}
