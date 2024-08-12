<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مشروع أدوية</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background-color: #007bff;
        }
        .search-bar {
            max-width: 500px;
            margin: 0 auto;
        }
        .medicine-card {
            margin: 20px 0;
        }
        .btn-whatsapp {
    background-color: #25D366; /* لون الأخضر المميز لـ WhatsApp */
    color: #fff; /* لون النص الأبيض */
    border: none; /* إزالة الحدود */
}

.card {
            background-color: #7f8386; /* لون خلفية رمادي فاتح */
            border-radius: 8px; /* زوايا دائرية للبطاقة */
        }

        .card-body {
            padding: 1.5rem; /* إضافة بعض الحشو لداخل البطاقة */
        }

        .btn-whatsapp {
            background-color: #25D366; /* لون الخلفية الأخضر */
            color: #fff; /* لون النص */
            border: none; /* إزالة الحدود */
            font-size: 16px; /* حجم النص */
            display: flex; /* لتنسيق الأيقونة والنص بشكل أفقي */
            align-items: center; /* محاذاة الأيقونة والنص عمودياً */
            justify-content: center; /* محاذاة الأيقونة والنص أفقيًا */
        }

        .btn-whatsapp .bi-whatsapp {
            margin-right: 8px; /* مسافة بين الأيقونة والنص */
        }

        .btn-whatsapp:hover {
            background-color: #128C7E; /* لون أخضر أغمق عند التمرير */
        }


    </style>
     @livewireStyles
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        @if(!Auth::user())
            <a class="navbar-brand text-white" href="{{ route('Pharmacy_owner') }}">انشاء حساب</a>
            <a class="navbar-brand text-white" href="{{ route('login') }}">تسجيل دخول</a>
        @else
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-link text-white">تسجيل خروج</button>
        </form>        
            <a class="navbar-brand text-white" href="{{ route('add_medicine') }}">رفع دواء</a>
            <a class="navbar-brand text-white" href="{{ route('show_medicine') }}">مشاهدة الادوية الخاصة بي</a>
            <a class="navbar-brand text-white" href="{{ route('home') }}">الرئيسية</a>
        @endif
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">ادوية</a>
                </li>
            </ul>
        </div>
    </nav>
    
    @livewire('search-all-product')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @livewireScripts
</body>
</html>
