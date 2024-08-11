<div>
    <form wire:submit.prevent="submit">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="form-group">
            <label for="name">الاسم الكامل</label>
            <input wire:model.live="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="أدخل اسمك الكامل">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">البريد الإلكتروني</label>
            <input wire:model.live="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="أدخل بريدك الإلكتروني">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="pharmacy_name">اسم الصيدلية</label>
            <input wire:model.live="pharmacy_name" type="text" class="form-control @error('pharmacy_name') is-invalid @enderror" id="pharmacy_name" placeholder="أدخل اسم الصيدلية">
            @error('pharmacy_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">عنوان الصيدلية</label>
            <input wire:model.live="address" type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="ادخل عنوان الصيدلية">
            @error('address')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="governorate">اسم المحافظة</label>
            <input wire:model.live="governorate" type="text" class="form-control @error('governorate') is-invalid @enderror" id="governorate" placeholder="أدخل اسم المحافظة">
            @error('governorate')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">رقم الهاتف</label>
            <input wire:model.live="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="أدخل رقم هاتفك">
            @error('phone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">كلمة المرور</label>
            <input wire:model.live="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="أدخل كلمة المرور">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-block">تسجيل</button>
        <a href="{{ route('login') }}" class="d-block text-center mt-3">لديك حساب؟ تسجيل الدخول</a>
    </form>
</div>