<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\PharmacyOwner;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $pharmacy_name;
    public $governorate;
    public $phone;
    public $address;

        protected $rules = [
            'name' => 'required|min:3|max:25',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:5|max:15',
            'phone' => 'required|digits:11',
            'address' => 'required',
            'governorate' => 'required|max:15',
            'pharmacy_name' => 'required|max:25',
        ];
    public function render()
    {
        return view('livewire.register');
    }

    public function updated($field){
        $this->validateOnly($field); 
    }

    public function submit(){
        $this->validate(); 
        PharmacyOwner::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'phone' => $this->phone,
            'address' => $this->address,
            'governorate' => $this->governorate,
            'pharmacy_name' => $this->pharmacy_name,
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);
        session()->flash('message', 'تم التسجيل بنجاح');
    }
}
