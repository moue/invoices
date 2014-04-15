<?php namespace helpers\services;

use helpers\validators\InvoiceValidator;
use helpers\validators\ValidationException;
use Invoice;
use InvoiceItem;

class InvoiceManagerService {
	
	protected $validator;

	public function __construct(InvoiceValidator $validator) {
		$this->validator = $validator;
	}

	public function make(array $attributes, $name) {
		if($this->validator->isValid($attributes)) {
		
			// Set default if checkbox is not checked
			$trade = (isset($attributes['trade']) ? (int) $attributes['trade'] : 0);
			$paid = (isset($attributes['paid']) ? (int) $attributes['paid'] : 0);
			
			// Create new invoice
			$invoice = new Invoice;
			$invoice->advertiser_id = $attributes['advertiser_options'];
			$invoice->user_id = $attributes['user_options'];
			$invoice->notes = $attributes['notes'];
			$invoice->trade = $trade;
			$invoice->paid = $paid;
			$invoice->save();

			$id = $invoice->id;

			//for ($i = 0; $i<2; $i++) {
			$item = new InvoiceItem;
			$item->description = $attributes['description'];
			$item->image = $name;
			$item->issue_1 = (isset($attributes['issue_1']) ? (int) $attributes['issue_1'] : 0);
			$item->issue_2 = (isset($attributes['issue_2']) ? (int) $attributes['issue_2'] : 0);
			$item->issue_3 = (isset($attributes['issue_3']) ? (int) $attributes['issue_3'] : 0);
			$item->issue_4 = (isset($attributes['issue_4']) ? (int) $attributes['issue_4'] : 0);
			$item->issue_5 = (isset($attributes['issue_5']) ? (int) $attributes['issue_5'] : 0);
			$item->year = $attributes['year'];
			$item->size_id = $attributes['size_options'];
			$item->subcost = $attributes['subcost'];
			$item->discount = $attributes['discount'];
			$item->cost = $attributes['cost'];
			$item->invoice()->associate(Invoice::find($id));
			$item->save();
			//}
			return true;
		}	

		throw new ValidationException('Invoice validation failed', $this->validator->getErrors());
	}

	public function update(array $attributes, $id) {
		if($this->validator->isValid($attributes)) {
		
			// Set default if checkbox is not checked
			$trade = (isset($attributes['trade']) ? (int) $attributes['trade'] : 0);
			$paid = (isset($attributes['paid']) ? (int) $attributes['paid'] : 0);
			
			// Create new invoice
			$invoice = Invoice::find($id);
			$invoice->advertiser_id = $attributes['advertiser_options'];
			$invoice->user_id = $attributes['user_options'];
			$invoice->notes = $attributes['notes'];
			$invoice->trade = $trade;
			$invoice->paid = $paid;
			$invoice->save();

			//for ($i = 0; $i<2; $i++) {
			$item = DB::table('invoices')->where('invoice_id', '=', $id);
			$item->description = $attributes['description'];
			$item->image = $name;
			$item->issue_1 = (isset($attributes['issue_1']) ? (int) $attributes['issue_1'] : 0);
			$item->issue_2 = (isset($attributes['issue_2']) ? (int) $attributes['issue_2'] : 0);
			$item->issue_3 = (isset($attributes['issue_3']) ? (int) $attributes['issue_3'] : 0);
			$item->issue_4 = (isset($attributes['issue_4']) ? (int) $attributes['issue_4'] : 0);
			$item->issue_5 = (isset($attributes['issue_5']) ? (int) $attributes['issue_5'] : 0);
			$item->year = $attributes['year'];
			$item->size_id = $attributes['size_options'];
			$item->subcost = $attributes['subcost'];
			$item->discount = $attributes['discount'];
			$item->cost = $attributes['cost'];
			$item->save();
			//}
			return true;
		}	

		throw new ValidationException('Invoice validation failed', $this->validator->getErrors());
	}
}

?>