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
               {{--  <p>Alexander Pierce</p> --}}
                <!-- Status -->
                <p> {{ Auth()->user()->name }} <span class="caret"></p>

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
                <a href="#"><span>Master Data</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.merk.index') }}">Merk</a></li>
                    <li><a href="{{ route('admin.type.index') }}">Type</a></li>
                    <li><a href="{{ route('admin.vehiclecollateral.index') }}">Vehicle Collateral</a></li>
                    <li><a href="{{ route('admin.master.bank.index') }}">Bank</a></li>
                    <li><a href="{{ route('admin.master.branch.index') }}">Branch</a></li>
                    <li><a href="{{ route('admin.master.supplier.index') }}">Supplier</a></li>
                    <li><a href="{{ route('admin.loan.leasing.index') }}">Leasing</a></li>
                    <li><a href="{{ route('admin.master.user.index') }}">User</a></li>
                    <li><a href="{{ route('admin.master.role.index') }}">Role</a></li>
                    <li><a href="{{ route('admin.master.permission.index') }}">Permission</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><span>Loan</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/admin/loan/create') }}"><span>Loan</span></a></li>
                    <li><a href="{{ route('admin.loan.custcoll.index') }}">Cust. Collateral</a></li>
                    <li><a href="{{ route('admin.loan.cash.index') }}">Dana Tunai</a></li>
                    <li><a href="{{ route('admin.loan.cashfix.index') }}">DaTun Fix</a></li>
                    <li><a href="{{ route('admin.loan.history.index') }}">Datun History</a></li>
                    <li><a href="{{ route('admin.loan.customerupload.index') }}">Upload Customer</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#"><span>Motor Bekas</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/admin/motor') }}">Data Mokas</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><span>Customer</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/admin/customer') }}">Data Customer</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>