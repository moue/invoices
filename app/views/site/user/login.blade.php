@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.login') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')

<div class="form-box" id="login-box">
    <form class="form-horizontal" method="POST" action="{{ URL::to('user/login') }}" accept-charset="UTF-8">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <fieldset>
            <div class="form-group">
                <label class="control-label" for="email">{{ Lang::get('confide::confide.username_e_mail') }}</label>
                <input class="form-control" tabindex="1" placeholder="{{ Lang::get('confide::confide.username_e_mail') }}" type="text" name="email" id="email" value="{{ Input::old('email') }}">
            </div>
            <div class="form-group">
                <label class="control-label" for="password">
                    {{ Lang::get('confide::confide.password') }}
                </label>
                <input class="form-control" tabindex="2" placeholder="{{ Lang::get('confide::confide.password') }}" type="password" name="password" id="password">
            </div>

            <div class="form-group">
                    <div class="checkbox" style="padding-left: 20px;">
                        <label for="remember">{{ Lang::get('confide::confide.login.remember') }}
                            <input type="hidden" name="remember" value="0">
                            <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
                        </label>
                    </div>
            </div>

            @if ( Session::get('notice') )
            <div class="alert">{{ Session::get('notice') }}</div>
            @endif

            <div class="form-group">
                    <button tabindex="3" type="submit" class="btn bg-purple btn-block">{{ Lang::get('confide::confide.login.submit') }}</button>
                    <br><p><a href="forgot">{{ Lang::get('confide::confide.login.forgot_password') }}</a></p>
                    {{ HTML::link('user/create', 'Register for an account') }}
            </div>
        </fieldset>
    </form>
</div>
@stop
