@extends('layouts.default')

@section('content')
<section class="content-header">
    <h1>
        View Invoices
    </h1>
 
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Pay For An Invoice or View Invoice History</h3>                                    
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    @if (!isset($invoices))
                        <p class="alert alert-danger">You have not been billed for any invoices.</p>
                    @else 

                    
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Invoice #</th>
                                <th>Date</th>
                                <th>Total Cost</th>
                                <th>Trade</th>
                                <th>Status</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($invoices as $invoice)
                            <tr style="text-align:center;">
                                <td>{{ $invoice->id }}</td>
                                <td>{{ date('m/d/Y', strtotime($invoice->created_at)) }}</td>
                                <td>${{ $invoice->invoiceitem->sum('cost') }}</td>
                                <td>{{ ($invoice->trade) ? 'Yes' : 'No' }}</td>
                                <td>{{ ($invoice->paid) ? 'Paid' : 'Unpaid' }}</td>
                                <td>{{ link_to('user/pay/'.$invoice->id, 'View/Pay') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Invoice #</th>
                                <th>Date</th>
                                <th>Total Cost</th>
                                <th>Trade</th>
                                <th>Status</th>
                                <th>Details</th>
                            </tr>
                        </tfoot>
                    </table>
                    @endif
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->

@stop