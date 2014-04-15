<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header">
		        <h3 class="box-title">Billing Information</h3>
		    </div><!-- /.box-header -->
			<div class="box-body">
			    
			    <div class="form-group">
			        {{ Form::label('user_options', 'Sales Contact') }}
			        {{ Form::select('user_options', $user_options, Auth::user()->id, array('class'=>'form-control')) }}
			    </div>
			    <div class="form-group">
			        {{ Form::label('advertiser_options', 'Advertiser') }}
			        {{ Form::select('advertiser_options', $advertiser_options, null, array('class'=>'form-control')) }}
			        {{ link_to('admin/advertiser/create', 'Create new advertiser') }}
			    </div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
	<div class="col-md-6" data-right-height-content>
		<div class="box box-primary">
			<div class="box-header">
		        <h3 class="box-title">Additional Information</h3>
		    </div><!-- /.box-header -->
			<div class="box-body">
			    <div class="form-group">
			        {{ Form::label('notes', 'Additional Information') }}
			        {{ Form::textarea('notes', null, array('class'=>'form-control', 'placeholder'=>'Additional Information', 'rows'=>'2')) }}
			    </div>
			    <div>
			        {{ Form::checkbox('trade') }}
			        {{ Form::label('trade', 'Trade') }}
			    </div>
			    <div class="form-group" style="padding-bottom:5px;">
			        {{ Form::checkbox('paid') }}
			        {{ Form::label('paid', 'Paid') }}
			    </div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
		        <h3 class="box-title">Order</h3>
		    </div><!-- /.box-header -->
			<div class="box-body">


			    <div class="row">
			    	<div class="col-md-8">
			    		<div class="row">
			    			<div class="col-md-6">
					    		<div class="form-group">
					        		{{ Form::label('description', 'Description') }}
					        		{{ $errors->first('description', '<p class="text-red">:message</p>') }}
					        		{{ Form::text('description', null, array('class'=>'form-control', 'placeholder'=>'Description')) }}
					        		{{ Form::file('image') }}
							    </div>
							</div>
							<div class="col-md-6">
							    <div class="form-group">
					        		{{ Form::label('size_options', 'Size') }}
					        		{{ Form::select('size_options', $size_options, null, array('class'=>'form-control')) }}
							    </div>
							</div>
						</div>
						<div class="row">
					    	<div class="col-md-6">	
					    		<div>
									{{ Form::label('Issue', 'Issue #') }}
							    </div>
							    <div class="form-group">
							    	{{ Form::checkbox('issue_1') }}
							    	{{ Form::label('issue_options', '1', array('class'=>'checkspace')) }}
							    	{{ Form::checkbox('issue_2') }}
							        {{ Form::label('issue_options', '2', array('class'=>'checkspace')) }}
							        {{ Form::checkbox('issue_3') }}
							        {{ Form::label('issue_options', '3', array('class'=>'checkspace')) }}
							        {{ Form::checkbox('issue_4') }}
							        {{ Form::label('issue_options', '4', array('class'=>'checkspace')) }}
							        {{ Form::checkbox('issue_5') }}
							        {{ Form::label('issue_options', '5', array('class'=>'checkspace')) }}
							    </div>
							    
							</div>
							<div class="col-md-6">
								<div class="form-group">
									{{ Form::label('year', 'Year') }}
					    			{{ Form::selectYear('year', date('Y'), date('Y')+5, null, array('class'=>'form-control')) }}
							    </div>
							</div>
						</div>
			    	</div>

			    	<div class="col-md-4">
			    		
			    		<div class="form-group">
			    			{{ Form::label('subcost', 'Cost Per Ad') }}
			    			{{ $errors->first('subcost', '<p class="text-red">:message</p>') }}
					    	{{ Form::text('subcost', null, array('class'=>'form-control', 'placeholder'=>'Cost')) }}
					    </div>
					    <div class="form-group">
			    			{{ Form::label('discount', 'Discount Per Ad') }}
			    			{{ $errors->first('discount', '<p class="text-red">:message</p>') }}
					    	{{ Form::text('discount', null, array('class'=>'form-control', 'placeholder'=>'Discount')) }}
					    </div>
					    <div class="form-group">
			    			{{ Form::label('cost', 'Total Cost Per Ad') }}
			    			{{ $errors->first('cost', '<p class="text-red">:message</p>') }}
					    	{{ Form::text('cost', null, array('class'=>'form-control', 'placeholder'=>'Total Cost')) }}
					    </div>
			    	</div>
			    </div>
			    
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>


