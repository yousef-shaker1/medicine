<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\medicine_important;
use Illuminate\Support\Facades\Auth;

class MedicineController extends Controller
{
    public function index(){
        return view('add_medicine');
    }
    
    public function show(){
        $medicines = medicine_important::where('pharmacy_owner_id', Auth::user()->id)->get();
        return view('show_medicine' , compact('medicines'));
    }

    public function delete(Request $request, $id){
        $medicine = medicine_important::findorfail($id);
        $medicine->delete();
        session()->flash('message', 'تم الحذف بنجاح');
        return redirect()->back();
    }
}
