<?php global $wpalchemy_media_access; ?>
<div class="my_meta_control">
	<h4 for="<?php $mb->the_name(); ?>" style="display: inline-block;vertical-align: middle;color: #000;margin-top: 12px;">Mostrar membros?</h4>
	<?php $mb->the_field('show'); ?>
	<input type="checkbox" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>"  style="display: inline-block;vertical-align: middle;" value="Sim" <?php echo ($mb->get_the_value() == 'Sim')?'checked="checked"':''; ?>>

	<hr>
	<h4 style="color: #000;">LocomoDivos</h4>

	<?php while($mb->have_fields_and_multi('locodivos')): ?>
	<?php $mb->the_group_open(); ?>

		<?php $mb->the_field('nome'); ?>
		<label for="<?php $mb->the_name(); ?>">Nome</label>
		<p><input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>

		<?php $mb->the_field('cargo'); ?>
		<label for="<?php $mb->the_name(); ?>">Cargo</label>
		<p><input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>

		<span style="font-size: 14px; font-style: italic;"><strong>Recomendação:</strong> Para melhor efeito, as duas fotos precisam ter o mesmo tamanho.</span>
		<div class="col-md-6">
			<?php $mb->the_field('photo'); ?>
			<label for="<?php $mb->the_name(); ?>">Foto 1</label>
			<?php $wpalchemy_media_access->setGroupName('img-n'. $mb->get_the_index())->setInsertButtonLabel('Inserir'); ?>
			<p>
			<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
			<?php echo $wpalchemy_media_access->getButton(); ?>
			</p>
		</div>

		<div class="col-md-6">
			<?php $mb->the_field('photo_hover'); ?>
			<label for="<?php $mb->the_name(); ?>">Foto 2</label>
			<?php $wpalchemy_media_access->setGroupName('img-hover-n'. $mb->get_the_index())->setInsertButtonLabel('Inserir'); ?>
			<p>
			<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
			<?php echo $wpalchemy_media_access->getButton(); ?>
			</p>
		</div>

		<a href="#" class="dodelete button">Apagar membro</a>
		</p>

	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>

	<p style="margin-bottom:15px; padding-top:5px;">
		<a href="#" class="docopy-locodivos button">Adicionar membro</a>
		<a style="float:right; margin:0 10px;" href="#" class="dodelete-locodivos button">Remover Todos</a>
	</p>

</div>

<style>
	.col-md-6 {
		float: left;
		width: 50%;
	}
</style>
