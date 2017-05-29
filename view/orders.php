<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>Customer</th>
				<th>Deposit</th>
			</tr>
		</thead>
		<tbody>
<?
if(count($overpayed)) foreach($overpayed as $x){
?>
			<tr>
				<td><?=$x['compound_name']?></td>
				<td class="green"><?=number_format($x['sum']/100, 2, ',', '.')?></td>
			</tr>
<?
}
if(count($balanced)) foreach($balanced as $x){
?>
			<tr>
				<td><?=$x['compound_name']?></td>
				<td><?=number_format($x['sum']/100, 2, ',', '.')?></td>
			</tr>
<?
}
if(count($underpayed)) foreach($underpayed as $x){
?>
			<tr>
				<td><?=$x['compound_name']?></td>
				<td class="red"><?=number_format($x['sum']/100, 2, ',', '.')?></td>
			</tr>   
<?
}
?>
		</tbody>
	</table>
</div>
