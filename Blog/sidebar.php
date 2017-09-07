<?php
if ( is_active_sidebar( 'sidebar_blog' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar_blog' ); ?>
	</div><!-- #primary-sidebar -->
<?php endif; ?>

<!--
        <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Welcome to the SBeaty Code Development and Learning Blog! Right now this is a WIP - but come back soon and it should be finished!</p><br>
        </div>
        <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
                <?/*php wp_get_archives( 'type=monthly' ); ?>
            </ol><br>
            <h4>Categories</h4>
            <ol>
                <?php wp_get_categories(); ?>
            </ol><br>
        </div>   
-->

<!--
</*?php
if ( is_active_sidebar( 'sidebar_blog' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		</*?php dynamic_sidebar( 'sidebar_blog' ); ?>
        
	</div><!-- #primary-sidebar -->
<?php /*endif; ?>