@extends('template.index')

@section('body')

  @include('main.partials.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('main.partials.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Account 
        <small>
          <a href="{{ url('my-account/view') }}">(Go Back)</a>
        </small>
      </h1> 
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row"> 
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary"> 
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ url('/my-account/update') }}" style="margin-bottom: 40px;">
              {{ csrf_field() }}

              <div class="box-body">
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

                @if (Session::has('success')) 
                  <div class="alert alert-info btn-close text-center" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <span class=""> {{ Session::get('info') }}</span>
                  </div>
                @endif

                <input type="hidden" name="user_id" value="{{ $user->id }}">

                <div class="form-group">
                  <label for="name">My Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" value="{{ $user->name }}" required>
                </div>

                <div class="form-group">
                  <label for="email">My Email address</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ $user->email }}" required>
                </div>

                <div class="form-group" id="newpassword">
                  <label for="newpasswordinput">My New Password</label>
                  <input type="password" class="form-control" id="newpasswordinput" name="password" placeholder="Password">
                </div> 

                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="use_new_password" name="password_check" value="true" checked> Use Old Password
                  </label>
                </div> 

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update My Details</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
 
 

        </div>
      </div> 
 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  @include('main.partials.footer')

</div>
<!-- ./wrapper -->
  
  @include('main.partials.body-script')
@stop 


