<div class="my_meta_control">
	<p>
		<?php $mb->the_field('winner_year'); ?>
		<label for="<?php $metabox->the_name(); ?>">Ano o qual foi vencedora:</label>
		<input type="number" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	</p>
</div>