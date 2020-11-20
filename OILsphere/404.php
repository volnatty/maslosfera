<?php get_header(); ?>

                
<section class="not-found-section d-flex align-items-center justify-content-center" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/404.jpg')">
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col-lg-6">
                <div class="not-found">
                    <h3 class="not-found__subtitle mb-4">Ошибка №404</h3>
                    <h1 class="not-found__title mb-4">Страница <br> не найдена</h1>
                    <a class="btn btn-primary" href="<?= get_site_url(); ?>"><span>На ГЛАВНУЮ</span></a>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>
