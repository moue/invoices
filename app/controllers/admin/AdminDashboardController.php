<?php

class AdminDashboardController extends AdminController {

	/**
	 * Admin dashboard
	 *
	 */

	

	public function getIndex() {
        
        $id = Auth::user()->id;

        // Get total amount of revenue user has brought in
        $revenue = DB::table('invoices')
            ->where('invoices.user_id','=',$id)
            ->sum('invoices.cost');
        
        // Get total amount of accounts that user manages
        $accounts_owned = Auth::User()->advertisers->count();

        // Get total amount of invoices that have been sent
        $sent = DB::table('invoices')
            ->where('invoices.user_id','=',$id)
            ->count();

        // Get total amount of invoices that are have been paid
        $paid = DB::table('invoices')
            ->where('invoices.user_id','=',$id)
            ->sum('invoices.paid');
        
        $unpaid = $sent-$paid;

        return View::make('admin.dashboard')
            ->with('revenue', $revenue)
            ->with('accounts_owned', $accounts_owned)
            ->with('sent', $sent)
            ->with('unpaid', $unpaid);
	}

}
