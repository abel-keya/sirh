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
        Department Edit
        <small>
          <a href="{{ url('/departments/view') }}">(Go Back)</a>
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
            <form role="form" method="POST" action="{{ url('/department/update', $department->id) }}" style="margin-bottom: 40px;">
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

                <div class="form-group">
                  <label for="name">My Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" value="{{ $department->name }}" required>
                </div> 

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Department</button>
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


