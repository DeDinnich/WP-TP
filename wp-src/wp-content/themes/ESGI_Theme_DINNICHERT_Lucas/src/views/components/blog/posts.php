<?php
// components/blog/posts.php
$args = [
    'post_type' => 'post',
    'posts_per_page' => 6, // ou -1 pour tous
    'paged' => get_query_var('paged') ? get_query_var('paged') : 1
];

$query = new WP_Query($args);
?>

<div class="blog-posts">
    <div class="row g-5">
        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
            <div class="col-md-6">
                <div class="card border-0">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <div class="blog-thumb-wrapper mb-3">
                                <img src="<?= the_post_thumbnail_url('medium_large'); ?>" alt="<?php the_title(); ?>">
                            </div>
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
        <?php wp_reset_postdata(); ?>
    </div>

    <!-- Pagination -->
    <div class="mt-5">
        <?php
        echo paginate_links([
            'total' => $query->max_num_pages,
            'current' => max(1, get_query_var('paged')),
            'prev_text' => '<',
            'next_text' => '>',
            'mid_size' => 2,
        ]);
        ?>
    </div>
</div>