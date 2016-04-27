 <div class="my_meta_control">
 	<p>
		<?php $mb->the_field('razao_social'); ?>
		<label for="<?php $metabox->the_name(); ?>">Razão social da empresa:</label> <br>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	</p>
	<p>
		<?php $mb->the_field('cnpj'); ?>
		<label for="<?php $metabox->the_name(); ?>">CNPJ da empresa:</label> <br>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	</p>
	<p>
		<?php $mb->the_field('website'); ?>
		<label for="<?php $metabox->the_name(); ?>">Website da empresa:</label> <br>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	</p>
	<p>
		<?php $mb->the_field('endereco'); ?>
		<label for="<?php $metabox->the_name(); ?>">Endereço da empresa:</label> <br>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	</p>
	<p>
		<?php $mb->the_field('cidade'); ?>
		<label for="<?php $metabox->the_name(); ?>">Cidade da empresa:</label> <br>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	</p>
	<p>
		<?php $mb->the_field('estado'); ?>
		<label for="<?php $metabox->the_name(); ?>">Estado da empresa:</label>
		<select name="<?php $mb->the_name(); ?>">
			<option value="" <?php echo ($mb->get_the_value() == '')?' selected="selected"':''; ?>>Selecione...</option>
			<option value="AC" <?php echo ($mb->get_the_value() == 'AC')?' selected="selected"':''; ?>>AC</option>
			<option value="AL" <?php echo ($mb->get_the_value() == 'AL')?' selected="selected"':''; ?>>AL</option>
			<option value="AP" <?php echo ($mb->get_the_value() == 'AP')?' selected="selected"':''; ?>>AP</option>
			<option value="AM" <?php echo ($mb->get_the_value() == 'AM')?' selected="selected"':''; ?>>AM</option>
			<option value="BA" <?php echo ($mb->get_the_value() == 'BA')?' selected="selected"':''; ?>>BA</option>
			<option value="CE" <?php echo ($mb->get_the_value() == 'CE')?' selected="selected"':''; ?>>CE</option>
			<option value="DF" <?php echo ($mb->get_the_value() == 'DF')?' selected="selected"':''; ?>>DF</option>
			<option value="ES" <?php echo ($mb->get_the_value() == 'ES')?' selected="selected"':''; ?>>ES</option>
			<option value="GO" <?php echo ($mb->get_the_value() == 'GO')?' selected="selected"':''; ?>>GO</option>
			<option value="MA" <?php echo ($mb->get_the_value() == 'MA')?' selected="selected"':''; ?>>MA</option>
			<option value="MT" <?php echo ($mb->get_the_value() == 'MT')?' selected="selected"':''; ?>>MT</option>
			<option value="MS" <?php echo ($mb->get_the_value() == 'MG')?' selected="selected"':''; ?>>MS</option>
			<option value="MG" <?php echo ($mb->get_the_value() == 'MG')?' selected="selected"':''; ?>>MG</option>
			<option value="PA" <?php echo ($mb->get_the_value() == 'PA')?' selected="selected"':''; ?>>PA</option>
			<option value="PB" <?php echo ($mb->get_the_value() == 'PB')?' selected="selected"':''; ?>>PB</option>
			<option value="PR" <?php echo ($mb->get_the_value() == 'PR')?' selected="selected"':''; ?>>PR</option>
			<option value="PE" <?php echo ($mb->get_the_value() == 'PE')?' selected="selected"':''; ?>>PE</option>
			<option value="PI" <?php echo ($mb->get_the_value() == 'PI')?' selected="selected"':''; ?>>PI</option>
			<option value="RJ" <?php echo ($mb->get_the_value() == 'RJ')?' selected="selected"':''; ?>>RJ</option>
			<option value="RN" <?php echo ($mb->get_the_value() == 'RN')?' selected="selected"':''; ?>>RN</option>
			<option value="RS" <?php echo ($mb->get_the_value() == 'RS')?' selected="selected"':''; ?>>RS</option>
			<option value="RO" <?php echo ($mb->get_the_value() == 'RO')?' selected="selected"':''; ?>>RO</option>
			<option value="RR" <?php echo ($mb->get_the_value() == 'RR')?' selected="selected"':''; ?>>RR</option>
			<option value="SC" <?php echo ($mb->get_the_value() == 'SC')?' selected="selected"':''; ?>>SC</option>
			<option value="SP" <?php echo ($mb->get_the_value() == 'SP')?' selected="selected"':''; ?>>SP</option>
			<option value="SE" <?php echo ($mb->get_the_value() == 'SE')?' selected="selected"':''; ?>>SE</option>
			<option value="TO" <?php echo ($mb->get_the_value() == 'TO')?' selected="selected"':''; ?>>TO</option>
		</select>
	</p>
	<!-- <p class="meta-save"><button type="submit" class="button-primary" name="save"><?php _e('Update');?></button></p> -->
</div> 

<style>
	.my_meta_control label, .my_meta_control input, .my_meta_control select {
		display: inline-block;
		vertical-align: middle;
		margin-top: 6px;
		margin-bottom: 6px;
	}
</style>