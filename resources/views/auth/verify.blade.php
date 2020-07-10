@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                @include('partials.success')
                @include('partials.errors')
                
            <div class="card">
                <div style="font-size: 16px" class="card-header bg-white"><b>{{ __('Verify Your Email Address') }}</b></div>

                <div class="card-body" style="font-size: 16px">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                    <ul></ul>
                    <a href="{{ route('verification.resend') }}">
                      <button class="btn login1 border btn-light">
                        Resend
                      </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
