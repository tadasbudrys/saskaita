
<div align="center">
 Data: {$order->date_add|date_format:"%d-%m-%Y %H:%M"}
</div>
Pirkejas
<br>
Vardas: {$order->getCustomer()->firstname}
<br>
Pavarde: {$order->getCustomer()->lastname}
 <br>
Adresas: {$address.0.country}
{$address.0.city} 
{$address.0.address2}
<br>
Email: {$order->getCustomer()->email}
<br>		 
 <table>
 <tr style="background-color: {cycle values="#eeeeee,#d0d0d0"}"> <td>{"Preke"}</td><td>{"Kiekis vnt."}</td><td>{"Kaina"}</td></tr>
{foreach $order->getCartProducts() as $product}
<tr style="background-color: {cycle values="#eeeeee,#d0d0d0"}"> <td>{$product.product_name}</td><td>{$product.product_quantity}</td><td>{$product.product_price}</td><td></td></tr>
{/foreach}
</table>
<table>
<div align="right">
PVM:{$product.tax_rate}
<br>
Pristatymo kaina: {$order->total_shipping|string_format:"%.2f"}
<br>
Viso kaina: {$order->total_paid|string_format:"%.2f"}
</div>
</table>
<div align="left">
Pardavejas
<br>
{$shop_address}
<br>
email: {$shop_email}
</div>
