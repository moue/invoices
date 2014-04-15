<?php namespace helpers\validators;

class InvoiceValidator extends Validator {
	
	protected static $rules = [
	    'description'=>'required',
	    'discount'=>'required|numeric',
	    'subcost'=>'required|numeric',
	    'cost'=>'required|numeric'
	];
}

?>