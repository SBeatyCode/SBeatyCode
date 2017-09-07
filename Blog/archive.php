<?php 
/*
*The Template for displaying archive pages
*/
?>

<?php get_header(); ?>
    <div class="container">
        <nav>
            <a href="http://sbeatycode.com/blog/wordpress"><input type="button" class="btn-primary blog_home_button" value="Blog Home"></a>
        </nav>
    </div> <!-- /container-->
    <br>
    
    <!-- Blog Section -->
    <div class="container">

      <div class="row">

        <div class="col-sm-12 col-md-8 blog-main">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
          <div class="blog-post">
            <h2 class="blog-post-title"> 
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_title(); ?> 
                </a>   
            </h2>
            <p class="blog-post-meta">
                <?php echo get_the_date('F, j, Y'); ?> - <a href="#"> <?php the_author(); ?></a><br>
              
                <i class="fa fa-tag"></i>
                <?php the_tags(); ?><br>

                <i class="fa fa-folder-open"></i>
                <?php _e('Category: '); ?>
                <?php  the_category(', '); ?>
            </p>
            <?php the_excerpt(); ?>
            
           </div> <!-- /blog post -->
           <?php endwhile; else : ?>
            
           <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
           <?php endif; ?>
        
            
        <nav>
            <ul class="pager">
              <li><?php next_posts_link('Older Posts'); ?></li>
              <li><?php previous_posts_link('Newer Posts'); ?></li>
            </ul>
        </nav>
        <br><br>

        </div><!-- /.blog-main -->

        <!-- Sidebar Section -->
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar" id="blog_sidebar">
            <?php get_sidebar(); ?>
        </div><!-- /blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->
<?php get_footer(); ?>