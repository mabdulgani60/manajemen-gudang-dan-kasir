
<table width="100%" class="table table-striped table-bordered table-hover" id="categorytable">
    <thead>
    <tr>
        <th>No.</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1 ?>
    @foreach($sales as $pc)
        <tr>
            <th> {{$i++}}</th>
            <td>{{$pc->name}} </td>
            <td> {{$pc->quantity}}</td>
            <td>{{$pc->price}} </td>
            <td>
                <form action="{{route('salescart.delete' ,[$pc->id,$pc->product_id])}}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field()}}
                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah kamu yakin akan menghapusnya?')" ><i class="fa fa-trash-o"></i></button>
                </form></td>
        </tr>
    @endforeach
    <tr>
        <td colspan="3">Total Keseluruhan</td>
        <td>
            <?php $total=0 ?>
                @if($sales)
                    @foreach($sales as $s)
                        @php
                        $price = $s->price;
                        $total += $price;
                        @endphp
                    @endforeach
                    {{$total}}
                @endif
        </td>
        <td></td>
    </tr>
    <tr>
            <td colspan="3">Total Uang yang Dibayarkan</td>
            <td>{{$money}}</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3">Kembalian</td>
            <td>
                <?php $total=0 ?>
                @if($sales)
                    @foreach($sales as $s)
                        @php
                        $price = $s->price;
                        $total += $price;
                        @endphp
                    @endforeach
                    {{$money - $total}}
                @endif
            </td>
            <td></td>
        </tr>
    </tbody>
</table>
