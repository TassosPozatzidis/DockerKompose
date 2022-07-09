@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-6 mx-auto">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                      Details: <b>{{ $class->CLASS_NAME }}</b>
                    </h3>
                </div>
                <div class="panel-body">
                    <form
                        action="{{ route('classes.details', $class->CLASS_ID) }}">
                        @csrf
                        <div class="form-group">
                            <label for="class_name">Class Name</label>
                            <h4>{{ $class->CLASS_NAME }}</h4>
                        </div>
                        <div class="form-group">
                            <label for="class_department">Class Department</label>
                            <h4>{{ $class->DEPARTMENT }}</h4>
                        </div>
                        <div class="form-group">
                            <label for="class_training_cycle">Training Cycle</label>
                            <h4>{{  $class->TRAINING_CYCLE }}</h4>
                        </div>
                        <div class="form-group">
                            <label for="class_semester">Semester</label>
                            <h4>{{  $class->SEMESTER }}</h4>
                        </div>
                        <div class="form-group">
                            <label for="class_members"></label>
                            <a href="{{ route('classes.members', $class->CLASS_ID) }}">Display Class Members</link>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
