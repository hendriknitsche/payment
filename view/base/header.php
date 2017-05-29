<div class="masthead clearfix">
	<div class="inner">
		<h3 class="masthead-brand">Payment Testapp</h3>
		<nav>
			<ul class="nav masthead-nav">
				<li<?=(!isset($order_type) ? ' class="active"' : '')?>><a href="http://<?=$_SERVER['SERVER_NAME']?>">Home</a></li>
				<li<?=(isset($order_type) && $order_type=='nachsendeauftrag' ? ' class="active"' : '')?>><a href="?order_type=nachsendeauftrag">Nachsendeauftrag</a></li>
				<li<?=(isset($order_type) && $order_type=='lagerauftrag' ? ' class="active"' : '')?>><a href="?order_type=lagerauftrag">Lagerauftrag</a></li>
			</ul>
		</nav>
	</div>
</div>
<div class="inner cover">