<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserTable extends Component
{
    protected $listeners = ['userStore' => 'render'];
    // public $name;
    // public $email;
    // public $password;
    // public $userId;

    // public function mount($userId = null)
    // {
    //     if ($userId) {
    //         $user = User::find($userId);
    //         $this->name = $user->name;
    //         $this->email = $user->email;
    //         // $this->password = $user->password;
    //     }
    // }

    public function render()
    {
        // $this->dispatch('userSaved');
        return view('livewire.user-table', [
            'users' => User::orderBy('id', 'desc')->get(),
        ]);
    }
}
