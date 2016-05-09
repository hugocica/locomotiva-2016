<div class="my_meta_control">
    <p>
        <?php $mb->the_field('slider'); ?>
        <label for="<?php $mb->the_name(); ?>">Selecione o slider</label>
        <select name="<?php $mb->the_name(); ?>">
            <?php
                global $wpdb;

                $results = $wpdb->get_results( "SELECT id, post_title FROM wp_posts WHERE post_type='ml-slider'" );

                if ( count($results) > 0 ) {
                    echo '<option value="">Selecione um slider</option>';
                    foreach ($results as $slider) { ?>
                        <option value="<?php echo $slider->id; ?>" <?php echo ( $mb->get_the_value() == $slider->id )?'selected="selected"':''; ?>><?php echo $slider->post_title; ?></option>
                    <?php
                    }
                }
            ?>
        </select>
    </p>
</div>
