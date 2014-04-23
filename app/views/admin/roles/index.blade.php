@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
    {{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box" style="padding: 0px 20px 20px 20px">
                    <div class="page-header">
        <h3>
            {{{ $title }}}

            <div class="pull-right">
                <a href="{{{ URL::to('admin/users/create') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>
            </div>
        </h3>
    </div>
                <div class="box-body table-responsive">

                    <table id="roles" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-6">{{{ Lang::get('admin/roles/table.name') }}}</th>
                                <th class="col-md-2">{{{ Lang::get('admin/roles/table.users') }}}</th>
                                <th class="col-md-2">{{{ Lang::get('admin/roles/table.created_at') }}}</th>
                                <th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->        
@stop

{{-- Scripts --}}
@section('scripts')
    <script type="text/javascript">
        var oTable;
        $(document).ready(function() {
                oTable = $('#roles').dataTable( {
                "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page"
                },
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "{{ URL::to('admin/roles/data') }}",
                "fnDrawCallback": function ( oSettings ) {
                    $(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
                }
            });
        });
    </script>
@stop