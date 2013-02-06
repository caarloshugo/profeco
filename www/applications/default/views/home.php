<div id="form">
	<form name="input" action="/get" method="post">
		<label>Selecciona una ciudad: </label>
		<select name="country">
			<?php foreach($cities as $city) { ?>
				<option value="<?php echo $city["estado"];?>"><?php echo utf8_decode($city["nestado"]);?></option>
			<?php } ?>
		</select>
	</form>
</div>
