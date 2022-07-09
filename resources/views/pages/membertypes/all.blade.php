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
                      <div class="col-sm-10"><h2>Member <b>Types</b></h2></div>
                      <div class="col-sm-2">
                          <div class="search-box">
                              <i class="material-icons">&#xE8B6;</i>
                              <input type="text" class="form-control" placeholder="Search&hellip;">
                          </div>
                      </div>
                  </div>
              </div>
              <table class="table table-striped table-hover table-bordered">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Member Type <i class="fa fa-sort"></i></th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($membertypelookups as $membertypes)
                      <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td>{{ $membertypes->MEMBER_TYPE }}</td>
                          <td>
                              <a href="#" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                              <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                              <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
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
    </div>
  </div>


</div>
@endsection
