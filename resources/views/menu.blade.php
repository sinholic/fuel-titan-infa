<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
                <p>
                    Master Data
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview offset-md-2">

                <li class="nav-item">
                    <a href="/materials" class="nav-link">
                        Master Material
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/fix" class="nav-link">
                        Master Fix Station
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/mobile" class="nav-link">
                        Master Mobile Station
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/equipment" class="nav-link">
                        <p> Master Equipment</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/owner" class="nav-link">
                        <p>Owner</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/voucher" class="nav-link">
                        <p>Voucher</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/user" class="nav-link">
                        <p>Users</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <p>
                    Tools
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview offset-md-2">
                <li class="nav-item">
                    <a href="/purchaseorder" class="nav-link">
                        <p>Purchase Orders</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/equipment_category" class="nav-link">
                        <p>Category Equipment</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/companycode" class="nav-link">
                        <p>Company Code</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/status" class="nav-link menu">
                        <p>User Level</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/timesheetstatus" class="nav-link menu">
                        <p>Timesheet Status</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/userassign" class="nav-link">
                        <p>Fix Station Assignment</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/qty_solar" class="nav-link">
                        <p>Tambah Varian Qty Solar</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/merk" class="nav-link">
                        Merk
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/tipe_equipment" class="nav-link">
                        Tipe Equipment
                    </a>
                </li>
            </ul>
        </li>

        {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
        {{-- <p>
                    User Assignment
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview offset-md-2">
                <li class="nav-item">
                    <a href="/userassign" class="nav-link">
                        List assignment
                    </a>
                </li>
            </ul> --}}
        {{--</li> --}}

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                <p>
                    Good Issue
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview offset-md-2">

                <li class="nav-item">
                    <a href="/pengisian_mobile" class="nav-link">

                        <p>Good Issue On Mobile Station</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/pengisian_fix" class="nav-link">
                        <p>Good Issue On Fix Station</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p>Daftar Pengisian</p>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="/userhe" class="nav-link">
                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                <p>
                    Timesheet Heavy Equipment
                </p>
            </a>
        </li>

        <li class="nav-item has-treeview">
            <a href="/reloading" class="nav-link">
                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                <p>
                    Pengisian Ulang Mobil Station
                </p>
            </a>
        </li>

        <li class="nav-item has-treeview">
            <a href="/penerimaan" class="nav-link">
                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                <p>
                    Penerimaan Solar
                </p>
            </a>
        </li>

        <li class="nav-item has-treeview">
            <a href="/upload" class="nav-link">
                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                <p>
                    Uploaded File
                </p>
            </a>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                <p>
                    Piutang Solar
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview offset-md-2">

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p>Penerimaan Piutang Solar</p>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                <p>
                    Hutang Solar
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview offset-md-2">

                <li class="nav-item">
                    <a href="/pengajuan" class="nav-link">
                        <p>Pengajuan Hutang Solar</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/pengambilan" class="nav-link">
                        <p>Pengambilan Solar</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/pengembalian" class="nav-link">
                        <p>Pengembalian Solar</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                <p>
                    Consignment
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
        </li>

        <li class="nav-item has-treeview">
            <a href="/penerimaan" class="nav-link">
                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                <p>
                    Stock Opname
                </p>
            </a>
        </li>

    </ul>
</nav>
<!-- /.sidebar-menu -->