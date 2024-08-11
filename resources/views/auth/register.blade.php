<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة التسجيل</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
         body {
            background-color: #6093d6; /* خلفية زرقاء فاتحة */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background: rgba(205, 209, 209, 0.555); /* خلفية شفافة */
            padding: 21px; /* تقليل الحشو بشكل كبير */
            border-radius: 2px; /* تقليل زاوية التدوير */
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 490px; /* تقليل العرض الأقصى */
        }
        .form-container h2 {
            margin-bottom: 3px; /* تقليل المسافة السفلية */
            font-size: 16px; /* تصغير حجم الخط */
        }
        form {
            margin: 0; /* إزالة المسافات الخارجية */
        }
        .form-group {
            margin-bottom: 3px; /* تقليل المسافة بين الحقول */
        }
        button {
            margin-top: 3px; /* تقليل المسافة العليا للزر */
            font-size: 10px; /* تصغير حجم خط الزر */
        }
        .form-control {
            font-size: 10px; /* تصغير حجم الخط في الحقول */
        }
        .invalid-feedback {
            font-size: 8px; /* تصغير حجم خط الرسائل الخطأ */
        }
    </style>
    @livewireStyles
</head>
<body>
    <div class="form-container">
        <h2 class="text-center">تسجيل حساب جديد</h2>
  @livewire('register')
</div>

@livewireScripts
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
