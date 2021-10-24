<option value="" selected>--Select Product--</option>
@foreach($product as $m)
    <option value="{{$m->id}}"> {{$m->code}} {{$m->name}} | Karton: {{$m->quantity}} | Pack: {{$m->status}} | Pcs:{{$m->price}}</option>
@endforeach