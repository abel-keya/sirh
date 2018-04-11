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
        Leave Delete
        <small>
          <a href="{{ url('/leave/view') }}">(Go Back)</a>
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
            <form role="form" method="POST" action="{{ url('/leave/delete', $leave->id) }}" style="margin-bottom: 40px;">
              {{ csrf_field() }}

              <div class="box-body">
            
                 <p>
                    Are you sure you want to delete this leave with duration <br>
                    <strong>
                      {{ Carbon\Carbon::parse($leave->start_of_leave)->toDayDateTimeString() }}
                    </strong> 
                    to 
                    <strong>
                      {{ Carbon\Carbon::parse($leave->end_of_leave)->toDayDateTimeString() }}
                    </strong>?
                 </p>

              </div> 

              <div class="box-footer">
                <button type="submit" class="btn btn-danger">Delete Leave</button>
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


