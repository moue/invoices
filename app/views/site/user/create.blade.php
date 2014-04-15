@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.register') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="form-box" id="login-box">
    <div class="header">Sign Up</div>
    	<div class="body bg-gray">

			{{ Confide::makeSignupForm()->render() }}
		
		</div>
	</div>
</div>
@stop
