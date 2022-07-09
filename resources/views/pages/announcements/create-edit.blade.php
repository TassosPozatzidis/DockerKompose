@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-6 mx-auto">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        @if($announcement->ANNOUNCEMENT_ID)
                        Edit: <b>{{ $announcement->ANNOUNCEMENT_DESCRIPTION }}</b>
                        @else
                        Create new announcement
                        @endif
                    </h3>
                </div>
                <div class="panel-body">
                    <form
                        action="{{ $announcement->ANNOUNCEMENT_ID ? route('announcements.update', $announcement->ANNOUNCEMENT_ID) : route('announcements.create') }}"
                        method="POST">
                        @csrf
                        <div class="form-group {{ $errors->has('announcement_description') ? 'has-error' : '' }}">
                            <label for="announcement_description">Write a New Announcement</label>
                            <input type="text" class="form-control" id="announcement_description" name="announcement_description"
                                value="{{ old('announcement_description', $announcement->ANNOUNCEMENT_DESCRIPTION) }}">
                            @if($errors->has('announcement_description'))
                              <div class="help-block mt-1">{{ $errors->first('announcement_description') }}</div>
                            @endif
                        </div>

                        <input type="submit" class="btn btn-default btn-primary btn-lg" value="Save"></input>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
