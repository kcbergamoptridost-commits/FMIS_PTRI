<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FMIS - DOST PTRI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: linear-gradient(to bottom right, #2f5597, #6c8cd5);">

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">

   <div class="card shadow-lg" style="width: 100%; max-width: 560px; border-radius: 16px;">

        <!-- HEADER -->
        <div class="card-header text-white" style="background:#2f5597;">
            <div style="display:flex; align-items:center;">

                <!-- Logo -->
                <img src="{{ asset('image/logo.png') }}"
                     style="width:45px; height:45px; margin-right:12px;">

                <!-- Title -->
                <div>
                    <h5 style="margin:0; font-weight:600;">FMIS</h5>
                    <small>Financial Management Information System</small>
                </div>

            </div>
        </div>

        <!-- BODY -->
        <div class="card-body" style="padding: 40px;">
            {{ $slot }}
        </div>

    </div>

</div>

</body>
</html>