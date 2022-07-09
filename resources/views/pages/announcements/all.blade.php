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
                      <div class="col-sm-8"><h2>Announcements <b>Details</b></h2></div>
                      <div class="col-sm-2">
                        @if(Auth::check() && Auth::user()->is_admin)
                          <a href="{{ route('announcements.new') }}" class="btn btn-info btn-lg w-100"><i class="fa fa-plus"></i> Add New</a>
                        @endif
                      </div>
                      <div class="col-sm-2">
                            <a href="{{ route('announcement.download') }}" target="_blank" class="btn btn-info btn-lg w-100"><i class="fa fa-download"></i> Download csv</a>
                      </div>
                  </div>
              </div>
              <table class="table table-striped table-hover table-bordered">
                  <thead>
                      <tr>

                          <th>Announcement</th>

                      </tr>
                  </thead>
                  <tbody>
                    @foreach($announcements as $announcement)
                      <tr>
                          <td>{{ $announcement->ANNOUNCEMENT_DESCRIPTION }}</td>
                          <td>
                                @if(Auth::check() && Auth::user()->is_admin)
                                    <a href="{{ route('announcements.edit', $announcement->ANNOUNCEMENT_ID) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                    <a href="{{ route('announcements.delete', $announcement->ANNOUNCEMENT_ID) }}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                @endif
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
            {{ $announcements->links() }}
    </div>
  </div>


</div>
@endsection
