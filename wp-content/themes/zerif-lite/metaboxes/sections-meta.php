<?php global $wpalchemy_media_access; ?>
<div class="my_meta_control">

	<?php while($mb->have_fields_and_multi('section')): ?>
	<?php $mb->the_group_open(); ?>

		<p class="col-md-6">
			<?php $mb->the_field('title_small'); ?>
			<label for="<?php $mb->the_name(); ?>">Título <span style="font-size: 14px; font-style: italic;">Texto menor (cinza claro)</span></label>
			<input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		</p>

        <p class="col-md-6">
			<?php $mb->the_field('title_big'); ?>
			<label for="<?php $mb->the_name(); ?>">Título <span style="font-size: 14px; font-style: italic;">Texto maior (cinza escuro)</span></label>
			<input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
        </p>

		<p>
			<?php $metabox->the_field('content'); ?>
			<label for="<?php $metabox->the_name(); ?>">Conteúdo da Seçã</label>
			<div class="customEditor">
				<textarea rows="10" cols="50" name="<?php $mb->the_name(); ?>" id="<?php $mb->the_name(); ?>"><?php $mb->the_value(); ?></textarea>
			</div>
		</p>

		<a href="#" class="dodelete button">Apagar seção</a>
		</p>

	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>

	<p style="margin-bottom:15px; padding-top:5px;">
		<a href="#" class="docopy-section button">Adicionar seção</a>
		<a style="float:right; margin:0 10px;" href="#" class="dodelete-section button">Remover Todos</a>
	</p>

</div>

<style>
	.col-md-6 {
		float: left;
		width: 50%;
	}
</style>
