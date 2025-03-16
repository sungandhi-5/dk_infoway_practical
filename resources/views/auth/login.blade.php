<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$header['title']}}</title>
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/toaster.min.css')}}" rel="stylesheet">
    <input type="hidden" id="csrf_token" value="{{csrf_token()}}">
</head>
<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-sm p-4" style="width: 400px;">
            <h4 class="text-center mb-4">Login to Your Account</h4>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('post_login') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="button" id="login-btn" class="btn btn-primary w-100 mt-3">Login <span class="spinner-border spinner-border-sm me-2 d-none"  id="login-btn-spinner"></span></button>
            </form>
        </div>
    </div>

    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/jquery.min.js')}}"></script>
    <script src="{{asset('/js/toaster.min.js')}}"></script>
    <script src="{{asset('/js/common.min.js')}}"></script>
    <script src="{{asset('/js/login.min.js')}}"></script>
</body>
</html>