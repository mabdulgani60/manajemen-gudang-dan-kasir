<!doctype html>
<html><head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head><body>
<h3><strong>TOKO DIDIK PLASTIK</strong></h3>
<p>Jl. </p>
<p>Surabaya</p>
<p>Jawa Timur</p>
<p>Telp : </p>
<hr>
<p align="right">
{{$historyID->history_id}}
</p>
<hr>
<table border="0" align="center">
    <thead>
    <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Harga</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1 ?>
    @foreach($report as $all)
    <tr>
        <td align="center">{{$i++}}</td>
        <td align="center">{{$all->name}}</td>
        <td align="center">{{$all->quantity}}</td>
        <td align="center">Rp. {{$all->price}}</td>
    </tr>
    @endforeach
    <tr>
        <td colspan="3"><strong> Total Keseluruhan </strong></td>
        <td>
            <?php $total=0 ?>
            @if($report)
                @foreach($report as $s)
                    @php
                        $price = $s->price;
                        $total += $price;
                    @endphp
                @endforeach
                <strong>Rp. {{$total}}</strong>
            @endif
        </td>
    </tr>
    <tr>
            <td colspan="3"><b>Total Uang yang Dibayarkan</b></td>
            <td><b>{{$money}}</b></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3"><b>Kembalian</b></td>
            <td>
                <?php $total=0 ?>
                @if($report)
                    @foreach($report as $s)
                        @php
                        $price = $s->price;
                        $total += $price;
                        @endphp
                    @endforeach
                    <b>{{$money - $total}}</b>
                @endif
            </td>
            <td></td>
        </tr>
    </tbody>
</table>
<hr>
<p align="center">TERIMAKASIH. SELAMAT BELANJA KEMBALI.</p>
</body></html>


