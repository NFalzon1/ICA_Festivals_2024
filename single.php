<?php
get_header();
?>

<div class="container">
    <div class="row">

        
        <div class="col">
            <main>
                <?php if (have_posts()):
                    while (have_posts()):
                        the_post(); ?>
                        
                        <?php
                    endwhile;
                endif;
                ?>
            </main>
        </div>
    </div>
</div>

<?php get_footer(); ?>