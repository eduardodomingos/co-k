<article class="<?php echo isset($css_class) ? $css_class : '' ?> teaser">
    <?php
    if( $image ) {
        if(isset($show_link) && true === $show_link) {
            echo '<a href="'. esc_url( get_permalink() ) .'" rel="bookmark">';
        }
        

        $raw_image = wp_get_attachment_image( $image, 'thumbnail' );
        $final_image = preg_replace('/(height|width)="\d*"\s/', "", $raw_image);

        echo $final_image;

        if(isset($show_link) && true === $show_link) {
            echo '</a>';
        }
        
    }
    ?>
    <div class="teaser-content">
        <?php if(isset($show_link) && true === $show_link) : ?>
            <?php  echo '<a class="overlay-link" href="' . esc_url( get_permalink() ) . '" rel="bookmark"></a>';?>
        <?php endif;?>

        <?php if(isset($show_link) && true === $show_link) : ?>
            <?php the_title( '<h1><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );?>
        <?php else: ?>
            <?php the_title( '<h1>', '</h1>' );?>
        <?php endif;?>
        
        <?php if(!empty($meta)): ?>
            <p class="meta"><?php echo $meta;?></p>
        <?php endif;?>

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
        <?php elseif($list_type == 'work'):?>
            <ul class="list">
            <?php
                $posttags = get_the_tags();
                if ($posttags) {
                    foreach($posttags as $tag) {
                        echo '<li>' . $tag->name . '</li>'; 
                    }
                } 
            ?>
            </ul>
        <?php endif; ?>

    </div>
</article>