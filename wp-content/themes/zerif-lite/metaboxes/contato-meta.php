<div class="my_meta_control">
    <p>
        <?php $mb->the_field('show_mapa'); ?>
        <label for="<?php $mb->the_name(); ?>" style="display: inline-block;vertical-align: middle;margin-bottom: 12px;">Mostrar mapa?</label>
    	<input type="checkbox" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>"  style="display: inline-block;vertical-align: middle;" value="Sim" <?php echo ($mb->get_the_value() == 'Sim')?'checked="checked"':''; ?>>
    </p>

    <p>
        <?php $mb->the_field('google_maps'); ?>
        <label for="<?php $mb->the_name(); ?>" style="display: inline-block;vertical-align: middle;margin-bottom: 12px;">Latitude e Longitude</label>
    	<input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>"  value="<?php $mb->the_value(); ?>">
    </p>

    <p>
        <?php $mb->the_field('show_form'); ?>
        <label for="<?php $mb->the_name(); ?>" style="display: inline-block;vertical-align: middle;margin-bottom: 12px;">Mostrar formulário?</label>
    	<input type="checkbox" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>"  style="display: inline-block;vertical-align: middle;" value="Sim" <?php echo ($mb->get_the_value() == 'Sim')?'checked="checked"':''; ?>>
    </p>

    <p>
        <?php $mb->the_field('contato_form'); ?>
        <label for="<?php $mb->the_name(); ?>" style="display: inline-block;vertical-align: middle;margin-bottom: 12px;">Selecione o formulário</label>
        <select name="<?php $mb->the_name(); ?>">
            <?php
                global $wpdb;

                $results = $wpdb->get_results( "SELECT id, name FROM wp_frm_forms" );
                
                if ( count($results) > 0 ) {
                    echo '<option value="">Selecione um formulário</option>';
                    foreach ($results as $form) { ?>
                        <option value="<?php echo $form->id; ?>" <?php echo ( $mb->get_the_value() == $form->id )?'selected="selected"':''; ?>><?php echo $form->name; ?></option>
                    <?php
                    }
                }
            ?>
        </select>
    </p>

    <hr>
    <h4 style="display: inline-block;vertical-align: middle;color: #000;margin-top: 12px;">Informações de Contato</h4>
    <p>
        <?php $mb->the_field('contato_endereco'); ?>
        <label for="<?php $mb->the_name(); ?>" style="display: inline-block;vertical-align: middle;margin-bottom: 12px;">Endereço</label>
    	<input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>"  value="<?php $mb->the_value(); ?>">
    </p>
    <p>
    	<?php $mb->the_field('contato_telefone'); ?>
        <label for="<?php $mb->the_name(); ?>" style="display: inline-block;vertical-align: middle;margin-bottom: 12px;">Telefone</label>
    	<input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>"  value="<?php $mb->the_value(); ?>">
    </p>
    <p>
        <?php $mb->the_field('contato_email'); ?>
        <label for="<?php $mb->the_name(); ?>" style="display: inline-block;vertical-align: middle;margin-bottom: 12px;">E-mail</label>
    	<input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>"  value="<?php $mb->the_value(); ?>">
    </p>
    <p>
        <?php $mb->the_field('contato_horario'); ?>
        <label for="<?php $mb->the_name(); ?>" style="display: inline-block;vertical-align: middle;margin-bottom: 12px;">Horário de Funcionamento</label>
    	<input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>"  value="<?php $mb->the_value(); ?>">
    </p>
</div>

<style>
	.col-md-6 {
		float: left;
		width: 50%;
	}
</style>
