@extends('backend.layouts.master')
@section('title')
    Product create Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manajemen Barang </h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search" style="padding-left: 130px;">
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
                            <h2>Tambah Barang</h2>
                            
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form action="{{route('product.store')}}" method="post">
                                {{ csrf_field()}}
                                <div class="form-group">
                                    <label for="productcategory_id">Pilih Kategori Barang</label>
                                    <select class="form-control" id="productcategory_id" name="productcategory_id">
                                        <option value="">--Pilih Kategori Barang--</option>
                                        @foreach($productcategory as $m)
                                            <option value="{{$m->id}}">{{$m->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error"><b>
                                       @if($errors->has('productcategory_id'))
                                                {{$errors->first('productcategory_id')}}
                                            @endif</b>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama*</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama">
                                    <span class="error"><b>
                                           @if($errors->has('name'))
                                                {{$errors->first('name')}}
                                            @endif</b>
                                     </span>
                                </div>
                                <div class="form-group">
                                    <label for="code">Code*</label>
                                    <input type="text" class="form-control" id="code" name="code" placeholder="Masukan Kode">
                                    <span class="error"><b>
                                           @if($errors->has('code'))
                                                {{$errors->first('code')}}
                                            @endif</b>
                                     </span>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Harga Karton per/ Pcs*</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Masukan Harga Karton per/ Pcs">
                                    <span class="error"><b>
                                         @if($errors->has('quantity'))
                                                {{$errors->first('quantity')}}
                                            @endif</b></span>
                                </div>
                                <div class="form-group">
                                    <label>Harga Pack per/ Pcs</label>
                                    <input type="number" class="form-control" id="status" name="status" placeholder="Masukan Harga Pack per/ Pcs">
                                    <span class="error"><b>
                                         @if($errors->has('status'))
                                                {{$errors->first('status')}}
                                            @endif</b></span>
                                </div>
                                <div class="form-group">
                                    <label for="price">Harga per/ Pcs*</label>
                                    <input type="number" class="form-control" id="price" name="price" placeholder="Masukan Harga per/ Pcs">
                                    <span class="error"><b>
                                         @if($errors->has('price'))
                                                {{$errors->first('price')}}
                                            @endif</b></span>
                                </div>
                                <div class="form-group">
                                    <label for="stock">Stok*</label>
                                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Masukan Stok">
                                    <span class="error"><b>
                                         @if($errors->has('stock'))
                                                {{$errors->first('stock')}}
                                            @endif</b></span>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" name="btnCreate" class="btn btn-primary" >Simpan</button>
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
    <script src="{{asset('backend/plugins/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        $(function(){
            var $foo = $('#name');
            var $bar = $('#slug');
            function onChange() {
                $bar.val($foo.val().replace(/\s+/g, '-').toLowerCase());
            };
            $('#name')
                .change(onChange)
                .keyup(onChange);
        });
    </script>
@endsection