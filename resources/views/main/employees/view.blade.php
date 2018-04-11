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
      Employees
      <small>
        <a href="{{ url('/employee/create') }}">(create)</a>
      </small>
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
            <h3 class="box-title">All</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">

            @if($employees->count()>0)
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>No.</th>
                  <th>Employee Name</th> 
                  <th>Employee Email</th> 
                  <th>Department</th> 
                  <th>Options</th> 
                </tr>
                @foreach($employees as $key=>$employee)
                <tr>
                  <td>{{ ++$key }}.</td>
                  <td>
                    {{ $employee->name }}
                    @foreach($employee->roles as $role)
                      <span class="label label-success">
                        {{$role->name}}
                      </span> &nbsp;
                    @endforeach 
                  </td>
                  <td>{{ $employee->email }}</td> 
                  <td>{{ $employee->department->name }}</td> 
                  <td>
                      {{-- <a href="#" data-toggle="modal" data-target="#modal-employee">
                        <small class="label bg-green">View Employee</small>
                      </a> --}}
                      <a href="{{ url('employee/edit', $employee->id) }}">
                        <small class="label bg-blue">Edit</small>
                      </a>
                      <a href="{{ url('employee/delete', $employee->id) }}">
                        <small class="label bg-red">Delete</small>
                      </a> 
                  </td> 
                </tr>

                <!--Employee Modal -->
                <div class="modal fade" id="modal-employee">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title text-center">Performance Appraisal</h3>
                      </div>
                      <div class="modal-body">    
                              <div class="box-body">
                                <dl class="dl-horizontal">
                                  <dt>Name of Employee:</dt>
                                  <dd>{{ $employee->name }}</dd> <br>

                                  <dt>Department:</dt>
                                  <dd>{{ $employee->department->name }}</dd><br> 

                                  <dt>Role:</dt>
                                  <dd>
                                      @foreach($employee->roles as $role)
                                        <span class="label label-success">
                                          {{$role->name}}
                                        </span> &nbsp;
                                      @endforeach 
                                  </dd><br>

                                  <dt>Email:</dt>
                                  <dd>
                                    {{ $employee->email }}
                                  </dd><br>

                                  <dt>Nationality:</dt>
                                  <dd>
                                    {{ $employee->nationality }}
                                  </dd><br>

                                  <dt>Date of Birth:</dt>
                                  <dd>
                                      {{ $employee->date_of_birth }} 
                                  </dd><br>

                                  <dt>Gender:</dt>
                                  <dd>
                                      {{ $employee->gender }}  
                                  </dd><br>

                                  <dt>Marital Status:</dt>
                                  <dd>
                                      {{ $employee->marital_status }}  
                                  </dd><br>

                                  <dt>ID Number:</dt>
                                  <dd>
                                      {{ $employee->id_number }}  
                                  </dd><br>

                                  <dt>Mobile Number:</dt>
                                  <dd>
                                      {{ $employee->mobile_number }}  
                                  </dd><br>

                                  <dt>Next of Kin:</dt>
                                  <dd>
                                      {{ $employee->next_of_kin }}  
                                  </dd><br>

                                  <dt>Next of Kin ID Number:</dt>
                                  <dd>
                                      <strong>
                                        {{ $employee->next_of_kin_id_no }}
                                      </strong>  
                                  </dd><br>

                                  <dt>Address:</dt>
                                  <dd>
                                      <strong>
                                        {{ $employee->address }}
                                      </strong>  
                                  </dd><br>

                                  <dt>Employment Status:</dt>
                                  <dd>
                                      {{ $employee->employment_status }}  
                                  </dd><br>

                                  <dt>LinkedIn Profile Url:</dt>
                                  <dd>
                                      {{ $employee->linkedin_url }}  
                                  </dd><br>

                                  <dt>Employee Record Creation Date:</dt>
                                  <dd> 
                                      {{ Carbon\Carbon::parse($employee->created_at)->toFormattedDateString() }} 
                                  </dd>
                                </dl>
                              </div> 
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> 
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                @endforeach
              </tbody>
            </table>
            @else 
            There are no employees created!
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


