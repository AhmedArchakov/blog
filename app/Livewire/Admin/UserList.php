<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public $perPage = 5;
    public $query;

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function updatedQuery()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        User::destroy($id);
    }

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->query . '%')->paginate($this->perPage);
        return view('livewire.admin.user-list', compact('users'));
    }
}
