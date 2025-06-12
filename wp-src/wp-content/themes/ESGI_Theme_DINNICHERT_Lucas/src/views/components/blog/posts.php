<?php
// components/blog/posts.php
?>
<div class="blog-posts">
    <div class="row g-5">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="col-md-6">
                <div class="card border-0">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php the_post_thumbnail_url('medium_large'); ?>" class="card-img-top mb-3" alt="<?php the_title(); ?>">
                        </a>
                    <?php endif; ?>

                    <div class="card-body px-0">
                        <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                            <h5 class="card-title fw-bold text-start"><?php the_title(); ?></h5>
                        </a>
                        <p class="card-text text-start">
                            <?php the_excerpt(); ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endwhile; else : ?>
            <p class="text-muted">No posts found.</p>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <div class="mt-5">
        <?php
        the_posts_pagination([
            'mid_size' => 2,
            'prev_text' => __('<'),
            'next_text' => __('>'),
            'screen_reader_text' => ' '
        ]);
        ?>
    </div>
</div>