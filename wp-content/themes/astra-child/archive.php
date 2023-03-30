<?php if ( is_post_type_archive( 'movie' ) ) : ?>

    <nav class="movie-categories">
        <h2><?php esc_html_e( 'Categories', 'textdomain' ); ?></h2>
        <ul>
            <?php wp_list_categories( array(
                'taxonomy' => 'movie_category',
                'orderby' => 'name',
                'title_li' => '',
            ) ); ?>
        </ul>
    </nav><!-- .movie-categories -->

<?php endif; ?>
