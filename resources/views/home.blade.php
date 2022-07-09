@extends('layouts.app')
@include('layouts.navbar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home Page</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="conainer">
                      <div class="row my-5">
                        <div class="col">
                          <h3 class="text-center">Welcome to our Research Lab Management System.</h3>
                        </div>
                      </div>
                      <div class="row my-5">
                        @if(!Auth::check())
                          <div class="col-5 mx-auto">
                            <a href="{{ route('login') }}" class="btn btn-block btn-primary">Sign in</a>
                          </div>
                        @else
                          <div class="col text-justify">
                            <h4 class="text-center">Please use the navigation menu to see all available options</h4>
                          </div>
                        @endif
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
