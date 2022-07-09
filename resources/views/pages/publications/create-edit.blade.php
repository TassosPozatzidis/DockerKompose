@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-6 mx-auto">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        @if($publication->PUBLICATION_ID)
                        Edit: <b>{{ $publication->PUBLICATION_ID }}</b>
                        @else
                        Create new publication
                        @endif
                    </h3>
                </div>
                <div class="panel-body">
                    <form
                        action="{{ $publication-> PUBLICATION_ID ? route('publications.update', $publication->PUBLICATION_ID) : route('publications.create') }}"
                        method="POST">
                        @csrf
                        <div class="form-group {{ $errors->has('publication_name') ? 'has-error' : '' }}">
                            <label for="publication_name">Publication Name</label>
                            <input type="text" class="form-control" id="publication_name" name="publication_name"
                                value="{{ old('publication_name', $publication->PUBLICATION_NAME) }}">
                            @if($errors->has('publication_name'))
                              <div class="help-block mt-1">{{ $errors->first('publication_name') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('publication_') ? 'has-error' : '' }}">
                            <label for="publication_media">Publication Media</label>
                            <input type="text" class="form-control" id="publication_media" name="publication_media" required
                                value="{{ old('publication_media', $publication->PUBLICATION_MEDIA) }}">
                            @if($errors->has('publication_media'))
                              <div class="help-block mt-1">{{ $errors->first('publication_media') }}</div>
                            @endif
                        </div>
                        <label for="publication_subject">Publication Subject CV</label>
                        <textarea id="publication_subject" name="publication_subject" class="form-control mb-5"
                            rows="5">{{ old('publication_subject', $publication->PUBLICATION_SUBJECT) }}</textarea>
                        <div class="form-group {{ $errors->has('publication_date') ? 'has-error' : '' }}">
                            <label for="publication_date">Publication Date</label>
                            <input type="text" class="form-control" id="publication_date" name="publication_date" required
                                value="{{ old('publication_date', $publication->PUBLICATION_DATE) }}">
                            @if($errors->has('publication_date'))
                              <div class="help-block mt-1">{{ $errors->first('date_of_birth') }}</div>
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
