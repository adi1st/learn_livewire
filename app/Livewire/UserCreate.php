<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserCreate extends Component
{
    public $name;
    public $email;
    public $password;
    public $isSaving = false;

    public function render()
    {
        return view('livewire.user-create');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        $this->reset(['name', 'email', 'password']);

        session()->flash('success', 'User created successfully');
        $this->dispatch('userStore');
    }
}
