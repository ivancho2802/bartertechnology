<?php
/**
 * Search form
 *
 * @package Silvera
 */?>

<div class="search-container">
    <form action="<?php echo esc_url(home_url())?>" class="search-form"  method="get" role="search">
        <div class="container">
            <input type="search" placeholder="<?php echo esc_attr__( 'Search for...', 'sagablog-light' );?>" class="search-field" name="s" value="<?php echo get_search_query();?>">
            <button type="submit" class="search-submit">
              <i class="fa fa-search"></i>  
            </button>
        </div>
    </form>
</div>