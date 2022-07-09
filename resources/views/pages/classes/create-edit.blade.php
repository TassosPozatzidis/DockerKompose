@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-6 mx-auto">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        @if($class->CLASS_ID)
                        Edit: <b>{{ $class->CLASS_NAME }} {{ $class->DEPARTMENT }}</b>
                        @else
                        Create new class
                        @endif
                    </h3>
                </div>
                <div class="panel-body">
                    <form
                        action="{{ $class->CLASS_ID ? route('classes.update', $class->CLASS_ID) : route('classes.create') }}"
                        method="POST">
                        @csrf
                        <div class="form-group {{ $errors->has('class_name') ? 'has-error' : '' }}">
                            <label for="class_name">Class Name</label>
                            <input type="text" class="form-control" id="class_name" name="class_name"
                                value="{{ old('class_name', $class->CLASS_NAME) }}">
                            @if($errors->has('class_name'))
                              <div class="help-block mt-1">{{ $errors->first('class_name') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('class_department') ? 'has-error' : '' }}">
                            <label for="class_department">Department</label>
                            <input type="text" class="form-control" id="class_department" name="class_department" required
                                value="{{ old('class_department', $class->DEPARTMENT) }}">
                            @if($errors->has('class_department'))
                              <div class="help-block mt-1">{{ $errors->first('class_department') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('class_training_cycle') ? 'has-error' : '' }}">
                            <label for="class_training_cycle">Training Cycle</label>
                            <input type="text" class="form-control" id="class_training_cycle" name="class_training_cycle" required
                                value="{{ old('class_training_cycle', $class->TRAINING_CYCLE) }}">
                            @if($errors->has('class_training_cycle'))
                              <div class="help-block mt-1">{{ $errors->first('class_training_cycle') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('class_semester') ? 'has-error' : '' }}">
                            <label for="class_semester">Semester</label>
                            <input type="text" class="form-control" id="class_semester" name="class_semester" required
                                value="{{ old('class_semester', $class->SEMESTER) }}">
                            @if($errors->has('class_semester'))
                              <div class="help-block mt-1">{{ $errors->first('class_semester') }}</div>
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
