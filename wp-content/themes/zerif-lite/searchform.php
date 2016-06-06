<form role="search" method="get" id="searchform"
    class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div>
        <label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
        <input type="text" class="search-query" placeholder="Digite aqui sua busca" value="<?php echo get_search_query(); ?>" name="s" id="s" />
        <button type="submit" name="search-button" class="holder">
                <span class="magnifying-glass">
                    <i class="material-icons">search</i>
                    <svg height="38" width="38">
                        <circle cx="20" cy="20" fill="rgba(64, 64, 64, 0)" r="16" stroke="#404040" stroke-linecap="round" stroke-width="2"></circle>
                    </svg>
                </span>
        </button>
        <?php /*
        <input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
        */ ?>
    </div>
</form>
