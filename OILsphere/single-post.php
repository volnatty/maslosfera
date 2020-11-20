<?php get_header(); ?>


                
<section class="single-articles-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php get_site_url(); ?>">Главная</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
                    </ol>
                </nav>
                <h1 class="h2 mb-4"><?php the_title(); ?></h1>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="single-articles-img" style="background-image: url('<?php the_post_thumbnail_url(null , 'large'); ?>')"></div>
                <?php endif; ?>
                <div class="single-articles-content">

                    <?php the_content(); ?>

                </div>
                <div class="single-articles-footer d-sm-flex align-items-center justify-content-sm-between">
                    <div class="single-articles-footer__date">
                        <?php the_date('j F Y'); ?>
                    </div>
                    <div class="single-articles-footer__share d-flex align-items-center">
                        <span>ПОДЕЛИТЬСЯ</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
                            <svg width="20" height="20">
                                <use xlink:href="#fb-icon"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="single-article-popular">

                    <h2 class="single-article-popular__title text-white">Другие статьи</h2>


                    
                    <?php 
                    $post_id = get_the_ID();
                    $posts = get_posts( array(
                        'numberposts' => 3,
                        'orderby'     => 'date',
                        'order'       => 'DESC',
                        'exclude'     => array($post_id),
                        'post_type'   => 'post',
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ) );  ?>


                    <?php foreach( $posts as $post ) : ?>   

                        <div class="article">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink();?>" class="article__img d-block" style="background-image: url('<?php the_post_thumbnail_url();?>"></a>
                            <?php endif; ?>
                            <a href="<?php the_permalink();?>" class="article__title text-white h3 d-block"><?php the_title();?></a>

                            <div class="article__link text-right">
                                <a href="<?php the_permalink();?>" class="d-inline-block">Подробнее</a>
                            </div>
                            
                        </div>
                        

                    <?php endforeach;?>
                    
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>
