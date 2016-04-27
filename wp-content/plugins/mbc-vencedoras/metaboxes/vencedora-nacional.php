<div class="my_meta_control">
	<p>
		<?php $mb->the_field('is_nacional'); ?>
		<label for="<?php $metabox->the_name(); ?>">Vencedora nacional?</label>
		<input type="checkbox" name="<?php $mb->the_name(); ?>" value="Sim" <?php echo ($mb->get_the_value() == 'Sim')?'checked=checked':''; ?>/> Sim
	</p>
</div>