<!DOCTYPE html>
<html>
<head>
    <title>DOST-PTRI FMIS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0d6efd, #5dade2);
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .btn-custom {
            padding: 12px 30px;
            font-size: 18px;
            border-radius: 30px;
        }
    </style>
</head>
<body>

<div>
    <div class="text-center">
   <img src="{{ asset('image/logo.png') }}" width="120"
     style="width: 120px;"
     class="mb-3">
         
</div>
    <h1 class="fw-bold mb-3">
        DOST-Philippine Textile Research Institute
    </h1>

    <h4 class="mb-4">
        Financial Management Information System
    </h4>


<a href="{{ route('login') }}" class="btn btn-primary btn-custom">
    Get Started
</a>

</div>

</body>
</html>