<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Laravel\Jetstream\Contracts\DeletesUsers;
use Livewire\Component;

class Users extends Component
{
    public $isModalVisible = false;
    public $isDestroyModalVisible = false;
    public $isEditModalVisible = false;
    public $userId;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $searchTerm;

    protected $rules = [
        'name' => 'string|required',
        'email' => 'email|required'
    ];

    public function render()
    {
        $searchString = '%' . $this->searchTerm . '%';

        return view('livewire.users.users', [
            'users' => User::where('name', 'like', $searchString)->get()
        ]);
    }

    public function showCreateModal(): void
    {
        $this->reset();
        $this->isModalVisible = true;
    }

    public function showEditModal($id): void
    {
        $this->userId = $id;
        $this->isEditModalVisible = true;
        $this->loadUserModel();
    }

    public function showDestroyModal($id): void
    {
        $this->userId = $id;
        $this->isDestroyModalVisible = true;
    }

    public function loadUserModel(): void
    {
        $user = User::find($this->userId);
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function createUser(CreatesNewUsers $creator): void
    {
        $this->validate();
        $creator->create($this->modalInputData());

        $this->isModalVisible = false;
        $this->reset();

        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Uspjeh! Korisnički račun je kreiran.',
            'style' => 'success'
        ]);
    }

    public function updateUser(UpdatesUserProfileInformation $updatesUserProfileInformation): void
    {
        $this->validate();
        $user = User::findOrFail($this->userId);
        $updatesUserProfileInformation->update($user, $this->modalInputData());

        $this->isEditModalVisible = false;
        $this->reset();

        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Success! User has been updated.',
            'style' => 'success'
        ]);
    }

    public function deleteUser(DeletesUsers $deletesUsers): void
    {
        $deletesUsers->delete(User::find($this->userId));
        $this->isDestroyModalVisible = false;

        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Uspjeh. Korisnik je obrisan.',
            'style' => 'success'
        ]);
    }

    public function modalInputData(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'is_admin' => false,
        ];
    }
}
