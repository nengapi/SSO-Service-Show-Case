@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
									<a href="{{ route('sso.login') }}" class="btn btn-block btn-danger" style="width: 100%;">Login with sso</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
