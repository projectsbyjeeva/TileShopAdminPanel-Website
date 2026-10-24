<h2>QUOTATION</h2>

<p><b>Quotation No:</b> {{ $main->quotation_id }}</p>
<p><b>Customer:</b> {{ $main->customer_name }}</p>

<hr>

<table width="100%" border="1" cellspacing="0">
<tr>
  <th>Tile</th>
  <th>Size</th>
  <th>Box</th>
  <th>Rate</th>
  <th>Amount</th>
</tr>

@foreach($items as $item)
<tr>
  <td>{{ $item->tile_categ }}</td>
  <td>{{ $item->tile_size }}</td>
  <td>{{ $item->total_box }}</td>
  <td>{{ $item->rate }}</td>
  <td>{{ $item->amount }}</td>
</tr>
@endforeach
</table>

<h3>Total: ₹{{ $main->total_amount }}</h3>