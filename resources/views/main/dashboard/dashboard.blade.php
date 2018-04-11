@extends('template.index')

@section('body')

@include('main.partials.header')


<!-- Left side column. aside the logo and sidebar -->
@include('main.partials.aside')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      @if(Auth::user()->hasRole('employee') && 
          !Auth::user()->hasRole('manager') && 
          !Auth::user()->hasRole('administrator'))
        <span>Employee</span> 
      @endif

      @if(Auth::user()->hasRole('manager') && !Auth::user()->hasRole('administrator'))
        <span>Manager</span> 
      @endif

      @if(Auth::user()->hasRole('administrator'))
      <span>Administrator</span> 
      @endif 

      Dashboard 
    </h1> 
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row">

      @if (Session::has('error')) 
      <div class="col-md-8">
        <div class="alert alert-danger text-center btn-close" role="alert">
          <i class="fa fa-warning" aria-hidden="true"></i>
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ Session::get('error') }}
        </div>
      </div>
      @endif

      @if(Auth::user()->hasRole('administrator'))
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="{{ url("/departments/view/") }}">
          <div class="info-box">
            <span class="info-box-icon bg-black"><i class="fa ion-cube"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Departments</span>
              <span class="info-box-number">{{ $count_departments }}</span>
            </div> 

          </div> 
        </a>
      </div> 
      @endif

      @if(Auth::user()->hasRole('administrator') || Auth::user()->hasRole('manager'))
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="{{ url("/employees/view/") }}">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-person-stalker"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Employees</span>
              <span class="info-box-number">{{ $count_users }}</span>
            </div> 
          </div> 
        </a>
      </div> 
      @endif



      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="{{ url('my-account/view') }}">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion ion-person"></i></span>
            <div class="info-box-content" style="padding-top: 30px;"> 
              <span class="info-box-number">My Account</span>
            </div>
          </div>
        </a>
      </div>


      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="{{ url('/attendance/create') }}">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-person-add"></i></span>
            <div class="info-box-content" style="padding-top: 30px;"> 
              <span class="info-box-number">Check In/Out</span>
              <span class="info-box-text">{{ Carbon\Carbon::now()->toTimeString() }}</span>
            </div>
          </div>
        </a>
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


