<article class="<?php echo isset($css_class) ? $css_class : '' ?> teaser">
    <?php
    if( $image ) {
        echo wp_get_attachment_image( $image, 'thumbnail' );
    }
    ?>
    <div class="teaser-content">
    <?php if(isset($show_link) && true === $show_link) : ?>
        <?php the_title( '<h1><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );?>
    <?php else: ?>
        <?php the_title( '<h1>', '</h1>' );?>
    <?php endif;?>
        
        <p class="meta"><?php echo $meta;?></p>

        <?php if($list_type == 'team-member'): ?>
            <?php if( have_rows('social_networks') ): ?>
                <ul class="list">
                    <?php while( have_rows('social_networks') ): the_row(); ?>
                        <li>
                            <a href="<?php echo get_sub_field('url') ?>"><?php echo get_sub_field('name')?></a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        <?php endif; ?>

    </div>
</article>