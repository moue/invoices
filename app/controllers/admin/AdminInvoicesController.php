<?php

use helpers\services\InvoiceManagerService;

class InvoicesController extends \BaseController {

	public function __construct(InvoiceManagerService $invoiceManager) {
		$this->invoiceManager = $invoiceManager;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user_id = Auth::user()->id;
		$invoices = Invoice::with('invoiceitem')->where('user_id', '=', $user_id)->get();
		/* Get full invoice query
		$invoices = DB::table('invoices')
			->leftJoin('advertisers', 'invoices.advertiser_id','=','advertisers.id')
			->get();
		*/

		return View::make('invoices.index')->with('invoices', $invoices);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		return View::make('invoices.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$input = Input::all();
		
		// Determine if an image was uploaded and save the path name
		if (Input::hasFile('image')) {
			$file = Input::file('image');
			$name = time() . '-' . $file->getClientOriginalName();
			$path = $file->move(public_path() . '/img/', $name);
		}
		else {
			$name = 'placeholder.png';
		}

		try 
		{
			$this->invoiceManager->make($input, $name);
		}
		catch(helpers\validators\ValidationException $e) 
		{
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}
		
		return Redirect::to('admin/invoice');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// Check that invoice exists
		$invoice = Invoice::findOrFail($id);

		/* Get full invoice query
		$fullinvoice = DB::table('invoices')
			->leftJoin('advertisers', 'invoices.advertiser_id','=','advertisers.id')
			->where('invoices.invoice_id','=',$id)
			->get();
		
		Get sales contact associated with invoice
		$sales_contact = Advertiser::find($id)->user;
		return $sales_contact;
		*/
		
		$advertiser = $invoice->advertiser()->first();
		$sales_contact = $advertiser->user()->first();
		$fullinvoice = $invoice->invoiceitem()->get();
		
		// Get total cost using addition
		$totalcost = DB::table('invoice_items')
			->where('invoice_items.invoice_id','=',$id)
			->sum('invoice_items.cost');
		
		return View::make('invoices.show')
			->with('invoices', $fullinvoice)
			->with('total', $totalcost)
			->with('advertiser', $advertiser)
			->with('sales_contact');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// Check that invoice exists
		$invoice = Invoice::findOrFail($id);

		// Get the full invoice query
		$fullinvoice = $invoice->with('invoiceitem', 'advertiser', 'user')->where('id', '=', $id)->first();

		/* Get full invoice query
		$fullinvoice = DB::table('invoices')
			->leftJoin('advertisers', 'invoices.advertiser_id','=','advertisers.id')
			->where('invoices.invoice_id','=',$id)
			->get();
		
		Get sales contact associated with invoice
		$sales_contact = Advertiser::find($id)->user;
		return $sales_contact;
		*/
		
		//$advertiser = $invoice->advertiser()->first();
		//$sales_contact = $advertiser->user()->first();
		//$fullinvoice = $invoice->invoiceitem()->get();
		
		// Get total cost using addition
		$totalcost = DB::table('invoice_items')
			->where('invoice_items.invoice_id','=',$id)
			->sum('invoice_items.cost');
		
		return View::make('invoices.edit')
			->with('invoice', $fullinvoice)
			->with('total', $totalcost);
	

		//$invoice = Invoice::findOrFail($id);

		// Get full invoice query
		//$products= DB::table('invoices')
		//	->where('invoices.invoice_id','=',$id)
		//	->get();

		// Get total cost using addition
		//$totalcost = DB::table('invoices')
		//	->where('invoices.invoice_id','=',$id)
		//	->sum('invoices.cost');

		// Get advertiser information
		//$advertiser = DB::table('advertisers')
		//	->where('advertisers.id', '=', $invoice->advertiser_id)
		//	->first();

		/*$this->layout->content = View::make('invoices.edit')
			->with('advertiser', $advertiser)
			->with('invoice_id', $invoice->invoice_id)
			->with('products', $products)
			->with('total', $totalcost);*/

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		
		// Determine if an image was uploaded and save the path name
		if (Input::hasFile('image')) {
			$file = Input::file('image');
			$name = time() . '-' . $file->getClientOriginalName();
			$path = $file->move(public_path() . '/img/', $name);
		}
		else {
			$name = 'placeholder.png';
		}

		try 
		{
			$this->invoiceManager->make($input, $name, $id);
		}
		catch(helpers\validators\ValidationException $e) 
		{
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}
		
		return Redirect::to('admin/invoice');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}