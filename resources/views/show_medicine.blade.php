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
    @if (session()->has('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    
    <div class="row mt-4">
        @foreach ($medicines as $medicine)
        <div class="col-md-4 mb-4">
            <div class="card border-light shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-3">{{ $medicine->medicine_name }} : اسم الدواء </h5>
                    <h6 class="card-text">اسم الصيدلية : {{ $medicine->pharmacyOwner->pharmacy_name }}</h6>
                    <h6 class="card-text">عنوان الصيدلية : {{ $medicine->pharmacyOwner->address }}</h6>
                    <h6 class="card-text">المحافظة : {{ $medicine->pharmacyOwner->Governorate }}</h6>
                    <h6 class="card-text">سعر العلبة : {{ $medicine->price }}</h6>
                    
                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                    data-medicine_id="{{ $medicine->id }}" data-medicine_name="{{ $medicine->medicine_name }}"
                    data-toggle="modal" href="#modaldemo9" title="حذف">حذف<i
                        class="las la-trash"></i></a>

                </div>
            </div>
        </div>
        @endforeach 
    </div>

    <!-- delete -->
    <div class="modal" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف القسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('delete_medicine', $medicine->id) }}" method="post">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="medicine_id" id="medicine_id" value="">
                        <input class="form-control" name="medicine_name" id="medicine_name" type="text" vlaue=""
                            readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#modaldemo9').on('show.bs.modal', function(event) {
                // الحصول على الزر الذي أطلق الحدث
                var button = $(event.relatedTarget);
                // استخراج المعلومات من سمات البيانات
                var medicine_id = button.data('medicine_id');
                var medicine_name = button.data('medicine_name');
                // تحديث محتوى الحقول في النموذج داخل الـ modal
                var modal = $(this);
                modal.find('.modal-body #medicine_id').val(medicine_id);
                modal.find('.modal-body #medicine_name').val(medicine_name);
            });
        });
    </script>
</body>
</html>
