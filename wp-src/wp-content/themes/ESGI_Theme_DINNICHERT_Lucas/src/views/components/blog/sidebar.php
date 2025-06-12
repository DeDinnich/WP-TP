<?php
// components/blog/sidebar.php
?>
<aside class="blog-sidebar pe-4">
    <!-- Barre de recherche -->
    <div class="mb-5">
        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
            <label for="search">
                <input type="search" id="search" class="form-control" placeholder="Type to search" value="<?php echo get_search_query(); ?>" name="s" />
            </label>
        </form>
    </div>

    <!-- Articles récents -->
    <div class="mb-5">
        <h5 class="fw-bold">Recent posts</h5>
        <ul class="list-unstyled">
            <?php
            $recent_posts = wp_get_recent_posts(['numberposts' => 4]);
            foreach ($recent_posts as $post) :
                echo '<li class="mb-3 d-flex align-items-center gap-2">
                    <img src="' . get_the_post_thumbnail_url($post['ID'], 'thumbnail') . '" width="50" height="50" style="object-fit:cover;">
                    <div>
                        <a href="' . get_permalink($post['ID']) . '" class="text-decoration-none">' . esc_html($post['post_title']) . '</a><br>
                        <small>' . get_the_date('', $post['ID']) . '</small>
                    </div>
                </li>';
            endforeach;
            ?>
        </ul>
    </div>

    <!-- Archives -->
    <div class="mb-5">
        <h5 class="fw-bold">Archives</h5>
        <ul class="list-unstyled">
            <?php wp_get_archives(['type' => 'monthly', 'limit' => 5]); ?>
        </ul>
    </div>

    <!-- Catégories -->
    <div class="mb-5">
        <h5 class="fw-bold">Categories</h5>
        <ul class="list-unstyled">
            <?php
            $categories = get_categories();
            foreach ($categories as $category) {
                echo '<li><a href="' . get_category_link($category->term_id) . '" class="text-decoration-none">' . $category->name . '</a></li>';
            }
            ?>
        </ul>
    </div>

    <!-- Tags -->
    <div class="mb-5">
        <h5 class="fw-bold">Tags</h5>
        <div>
            <?php
            $tags = get_tags();
            foreach ($tags as $tag) {
                echo '<a href="' . get_tag_link($tag->term_id) . '" class="badge bg-light text-dark me-2 mb-2">' . $tag->name . '</a>';
            }
            ?>
        </div>
    </div>
</aside>