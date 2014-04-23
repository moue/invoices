@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.forgot_password') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="form-box" id="login-box">
    <div class="header">{{{ Lang::get('user/user.forgot_password') }}}</div>
    	<div class="body bg-gray">

			{{ Confide::makeForgotPasswordForm() }}
		
		</div>
	</div>
</div>
@stop
