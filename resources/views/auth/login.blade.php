
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login Page</title>

    <link rel="icon" type="image/png" sizes="16x16" href="template/assets/images/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="template/css/style.css" rel="stylesheet">
    
</head>

<body class="h-100">

    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                
                                <a class="text-center"> <h4>Slebeww Competition</h4></a>
        
                                <form class="mt-5 mb-5 login-input" action="/authenticate" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                    <button type="submit" class="btn login-form__btn submit w-100" href="{{ route('home') }}">Sign In</button>
                                </form>
                                <p class="mt-5 login-form__footer">Dont have account? <a href="{{ route('register') }}" class="text-primary">Sign Up</a> now</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="template/plugins/common/common.min.js"></script>
    <script src="template/js/custom.min.js"></script>
    <script src="template/js/settings.js"></script>
    <script src="template/js/gleek.js"></script>
    <script src="template/js/styleSwitcher.js"></script>
</body>
</html>





