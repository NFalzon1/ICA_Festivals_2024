<div id="authorInfo">
<h3><?php the_author_meta('first_name'); ?> <?php the_author_meta('last_name'); ?></h3>

<p><?php the_author_meta('email') ?></p>

<p>
    <?php the_author_meta('description'); ?>
</p>

<p> <?php the_author_meta('first_name'); ?> has written a total of <?php the_author_posts(); ?> posts.
</p>
</div>