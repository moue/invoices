<?php namespace helpers\Billing;

use Stripe;
use Stripe_Charge;
use Config;
use User;

class StripeBilling implements BillingInterface {
	
	public function __construct() {
		Stripe::setApiKey(Config::get('stripe.secret_key'));
	}
	
	public function charge(array $data) {
		try {
			return Stripe_Charge::create([
				'amount' 		=> 1000, // $10
				'currency' 		=> 'usd',
				'description'	=> $data['email'],
				'card'			=> $data['token'],
			]);	
		} 
		catch(Stripe_CardError $e) {
			//dd('card was declined');
		}

		
	}
}