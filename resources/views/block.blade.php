<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="">
    <link rel="icon" type="" href="">
    <title>
        ShortURL
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="/../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="/../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="/../../assets/css/argon-dashboard.css?v=2.0.0" rel="stylesheet" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="g-sidenav-show   bg-gray-100">
    <style>
        .no-border {
            border: 0;
            box-shadow: none;
        }
        .swal2-popup {
            font-size: 13px !important;
        }
    </style>
        <div class="d-flex justify-content-center align-items-center text-center" style="height:500px;">
            <div class="container">
                <h1><svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-shield-fill-x mx-2 text-danger" viewBox="0 0 16 16">
                    <path d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zM6.854 5.146 8 6.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 7l1.147 1.146a.5.5 0 0 1-.708.708L8 7.707 6.854 8.854a.5.5 0 1 1-.708-.708L7.293 7 6.146 5.854a.5.5 0 1 1 .708-.708z"/>
                  </svg>
                  The site can not be reached
                </h1>
            </div>
        </div>
        
@if (session('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-center',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })
                Toast.fire({
                icon: 'success',
                title: 'Successful'
                })
    </script>
@endif
@if (session('error'))
    <script>
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-center',
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })
        Toast.fire({
        icon: 'error',
        title: 'The site can not be reached'
        })
    </script>
@endif
    <script>
        function jsPaste(){
            navigator.clipboard.readText()
            .then(txt =>{
                document.getElementById("demo").value = txt;
            })
            .catch(err=>{
                alert("No add");
            });
        }
    </script>
    <script>
        function jsCopy(){
            var txt = document.getElementById('copy').value;
            navigator.clipboard.writeText(txt)
            .then(() =>{
                    alert('Copy')
            })
            .catch(err=>{
                alert("No add");
            });
        }
    </script>
    <script>
        function copyToClipboard(id) {
            document.getElementById(id).select();
            document.execCommand('copy');
        }
    </script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="../assets/js/argon-dashboard.min.js?v=2.0.3"></script>
<script src='https://getbootstrap.com/dist/js/bootstrap.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<script src="/script.js"></script>
<script src="/script.js"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="/../../assets/js/argon-dashboard.min.js?v=2.0.0"></script>
</body>

</html>
