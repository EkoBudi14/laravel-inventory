Products
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Inventory Istana Knalpot</title>

    <link href="{{ asset('backend') }}/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand">Inventory Istana Knalpot</a>
        <button style="margin-left : 10px" class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        </form>
        <!-- Navbar-->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a style="color: white; font-weight : 500; margin: 50px;" href="route('logout')"
                onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
        </form>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Home</div>
                        <a class="nav-link" href="{{ route('dashboard.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Menu</div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
                            aria-expanded="false" aria-controls="collapseProducts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Products
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseProducts" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                @if (Auth::user()->role == 'Admin')
                                    <a class="nav-link" href="{{ route('add.product') }}">New Item</a>
                                    <a class="nav-link" href="{{ route('all.product') }}">Stock Items</a>
                                @else 
                                    <a class="nav-link" href="{{ route('all.product') }}">Stock Items</a>
                                @endif
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInvoice"
                            aria-expanded="false" aria-controls="collapseInvoice">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Sales
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseInvoice" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                @if (Auth::user()->role == 'Admin')
                                <a class="nav-link" href="{{ route('new.invoice') }}">New Invoice</a>
                                <a class="nav-link" href="{{ route('printInvoiceByDate.invoice') }}">Invoices List</a>
                                <a class="nav-link" href="{{ route('printStockByDate.invoice') }}">Sale Of Goods</a>
                                @else
                                <a class="nav-link" href="{{ route('printInvoiceByDate.invoice') }}">Invoices List</a>
                                <a class="nav-link" href="{{ route('printStockByDate.invoice') }}">Sale Of Goods</a>
                                @endif
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse"
                            data-target="#collapseAuthentication" aria-expanded="false"
                            aria-controls="collapseAuthentication">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Customers
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        @if (Auth::user()->role == 'Admin')
                        <div class="collapse" id="collapseAuthentication" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('add.customer') }}">New Customer</a>
                            </nav>
                        </div>
                        <div class="collapse" id="collapseAuthentication" aria-labelledby="headingOne"
                                data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('all.customers') }}">Customers List</a>
                                </nav>
                        </div>
                        @else
                        <div class="collapse" id="collapseAuthentication" aria-labelledby="headingOne"
                                data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('all.customers') }}">Customers List</a>
                                </nav>
                        </div>
                        @endif

                        <div class="sb-sidenav-menu-heading">List Users</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse"
                            data-target="#collapseAuthentications" aria-expanded="false"
                            aria-controls="collapseAuthentication">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Users
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        @if (Auth::user()->role == 'Admin')
                        <div class="collapse" id="collapseAuthentications" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('new.users') }}">New User</a>
                            </nav>
                        </div>
                        <div class="collapse" id="collapseAuthentications" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('all.users') }}">
                                    Users list
                                </a>
                            </nav>
                        </div>
                        @else
                        <div class="collapse" id="collapseAuthentications" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('all.users') }}">
                                    Users list
                                </a>
                            </nav>
                        </div>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">

            @yield('content')

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('backend') }}/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('backend') }}/assets/demo/chart-area-demo.js"></script>
    <script src="{{ asset('backend') }}/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('backend') }}/assets/demo/datatables-demo.js"></script>
    <script src="{{ asset('js/jquery.repeater.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
    {{-- <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script> --}}
    <script>
        function ShowModalSum(customer) {
            $("#CustomerID").val('');
            $("#CustomerID").val(customer);
            $("#ModalSum").modal('show');
        }

        function getdetail(rowid) {
            var end = $('#drop_' + rowid).val();
            $.ajax({
            url: '/getProduct/' + end,
            type: 'get',
            dataType: 'json',
            success: function(response) {

                    console.log(response);
                    $('#name_' + rowid).val(response.data[0].name);
                    $('#product_code_' + rowid).val(response.data[0].product_code);
                    $('#exhaust_section_' + rowid).val(response.data[0].exhaust_section);
                    $('#years_' + rowid).val(response.data[0].years);
                    $('#price_' + rowid).val(response.data[0].price);
                    $('#qty_' + rowid).val(response.data[0].qty);
                    console.log(response.data[0].exhaust_section);
                    console.log(response.data[0].price);
                    console.log(response.data[0].qty);
                    //  console.log(response.data[0].qty);
                }
            })
        }
        $(document).ready(function() {
            $("#drop").change(function() {
                var end = this.value;
                $('#tes').val(end);
            });
        });
    </script>

@include('sweetalert::alert')
</body>

</html>
