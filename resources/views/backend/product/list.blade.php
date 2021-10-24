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
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search" style="padding-left: 120px;">
                            <div class="input-group">
                                <a href="{{route('product.create')}}" class="btn btn-success">Tambah Barang Baru</a>
                            </div>
                        </div>
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
                            <h2>Daftar Barang</h2>
                            
                            <div class="clearfix"></div>
                                <div class="export-button">
                                    <br>
                                    <a href="/product-print" id="export" class="btn btn-success my-3" target="_blank">Print</a>
                                </div>
                        </div>
                        <div class="x_content">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="categorytable">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kategori</th>
                                    <th>Nama</th>
                                    <th>Code</th>
                                    <th>Harga Karton per/ Pcs</th>
                                    <th>Harga Pack per/ Pcs</th>
                                    <th>Harga Pcs</th>
                                    <th>Stok</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($product as $pc)
                                    <tr>
                                        <th> {{$i++}}</th>
                                        <td>{{$pc->n}} </td>
                                        <td>{{$pc->name}} </td>
                                        <td>{{$pc->code}} </td>
                                        <td>Rp. {{$pc->quantity}}</td>
                                        <td>Rp. {{$pc->status}}</td>
                                        <td>Rp. {{$pc->price}}</td>
                                        <td> {{$pc->stock}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <a href="{{route('product.edit',$pc->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                                </div>
                                                <div class="col-md-2">
                                                    <form action="{{route('product.delete' ,$pc->id)}}" method="post">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        {{ csrf_field()}}
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah kamu yakin akan menghapusnya?')" ><i class="fa fa-trash-o"></i></button>
                                                    </form>
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="{{route('stock.edit',$pc->id)}}" class="btn btn-info"><i class="fa fa-plus"></i> Stock Update</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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
    <script type="text/javascript" src="{{asset('backend/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#categorytable').DataTable();
        } );
    </script>
@endsection