<?php
get_header();
?>

<div class="container">
    <div class="row prsRow">
        <div class="col">
            <main>
                <?php if (have_posts()):
                    while (have_posts()):
                        the_post(); ?>
                        <article>
                            <div class="pageTitle">
                                <h1>
                                    <?php the_title(); ?>
                                </h1>
                                <div class="authorSingle">
                                    <h6> Written by
                                        <?php the_author_meta('first_name'); ?>
                                        <?php the_author_meta('last_name'); ?>
                                    </h6>
                                </div>
                            </div>
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