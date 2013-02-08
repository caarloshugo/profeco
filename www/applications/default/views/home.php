<div id="message">
	<form>
		<label>Categoria: </label>
		<select id="categories" name="categories">
			<?php foreach($categories as $cat) { ?>
				<option value="<?php echo $cat["id_categoria"]?>"><?php echo utf8_decode($cat["cat"]);?></option>
			<?php } ?>
		</select>
		
		<br/>
		
		<div id="section-products">
			
		</div>
		
		<div id="section-brands">
			
		</div>
	</form>
</div>
