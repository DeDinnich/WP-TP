<div class="row">
        <!-- Col gauche : contenu article -->
        <div class="col-12">
            <article class="single-post mb-5">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumb-wrapper mb-4">
                        <img src="<?= the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                    </div>
                <?php endif; ?>

                <h1 class="fw-bold mb-3"><?php the_title(); ?></h1>

                <div class="mb-3 text-muted">
                    <?php the_category(', '); ?> — <?php the_time(get_option('date_format')); ?>
                </div>

                <div class="post-content mb-5">
                    <?php the_content(); ?>
                </div>

                <div class="mb-5">
                    <strong>Tags :</strong> <?php the_tags('', ', '); ?>
                </div>

                <!-- Section commentaires (carousel dummy) -->
                <div class="comments-carousel mb-5">
                    <h5 class="fw-bold">Comments</h5>
                    <div id="commentsCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <blockquote class="blockquote">
                                    <p>Great post! Very insightful.</p>
                                    <footer class="blockquote-footer">Alice</footer>
                                </blockquote>
                            </div>
                            <div class="carousel-item">
                                <blockquote class="blockquote">
                                    <p>Thanks for sharing this. Learned a lot.</p>
                                    <footer class="blockquote-footer">Bob</footer>
                                </blockquote>
                            </div>
                            <div class="carousel-item">
                                <blockquote class="blockquote">
                                    <p>Interesting perspective!</p>
                                    <footer class="blockquote-footer">Charlie</footer>
                                </blockquote>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#commentsCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#commentsCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <!-- Formulaire commentaire -->
                <div class="comment-form">
                    <h5 class="fw-bold">Leave a comment</h5>
                    <form action="#" method="post">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Your name">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="4" placeholder="Your comment"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </article>
        </div>
    </div>