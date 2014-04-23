@extends('layouts.default')

@section('content')


<section class="content-header">
    <h1>
        View/Pay Invoice #{{ $id }}
    </h1>
</section>

<section class="content">
    <!-- form start -->
    {{ Form::open(['id'=>'billing-form', 'action'=> array('UserController@postPay', $id)]) }}
    	<div class="box-footer">
			<!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Size</th>
                                <th>Description</th>
                                <th colspan="5">Issue Number</th>
                                <th>Year</th>
                                <th>Cost of Ad</th>
                                <th>Charges/Discounts</th>
                                <th>Total Cost</th>
                            </tr>                                    
                        </thead>
                        <tbody>
                            @foreach($invoices as $invoice)
                            <tr style="text-align:center;">
                                <td style="text-align:left;">{{ $size_options[$invoice->size_id] }}</td>
                                <td style="text-align:left;">{{ (($invoice->image) ?  HTML::link(URL::asset('img/snakebite.jpg'), $invoice->description) : 'No Description Provided') }}</td>
                                <td>{{ ($invoice->issue_1) ? '1' : '' }}</td>
                                <td>{{ ($invoice->issue_2) ? '2' : '' }}</td>
                                <td>{{ ($invoice->issue_3) ? '3' : '' }}</td>
                                <td>{{ ($invoice->issue_4) ? '4' : '' }}</td>
                                <td>{{ ($invoice->issue_5) ? '5' : '' }}</td>
                                <td>{{ $invoice->year }}
                                <td>{{ $invoice->subcost }}</td>
                                <td>{{ $invoice->discount }}</td>
                                <td>{{ $invoice->cost }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>                            
                </div><!-- /.col -->
            </div><!-- /.row -->
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-header">
					        <h3 class="box-title">Payment Method</h3>
					    </div><!-- /.box-header -->
						<div class="box-body">
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

						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</div>
			</div>




        	{{ Form::submit('Submit Payment', array('class'=>'btn bg-purple btn-block')) }}
     	</div>
    {{ Form::close() }}

</section>      
@stop

@section('footer')
	<script src="/js/billing.js"></script>
@stop