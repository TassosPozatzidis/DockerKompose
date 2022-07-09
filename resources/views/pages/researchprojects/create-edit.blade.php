@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-6 mx-auto">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        @if($researchproject->RESEARCH_PROJECT_ID)
                        Edit: <b>{{ $researchproject->RESEARCH_PROJECT_ID }}</b>
                        @else
                        Create new researchproject
                        @endif
                    </h3>
                </div>
                <div class="panel-body">
                    <form
                        action="{{ $researchproject-> RESEARCH_PROJECT_ID ? route('researchprojects.update', $researchproject->RESEARCH_PROJECT_ID) : route('researchprojects.create') }}"
                        method="POST">
                        @csrf
                        <div class="form-group {{ $errors->has('research_project_name') ? 'has-error' : '' }}">
                            <label for="research_project_name">Research Project Name</label>
                            <input type="text" class="form-control" id="research_project_name" name="research_project_name"
                                value="{{ old('research_project_name', $researchproject->RESEARCH_PROJECT_NAME) }}">
                            @if($errors->has('research_project_name'))
                              <div class="help-block mt-1">{{ $errors->first('research_project_name') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('research_project_start_date') ? 'has-error' : '' }}">
                            <label for="research_project_start_date">Research Start Date</label>
                            <input type="text" class="form-control" id="research_project_start_date" name="research_project_start_date" required
                                value="{{ old('research_project_start_date', $researchproject->RESEARCH_PROJECT_START_DATE) }}">
                            @if($errors->has('research_project_start_date'))
                              <div class="help-block mt-1">{{ $errors->first('research_project_start_date') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('research_project_end_date') ? 'has-error' : '' }}">
                            <label for="research_project_end_date">Research End Date</label>
                            <input type="text" class="form-control" id="research_project_end_date" name="research_project_end_date" required
                                value="{{ old('research_project_end_date', $researchproject->RESEARCH_PROJECT_END_DATE) }}">
                            @if($errors->has('research_project_end_date'))
                              <div class="help-block mt-1">{{ $errors->first('research_project_end_date') }}</div>
                            @endif
                          </div>
                        <div class="form-group {{ $errors->has('research_project_backer') ? 'has-error' : '' }}">
                          <label for="research_project_backer">Research Backer</label>
                          <input type="text" class="form-control" id="research_project_backer" name="research_project_backer" required
                              value="{{ old('research_project_backer', $researchproject->RESEARCH_PROJECT_BACKER) }}">
                          @if($errors->has('research_project_backer'))
                            <div class="help-block mt-1">{{ $errors->first('research_project_backer') }}</div>
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
