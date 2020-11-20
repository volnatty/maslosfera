
<?php 
$posts_abouts = get_posts( array(
    'numberposts' => 1,
    'include'     => array(159), 
) );  ?>


<section class="about-section container-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 from_left">

                <?php
                    $post;
                    $args = array( 'include' => array(159));
                    $myposts = get_posts( $args );
                    foreach( $myposts as $post ){ setup_postdata($post);
                ?>

                <div class="about-main w-100" style="background-image: url('<?php echo get_the_post_thumbnail_url( );?>')">
                    <div class="about-main__content d-flex justify-content-end flex-column align-items-start">
                        <h2 class="text-white mb-4">О нас</h2>
                    
                        
                            <p class="about-main__content__text text-white">
                                <?php 
                                    $content = $post->post_content;
                                    $content_excerpt = wp_trim_words( $content, 61, '...' );
                                    echo $content_excerpt;
                                ?>
                            </p>

                            <a href="<?php the_permalink();?>" class="btn btn-primary mt-4"><span>Подробнее</span></a>
                            
                    </div>
                </div>

                <?php
                    }
                    wp_reset_postdata();
                ?>
            </div>
            <div class="col-xl-6 d-md-flex">
                <div class="row flex-md-shrink-1 flex-md-grow-1 my-md-n2">

                    <?php
                        $post;
                        $args = array( 'include'     => array(166, 169, 172, 174));
                        $myposts = get_posts( $args );
                        foreach( $myposts as $post ){ setup_postdata($post);
                    ?>

                        <div class="col-sm-6 my-2 from_right_interval">
                            <a href="<?php the_permalink(); ?>" class="about-main about-main--min" style="background-image: url('<?php echo get_the_post_thumbnail_url( );?>')">
                                <h3 class="about-min-title"><?php the_title(); ?></h3>
                            </a>
                        </div>

                    <?php
                        }
                        wp_reset_postdata();
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>