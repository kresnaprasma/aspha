<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/assets/adminlte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                {{-- <p> {{ Auth()->user()->name }} <span class="caret"></p> --}}

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">ADMIN AREA</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
                <a href="#"><i class="fa fa-plus-circle"></i><span>Master Data</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.master.merk.index') }}"><i class="fa fa-road"></i>Merk</a></li>
                    <li><a href="{{ route('admin.master.type.index') }}"><i class="fa fa-motorcycle"></i>Type</a></li>
                    <li><a href="{{ route('admin.master.vehiclecollateral.index') }}"><i class="fa fa-signal"></i>Vehicle Collateral</a></li>
                    <li><a href="{{ route('admin.master.bank.index') }}"><i class="fa fa-bank"></i>Bank</a></li>
                    <li><a href="{{ route('admin.master.branch.index') }}"><i class="fa fa-external-link-square"></i>Branch</a></li>
                    <li><a href="{{ route('admin.master.supplier.index') }}"><i class=" fa fa-truck"></i>Supplier</a></li>
                    <li><a href="{{ route('admin.master.credittype.index') }}"><i class="fa fa-sort"></i>Credit Type</li>
                    <li><a href="{{ route('admin.loan.leasing.index') }}"><i class="fa fa-credit-card"></i>Leasing</a></li>
                    <li><a href="{{ route('admin.master.user.index') }}"><i class="fa fa-user-plus"></i>User</a></li>
                    <li><a href="{{ route('admin.master.role.index') }}"><i class="fa fa-binoculars"></i>Role</a></li>
                    <li><a href="{{ route('admin.master.permission.index') }}"><i class="fa fa-user-secret"></i>Permission</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-money"></i><span>Dana Tunai</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.cash.index') }}"><i class="fa fa-bar-chart"></i>DaTun Request</a></li>
                    <li><a href="{{ route('admin.approve.index') }}"><i class="fa fa fa-download"></i>Inbox</a></li>
                    <li><a href="{{ route('admin.approve.create') }}"><i class="fa fa fa-check-square-o"></i>Approve Fix</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-motorcycle"></i><span>Motor Bekas</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/admin/mokas') }}"><i class="fa fa-motorcycle"></i>Data Mokas</a></li>
                    <li><a href="{{ route('admin.sales.index') }}"><i class="fa fa-tachometer"></i>Sales</a></li>
                    <li><a href="{{ route('admin.pricesaleshistory.index') }}"><i class="fa fa-tags"></i>Price Sales History</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-users"></i><span>Customer</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/admin/customer') }}"><i class="fa fa-user"></i><span>Data Customer</span></a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>