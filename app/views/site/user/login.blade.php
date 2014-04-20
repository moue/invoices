@extends('site.layouts.default')

@section('styles')
.checkbox input[type="checkbox"] {
    margin-left: 0px;
    margin-right: 5px;
}
@stop

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.login') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="form-box" id="login-box">
    <div class="header">Login</div>
        <div class="body bg-gray">

            {{ Confide::makeLoginForm()->render() }}
        
        </div>
    </div>
@stop
