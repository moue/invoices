@extends('layouts.main')

@section('styles')
<style>
.form-box {
	width:90%;
}
</style>
@stop

@section('title')
Subscribe
@stop

@section('content')
<div class="form-box" id="login-box">
    <div class="header">
        <h1>Subscribe</h1>
        <p class="lead">Founded in 1866, The Harvard Advocate is the oldest continuously published collegiate literary magazine in the United States. For over 140 years it has provided its readers with the highest caliber of prose, fiction, poetry, and art that the Harvard community can offer. With a global subscriber's network--it is distributed in 5 continents--no place is too remote for the Advocate to reach. You too, wherever you are, can enjoy the magazine.</p>
        <p class="lead">You can pay using our online checkout system or by check made out to The Harvard Advocate and mailed to 21 South St. Cambridge, MA 02138, Attn: Circulation Manager.</h1>
    </div>
    <div class="body bg-gray">
    	<h3>Subscription Plan:</h3>
        <div class="form-group">                                    
            <label>
                <input type="radio" name="r3" class="flat-red"/>
                Three years (12 issues) for $90 - U.S.
            </label>
        </div>
        <div class="form-group">                                    
            <label>
                <input type="radio" name="r3" class="flat-red"/>                                                    
            	Two years (8 issues) for $69 - U.S.
            </label>
        </div>
        <div class="form-group">                                    
            <label>
                <input type="radio" name="r3" class="flat-red"/>
                One year (4 issues) for $35 - U.S.
            </label>
        </div>
        <div class="form-group">                                    
            <label>
                <input type="radio" name="r3" class="flat-red"/>
                Three years (12 issues) for $110 - International & Institutions
            </label>
        </div>
        <div class="form-group">                                    
            <label>
                <input type="radio" name="r3" class="flat-red"/>
                Two years (8 issues) for $75 - International & Institutions
            </label>
        </div>
        <div class="form-group">                                    
            <label>
                <input type="radio" name="r3" class="flat-red"/>
                One year (4 issues) for $45 - International & Institutions
            </label>
        </div>

        <h3>Mailing Address:</h3>
        <div class="form-group">
            {{ Form::label('name', 'Contact Name') }}
            {{ $errors->first('name', '<p class="text-red">:message</p>') }}
            {{ Form::text('Contact Name', null, array('class'=>'form-control', 'placeholder'=>'Contact Name')) }}
        </div>
        <div class="form-group">
            {{ Form::label('address', 'Address') }}
            {{ $errors->first('address', '<p class="text-red">:message</p>') }}
            {{ Form::text('address', null, array('class'=>'form-control', 'placeholder'=>'Address')) }}
        </div>
        <div class="form-group">
            {{ Form::label('address', 'Address') }}
            {{ $errors->first('address', '<p class="text-red">:message</p>') }}
            {{ Form::text('address', null, array('class'=>'form-control', 'placeholder'=>'Address')) }}
        </div>
        <div class="row">
            <div class="col-xs-3">
                <div class="form-group">
                    {{ Form::label('city', 'City') }}
                    {{ $errors->first('city', '<p class="text-red">:message</p>') }}
                    {{ Form::text('city', null, array('class'=>'form-control', 'placeholder'=>'City')) }}
                </div>
            </div>
            <div class="col-xs-3">
                <div class="form-group">
                    {{ Form::label('state', 'State') }}
                    {{ $errors->first('state', '<p class="text-red">:message</p>') }}
                    {{ Form::text('state', null, array('class'=>'form-control', 'placeholder'=>'State/Province')) }}
                </div>
            </div>
            <div class="col-xs-3">
                <div class="form-group">
                    {{ Form::label('zipcode', 'Zipcode') }}
                    {{ $errors->first('zipcode', '<p class="text-red">:message</p>') }}
                    {{ Form::text('zipcode', null, array('class'=>'form-control', 'placeholder'=>'Postal Code')) }}
                </div>
            </div>
            <div class="col-xs-3">
                <div class="form-group">
                    {{ Form::label('country', 'Country') }}
                    {{ $errors->first('country', '<p class="text-red">:message</p>') }}
                    {{ Form::text('country', null, array('class'=>'form-control', 'placeholder'=>'Country')) }}
                </div>
            </div>
        </div>
        <div class="col-xs-6">
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Don't worry. This form is 100% secure. Your private credit card data will never touch our servers.
        </p>
        </div>
        <div class="col-xs-6">
            <h3>Payment Method</h3>
            <div class="payment-errors alert alert-danger" style="display:none;"></div>
            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                <input type="email" id="email" class="form-control">                                
            </div>
            <div class="form-group">
                {{ Form::label('card', 'Card Number') }}
                <input type="text" data-stripe="number" class="form-control">
            </div>
            <div class="form-group">
                {{ Form::label('cvc', 'CVC:') }}
                <input type="text" data-stripe="cvc" class="form-control">                              
            </div>
            <div class="form-group">
                {{ Form::label('expiration', 'Expiration') }}
                {{ Form::selectMonth(null, null, ['data-stripe'=>'exp-month', 'class'=>'form-control']) }}
                {{ Form::selectYear(null, date('Y'), date('Y')+10, null, ['data-stripe'=>'exp-year', 'class'=>'form-control']) }}
            </div>

        </div>
    </div>
    
    <div class="footer">                                                               
        <button type="submit" class="btn bg-olive btn-block">Subscribe</button>  
    </div>
</div>
@stop

@section('scripts')
@stop




