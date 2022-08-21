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
    <form action="{{route('url.store')}}" method="post">
    @csrf
        <div class="d-flex justify-content-center align-items-center" style="height:300px;">
            <div class="container">
                <div class="row mx-auto">
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-1 my-auto">
                                <i class="fa fa-link fa-2x my-auto" aria-hidden="true"></i>
                            </div>
                            <div class="col-11 my-auto">
                                <input type="text" class="form-control form-control- my-auto" name="old_url" id="demo"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 d-flex justify-content-center align-items-center">
                        <div class="btn btn-icon btn-3 btn-primary mx-1" onclick="jsPaste()"/ type="button">
                            <span class="btn-inner-icon"><i class="fa fa-clipboard fa-lg" aria-hidden="true"></i></span><span class="btn-inner-text"></span>
                         </div>
                        <button class="btn btn-icon btn-3 btn-primary mx-1" type="reset">
                            <span class="btn-inner-icon fa-lg"><i class="fa fa-refresh" aria-hidden="true"></i></i></span><span class="btn-inner-text"></span>
                        </button>
                        <button class="btn btn-icon btn-3 btn-primary mx-1" type="submit">
                            <span class="btn-inner-icon my-auto"></span>
                            <span class="btn-inner-text my-auto">ShortedURL</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <div class="d-flex justify-content-center align-items-center">
            <div class="container">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">QR Code</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Short(URL)</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Full(URL)</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Created Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Number Clicks</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shorturl as $data)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            {!! QrCode::size(60)->generate($data->old_url) !!}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-1">
                                        <a type="hidden" id="copy_{{$data->id }}" value="{{ route('ShortURL.Link', $data->new_url)}}" href="{{ route('ShortURL.Link', $data->new_url)}}" target="_blank">{{ route('ShortURL.Link', $data->new_url)}}</a>
                                    </p>
                                    <p class="text-xs text-secondary font-weight-bold mb-0">
                                        <a value="copy" onclick="copyToClipboard('copy_{{$data->id}}')">
                                            <i class="fa fa-clone" aria-hidden="true"></i> COPY
                                        </a>
                                            |
                                        <i class="fa fa-clone" aria-hidden="true"></i> DOWNLOAD QR CODE
                                    </p>
                                </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$data->old_url}}</p>
                                    </td>
                                    <td>
                                        @if ($data->status==1)
                                            <a class="badge bg-success text-xxs">active now</a>
                                        @else
                                            <a class="badge bg-secondary text-xxs">no active now</a>
                                        @endif
                                    </td>
                                     <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$data->created_at}}</p>
                                    </td>
                                     <td>
                                        <p class="text-xs font-weight-bold mb-0 text-center">{{$data->number_clicks}}</p>
                                    </td>
                                    <td class="align-middle col-1">
                                        <a href="javascript:;" class="text-danger font-weight-bold text-sm" data-toggle="tooltip" data-original-title="Edit user">
                                            @if($data->status==1)
                                                <form action="{{route('url.update',$data->id)}}" method="post">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="PUT">
                                                    <input type="hidden" name="status" value="0">
                                                    <button type="submit" class="btn btn-xs btn-secondary w-100">OFF</button>
                                                </form>
                                            @else
                                            <form action="{{route('url.update',$data->id)}}" method="post">
                                                @csrf
                                                <input name="_method" type="hidden" value="PUT">
                                                <input type="hidden" name="status" value="1">
                                                <button type="submit" class="btn btn-xs btn-success w-100">ON</button>
                                            </form>
                                            @endif
                                            <form method="POST" action="{{route('url.destroy',$data->id)}}">
                                            @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="btn btn-xs btn-danger w-100 show_confirm">Delete</button>
                                            </form>
                                        </a>
                                    </td>
                            </tr>
                         @endforeach
                    </tbody>
              </table>
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
@error('old_url')
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
        icon: 'info',
        title: 'กรุณาป้อนข้อมูล'
        })
    </script>
@enderror
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
