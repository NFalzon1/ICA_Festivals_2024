<?php get_header(); ?>


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


                            <div class="text-align">
                                <?php the_content(); ?>
                            </div>

                        </article>



                        <?php
                    endwhile;
                endif;
                ?>

            </main>
        </div>
        

        <?php

        ?>
    </div>
</div>

<?php get_footer(); ?>