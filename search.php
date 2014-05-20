<?php get_header(); ?>
<!-- MAIN CONTENT WRAPPER -->
<section id="entries wrap" class="small-12 medium-8  large-6 xlarge-7  xxlarge-7 columns ">

    <?php if ( have_posts() ) : ?>
     <h2>Here are the results for the '<?php echo get_search_query(); ?>' search:</h2>
     <?php global $wp_query;
     $searchcount = $wp_query->found_posts;
     ?>
         <?php if ($searchcount > 1 ): ?>
             <p> <?php
echo 'By the way, we found ' . $wp_query->found_posts.' results.'; ?></p>
         <?php elseif ($searchcount == 1): ?>
            <p>By the way, we only 1 result.</p>
         <?php endif ?>
         <div id="main_wrapper" class="js-masonry "
         data-masonry-options='{
         "itemSelector": ".post" }' >
    <?php while ( have_posts() ) : the_post() ?>
    <!-- this is our loop -->

    <?php get_template_part( 'content', 'searchsuccess' ); ?>
    <?php endwhile; ?>
</div>
    <?php else : ?>
    <?php get_template_part( 'content', 'searchfail' ); ?>
    <!-- here's where we'll put a search form if there're no posts -->
    <?php endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>