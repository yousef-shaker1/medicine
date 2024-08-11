<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PharmacyOwner;
use App\Models\medicine_important;
use Illuminate\Support\Facades\Auth;

class AddMedicine extends Component
{
    public $medicine;
    public $price;
    public function render()
    {
        return view('livewire.add-medicine');
    }
    
        protected $rules = [
            'medicine' => 'required|min:2|max:20',
            'price' => 'required|numeric',
        ];

    public function updated($field){
        $this->validateOnly($field); 
    }

    public function submit(){
        $this->validate(); 
        $PharmacyOwner = PharmacyOwner::where('email', Auth::user()->email)->first();
        medicine_important::create([
            'pharmacy_owner_id' => $PharmacyOwner->id,
            'medicine_name' => $this->medicine,
            'price' => $this->price,
        ]);
        $this->restinput();
        session()->flash('message', 'تم اضافة الدواء بنجاح');
    }

    public function restinput(){
        $this->medicine = '';
        $this->price = '';
    }
}
