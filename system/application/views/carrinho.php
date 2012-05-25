<div id='carrinho'>

<?php
/*
* Autor:Alex José
* Data:25.05.2012
* Desc: View do carrinho de compras
* Cap: 11
* Pag:145
* Observação: codigos comentados não tem ainda seus helpers
*/

echo heading('Seu carrinho de Compras',3);
echo form_open(base_url().'carrinho/atualizar');

?>

<table>
<thead>

	<tr>
		<th>Quantidade</th>
		<th>Descrição</th>
		<th>Preço</th>
		<th>SubTotal</th>		
	</tr>

</thead>

<tbody>
	
<?php 
	$i=1;
	foreach ($this->cart->contents() as $items):
		echo form_hidden($i.'[rowid]',$items['rowid']);
	
?>

<tr>
	<td>
		<?php 
			echo form_input(array('name'=>$i.'[qty]','value'=>$items['qty'],'maxlength'=>'3','size'=>'5'));
		?>
	</td>
	
	<td>
		<?php echo $items['name']; ?>
	</td>
	
	<td>
		<?php 
			//echo decimal_to_reaisbr($this->cart->format_number($items['prince']));
			echo 'R$ '.$this->cart->format_number($items['price']);
		?>
	</td>
	
	<td>
		<?php 
			//echo decimal_to_reaisbr($this->cart->format_number($items['subtotal']));
			echo $this->cart->format_number($items['subtotal']);
		?>
	</td>
	
</tr>

<?php 
	$i++;
	endforeach;
?>
<tr>
	<td colspan="2"> </td>	
	<td> <strong> Total</strong> </td>
	<td> 
		<?php 
		  //echo decimal_to_reaisbr($this->cart->format_number($this->cart->tota));
		  echo 'R$'.$this->cart->format_number($this->cart->total());
		?>
	 </td>
</tr>

</tbody>
</table>

<?php echo form_submit('atualizar','Atualizar Carrinho');?>

</div>