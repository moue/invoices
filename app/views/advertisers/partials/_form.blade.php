@if (!isset($errors))
<div class="alert alert-danger">
    <i class="fa fa-ban"></i>
    @foreach($errors->all() as $error)
        <dd style="color: #b94a48;">{{ $error }}</dd>
    @endforeach
</div>
@endif

<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header">
		        <h3 class="box-title">Advertiser Information</h3>
		    </div><!-- /.box-header -->
			<div class="box-body">
			    <div class="form-group">
			        {{ Form::label('user_options', 'Sales Contact') }}
			        {{ Form::select('user_options', $user_options, Auth::user()->id, array('class'=>'form-control')) }}
			    </div>
			    <div class="form-group">
			        {{ Form::label('advertiser', 'Advertiser') }}
	        		{{ $errors->first('advertiser', '<p class="text-red">:message</p>') }}
			        {{ Form::text('advertiser', null, array('class'=>'form-control', 'placeholder'=>'Advertiser')) }}
			    </div>
			    <div class="form-group">
			        {{ Form::label('address', 'Address') }}
	        		{{ $errors->first('address', '<p class="text-red">:message</p>') }}
			        {{ Form::text('address', null, array('class'=>'form-control', 'placeholder'=>'Address')) }}
			    </div>
			    <div class="row">
				    <div class="col-xs-5">
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
					        {{ Form::text('state', null, array('class'=>'form-control', 'placeholder'=>'State')) }}
					    </div>
					</div>
					<div class="col-xs-4">
					    <div class="form-group">
					        {{ Form::label('zipcode', 'Zipcode') }}
					        {{ $errors->first('zipcode', '<p class="text-red">:message</p>') }}
					        {{ Form::text('zipcode', null, array('class'=>'form-control', 'placeholder'=>'Zipcode')) }}
					    </div>
					</div>
				</div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
	<div class="col-md-6" data-right-height-content>
		<div class="box box-primary">
			<div class="box-header">
		        <h3 class="box-title">Contact Information</h3>
		    </div><!-- /.box-header -->
			<div class="box-body">
			    <div class="form-group">
			        {{ Form::label('contact', 'Contact') }}
			        {{ $errors->first('contact', '<p class="text-red">:message</p>') }}
			        {{ Form::text('contact', null, array('class'=>'form-control', 'placeholder'=>'Contact')) }}
			    </div>
			    <div class="form-group">
			        {{ Form::label('position', 'Position') }}
			        {{ $errors->first('position', '<p class="text-red">:message</p>') }}
			        {{ Form::text('position', null, array('class'=>'form-control', 'placeholder'=>'Position')) }}
			    </div>
			    <div class="form-group">
			        {{ Form::label('telephone', 'Telephone') }}
			        {{ $errors->first('telephone', '<p class="text-red">:message</p>') }}
			        {{ Form::text('telephone', null, array('class'=>'form-control', 'placeholder'=>'Telephone')) }}
			    </div>
			    <div class="form-group">
			        {{ Form::label('email', 'Email') }}
			        {{ $errors->first('email', '<p class="text-red">:message</p>') }}
			        {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email')) }}
			    </div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>


