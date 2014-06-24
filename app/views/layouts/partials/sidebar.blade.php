 
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        @if (Auth::check())
        @if (Auth::user()->hasRole('admin'))
        
        
        <li>
            <a href="/">
                <h4><i class="fa fa-laptop"></i> Dashboard</h4>
            </a>
        </li>
        <li class="treeview">
            <a href="/admin/invoice">
                <h4><i class="fa fa-credit-card"></i>
                Invoices
                <i class="fa fa-angle-left pull-right"></i></h4>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="/admin/invoice" style="margin-left: 10px;">
                        <h5><i class="fa fa-angle-double-right"></i> View Invoices</h5>
                    </a>
                </li>
                <li>
                    <a href="/admin/invoice/create" style="margin-left: 10px;">
                        <h5><i class="fa fa-angle-double-right"></i> Create Invoice</h5>
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a href="/admin/advertiser">
                <h4><i class="fa fa-envelope-o"></i>
                Advertisers
                <i class="fa fa-angle-left pull-right"></i></h4>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="/admin/advertiser/" style="margin-left: 10px;">
                        <h5><i class="fa fa-angle-double-right"></i> View Advertisers</h5>
                    </a>
                </li>
                <li>
                    <a href="/admin/advertiser/create" style="margin-left: 10px;">
                        <h5><i class="fa fa-angle-double-right"></i> Add Advertiser</h5>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="/admin/users">
                <h4><i class="fa fa-user"></i> Manage Users</h4>
            </a>
        </li>
        <li>
            <a href="/admin/roles">
                <h4><i class="fa fa-group"></i> Manage Roles</h4>
            </a>
        </li>

        @else
       

        <li>
            <a href="/user">
                <h4><i class="fa fa-credit-card"></i> View Invoices</h4>
            </a>
        </li>
        <!--<li>
            <a href="/user/invoices">
                <h4><i class="fa fa-folder-open"></i> View Ads</h4>
            </a>
        </li>-->
        
        
        <!--<li>
            <a href="/user/help">
                <h4><i class="fa fa-group"></i> Contact Us</h4>
            </a>
        </li>-->
        @endif
        @endif
        <li>
            <a href="/user/settings">
                <h4><i class="fa fa-gear"></i> Settings</h4>
            </a>
        </li>
    </ul>
</section>
<!-- /.sidebar -->
