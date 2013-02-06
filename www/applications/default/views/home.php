<div id="form">
	<form name="input" action="/get" method="post">
		<label>Selecciona una ciudad: </label>
		<select name="country">
			<?php foreach($countries as $country) { ?>
				<option value="<?php echo $country["estado"];?>"><?php echo utf8_decode($country["nestado"]);?></option>
			<?php } ?>
		</select>
	</form>
</div>
