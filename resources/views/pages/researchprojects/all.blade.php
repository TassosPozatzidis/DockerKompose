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
                      <div class="col-sm-8"><h2>Research Project <b>Details</b></h2></div>
                      <div class="col-sm-2">
                        @if(Auth::check() && Auth::user()->is_admin)
                              <a href="{{ route('researchprojects.new') }}" class="btn btn-info btn-lg w-100"><i class="fa fa-plus"></i> Add New</a>
                        @endif
                      </div>
                      <div class="col-sm-2">
                            <a href="{{ route('researchproject.download') }}" target="_blank" class="btn btn-info btn-lg w-100"><i class="fa fa-download"></i> Download csv</a>
                      </div>
                  </div>
              </div>
              <table class="table table-striped table-hover table-bordered">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Research Project Name<i class="fa fa-sort"></i></th>
                          <th>Research Project Start Date</th>
                          <th>Research Project End Date<i class="fa fa-sort"></i></th>
                          <th>Research Project Backer</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($researchprojects as $researchproject)
                      <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td>{{ $researchproject->RESEARCH_PROJECT_NAME }}</td>
                          <td>{{ date('d/m/Y', strtotime($researchproject->RESEARCH_PROJECT_START_DATE)) }}</td>
                          <td>{{ date('d/m/Y', strtotime($researchproject->RESEARCH_PROJECT_END_DATE)) }}</td>
                          <td>{{ $researchproject->RESEARCH_PROJECT_BACKER }}</td>
                          <td>
                              <a href="{{ route('researchprojects.details', $researchproject->RESEARCH_PROJECT_ID) }}" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                          @if(Auth::check() && Auth::user()->is_admin)
                              <a href="{{ route('researchprojects.edit', $researchproject->RESEARCH_PROJECT_ID) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                              <a href="{{ route('researchprojects.delete', $researchproject->RESEARCH_PROJECT_ID) }}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                          @endif
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
      {{ $researchprojects->links() }}
    </div>
  </div>


</div>
@endsection
