@extends('layouts.default')

@section('content')
<section class="content-header">
    <h1>
        Edit Existing Invoice
        <small>Invoice #{{ $invoice->id }}</small>
    </h1>
</section>

<section class="content">
    {{ Form::model($invoice, ['method'=>'PATCH', 'route'=>['admin.invoice.update', $invoice->id], 'files'=>true]) }}
    	@include('invoices/partials/_form')
    	<div class="box-footer">
        	{{ Form::submit('Update Invoice', array('class'=>'btn bg-purple btn-block')) }}
     	</div>
    {{ Form::close() }}
</section>      
@stop