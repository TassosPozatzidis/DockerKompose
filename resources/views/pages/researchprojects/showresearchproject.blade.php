@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-6 mx-auto">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                      Details: <b>{{ $researchproject->RESEARCH_PROJECT_NAME }}</b>
                    </h3>
                </div>
                <div class="panel-body">
                    <form
                        action="{{ route('researchprojects.details', $researchproject->RESEARCH_PROJECT_ID) }}">
                        @csrf
                        <div class="form-group">
                            <label for="research_project_name">Research Project Name</label>
                            <h4>{{ $researchproject->RESEARCH_PROJECT_NAME }}</h4>
                        </div>
                        <div class="form-group">
                            <label for="research_project_start_date">Research Project Start Date</label>
                            <h4>{{ $researchproject->RESEARCH_PROJECT_START_DATE }}</h4>
                        </div>
                        <div class="form-group">
                            <label for="research_project_end_date">Research Project End Date</label>
                            <h4>{{  $researchproject->RESEARCH_PROJECT_END_DATE }}</h4>
                        </div>
                        <div class="form-group">
                            <label for="research_project_backer">Research Project Backer</label>
                            <h4>{{  $researchproject->RESEARCH_PROJECT_BACKER }}</h4>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
