<div>
    <form wire:submit.prevent="submit">
        @csrf
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="form-group">
            <label for="medicine">اسم الدواء</label>
            <input wire:model.live="medicine" type="medicine" class="form-control @error('medicine') is-invalid @enderror" id="medicine" placeholder="ادخل اسم الدواء">
            @error('medicine')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">سعر العلبة</label>
            <input wire:model.live="price" type="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="سعر العلبة">
            @error('price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-block">اضافة</button>
    </form>
</div>