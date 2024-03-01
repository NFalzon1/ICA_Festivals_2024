<?php get_header(); 

?>



<div class="background-image-container">
    <img src="<?php echo get_theme_mod('diwp_logo'); ?>" />

</div>

<div class="pageTitle">
    <h1>
        <?php the_title(); ?>
    </h1>
</div>

<div class="container">
    <div class="row prsRow">
        <div class="col">
            <main>
                <?php if (have_posts()):
                    while (have_posts()):
                        the_post(); ?>

                        <article>
                            <div class="textContent">
                                <?php the_content(); ?>
                            </div>
                        </article>
                        <?php
                    endwhile;
                endif;
                ?>

            </main>
        </div>
    </div>
</div>

<?php get_footer(); ?>