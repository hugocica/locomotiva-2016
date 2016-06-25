<?php global $wpalchemy_media_access; ?>
<div class="my_meta_control">
    <?php $mb->the_field('show_services'); ?>
	<h4 for="<?php $mb->the_name(); ?>" style="display: inline-block;vertical-align: middle;color: #000;margin-top: 12px;">Mostrar serviços?</h4>
	<input type="checkbox" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>"  style="display: inline-block;vertical-align: middle;" value="Sim" <?php echo ($mb->get_the_value() == 'Sim')?'checked="checked"':''; ?>>

	<hr>
	<h4 style="color: #000;">Lista de serviços</h4>

	<?php while($mb->have_fields_and_multi('services')): ?>
	<?php $mb->the_group_open(); ?>

		<div>
			<?php $mb->the_field('service_pic'); ?>
			<label for="<?php $mb->the_name(); ?>">Imagem</label>
			<?php $wpalchemy_media_access->setGroupName('img-n'. $mb->get_the_index())->setInsertButtonLabel('Inserir'); ?>
			<p>
			<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
			<?php echo $wpalchemy_media_access->getButton(); ?>
			</p>
		</div>

        <?php $mb->the_field('description'); ?>
		<label for="<?php $mb->the_name(); ?>">Descrição</label>
		<p><input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>

		<a href="#" class="dodelete button">Apagar serviço</a>
		</p>

	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>

	<p style="margin-bottom:15px; padding-top:5px;">
		<a href="#" class="docopy-services button">Adicionar serviço</a>
		<a style="float:right; margin:0 10px;" href="#" class="dodelete-services button">Remover Todos</a>
	</p>

</div>

<style>
	.col-md-6 {
		float: left;
		width: 50%;
	}
</style>
