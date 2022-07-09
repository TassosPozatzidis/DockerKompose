@extends('layouts.app')
@include('layouts.navbar')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-10 mx-auto mb-5">
      <div class="table-responsive w-100">
          <div class="table-wrapper">
              <div class="table-title">
                  <div class="row">
                      <div class="col-sm-8"><h2>Member <b>Details</b></h2></div>
                      <div class="col-sm-2">
                        @if(Auth::check() && Auth::user()->is_admin)
                        <a href="{{ route('members.new') }}" class="btn btn-info btn-lg w-100"><i class="fa fa-plus"></i> Add New</a>
                        @endif
                      </div>
                      <div class="col-sm-2">
                            <a href="{{ route('members.download') }}" target="_blank" class="btn btn-info btn-lg w-100"><i class="fa fa-download"></i> Download csv</a>
                      </div>
                  </div>
              </div>
              <table class="table table-striped table-hover table-bordered">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>First Name <i class="fa fa-sort"></i></th>
                          <th>Middle Name</th>
                          <th>Last Name <i class="fa fa-sort"></i></th>
                          <th>Email</th>
                          <th>Date Of Birth <i class="fa fa-sort"></i></th>
                          <th>Web Page</th>
                          <th>Member Type</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($members as $member)
                      <tr>
                          <td>{{ $start++ }}</td>
                          <td>{{ $member->FIRST_NAME }}</td>
                          <td>{{ $member->FATH_NAME }}</td>
                          <td>{{ $member->LAST_NAME }}</td>
                          <td>{{ $member->EMAIL }}</td>
                          <td>{{ date('d/m/Y', strtotime($member->DATE_OF_BIRTH)) }}</td>
                          <td>{{ $member->WEB_PAGE }}</td>
                          <td>{{ $member->MEMBER_TYPE }}</td>
                          <td>
                              <a href="{{ route('members.details', $member->MEMBER_ID) }}" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                          @if(Auth::check() && Auth::user()->is_admin)
                              <a href="{{ route('members.edit', $member->MEMBER_ID) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                              <a href="{{ route('members.delete', $member->MEMBER_ID) }}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                          @endif
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>

          </div>
      </div>
      {{ $members->links() }}
    </div>
  </div>


</div>
@endsection
