<?php namespace helpers\Billing;

interface BillingInterface {
	public function charge(array $data);
}