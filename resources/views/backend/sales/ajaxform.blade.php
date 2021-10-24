<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-2">
    
    </div>
    <div class="col-md-2">
        <form action="{{route('save.sales')}}" method="post">
            {{csrf_field()}}
            @php($i = 0)
            @foreach($salescart as $sc)
                <input type="hidden" name="product_id[{{$i}}]" value="{{$sc->product_id}}">
                <input type="hidden" name="quantity[{{$i}}]" value="{{$sc->quantity}}">
                <input type="hidden" name="price[{{$i}}]" value="{{$sc->price}}">
                <input type="hidden" name="sales_status[{{$i}}]" value="{{$sc->sales_status}}">
                @php($i++)
            @endforeach
            <input type="hidden" name="total_product" value="{{$i}}">
            <button type="submit"  class="btn btn-info" target="_blank" onclick="printorder(); resetMoney(); return confirm('Yakin kosongkan keranjang?')"> Kosongkan Keranjang Penjualan </button>
        </form>
        
    </div>
</div>