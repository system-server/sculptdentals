<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sculpt Dental | Bienvenido</title>

    <!-- Bootstrap -->
    <link href=" {{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }} " rel="stylesheet">
    <!-- Font Awesome -->
    <link href=" {{ asset('vendors/font-awesome/css/font-awesome.min.css') }} " rel="stylesheet">
    <!-- NProgress -->
    <link href=" {{ asset('vendors/nprogress/nprogress.css') }} " rel="stylesheet">
    <!-- Animate.css -->
    <link href=" {{ asset('vendors/animate.css/animate.min.css') }} " rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href=" {{ asset('build/css/custom.min.css') }} " rel="stylesheet">
  </head>

  <body class="login" style="background-color: white">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}           
              <h1>Bienvenido</h1>
              <img src=" {{ asset('img/template/logo.png') }} " style="width: 170px; margin-bottom: 15px">
              <div>
                <input type="text" class="form-control" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" required>
              </div>
              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif              
              <div>
                <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
              </div>
              <div>
                <button class="btn btn-default" type="submit">Ingresar</button>
                <!--<a class="reset_pass" href="#">Lost your password?</a>-->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Ingresa los datos solicitados
                  <!--<a href="#signup" class="to_register"> Create Account </a>-->
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-user-md"></i> Sculpt Dental</h1>
                  <p>©2018 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form method="POST" action="{{ route('login') }}">
              <h1>Create Account</h1>
              <div class="has-error{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>