@extends('layouts.app')
@include('layouts.navbar')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-10 mx-auto">
      <div class="table-responsive w-100">
          <div class="table-wrapper">
              <div class="table-title">
                  <div class="row">
                      <div class="col-sm-8"><h2>Classes <b>Details</b></h2></div>
                      <div class="col-sm-2">
                        @if(Auth::check() && Auth::user()->is_admin)
                          <a href="{{ route('classes.new') }}" class="btn btn-info btn-lg w-100"><i class="fa fa-plus"></i> Add New</a>
                        @endif
                      </div>
                      <div class="col-sm-2">
                            <a href="{{ route('class.download') }}" target="_blank" class="btn btn-info btn-lg w-100"><i class="fa fa-download"></i> Download csv</a>
                      </div>
                  </div>
              </div>
              <table class="table table-striped table-hover table-bordered">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Class Name <i class="fa fa-sort"></i></th>
                          <th>Department</th>
                          <th>Training Cycle<i class="fa fa-sort"></i></th>
                          <th>Semester</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($classes as $class)
                      <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td>{{ $class->CLASS_NAME }}</td>
                          <td>{{ $class->DEPARTMENT }}</td>
                          <td>{{ $class->TRAINING_CYCLE }}</td>
                          <td>{{ $class->SEMESTER }}</td>
                          <td>
                              <a href="{{ route('classes.details', $class->CLASS_ID) }}" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                @if(Auth::check() && Auth::user()->is_admin)
                                    <a href="{{ route('classes.edit', $class->CLASS_ID) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                    <a href="{{ route('classes.delete', $class->CLASS_ID) }}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                @endif
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
              <!-- <div class="clearfix">
                  <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                  <ul class="pagination">
                      <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                      <li class="page-item"><a href="#" class="page-link">1</a></li>
                      <li class="page-item"><a href="#" class="page-link">2</a></li>
                      <li class="page-item active"><a href="#" class="page-link">3</a></li>
                      <li class="page-item"><a href="#" class="page-link">4</a></li>
                      <li class="page-item"><a href="#" class="page-link">5</a></li>
                      <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                  </ul>
              </div> -->
          </div>
      </div>
            {{ $classes->links() }}
    </div>
  </div>


</div>
@endsection
