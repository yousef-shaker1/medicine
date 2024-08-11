<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.login');
    }
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function updated($field){
        $this->validateOnly($field); 
    }
    public function submit()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->intended('dashboard'); // أو الصفحة التي تريد إعادة التوجيه إليها
        } else {
            session()->flash('message', 'بيانات تسجيل الدخول غير صحيحة');
        }
    }

}
