<?php get_header(); ?>

    <!------- BLOG POSTS -------->
  <body>
    <div class="container-fluid" id="blog_container">

      <div class="blog-header">
        <h1 class="blog-title section_header"><?php echo get_bloginfo( 'name' ); ?></h1>
        <p class="lead blog-description section_header"><?php echo get_bloginfo( 'description' ); ?></p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
            
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
          <div class="blog-post">
            <h2 class="blog-post-title">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_title(); ?> 
                </a>  
            </h2>
            <p class="blog-post-meta">
                <em>
                    <?php echo get_the_date('F, j, Y'); ?> 
                    by <?php the_author(); ?>
                </em><br>
                <?php  the_category(', '); ?>
            </p>

                <?php the_excerpt(); ?>
              
            <a href="<?php echo get_permalink(); ?>">
                <?php _e('Read more... '); ?>
            </a>
              
          </div><!-- /blog-post -->
            
            <?php endwhile; else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
        <br>
            
        <!-- Pager-->
        <nav>
            <ul class="pager">
              <li><?php next_posts_link('Older Posts'); ?></li>
              <li><?php previous_posts_link('Newer Posts'); ?></li>
            </ul>
        </nav>

        <br><br>

        </div><!-- /blog-main -->
          
    <!------- SIDEBAR -------->
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar" id="blog_sidebar">
            <?php get_sidebar(); ?>
        </div><!-- /blog-sidebar -->
          
      </div><!-- /row -->
    </div><!-- /container-fluid -->
      
<?php get_footer(); ?>
 