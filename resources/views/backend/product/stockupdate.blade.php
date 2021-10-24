@extends('backend.layouts.master')
@section('title')
    Product Stock Update Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manajemen Stok </h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search" style="padding-left: 75px;">
                            <div class="input-group">
                                <a href="{{route('product.list')}}" class="btn btn-success">Lihat Barang</a>
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
                            <h2>Update Stok Barang</h2>
                            
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form action="{{route('stock.update',$product->id)}}" method="post">
                                {{ csrf_field()}}
                                <div class="form-group">
                                    <label for="name">Nama Barang*</label>
                                    <input type="text" value="{{$product->name}}" class="form-control"  placeholder="Enter Name" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="stock">Jumlah Stok Barang*</label>
                                    <input type="number" value="{{$product->stock}}" class="form-control"  placeholder="Enter Available Stock" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="stock">Jumlah Stok yang Ingin Ditambahkan*</label>
                                    <input type="number"  class="form-control" id="stock" name="stock" placeholder="Masukan Jumlah Stok yang Ingin Ditambahkan" min="1">
                                    <span class="error"><b>
                                         @if($errors->has('stock'))
                                                {{$errors->first('stock')}}
                                         @endif</b></span>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Harga Karton per/ Pcs*</label>
                                    <input type="number" value="{{$product->quantity}}" class="form-control" id="quantity" name="quantity" placeholder="Harga Karton per/ Pcs">
                                    <span class="error"><b>
                                         @if($errors->has('quantity'))
                                                {{$errors->first('quantity')}}
                                            @endif</b></span>
                                </div>
                                <div class="form-group">
                                    <label for="status">Harga Pack per/ Pcs*</label>
                                    <input type="number" value="{{$product->status}}" class="form-control" id="status" name="status" placeholder="Harga Pack per/ Pcs">
                                    <span class="error"><b>
                                         @if($errors->has('status'))
                                                {{$errors->first('status')}}
                                            @endif</b></span>
                                </div>
                                <div class="form-group">
                                    <label for="price">Harga per/ Pcs*</label>
                                    <input type="number" value="{{$product->price}}" class="form-control" id="price" name="price" placeholder="Harga per/ Pcs">
                                    <span class="error"><b>
                                         @if($errors->has('price'))
                                                {{$errors->first('price')}}
                                            @endif</b></span>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" name="btnCreate" class="btn btn-primary" >Update Stok</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection

@section('script')

@endsection