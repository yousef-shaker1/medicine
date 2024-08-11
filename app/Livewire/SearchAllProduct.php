<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\medicine_important;


class SearchAllProduct extends Component
{
    public $governorate;
    public $medical;
    public $medicines = [];

    public function mount()
    {
        $this->medicines = medicine_important::with('pharmacyOwner')->get();
    }

    public function search()
    {
        $query = medicine_important::with('pharmacyOwner')
            ->where('medicine_name', 'like', "%{$this->medical}%");
    
        if (!empty($this->governorate)) {
            $query->whereHas('pharmacyOwner', function ($query) {
                $query->where('governorate', 'like', "%{$this->governorate}%");
            });
        }
    
        $this->medicines = $query->get();
    }

    public function render()
    {
        return view('livewire.search-all-product', ['medicines' => $this->medicines]);
    }
}
