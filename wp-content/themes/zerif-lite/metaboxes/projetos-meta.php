<?php global $wpalchemy_media_access; ?>
<div class="my_meta_control">
	<h4 for="<?php $mb->the_name(); ?>" style="display: inline-block;vertical-align: middle;color: #000;margin-top: 12px;">Listar projetos?</h4>
	<?php $mb->the_field('show'); ?>
	<input type="checkbox" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>"  style="display: inline-block;vertical-align: middle;" value="Sim" <?php echo ($mb->get_the_value() == 'Sim')?'checked="checked"':''; ?>>

	<hr>
	<h4 style="color: #000;">Projetos</h4>

	<?php while($mb->have_fields_and_multi('projetos')): ?>
	<?php $mb->the_group_open(); ?>

		<?php $mb->the_field('titulo'); ?>
		<label for="<?php $mb->the_name(); ?>">Título do projeto</label>
		<p><input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>

		<?php $mb->the_field('descricao'); ?>
		<label for="<?php $mb->the_name(); ?>">Descrição do projeto</label>
		<p><input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>

		<?php $mb->the_field('link'); ?>
		<label for="<?php $mb->the_name(); ?>">Link do projeto <span style="font-size: 14px; font-style: italic;">(Opcional)</span></label>
		<p><input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>

		<div class="col-md-12">
			<?php $mb->the_field('photo'); ?>
			<label for="<?php $mb->the_name(); ?>">Foto do projeto</label>
			<?php $wpalchemy_media_access->setGroupName('img-n'. $mb->get_the_index())->setInsertButtonLabel('Inserir'); ?>
			<p>
			<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
			<?php echo $wpalchemy_media_access->getButton(); ?>
			</p>
		</div>

		<a href="#" class="dodelete button">Apagar projeto</a>
		</p>

	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>

	<p style="margin-bottom:15px; padding-top:5px;">
		<a href="#" class="docopy-projetos button">Adicionar projeto</a>
		<a style="float:right; margin:0 10px;" href="#" class="dodelete-projetos button">Remover Todos</a>
	</p>

</div>

<style>
	.col-md-6 {
		float: left;
		width: 50%;
	}
</style>
