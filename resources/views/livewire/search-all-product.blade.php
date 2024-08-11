<div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 search-bar">
                <div class="d-flex">
                    <div class="input-group mr-2">
                        <button wire:click="search" class="btn btn-primary" type="button">بحث</button>
                        <input wire:model.lazy="governorate" type="text" class="form-control" placeholder="اسم المحافظة">
                        <div class="input-group-append">
                        </div>
                    </div>
                    <div class="input-group">
                        <input wire:model.lazy="medical" type="text" class="form-control" placeholder="اسم الدواء">
                    </div>
                </div>
            </div>
        </div>
         
        
        <div class="row mt-4">
            @foreach ($medicines as $medicine)
            <div class="col-md-4 mb-4">
                <div class="card border-light shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title  mb-3">{{ $medicine->medicine_name }} : اسم الدواء </h5>
                        <h6 class="card-text ">   اسم الصيدلية : {{ $medicine->pharmacyOwner->pharmacy_name }}</h6>
                        <h6 class="card-text "> عنوان الصيدلية : {{ $medicine->pharmacyOwner->address }}</h6>
                        <h6 class="card-text "> المحافظة : {{ $medicine->pharmacyOwner->Governorate }}</h6>
                         <h6 class="card-text "> سعر العلبة : {{ $medicine->price }}</h6>
                         <a class="btn btn-whatsapp w-100 mt-3" 
                         href="https://wa.me/20{{ $medicine->pharmacyOwner->phone }}?text=مرحبا%20كيف%20الحال%20أريد%20الدواء%0A%0A{{ urlencode($medicine->medicine_name) }}" 
                         target="_blank">
                          <i class="bi bi-whatsapp"></i> تواصل معي على الواتس
                      </a>
                    </div>
                </div>
            </div>
            @endforeach 
        </div>
    </div>
</div>
