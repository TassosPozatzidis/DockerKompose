@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-6 mx-auto">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                      Title: <b>{{ $publication->PUBLICATION_NAME }}</b>
                    </h3>
                </div>
                <div class="panel-body">
                    <form
                        action="{{ route('publications.details', $publication->PUBLICATION_ID) }}">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">Publication Title</label>
                            <h4>{{ $publication->PUBLICATION_NAME }}</h4>
                        </div>
                        <div class="form-group">
                            <label for="fath_name">Publication Media</label>
                            <h4>{{ $publication->PUBLICATION_MEDIA }}</h4>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Publication Subject</label>
                            <h4>{{  $publication->PUBLICATION_SUBJECT }}</h4>
                        </div>
                        <div class="form-group">
                            <label for="email">Publication Date</label>
                            <h4>{{  $publication->PUBLICATION_DATE }}</h4>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
