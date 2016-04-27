<?php
	$thumbsize = isset($thumbsize)? $thumbsize : 'thumbnails-post';
  	$post_category = "";
  	$categories = get_the_category();
  	$separator = ' | ';
  	$output = '';
	if($categories)	{
		foreach($categories as $category) {
			$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", TEXTDOMAIN ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
		}
		$post_category = trim($output, $separator);
	}      

	$vencedoras_meta = get_post_meta( get_the_id(), '_vencedoras_config_metabox', TRUE );
	$nacional_meta = get_post_meta( get_the_id(), '_vencedoras_nacional_metabox', TRUE );
	$ciclo_meta = get_post_meta( get_the_id(), '_vencedoras_ciclo_metabox', TRUE );
	
?>
<article class="post vencedoras-item col-md-12 col-sm-12">
					    
    <div class="entry-content vencedoras-content col-md-5 col-sm-5 vcenter">
    	<div class="vencedora-height-support"></div>
        <?php
        	if ($nacional_meta['is_nacional'] == 'Sim') {
        		if ( has_post_thumbnail() ) {
        		?>
		            <figure class="entry-thumb thumb-vencedoras">
	                    <?php the_post_thumbnail( $thumbsize );?>
		                <!-- vote    -->
		                <?php do_action('wpo_rating') ?>
		                 <div class="category-highlight hidden">
		                    <?php echo trim($post_category); ?>
		                </div>
		            </figure>
		        <?php }
        	}
            if (get_the_title()) {
            ?>
            	<div class="vencedora-content-meta <?php echo ($nacional_meta['is_nacional'] == 'Sim')?'has_logo':''; ?>">
	                <h2 class="entry-title vencedoras-title">
	                    <?php the_title(); ?>
	                </h2>
	                <p class="vencedora-category">
	                <?php 
	                	$categories = get_the_terms(get_the_id(), 'vencedoras_cat');
	                	$cat_count = 0;
	                	if (!empty($categories)) {
	                		foreach ($categories as $cat) {
		                		if ($cat_count != 0)
		                			echo '<span class="separator">&#8226;</span>';

		                		$category = $cat->name;
		                		echo $cat->name;
		                		$cat_count++;
		                	}
	                	}
	                ?>
	                </p>
                </div>
            <?php
        }
        ?>
    </div>
    <?php 
    	$vencedora_meta = get_post_meta(get_the_id(), '_vencedoras_config_metabox', true); 
    ?>
    <div class="vencedora-local col-md-4 col-sm-4 vcenter">
    	<div class="vencedora-height-support"></div>
    	<div class="vencedora-local-content">
    		<?php echo $vencedora_meta['cidade']; ?>
	    	<span>(<?php echo $vencedora_meta['estado']; ?>)</span>
    	</div>
    </div>
    
    <div class="vencedora-premio-container col-md-3 col-sm-3 vcenter">
    	<?php 
    		if ($nacional_meta['is_nacional'] == 'Sim') { ?>
    			<div class="vencedora-premio mb-15">
    				<div class="vencedora-premio-img">
    					<img src="<?php echo get_template_directory_uri(); ?>/images/bandeiras/nacional.png" alt="mpe brasil vencedora nacional icone">
    				</div>
    				<div class="vencedora-premio-meta">Vencedora nacional <span>(<?php echo $ciclo_meta['winner_year']; ?>)</span></div>
    			</div>
    		<?php } else {
    			echo '<div class="vencedora-height-support"></div>';
    		}
    	?>
    	<div class="vencedora-premio">
			<div class="vencedora-premio-img">
				<img src="<?php echo get_template_directory_uri(); ?>/images/bandeiras/bandeira-<?php echo $vencedora_meta['estado']; ?>.png" alt="mpe brasil vencedora estadual <?php echo $vencedora_meta['estado']; ?>">
			</div>
			<div class="vencedora-premio-meta">Vencedora estadual <span>(<?php echo $ciclo_meta['winner_year']; ?>)</span></div>
		</div>
    </div>
    
    <div class="vencedora-mostrar-info col-md-12 col-sm-12 closed"><i class="fa fa-caret-down"></i></div>
    
    <div class="vencedora-info-container col-md-12 col-sm-12 padding-left-0 padding-right-0 closed">
    	<div class="vencedora-details col-md-8 col-sm-8">
    		<p><strong>Razão Social: </strong><?php echo $vencedora_meta['razao_social']; ?></p>
	    	<p><strong>CNPJ: </strong><?php echo $vencedora_meta['cnpj']; ?></p>
	    	<p><strong>Website: </strong><?php echo $vencedora_meta['website']; ?></p>
    	</div>
    	<div class="premio-details col-md-4 col-sm-4">
    		<p><strong>Prêmios MPE Brasil:</strong></p>
    		<ul>
    		<?php if ($nacional_meta['is_nacional'] == 'Sim') { ?>
				<li><?php echo $ciclo_meta['winner_year']; ?>: Etapa Nacional - <?php echo $category; ?></li>
    		<?php } ?>
    			<li><?php echo $ciclo_meta['winner_year']; ?>: Etapa Estadual (<?php echo $vencedora_meta['estado']; ?>) - <?php echo $category; ?></li>
    		</ul>
    	</div>
    </div>
</article>