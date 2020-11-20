

<?php 
$posts = get_posts( array(
    'numberposts' => 3,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'post_type'   => 'post',
    'exclude'     => array(159),
    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );  ?>




<section class="last-articles-section">
    <div class="container-fluid last-">
        <div class="title-btn d-flex justify-content-between align-items-center pl-xl-5 mb-4">
            <h2 class="text-white">Полезные статьи</h2>
            <a href="<?php get_site_url(); ?>blog" class="btn btn-primary d-none d-xl-inline-block"><span>ВСЕ СТАТЬИ</span></a>
        </div>
        <div class="row">

            <?php foreach( $posts as $post ) : ?>   

                <div class="col-lg-4">
                    <div class="article from_bottom_interval">
                        <a href="<?php the_permalink();?>" class="article__img d-block" style="background-image: url('<?php the_post_thumbnail_url();?>')"></a>
                        <a href="<?php the_permalink();?>" class="article__title text-white h3 d-block"><?php the_title();?></a>

                        <p>
                            <?php 
                                $content = $post->post_content;
                                $content_excerpt = wp_trim_words( $content, 40, '...' );
                                echo $content_excerpt;
                            ?>
                        </p>

                        <div class="article__link text-right">
                            <a href="<?php the_permalink();?>" class="d-inline-block">Подробнее</a>
                        </div>
                        
                    </div>
                </div>

            <?php endforeach;?>

        </div>
    </div>
</section>