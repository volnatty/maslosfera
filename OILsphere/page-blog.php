<?php get_header(); ?>



<!-- =========== main desk section -->

<?php 
$posts = get_posts( array(
    'numberposts' => 6,
	'category'    => 0,
	'orderby'     => 'date',
	'order'       => 'DESC',
	'exclude'     => array(159),
	'post_type'   => 'post',
	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );

if($posts) : ?>


<section class="articles-section">
    <div class="container-fluid last-">
        <div class="title-btn pl-md-5 mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php get_site_url(); ?>" class="text-white">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php the_title();?></li>
                </ol>
            </nav>
            <h1 class="text-white h2"><?php the_title();?></h1>
        </div>
        <div class="row">
            <div class="col">
				<?php echo do_shortcode('[ajax_load_more container_type="div" post_type="post" button_label="БОЛЬШЕ СТАТЕЙ" posts_per_page="6" scroll="false" transition_container_classes="row" nested="true"]'); ?>
            </div>
        </div>
    </div>
</section>



<?php endif;?>





<?php get_template_part('template-parts/popular-slider'); ?>



<?php get_footer(); ?>
