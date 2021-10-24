@extends('backend.layouts.master')
@section('title')
    Grocery System
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/select2.min.css')}}">
    <!-- NProgress -->
    <link href="{{asset('backend/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('backend/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{asset('backend/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}"
          rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('backend/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('backend/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{asset('backend/vendors/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/login/css/style.css')}}" rel="stylesheet">
@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row tile_count" style="font-size: x-large;">
            
        </div>
        <!-- /top tiles -->
        @if(Session::has('success_message'))
            <div class="alert alert-success">
                {{ Session::get('success_message') }}
            </div>
        @endif
        @if(Session::has('error_message'))
            <div class="alert alert-danger">
                {{ Session::get('error_message') }}
            </div>
        @endif
        <div class="resp"></div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Buat Penjualan
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form id="btnSave" action="{{route('sales.store')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="product_id">Pilih Barang</label>
                                <select class="form-control js-example-basic-single" id="product_id" name="product_id" data-placeholder="--Cari Barang--" required>
                                </select>
                                <span class="error"><b>
                                       @if($errors->has('product_id'))
                                            {{$errors->first('product_id')}}
                                       @endif</b>
                                    </span>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Stok Barang</label>
                                <input type="number" class="form-control" id="stock" name="stock" placeholder="Stok Barang" disabled>
                                <span class="error"><b>
                                         @if($errors->has('stock'))
                                            {{$errors->first('stock')}}
                                         @endif</b></span>
                            </div>
                            <div class="form-group">
                                <label for="price">Harga per/pcs*</label>
                                <input type="number" class="form-control" name="price" id="price" placeholder="Harga" required>
                                <span class="error"><b>
                                         @if($errors->has('price'))
                                            {{$errors->first('price')}}
                                         @endif</b></span>
                            </div>
                            <div class="form-group">
                                <label for="sales_quantity">Jumlah Barang per/pcs</label>
                                <input type="number" min="1" value="1" class="form-control" id="sales_quantity" name="sales_quantity" placeholder="Jumlah" required>
                                <span class="error"><b>
                                         @if($errors->has('sales_quantity'))
                                            {{$errors->first('sales_quantity')}}
                                         @endif</b></span>
                            </div>
                            
                            <div class="form-group">
                                <input type="hidden" name="sales_status" value="1" id="Active" checked=""><label for="Active"> 
                            </div>
                            <input type="hidden" name="birthday_status" value="0">
                            <input type="hidden" name="dob" value="2017-">
                            <input type="hidden" name="phone" value="977-">
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" name="btnSave" class="btn btn-primary"> Tambah Ke Nota Penjualan </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Buat Nota
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id="saleslist">

                        </div>
                        <div id="ajaxform">

                        </div>
                        <form id="btnSave" action="{{route('sales.getMoney')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                            <div class="form-group">
                                <input type="teks" class="form-control" name="get_money" id="get_money" placeholder="Bayar">
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="btnSave" class="btn btn-primary"> Simpan </button>
                                <a href="/reset-money"  name="butnSave" class="btn btn-danger">RESET</a>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <br/>
    </div>
    <!-- /page content -->
@endsection

@section('script')
    <script src="{{asset('backend/plugins/select2.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".js-example-basic-single").select2();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#product_id').on('change', function () {
                var prdid = $(this).val();
                var path = 'getquantity';
                $.ajax({
                    url: path,
                    method: 'post',
                    data: {'product_id': prdid, '_token': $('input[name=_token]').val()},
                    dataType: 'text',
                    success: function (resp) {
                        console.log(resp);
                        //$('#quantity').empty();
                        $('#stock').val(resp);
                    }
                });

            });
            $('#product_id').on('change', function () {
                var prdid = $(this).val();
                var path = 'getprice';
                $.ajax({
                    url: path,
                    method: 'post',
                    data: {'product_id': prdid, '_token': $('input[name=_token]').val()},
                    dataType: 'text',
                    success: function (resp) {
                        console.log(resp);
                        //$('#price').empty();
                        $('#price').val(resp);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CRF-TOKEN': $('meat[name = "csrf-token"]').attr('content')
                }
            });
            $('#btnSave').on('submit', function (e) {
                e.preventDefault();
                var url = $(this).attr('action');
                var post = $(this).attr('method');
                var data = $(this).serialize();
                $.ajax({
                    url: url,
                    type: post,
                    data: data,
                    success: function (data) {
                        refreshproduct();
                        readsales();
                        ajaxform();
                        var m = "<div class='alert alert-success'>" + data.success_message + "</div>";
                        // alert(data.success_message);
                        $('.resp').html(m);
                        document.getElementById("btnSave").reset();
                    }
                });
            });
        });
        readsales();
        refreshproduct();
        readsales();
        refreshproduct();
        ajaxform();
        function readsales() {
            $.ajax({
                type: 'get',
                url: "{{url('ajaxsales-list')}}",
                dataType: 'html',
                success: function (data) {
                    $('#saleslist').html(data);
                }
            })
        }
        function ajaxform() {
            $.ajax({
                type: 'get',
                url: "{{url('ajax-form')}}",
                dataType: 'html',
                success: function (data) {
                    $('#ajaxform').html(data);
                }
            })
        }
        function refreshproduct() {
            $.ajax({
                type: 'get',
                url: "{{url('refresh-product')}}",
                dataType: 'html',
                success: function (data) {
                    $('#product_id').html(data);
                }
            })
        }
        function printorder() {
            $.ajax({
                url: "{{url('sales-allpdf')}}",
                type: 'get',
                dataType: 'html',
                success:function(data) {
                    var mywindow = window.open('', 'Sabaiko Live Bakery', 'height=400,width=600');
                    mywindow.document.write('<html><head><title></title>');
                    mywindow.document.write('</head><body>');
                    mywindow.document.write(data);
                    mywindow.document.write('</body></html>');
                    mywindow.document.close();
                    mywindow.focus();
                    mywindow.print();
                    mywindow.close();

                }
            });
        }
        function resetMoney() {
            $.ajax({
                url: "{{url('reset-money')}}",
                type: 'get',
                dataType: 'html',
            });
        }

    </script>

    <!-- FastClick -->
    <script src="{{asset('backend/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('backend/vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{asset('backend/vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{asset('backend/vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('backend/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('backend/vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{asset('backend/vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{asset('backend/vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('backend/vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('backend/vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('backend/vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('backend/vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{asset('backend/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{asset('backend/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{asset('backend/vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{asset('backend/vendors/DateJS/build/date.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('backend/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{asset('backend/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('backend/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('backend/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('backend/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('backend/vendors/fullcalendar/dist/fullcalendar.min.js')}}"></script>
    <!-- Custom Theme Scripts -->
@endsection