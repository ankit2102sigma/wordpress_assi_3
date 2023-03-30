<?php get_header(); ?>

<main id="main" class="site-main" role="main">

    <header class="page-header">
        <h1 class="page-title">
            <?php single_term_title(); ?>
        </h1>
    </header><!-- .page-header -->

    <?php if ( have_posts() ) : ?>

        <div class="movie-list">

            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="entry-thumbnail">
                            <?php the_post_thumbnail( 'thumbnail' ); ?>
                        </div><!-- .entry-thumbnail -->
                    <?php endif; ?>

                    <header class="entry-header">
                        <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                    </header><!-- .entry-header -->

                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div><!-- .entry-summary -->
                </article><!-- #post-<?php the_ID(); ?> -->

            <?php endwhile; ?>

        </div><!-- .movie-list -->

        <?php
// Pagination
        the_posts_pagination( array(
            'prev_text' => __( 'Previous page', 'textdomain' ),
            'next_text' => __( 'Next page', 'textdomain' ),
        ) );
        ?>

    <?php else : ?>

        <p><?php esc_html_e( 'No movies found', 'textdomain' ); ?></p>

    <?php endif; ?>

</main><!-- #main -->

<?php get_footer(); ?>
