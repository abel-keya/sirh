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
        Performance Appraisal Edit
        <small>
          <a href="{{ url('/performanceappraisals/view') }}">(Go Back)</a>
        </small>
      </h1> 
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row"> 
        <div class="col-md-10">
          <!-- general form elements -->
          <div class="box box-primary"> 
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ url('/performanceappraisal/update', $performanceappraisal->id) }}" style="margin-bottom: 40px;">
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
                    <label>Select an Employee</label>
                    <select class="form-control select2" name="employee_id" style="width: 100%;">
                      <option value="">Select an Employee</option> 
                      @foreach ($employees as $employee)
                          @if ($employee->id == $performanceappraisal->employee_id)
                              <option selected value="{{ $employee->id }}">{{ $employee->name }}</option>
                          @else
                              <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                          @endif
                      @endforeach 
                    </select>
                  </div> 

                  <div class="form-group">
                    <label>Start of Evaluation Period:</label> 
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker" name="evaluation_period_from" value="{{ Carbon\Carbon::parse($performanceappraisal->evaluation_period_from)->toFormattedDateString() }}">
                    </div> 
                  </div>

                  <div class="form-group">
                    <label>End of Evaluation Period:</label> 
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker2" name="evaluation_period_to" value="{{ Carbon\Carbon::parse($performanceappraisal->evaluation_period_to)->toFormattedDateString() }} ">
                    </div> 
                  </div>
                  <div class="form-group">
                    <label>Position Description</label> 
                    <p>See job description and previous year's goals and expectations.</p>
                    <div class="box"> 
                      <div class="box-body pad"> 
                          <textarea class="textarea" name="position_description" placeholder="Position Description here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>{{ $performanceappraisal->position_description }}</textarea> 
                      </div>
                    </div>
                  </div>

                  <hr>

                  <div class="form-group">
                    <label>Position Expertise</label>
                    <p>Effectiveness with which the employee applies profession/managerial/technical skills and knowledge to the job.</p> 
                    <div class="box"> 
                      <div class="box-body pad"> 
                          <textarea class="textarea" name="position_expertise" placeholder="Position Expertise here" 
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>{{ $performanceappraisal->position_expertise }}</textarea> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                      <label for="position_expertise_rating">Position Expertise Rating</label>
                      <select id="position_expertise_rating" name="position_expertise_rating" class="form-control" required> 
                        <option value="">Select a Rating</option>
                        @if($performanceappraisal->position_expertise_rating == 0)
                          <option value="0" selected>Not Applicable (N/A)</option>
                        @else 
                          <option value="0">Not Applicable (N/A)</option>
                        @endif

                        @if($performanceappraisal->position_expertise_rating == 1)
                          <option value="1" selected>Unacceptable (U)</option>
                        @else
                          <option value="1">Unacceptable (U)</option>
                        @endif

                        @if($performanceappraisal->position_expertise_rating == 2)
                          <option value="2" selected>Needs Improvement (NI) </option>
                        @else 
                          <option value="2">Needs Improvement (NI)</option>
                        @endif

                        @if($performanceappraisal->position_expertise_rating == 3)
                          <option value="3" selected>Satisfactory (S)</option>
                        @else 
                          <option value="3">Satisfactory (S)</option>
                        @endif

                        @if($performanceappraisal->position_expertise_rating == 4)
                          <option value="4" selected>More Than Satisfactory (MS)</option>
                        @else 
                          <option value="4">More Than Satisfactory (MS)</option>
                        @endif

                        @if($performanceappraisal->position_expertise_rating == 5)
                          <option value="5" selected>Exceptional (E)</option>
                        @else 
                          <option value="5">Exceptional (E)</option>
                        @endif
                      </select> 
                  </div>

                  <hr>

                  <div class="form-group">
                    <label>Approach to Work</label> 
                    <p>Characteristics the employee demonstrates while perfoming job assignments including creativity, flexibility, initiative, planning and organization, time management, commitment to diversity, ethical behaviour, process improvement and/or profesional development.</p>
                    <div class="box"> 
                      <div class="box-body pad"> 
                          <textarea class="textarea" name="approach_to_work" placeholder="Approach to Work"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>{{ $performanceappraisal->approach_to_work }}</textarea> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                      <label for="approach_to_work_rating">Position Expertise Rating</label>
                      <select id="approach_to_work_rating" name="approach_to_work_rating" class="form-control" required> 
                        <option value="">Select a Rating</option>
                        @if($performanceappraisal->approach_to_work_rating == 0)
                          <option value="0" selected>Not Applicable (N/A)</option>
                        @else 
                          <option value="0">Not Applicable (N/A)</option>
                        @endif

                        @if($performanceappraisal->approach_to_work_rating == 1)
                          <option value="1" selected>Unacceptable (U)</option>
                        @else
                          <option value="1">Unacceptable (U)</option>
                        @endif

                        @if($performanceappraisal->approach_to_work_rating == 2)
                          <option value="2" selected>Needs Improvement (NI) </option>
                        @else 
                          <option value="2">Needs Improvement (NI)</option>
                        @endif

                        @if($performanceappraisal->approach_to_work_rating == 3)
                          <option value="3" selected>Satisfactory (S)</option>
                        @else 
                          <option value="3">Satisfactory (S)</option>
                        @endif

                        @if($performanceappraisal->approach_to_work_rating == 4)
                          <option value="4" selected>More Than Satisfactory (MS)</option>
                        @else 
                          <option value="4">More Than Satisfactory (MS)</option>
                        @endif

                        @if($performanceappraisal->approach_to_work_rating == 5)
                          <option value="5" selected>Exceptional (E)</option>
                        @else 
                          <option value="5">Exceptional (E)</option>
                        @endif
                      </select> 
                  </div>

                  <hr>

                  <div class="form-group">
                    <label>Quality of Work</label> 
                    <p>Characteristics the employee demonstrates while perfoming job assignments including creativity, flexibility, initiative, planning and organization, time management, commitment to diversity, ethical behaviour, process improvement and/or profesional development.</p>
                    <div class="box"> 
                      <div class="box-body pad"> 
                          <textarea class="textarea" name="quality_of_work" placeholder="Approach to Work"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>{{ $performanceappraisal->quality_of_work }}</textarea> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                      <label for="quality_of_work_rating">Quality of Work Rating</label>
                      <select id="quality_of_work_rating" name="quality_of_work_rating" class="form-control" required> 
                        <option value="">Select a Rating</option>
                        @if($performanceappraisal->quality_of_work_rating == 0)
                          <option value="0" selected>Not Applicable (N/A)</option>
                        @else 
                          <option value="0">Not Applicable (N/A)</option>
                        @endif

                        @if($performanceappraisal->quality_of_work_rating == 1)
                          <option value="1" selected>Unacceptable (U)</option>
                        @else
                          <option value="1">Unacceptable (U)</option>
                        @endif

                        @if($performanceappraisal->quality_of_work_rating == 2)
                          <option value="2" selected>Needs Improvement (NI) </option>
                        @else 
                          <option value="2">Needs Improvement (NI)</option>
                        @endif

                        @if($performanceappraisal->quality_of_work_rating == 3)
                          <option value="3" selected>Satisfactory (S)</option>
                        @else 
                          <option value="3">Satisfactory (S)</option>
                        @endif

                        @if($performanceappraisal->quality_of_work_rating == 4)
                          <option value="4" selected>More Than Satisfactory (MS)</option>
                        @else 
                          <option value="4">More Than Satisfactory (MS)</option>
                        @endif

                        @if($performanceappraisal->quality_of_work_rating == 5)
                          <option value="5" selected>Exceptional (E)</option>
                        @else 
                          <option value="5">Exceptional (E)</option>
                        @endif
                      </select> 
                  </div>

                  <hr>

                  <div class="form-group">
                    <label>Communication Skills</label> 
                    <p>Manner in which the employee completes job assignments including accuracy, responsiveness, follow-through, judgement, decision making, reliability and compliance assurance.</p>
                    <div class="box"> 
                      <div class="box-body pad"> 
                          <textarea class="textarea" name="communication_skills" placeholder="Approach to Work"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>{{ $performanceappraisal->communication_skills }}</textarea> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                      <label for="communication_skills_rating">Communication Skills Rating</label>
                      <select id="communication_skills_rating" name="communication_skills_rating" class="form-control" required> 
                        <option value="">Select a Rating</option>
                        @if($performanceappraisal->communication_skills_rating == 0)
                          <option value="0" selected>Not Applicable (N/A)</option>
                        @else 
                          <option value="0">Not Applicable (N/A)</option>
                        @endif

                        @if($performanceappraisal->communication_skills_rating == 1)
                          <option value="1" selected>Unacceptable (U)</option>
                        @else
                          <option value="1">Unacceptable (U)</option>
                        @endif

                        @if($performanceappraisal->communication_skills_rating == 2)
                          <option value="2" selected>Needs Improvement (NI) </option>
                        @else 
                          <option value="2">Needs Improvement (NI)</option>
                        @endif

                        @if($performanceappraisal->communication_skills_rating == 3)
                          <option value="3" selected>Satisfactory (S)</option>
                        @else 
                          <option value="3">Satisfactory (S)</option>
                        @endif

                        @if($performanceappraisal->communication_skills_rating == 4)
                          <option value="4" selected>More Than Satisfactory (MS)</option>
                        @else 
                          <option value="4">More Than Satisfactory (MS)</option>
                        @endif

                        @if($performanceappraisal->communication_skills_rating == 5)
                          <option value="5" selected>Exceptional (E)</option>
                        @else 
                          <option value="5">Exceptional (E)</option>
                        @endif
                      </select> 
                  </div>

                  <hr>

                  <div class="form-group">
                    <label>Interpersonal Skills</label> 
                    <p>Effectiveness of the employee's interactin in responding to and working with others.</p>
                    <div class="box"> 
                      <div class="box-body pad"> 
                          <textarea class="textarea" name="interpersonal_skills" placeholder="Approach to Work"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>{{ $performanceappraisal->interpersonal_skills }}</textarea> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                      <label for="interpersonal_skills_rating">Interpersonal Skills Rating</label>
                      <select id="interpersonal_skills_rating" name="interpersonal_skills_rating" class="form-control" required> 
                        @if($performanceappraisal->interpersonal_skills_rating == 0)
                          <option value="0" selected>Not Applicable (N/A)</option>
                        @else 
                          <option value="0">Not Applicable (N/A)</option>
                        @endif

                        @if($performanceappraisal->interpersonal_skills_rating == 1)
                          <option value="1" selected>Unacceptable (U)</option>
                        @else
                          <option value="1">Unacceptable (U)</option>
                        @endif

                        @if($performanceappraisal->interpersonal_skills_rating == 2)
                          <option value="2" selected>Needs Improvement (NI) </option>
                        @else 
                          <option value="2">Needs Improvement (NI)</option>
                        @endif

                        @if($performanceappraisal->interpersonal_skills_rating == 3)
                          <option value="3" selected>Satisfactory (S)</option>
                        @else 
                          <option value="3">Satisfactory (S)</option>
                        @endif

                        @if($performanceappraisal->interpersonal_skills_rating == 4)
                          <option value="4" selected>More Than Satisfactory (MS)</option>
                        @else 
                          <option value="4">More Than Satisfactory (MS)</option>
                        @endif

                        @if($performanceappraisal->interpersonal_skills_rating == 5)
                          <option value="5" selected>Exceptional (E)</option>
                        @else 
                          <option value="5">Exceptional (E)</option>
                        @endif
                      </select> 
                  </div>

                  <hr>

                  <div class="form-group">
                    <label>Other Additional Perfomance Factors</label> 
                    <p>Evaluate the additional performance factors not mentioned above.</p>
                    <div class="box"> 
                      <div class="box-body pad"> 
                          <textarea class="textarea" name="other_performance_factors" placeholder="Approach to Work"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $performanceappraisal->other_performance_factors }}</textarea> 
                      </div>
                    </div>
                  </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Performance Appraisal</button>
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


