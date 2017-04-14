
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Apple iOS and Android stuff (do not remove) -->
<meta name="apple-mobile-web-app-capable" content="no" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1" />

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="{{asset('/admins/css/reset.css')}}"  media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('/admins/css/text.css')}}"  media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('/admins/css/fonts/ptsans/stylesheet.css')}}"  media="screen" />

<link rel="stylesheet" type="text/css" href="{{asset('/admins/css/core/form.css')}}"  media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('/admins/css/core/login.css')}}"  media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('/admins/css/core/button.css')}}"  media="screen" />

<link rel="stylesheet" type="text/css" href="{{asset('/admins/css/mws.theme.css')}}"  media="screen" />

<!-- JavaScript Plugins -->
<script type="text/javascript" src="{{asset('/admins/js/jquery-1.7.2.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('/admins/js/jquery.placeholder.js')}}" ></script>

<!-- jQuery-UI Dependent Scripts -->
<script type="text/javascript" src="{{asset('/admins/jui/js/jquery-ui-effecs.min.js')}}" ></script>

<!-- Plugin Scripts -->
<script type="text/javascript" src="{{asset('/admins/plugins/validate/jquery.validate-min.js')}}" ></script>

<!-- Login Script -->
<script type="text/javascript" src="{{asset('/admins/js/core/login.js')}}" ></script>

<title>MWS Admin - Login Page</title>

</head>

<body>
    <style type="text/css">


        .auth{
            margin-left:9px;
            color:white;
            font-size:12px;
            text-decoration: none;
            margin-left: 115px;
        }
        a:hover{
            color: #96c742;
            text-decoration: underline;
        }
    </style>
    <div id="mws-login-wrapper">
        <div id="mws-login">
            <h1>登录</h1>
            <div class="mws-login-lock"><img src="{{asset('/admins/css/icons/24/locked-2.png')}}"  alt="" /></div>
            <div id="mws-login-form">
                <form class="mws-form" action="{{url('/auth/login')}}" method="post">
                    {{csrf_field()}}
                    <div class="mws-form-row">
                        <div class="mws-form-item large">
                            <input type="text" name="username" value="{{old('username')}}"class="mws-login-username mws-textinput required" placeholder="用户名称" />
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item large">
                            <input type="password" name="password" class="mws-login-password mws-textinput required" placeholder="用户密码" />
                        </div>
                    </div>
                    <div class="mws-form-row mws-inset">
                        <ul class="mws-form-list inline">
                            <li><input type="checkbox" /> <label>记住用户</label></li>
                        </ul>
                    </div>
                    <div class="mws-form-row">
                        <input type="submit" value="登录" class="mws-button green mws-login-button" />
                    </div>
                    <!-- <a href="/auth/register" class="auth">还没有账号进行登录,去注册</a> -->
                </form>
            </div>
        </div>
    </div>

</body>
</html>
