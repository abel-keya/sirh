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
      Attendance Check In/Out
      <small>
        <a href="{{ url('attendances/view') }}">(View My Attendances)</a>
      </small>
    </h1> 
  </section>
 
  <section class="content"> 
    <div class="row"> 
      <div class="col-md-6"> 
        <div class="box box-black">  
          <form role="form" method="POST" action="{{ url('/attendance/create') }}" style="margin-bottom: 40px;">
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
              
              <p>
               Would you like to check @if($attendance) out @else in @endif now on <strong>{{ Carbon\Carbon::now()->toDayDateTimeString() }}</strong>?
             </p>
             
             <div class="form-group"> 
                  <button type="submit" class="btn btn-success">
                    @if($attendance)
                      Check Out Now
                    @else 
                      Check In Now
                    @endif
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


