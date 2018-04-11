@extends('template.index')

@section('body')
<div class="wrapper">
@include('main.partials.header')
<!-- Left side column. contains the logo and sidebar -->
@include('main.partials.aside')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Performance Appraisals

      @if(Auth::user()->hasRole('manager') && !Auth::user()->hasRole('administrator'))
        <small>
          <a href="{{ url('/performanceappraisal/create') }}">(create)</a>
        </small> 
      @endif 
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

            @if($performanceappraisals->count()>0)
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>No.</th>
                  <th>Employee</th> 
                  <th>Manager</th>
                  <th>Date</th>
                  <th>Options</th> 
                </tr>
                @foreach($performanceappraisals as $key=>$performanceappraisal)
                <tr>
                  <td>{{ ++$key }}.</td>
                  <td>
                      {{ $performanceappraisal->employee->name }} 
                      ({{ $performanceappraisal->employee->department->name }})
                  </td> 
                  <td>
                    {{ $performanceappraisal->manager->name }}
                  </td> 
                  <td>
                    {{ Carbon\Carbon::parse($performanceappraisal->created_at)->toFormattedDateString() }}
                  </td>
                  <td>
                      <a href="#" data-toggle="modal" data-target="#modal-appraisal">
                        <small class="label bg-maroon">View Appraisal</small>
                      </a>
                      <a href="{{ url('performanceappraisal/edit', $performanceappraisal->id) }}">
                        <small class="label bg-blue">Edit</small>
                      </a>
                      <a href="{{ url('performanceappraisal/delete', $performanceappraisal->id) }}">
                        <small class="label bg-red">Delete</small>
                      </a> 
                  </td> 
                </tr>

                <!--Appraisal Modal -->
                <div class="modal fade" id="modal-appraisal">
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
                                  <dd>{{ $performanceappraisal->employee->name }}</dd> <br>

                                  <dt>Department:</dt>
                                  <dd>{{ $performanceappraisal->employee->department->name }}</dd><br> 

                                  <dt>Evaluation Period:</dt>
                                  <dd>
                                      {{ Carbon\Carbon::parse($performanceappraisal->evaluation_period_from)->toFormattedDateString() }} to 
                                      {{ Carbon\Carbon::parse($performanceappraisal->evaluation_period_to)->toFormattedDateString() }} 
                                  </dd><br>

                                  <dt>Manager:</dt>
                                  <dd>
                                    {{ $performanceappraisal->manager->name }}
                                  </dd><br>

                                  <dt>Position Description:</dt>
                                  <dd>
                                    {{ $performanceappraisal->position_description }}
                                  </dd><br>

                                  <dt>Position Expertise:</dt>
                                  <dd>
                                      {{ $performanceappraisal->position_expertise }} 
                                      <strong>
                                        ({{ $performanceappraisal->position_expertise_rating }})
                                      </strong>
                                  </dd><br>

                                  <dt>Approach to Work:</dt>
                                  <dd>
                                      {{ $performanceappraisal->approach_to_work }} 
                                      <strong>
                                        ({{ $performanceappraisal->approach_to_work_rating }})
                                      </strong>
                                  </dd><br>

                                  <dt>Quality of Work:</dt>
                                  <dd>
                                      {{ $performanceappraisal->quality_of_work }} 
                                      <strong>
                                        ({{ $performanceappraisal->quality_of_work_rating }})
                                      </strong>
                                  </dd><br>

                                  <dt>Communication Skills:</dt>
                                  <dd>
                                      {{ $performanceappraisal->communication_skills }} 
                                      <strong>
                                        ({{ $performanceappraisal->communication_skills_rating }})
                                      </strong>
                                  </dd><br>

                                  <dt>Interpersonal Skills:</dt>
                                  <dd>
                                      {{ $performanceappraisal->interpersonal_skills }} 
                                      <strong>
                                        ({{ $performanceappraisal->interpersonal_skills_rating }})
                                      </strong>
                                  </dd><br>

                                  <dt title="Other Performance factors:">Other Performance factors:</dt>
                                  <dd>
                                      {{ $performanceappraisal->other_performance_factors }}  
                                  </dd><br>

                                  <dt>Overall Rating:</dt>
                                  <dd>
                                      <strong>
                                        {{ $performanceappraisal->overall_rating }}
                                      </strong>  
                                  </dd><br>

                                  <dt>Appraisal Creation Date:</dt>
                                  <dd> 
                                      {{ Carbon\Carbon::parse($performanceappraisal->created_at)->toFormattedDateString() }} 
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
            There are no performance appraisals created!
            @endif
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
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


