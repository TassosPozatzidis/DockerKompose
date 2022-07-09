@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-6 mx-auto">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                      Details: <b>{{ $member->FIRST_NAME }} {{ $member->FATH_NAME }}
                          {{ $member->LAST_NAME }}</b>
                    </h3>
                </div>
                <div class="panel-body">

                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <h4>{{ $member->FIRST_NAME }}</h4>
                        </div>
                        <div class="form-group">
                            <label for="fath_name">Middle Name</label>
                            <h4>{{ $member->FATH_NAME }}</h4>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <h4>{{  $member->LAST_NAME }}</h4>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <h4>{{  $member->EMAIL }}</h4>
                        </div>
                        <div class="form-group">
                            <label for="date_of_birth">Date of Birth</label>
                            <h4>{{  $member->DATE_OF_BIRTH }}</h4>
                        </div>
                        <div class="form-group">
                            <label for="web_page">Web page</label>
                            <h4>{{ $member->WEB_PAGE }}</h4>
                        </div>
                        <label for="member_short_cv">Member Short CV</label>
                        <h5>{{ $member->MEMBER_SHORT_CV ?: '-' }}</h5>
                        <div class="form-group">
                            <label for="web_page">Member Type</label>
                            <h4>{{ $member->MEMBER_TYPE }}</h4>
                        </div>

                        <div class="form-group">
                            <label for="member_publications"></label>
                            <a href="{{ route('members.publications', $member->MEMBER_ID) }}">Display Publications</a>
                        </div>

                        <div class="form-group" >

                            <label for="member_activities"></label>
                            <form
                                action="{{ route('members.activities', $member->MEMBER_ID) }}"
                                method="POST">
                                @csrf
                              <input type="submit" value="Display Activities"></input>
                              <select id="year" name="year">
                                {{ $last= date('Y')-100 }}
                                {{ $now = date('Y') }}

                                @for ($i = $now; $i >= $last; $i--)
                                  <option value="{{ $i }}">{{ $i }}</option>
                                @endfor

                              </select>
                          </form>
                      </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
