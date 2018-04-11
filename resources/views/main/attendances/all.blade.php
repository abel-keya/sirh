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
      All Employee Attendances 
    </h1> 
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-md-12">
        @if (Session::has('success')) 
        <div class="alert alert-success btn-close text-center" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <span class=""> {{ Session::get('success') }}</span>
        </div>
        @endif

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Recent Check ins/outs (Check in time: 08:00 AM)</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">

            @if($attendances->count()>0)
            <table class="table table-hover">
              <tbody>
                <tr> 
                  <th>Check In</th> 
                  <th>Check Out</th> 
                  <th>Name</th> 
                  <th>Status</th> 
                  <th>Duration</th> 
                </tr>
                @foreach($attendances as $attendance)
                <tr>
                  <td> 
                    {{ Carbon\Carbon::parse($attendance->check_in)->toDayDateTimeString() }}
                  </td>
                  <td> 
                    @if($attendance->check_out)
                      {{ Carbon\Carbon::parse($attendance->check_in)->toDayDateTimeString() }}
                    @else
                      Not Yet 
                    @endif
                  </td>
                  <td> 
                     {{ $attendance->employee->name }} ({{ $attendance->employee->department->name }})
                  </td>
                  <td>
                    @if($attendance->lateness_status==0)
                      <span class="label bg-green">On Time</span>
                    @else
                      <span class="label bg-red">Late </span>
                    @endif
                  </td> 
                  <td>
                    @if($attendance->check_out)
                      {{ $attendance->duration }} 
                    @else 
                       (Pending Check Out)
                    @endif
                  </td> 
                </tr>
                @endforeach
              </tbody>
            </table>
            @else 
            There are no attendances created!
            @endif
          </div>
          <!-- /.box-body -->
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


