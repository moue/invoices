<?php namespace helpers\Billing;

use Illuminate\Support\ServiceProvider;

class BillingServiceProvider extends ServiceProvider {
	public function register () {
		$this->app->bind('helpers\Billing\BillingInterface', 'helpers\Billing\StripeBilling');
	} 
}