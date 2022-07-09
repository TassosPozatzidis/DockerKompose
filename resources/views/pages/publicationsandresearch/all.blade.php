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
                      <div class="col-sm-10"><h2>Research and <b>Publications</b></h2></div>
                      <div class="col-sm-2">
                            <a href="{{ route('CountOfPublicationsAndResearch.download') }}" target="_blank" class="btn btn-info btn-lg w-100"><i class="fa fa-download"></i> Download csv</a>
                      </div>
                  </div>
              </div>
              <table class="table table-striped table-hover table-bordered">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>First Name <i class="fa fa-sort"></i></th>
                          <th>Last Name <i class="fa fa-sort"></i></th>
                          <th>Count of Publications <i class="fa fa-sort"></i></th>
                          <th>Count of Researches <i class="fa fa-sort"></i></th>
                          <th>Member Type <i class="fa fa-sort"></i></th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($publicationsandresearches as $publicationsandresearch)
                      <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td>{{ $publicationsandresearch->first_name }}</td>
                          <td>{{ $publicationsandresearch->last_name }}</td>
                          <td>{{ $publicationsandresearch->Publications }}</td>
                          <td>{{ $publicationsandresearch->Researches }}</td>
                          <td>{{ $publicationsandresearch->MEMBER_TYPE }}</td>
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
    </div>
  </div>


</div>
@endsection
