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
                      <div class="col-sm-8"><h2>Publication <b>Details</b></h2></div>
                      <div class="col-sm-2">
                          @if(Auth::check() && Auth::user()->is_admin)
                              <a href="{{ route('publications.new') }}" class="btn btn-info btn-lg w-100"><i class="fa fa-plus"></i> Add New</a>
                          @endif
                      </div>
                      <div class="col-sm-2">
                            <a href="{{ route('publications.download') }}" target="_blank" class="btn btn-info btn-lg w-100"><i class="fa fa-download"></i> Download csv</a>
                      </div>
                  </div>
              </div>
              <table class="table table-striped table-hover table-bordered">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Publication Category ID<i class="fa fa-sort"></i></th>
                          <th>Publication Name</th>
                          <th>Publication Media <i class="fa fa-sort"></i></th>
                          <th>Publication Subject</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($publications as $publication)
                      <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td>{{ $publication->PUBLICATION_CATEGORY_ID }}</td>
                          <td>{{ $publication->PUBLICATION_NAME }}</td>
                          <td>{{ $publication->PUBLICATION_MEDIA }}</td>
                          <td>{{ $publication->PUBLICATION_SUBJECT }}</td>
                          <td>
                              <a href="{{ route('publications.details', $publication->PUBLICATION_ID) }}" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                          @if(Auth::check() && Auth::user()->is_admin)
                              <a href="{{ route('publications.edit', $publication->PUBLICATION_ID) }}"  class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                              <a href="{{ route('publications.delete', $publication->PUBLICATION_ID) }}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                          @endif
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
      {{ $publications->links() }}
    </div>
  </div>


</div>
@endsection
