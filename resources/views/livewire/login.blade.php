<div>
    <form wire:submit.prevent="submit">
        @csrf
        @if (session()->has('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
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
            <label for="password">كلمة المرور</label>
            <input wire:model.live="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="أدخل كلمة المرور">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-block">تسجيل</button>
        <a href="{{ route('Pharmacy_owner') }}">Don't have an account? Register</a>
    </form>
</div>