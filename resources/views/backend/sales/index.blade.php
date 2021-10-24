@extends('backend.layouts.master')
@section('title')
Product Listing Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manajemen Barang</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
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
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Riwayat Penjualan</h2>

                        <div class="clearfix"></div>
                    </div>


                    <div class="row input-daterange">
                        <form action="{{route('sales.setSpecificSale')}}" method="POST">
                            {{ csrf_field() }}

                            <div class="col-md-4">
                                <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly />
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
                            </div>
                            <span class="input-group-btn">
                                <button class="btn btn-primary float-right" type="submit">Show</button>
                                <a href="{{route('sales.resetStatus')}}" class="btn btn-danger">Reset</a>
                            </span>

                        </form>
                    </div>
                    <div class="export-button">
                        <br>
                        <a href="/history-export" id="export" class="btn btn-success my-3" target="_blank">Export</a>
                    </div>


                    <div class="x_content">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="categorytable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No. Penjualan</th>
                                    <th>Tanggal Penjualan</th>
                                    <th>Nama Barang</th>
                                    <th>Quantity</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php $oldhistory = '' ?>
                                <?php $sumOfIncome = 0 ?>
                                <?php $index = 0 ?>
                                <?php $no_penjualan = 0 ?>
                                <?php $startdate = '' ?>
                                <?php $todate = '' ?>
                                @foreach($sales as $sls)
                                <tr>
                                    @if($sls->history_id == $oldhistory)
                                    <th></th>
                                    <td> </td>
                                    <td></td>
                                    <td>{{$sls->n}} </td>
                                    <td>{{$sls->quantity}} </td>
                                    <td>Rp. {{$sls->price}}</td>
                                    <?php $sumOfIncome = $sumOfIncome + $sls->price ?>
                                    @else
                                    <th> {{$i++}}</th>
                                    <td>{{$sls->history_id}} </td>
                                    <td>{{$sls->sales_date}}</td>
                                    <td>{{$sls->n}} </td>
                                    <td>{{$sls->quantity}} </td>
                                    <td>Rp. {{$sls->price}}</td>
                                    <?php $sumOfIncome = $sumOfIncome + $sls->price ?>
                                    @endif
                                    <?php $oldhistory = $sls->history_id ?>
                                
                                    @if($no_penjualan > $sls->history_id)
                                    <?php $startdate = $sls->sales_date ?>
                                    
                                    @else
                                    <?php $todate = $sls->sales_date ?>
                                    <?php $no_penjualan = $sls->history_id ?>
                                    @endif


                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5">Total Pendapatan Tanggal : {{$startdate}} s/d {{$todate}} </td>
                                    <td>Rp. {{$sumOfIncome}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="{{asset('backend/plugins/jquery.dataTables.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.input-daterange').datepicker({
            todayBtn: 'linked',
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#categorytable').DataTable();
    });
</script>
<script>
    function exportTasks(_this) {
        let _url = $(_this).data('href');
        window.location.href = _url;
    }
</script>
@endsection