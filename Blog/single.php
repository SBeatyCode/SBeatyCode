<?php 
/*
*Single Post Template
*/
?>
<?php get_header(); ?>

    <div class="container pull-left home_button_container">
        <nav>
            <a href="http://sbeatycode.com/blog/wordpress"><input type="button" class="btn-primary blog_home_button" value="Blog Home"></a>
        </nav>
    </div> <!-- /container-->
    <br>
    
    <!------- BLOG POSTS -------->
  <body>
    <div class="container-fluid" id="blog_container">
      <div class="row">
        <div class="col-sm-8 blog-main">
            
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
          <div class="blog-post">
            <h2 class="blog-post-title">
                <?php the_title(); ?>                 
            </h2>
            <p class="blog-post-meta">
                <em>
                    <?php echo get_the_date('F, j, Y'); ?> 
                    by <?php the_author(); ?>
                </em><br>
                <?php  the_category(', '); ?>
            </p><!-- /blog post meta-->

                <?php the_content(); ?>
              
          </div><!-- /blog-post -->
            
            <?php endwhile; else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
        
        <br><br>

        </div><!-- /blog-main -->

          
    <!------- SIDEBAR -------->
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar" id="blog_sidebar">
            <?php get_sidebar(); ?>
        </div><!-- /blog-sidebar -->
          
      </div><!-- /row -->
    </div><!-- /container-fluid -->
      
<?php get_footer(); ?>
 