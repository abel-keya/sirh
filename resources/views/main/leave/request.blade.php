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
      Request a Leave
      <small>
        <a href="{{ url('leaves/view') }}">(View My Past Requests)</a>
      </small>
    </h1> 
  </section>
 
  <section class="content"> 
    <div class="row"> 
      <div class="col-md-6"> 
        <div class="box box-black">  
          <form role="form" method="POST" action="{{ url('/leave/request') }}" style="margin-bottom: 40px;">
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
                <label>Start of Leave:</label> 
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicke3" name="start_of_leave" required placeholder="Select Start of Leave Date">
                </div> 
              </div>

              <div class="form-group">
                <label>End of Leave:</label> 
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker4" name="end_of_leave" required placeholder="Select End of Leave Date">
                </div> 
              </div>

              <div class="form-group">
                <label>Reason</label>  
                <div class="box"> 
                  <div class="box-body pad"> 
                      <textarea class="textarea" name="reason" placeholder="Reason"
                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea> 
                  </div>
                </div>
              </div> 

              <hr>  

              <div class="form-group"> 
                <button type="submit" class="btn btn-success"> 
                  Request Leave 
                </button> 
              </div>  
           </div>  
         </form>
       </div> 
     </div>
   </div>  
 </section> 
</div> 

@include('main.partials.footer')

</div> 

@include('main.partials.body-script')
@stop 


