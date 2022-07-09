@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-6 mx-auto">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        @if($member->MEMBER_ID)
                        Edit: <b>{{ $member->FIRST_NAME }} {{ $member->FATH_NAME }}
                            {{ $member->LAST_NAME }}</b>
                        @else
                        Create new member
                        @endif
                    </h3>
                </div>
                <div class="panel-body">
                    <form
                        action="{{ $member->MEMBER_ID ? route('members.update', $member->MEMBER_ID) : route('members.create') }}"
                        method="POST">
                        @csrf
                        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                value="{{ old('first_name', $member->FIRST_NAME) }}">
                            @if($errors->has('first_name'))
                              <div class="help-block mt-1">{{ $errors->first('first_name') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('fath_name') ? 'has-error' : '' }}">
                            <label for="fath_name">Middle Name</label>
                            <input type="text" class="form-control" id="fath_name" name="fath_name" required
                                value="{{ old('fath_name', $member->FATH_NAME) }}">
                            @if($errors->has('fath_name'))
                              <div class="help-block mt-1">{{ $errors->first('fath_name') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required
                                value="{{ old('last_name', $member->LAST_NAME) }}">
                            @if($errors->has('last_name'))
                              <div class="help-block mt-1">{{ $errors->first('last_name') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required
                                value="{{ old('email', $member->EMAIL) }}">
                            @if($errors->has('email'))
                              <div class="help-block mt-1">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('date_of_birth') ? 'has-error' : '' }}">
                            <label for="date_of_birth">Date of Birth</label>
                                <div class="input-group date" data-provide="datepicker">
                                    <input type="text" class="form-control"  id="date_of_birth" name="date_of_birth" required
                                        value="{{ old('date_of_birth', $member->DATE_OF_BIRTH) }}">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            @if($errors->has('date_of_birth'))
                              <div class="help-block mt-1">{{ $errors->first('date_of_birth') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('web_page') ? 'has-error' : '' }}">
                            <label for="web_page">Web page</label>
                            <input type="text" class="form-control" id="web_page" name="web_page" required
                                value="{{ old('web_page', $member->WEB_PAGE) }}">
                            @if($errors->has('web_page'))
                              <div class="help-block mt-1">{{ $errors->first('web_page') }}</div>
                            @endif
                        </div>
                        <label for="member_short_cv">Member Short CV</label>
                        <textarea id="member_short_cv" name="member_short_cv" class="form-control mb-3"
                            rows="5">{{ old('member_short_cv', $member->MEMBER_SHORT_CV) }}</textarea>

                        <div class="form-group mb-5">
                            <label for="memberTypeLkpSelect">Select Member Type</label>
                            <select class="form-control" id="memberTypeLkpSelect" name="member_type_lkp_id">
                              @foreach($memberTypeLookupCollection as $memberTypeLookup)
                                <option value="{{ $memberTypeLookup->MEMBER_TYPE_ID }}" {{ $member->MEMBER_TYPE_ID === $memberTypeLookup->MEMBER_TYPE_ID ? 'selected' : '' }}>
                                  {{ $memberTypeLookup->MEMBER_TYPE }}</option>
                              @endforeach
                            </select>
                          </div>
                        <input type="submit" class="btn btn-default btn-primary btn-lg" value="Save"></input>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
