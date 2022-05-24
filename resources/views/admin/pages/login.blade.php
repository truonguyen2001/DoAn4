<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="{{asset('assets/admin/template/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/template/font-awesome/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/admin/template/css/form-elements.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/template/css/style.css')}}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="{{asset('assets/admin/template/ico/LoGo_Doan.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('assets/admin/template/ico/apple-touch-icon-144-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('assets/admin/template/ico/apple-touch-icon-114-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('assets/admin/template/ico/apple-touch-icon-72-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" href="{{asset('assets/admin/template/ico/apple-touch-icon-57-precomposed.png')}}">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        <div class="form-top">
                        <div class="form-top-left">
                        <h3>Đăng nhập hệ thống</h3>
                            <p>Nhập tài khoản và mật khẩu của bạn tại đây:</p>
                        </div>
                        <div class="form-top-right">
                        <i class="fa fa-key"></i>
                        </div>
                            </div>
                            <div class="form-bottom">

                                <!--Validation start-->
                                @error('email')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                @error('password')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                <!--Validation end-->

                                <!--Show massage start-->
                                @if(Session::has('error_message'))
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-ban"></i>Lỗi!</h5>
                                    {{Session::get('error_message')}}
                                </div>
                                @endif
                                <!--Show massage end-->

                                <form role="form" action="{{route('admin.login-post')}}" method="post" class="login-form">
                                    @csrf
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Email</label>
                                        <input type="text" class="form-username form-control @error('email') is-invalid @enderror"  id="form-username" name="email" placeholder="Email..." required value="{{old('email')}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" class="form-password form-control @error('password') is-invalid @enderror"  id="form-password"  name="password" placeholder="Password..." required>
                                    </div>
                                    <button type="submit" class="btn">Đăng nhập</button>
                                </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="{{asset('assets/admin/template/js/jquery-1.11.1.min.js')}}"></script>
        <script src="{{asset('assets/admin/template/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/admin/template/js/jquery.backstretch.min.js')}}"></script>
        <script src="{{asset('assets/admin/template/js/scripts.js')}}"></script>
        
        <!--[if lt IE 10]>
            <script src="{{asset('assets/admin/template/js/placeholder.js')}}"></script>
        <![endif]-->

    </body>

</html>