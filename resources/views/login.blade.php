
@include('components.header')

<body class="vertical  light rtl  ">
<div class="wrapper vh-100">
      <div class="row align-items-center h-100">
        <form class="col-lg-3 col-md-4 col-10 mx-auto text-center"   action="/userLogin" method="get" >
          <div class="form-group">
            <label for="inputEmail" class="sr-only">{{ __('language.email') }}</label>
            <input type="email" class="form-control form-control-lg" placeholder="{{ __('language.email') }}" required="" autofocus=""  name="login_email" id="login_email">
          </div>
          <div class="form-group">
            <label for="inputPassword" class="sr-only">{{ __('language.password') }}</label>
            <input type="password" class="form-control form-control-lg" placeholder="{{ __('language.password') }}" required="" name="login_password" id="login_password">
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="button"  onclick="loginUsers();" >{{ __('language.login') }}</button>
        </form>
      </div>
    </div>
    @include('components.footer')
    </body>
  
</html>