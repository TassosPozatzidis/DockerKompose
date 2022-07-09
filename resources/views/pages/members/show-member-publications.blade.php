@extends('layouts.app')
@extends('layouts.navbar')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-10 mx-auto">
      <div class="table-responsive w-100">
          <div class="table-wrapper">
              <div class="table-title">
                  <div class="row">
                      <div class="col-sm-8"><h2>Member <b>Publications</b></h2></div>
                      <div class="col-sm-4">

                      </div>
                  </div>
              </div>
              <table class="table table-striped table-hover table-bordered">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>First Name <i class="fa fa-sort"></i></th>
                          <th>Last Name <i class="fa fa-sort"></i></th>
                          <th>Publication <i class="fa fa-sort"></i></th>
                          <th>Date of Publish<i class="fa fa-sort"></i></th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($memberpublications as $memberpublication)
                      <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td>{{ $memberpublication->PUBLICATOR_FNAME }}</td>
                          <td>{{ $memberpublication->PUBLICATOR_LNAME }}</td>
                          <td>{{ $memberpublication->PUBLICATION_NAME }}</td>
                          <td>{{ $memberpublication->PUBLICATION_DATE }}</td>
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
