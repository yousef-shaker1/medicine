<?php

namespace App\Models;

use App\Models\PharmacyOwner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class medicine_important extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function PharmacyOwner(){
        return $this->belongsTo(PharmacyOwner::class);
    }
}
