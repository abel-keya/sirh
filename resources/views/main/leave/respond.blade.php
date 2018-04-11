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
      Respond to Request
      <small>
        <a href="{{ url('leaves/view') }}">(View All Leave Requests)</a>
      </small>
    </h1> 
  </section>
 
  <section class="content"> 
    <div class="row"> 
      <div class="col-md-6"> 
        <div class="box box-black">  
          <form role="form" method="POST" action="{{ url('/leave/respond', $leave->id) }}" style="margin-bottom: 40px;">
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
                <label>Select an Approval Option</label>
                <select class="form-control select2" name="status" style="width: 100%;">
                  <option value="">Select an Approval Option</option>  
                  <option value="1">Approve Leave</option>
                  <option value="2">Disapprove Leave</option>   
                </select>
              </div> 

              <div class="form-group">
                <label>Comments</label>  
                <div class="box"> 
                  <div class="box-body pad"> 
                      <textarea class="textarea" name="comments" placeholder="Comments"
                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea> 
                  </div>
                </div>
              </div> 

              <hr>  

              <div class="form-group"> 
                <button type="submit" class="btn btn-success"> 
                  Respond to Request
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


