<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{

    use WithPagination;

    #[Rule('required|min:3|max:50')]
    public $name;
    public $search;
    public $EditTodoID;
    #[Rule('required|min:3|max:50')]
    public $EditTodoName;

    public function createTodo()
    {
        $validated = $this->validateOnly('name');
        Todo::create($validated);

        $this->reset('name');
        session()->flash('success', 'Todo created successfully');
    }

    public function delete($todoID)
    {
        try {
            Todo::findOrfail($todoID)->delete();
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to delete todo!');
            return;
        }
    }

    public function toggle($todoID)
    {
        $todo = Todo::find($todoID);
        $todo->completed = !$todo->completed;
        $todo->save();

        $this->resetPage();
    }

    public function edit($todoID)
    {
        $this->EditTodoID = $todoID;
        $this->EditTodoName = Todo::find($todoID)->name;
    }

    public function cancelEdit()
    {
        $this->reset('EditTodoID', 'EditTodoName');
    }

    public function update()
    {
        $this->validateOnly('EditTodoName');
        Todo::find($this->EditTodoID)->update([
            'name' => $this->EditTodoName,
        ]);

        $this->cancelEdit();
    }

    public function render()
    {
        return view('livewire.todo-list', [
            'todos' => Todo::latest()->where('name', 'like', "%{$this->search}%")->paginate(5),
        ]);
    }
}
