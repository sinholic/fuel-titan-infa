<!-- Sidebar Menu -->

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        @if (\Auth::user()->status->nama == 'Admin' || \Auth::user()->status->nama == 'Super Admin')
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
                        <p>Vendor</p>
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

        @endif
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
                <p>
                    Tools
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview offset-md-2">
                <li class="nav-item">
                    <a href="/purchaseorder" class="nav-link">
                        <p>Purchase Orders Fuel</p>
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
                        <p>Station Assignment</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/qty_solar" class="nav-link">
                        <p>Varian Qty Solar</p>
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

                <!-- <li class="nav-item">
                    <a href="/error" class="nav-link">
                        Kalibrasi
                    </a>
                </li> -->

            </ul>
        </li>

        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                <p>
                    Transactions
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview offset-md-2">

                <li class="nav-item">
                    <a href="/pengisian_mobile" class="nav-link">
                        <p>(01) Good Issue MS</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/pengisian_fix" class="nav-link">
                        <p>(02) Good Issue FS</p>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a href="/daf_pengisian" class="nav-link">
                        <p>Daftar Pengisian</p>
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a href="/userhe" class="nav-link">
                        <p>(03) Timesheet HE</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/reloading" class="nav-link">
                        {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                        <p>
                            (04) Stock Impress
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/penerimaan" class="nav-link">
                        {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                        <p>
                            (05) Penerimaan Solar
                        </p>
                    </a>
                </li>

                 <li class="nav-item has-treeview">
                    <a href="/consignment" class="nav-link">
                        <p>
                            (09) Consignment
                        </p>
                    </a>
                </li>

            </ul>
        </li>

        {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <p>
                    Piutang Solar
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview offset-md-2">
                <li class="nav-item">
                    <a href="/piutang" class="nav-link">
                        <p>(06) Penerimaan Piutang Solar</p>
                    </a>
                </li>
            </ul>
        </li> --}}

        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
                <p>
                    Hutang Solar
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview offset-md-2">
                <li class="nav-item">
                    <a href="/pengajuan_hutang" class="nav-link">
                        <p>Pengajuan</p>
                    </a>
                </li>

                 <li class="nav-item">
                    <a href="/pengambilan" class="nav-link">
                        <p>(07) Pengambilan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/pengembalian" class="nav-link">
                        <p>(08) Pengembalian</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
                <p>
                    Piutang Solar
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview offset-md-2">
                <li class="nav-item">
                    <a href="/pengajuan_piutang" class="nav-link">
                        <p>Pengajuan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/penerimaan_piutang" class="nav-link">
                        <p>(06) Penerimaan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/pengeluaran" class="nav-link">
                        <p>(10) Pengeluaran</p>
                    </a>
                </li>
            </ul>
        </li>

        <!-- {{-- <li class="nav-item has-treeview">
            <a href="/consignment" class="nav-link">
                <p>
                    (09) Consignment
                </p>
            </a>
        </li> --}} -->

        <li class="nav-item has-treeview menu-open">
            <a href="/stockopname" class="nav-link">
                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                <p>
                    Transaksi barang
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview offset-md-2">
                <li class="nav-item">
                    <a href="/inventori" class="nav-link">
                        <p>Inventori</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview offset-md-2">
                <li class="nav-item">
                    <a href="/stockopname" class="nav-link">
                        <p>Stok Opname</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview offset-md-2">
                <li class="nav-item">
                    <a href="/stockglobal" class="nav-link">
                        <p>Stok Global</p>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</nav>
<!-- /.sidebar-menu -->