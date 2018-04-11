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
      All Leave Requests 
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
            <h3 class="box-title">Recent Requests</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">

            @if($leaves->count()>0)
            <table class="table table-hover">
              <tbody>
                <tr> 
                  <th>Employee</th> 
                  <th>Start of Leave</th> 
                  <th>End of Leave</th>
                  <th>Duration</th> 
                  <th>Status</th> 
                  <th>Options</th> 
                </tr>
                @foreach($leaves as $leave)
                <tr>
                  <td> 
                    {{ $leave->employee->name }} ({{ $leave->employee->department->name }})
                  </td>
                  <td>  
                    {{ Carbon\Carbon::parse($leave->start_of_leave)->toDayDateTimeString() }}
                  </td>
                  <td>  
                    {{ Carbon\Carbon::parse($leave->end_of_leave)->toDayDateTimeString() }}
                  </td>
                  <td> 
                     {{ $leave->duration }}
                  </td> 
                  <td>
                    @if($leave->status===0)
                      <span class="label bg-blue">Pending</span>
                    @elseif($leave->status===1)
                      <span class="label bg-green">Approved <i class="fa fa-check-circle"></i></span>
                    @else
                      <span class="label bg-red">Not Approved</span>
                    @endif
                  </td> 
                  <td> 
                    <a href="#" data-toggle="modal" data-target="#modal-leave">
                      (View Leave)</small>
                    </a>
                    <a href="{{ url('/leave/respond', $leave->id) }}">
                      <small class="label bg-maroon">Respond to Request</small>
                    </a>
                  </td> 
                </tr>

                <!--Leave Modal -->
              <div class="modal fade" id="modal-leave">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title text-center">Leave Request 
                          @if($leave->status===0)
                          <span class="label bg-blue">Pending</span>
                          @elseif($leave->status===1)
                          <span class="label bg-green">Approved</span>
                          @else
                          <span class="label bg-red">Not Approved</span>
                          @endif
                        </h3>
                        </div>
                        <div class="modal-body">    
                          <div class="box-body">
                            <dl class="dl-horizontal">

                              <dt>Start of Leave:</dt>
                              <dd>
                                {{ Carbon\Carbon::parse($leave->start_of_leave)->toDayDateTimeString() }}
                              </dd><br>

                              <dt>End of Leave:</dt>
                              <dd>
                                {{ Carbon\Carbon::parse($leave->end_of_leave)->toDayDateTimeString() }}
                              </dd><br>

                              <dt>Duration:</dt>
                              <dd>
                                {{ $leave->duration }}
                              </dd><br>

                              <dt>Status:</dt>
                              <dd>
                                @if($leave->status===0)
                                <span class="label bg-blue">Pending</span>
                                @elseif($leave->status===1)
                                <span class="label bg-green">Approved</span>
                                @else
                                <span class="label bg-red">Not Approved</span>
                                @endif
                              </dd><br> 

                              <dt>Reason:</dt>
                              <dd>
                                {{ $leave->reason }}
                              </dd><br>

                              @if(!$leave->comments==null)
                              <dt>Comments from Manager</dt>
                              <dd>
                                {{ $leave->comments }}
                              </dd><br>
                              @endif 

                              <dt>Leave Request Date:</dt>
                              <dd> 
                                {{ Carbon\Carbon::parse($leave->created_at)->toFormattedDateString() }} 
                              </dd> 
                            </dl>
                          </div> 
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> 
                        </div>
                      </div> 
                    </div> 
                  </div>

                @endforeach
              </tbody>
            </table>
            @else 
            There are no leaves requested!
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


