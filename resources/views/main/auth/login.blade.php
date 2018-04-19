@extends('template.index')

@section('body')
<div class="login-box">
    <div class="login-logo">
        KelvinHRIS</b></a>
    </div>

    <div class="login-box-body">
    <p class="login-box-msg">Kindly Sign In Below</p>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <i class="fa fa-warning" aria-hidden="true"></i>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Whoops! Sorry!</strong> There were some problems with your input.<br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger text-center btn-close" role="alert">
                <i class="fa fa-warning" aria-hidden="true"></i>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ Session::get('error') }}
            </div>
        @endif

        <form method="POST" action="{{ url('/login') }}" style="margin-bottom: 40px;">
            {{ csrf_field() }}

            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div> 

            <div class="col-xs-4 col-md-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div> 

          <br> 
    </form> 

</div>
</div>

<script type="text/javascript">
    document.body.classList.add("login-page"); 
</script>
@stop 


