<?php

namespace App\Livewire;

use App\Models\Employer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;

use Livewire\WithFileUploads;

class Registration extends Component
{
    use WithFileUploads;

    public $role = "JobSeeker";

    #[Rule(['required','string','max:255'])]
    public $name;

    #[Rule(['required','string','max:255','unique:users'])]
    public $email;

    #[Rule(['required','confirmed','max:255'])]
    public $password;

    #[Rule(['required','max:255'])]
    public $password_confirmation;

    #[Rule(['required','image','max:1024','mimes:jpg,jpeg,png'])]
    public $avatar;

    #[Rule(['required_if:role,Employer','max:255'])]
    public $company_name;

    #[Rule(['required_if:role,Employer','max:255'])]
    public $company_address;



    public function render()
    {
        return view('livewire.registration');
    }

    public function toggleRole()
    {
        if($this->role == "JobSeeker")
        {
            $this->role = "Employer";
        }
        else{
            $this->role = "JobSeeker";
        }
    }

    public function register()
    {
        sleep(1);
        $this->validate();

        $role = Role::create([
            'name' => $this->role
        ]);

        $file_path = $this->avatar->store('avatars','public');

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role_id' => $role->id,
            'avatar' => $file_path
        ]);

        if($this->role == 'Employer')
        {
            Employer::create([
                'user_id' => $user->id,
                'company_name' => $this->company_name,
                'company_address' => $this->company_address
            ]);
        }

        session()->flash('success','User Created Successfully');
        $this->reset(['name','email','password','password_confirmation','company_name','company_address','avatar']);

    }
}
