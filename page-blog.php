<?php
    get_header();
?>

<main id="blog-page">
    <section class="page-title__section">
        <div class="grid-container no-padding-bottom">
            <h2 class="page-title">
                <?php the_title(); ?>
            </h2>
        </div>
    </section>
    <section>
        <div class="grid-container">
                <ul class="grid-x grid-padding-x no-bullet">
                    <?php
                    // check if blog posts, loop through all of them and grab data of each post
                    $all_posts = new WP_QUERY(
                        array(
                            'post_type' => 'post'
                            , 'post_status' => 'publish'
                            , 'posts_per_page' => -1
                            )
                        );
                        
                    if($all_posts -> have_posts()) :
                        
                        // start the loop
                        while($all_posts -> have_posts()) :
                            $all_posts -> the_post();
                            $post_id = get_the_ID();
                            $category_object = get_the_category($post_id);
                            $category_name = $category_object[0] -> name;
                            ?>
                    <li class="cell large-6">
                        <a href="<?php echo the_permalink(); ?> ">
                            <?php the_post_thumbnail(); ?>
                            <h5>
                                <?php echo $category_name; ?>
                            </h5>
                            <h4>
                                <?php the_title(); ?>
                            </h4>
                            <a href="<?php echo the_permalink(); ?> ">
                                Read More
                            </a>
                        </a>
                    </li>
                <?php
                    endwhile;
                    // end the loop
                    
                    else :
                        ?>
                    <p>
                        <?php _e( 'Sorry, no posts matched your criteria.' ); ?>
                    </p>
                    <?php       
                endif;
                ?>
            </ul>
        </div>
    </section>
</main>

<?php
    get_footer();
?>