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
      Departments
      <small>
        <a href="{{ url('/department/create') }}">(create)</a>
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

            @if($departments->count()>0)
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>No.</th>
                  <th>Department Name</th> 
                  <th>Options</th> 
                </tr>
                @foreach($departments as $key=>$department)
                <tr>
                  <td>{{ ++$key }}.</td>
                  <td>{{ $department->name }}</td> 
                  <td>
                      <a href="{{ url('department/edit', $department->id) }}">
                        <small class="label bg-blue">Edit</small>
                      </a>
                      <a href="{{ url('department/delete', $department->id) }}">
                        <small class="label bg-red">Delete</small>
                      </a> 
                  </td> 
                </tr>
                @endforeach
              </tbody>
            </table>
            @else 
            There are no departments created!
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


