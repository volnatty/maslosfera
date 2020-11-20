<div class="side-menu d-none d-xl-flex flex-column from_top">

    <!-- <div class="side-menu__drop d-flex align-items-center justify-content-center">
        <div id="side-close" class="search-btn__triger side-menu__drop__close square">
            <svg width="25" height="25">
                <use xlink:href="#close-icon"></use>
            </svg>
        </div>
        <h2 class="side-menu__drop__title">Выберите категорию</h2> -->


        <?php
        // $prod_cat_args = array(
        //     'taxonomy'    => 'product_cat',
        //     'orderby'     => 'id', 
        //     'hide_empty'  => false,
        //     'parent'      => 0, 
        //     'exclude' => 15
        // );


        // $woo_categories = get_categories($prod_cat_args);
        // foreach ($woo_categories as $woo_cat) {
        //     $woo_cat_id = $woo_cat->term_id; 
        //     $woo_cat_name = $woo_cat->name; 
        //     $woo_cat_slug = $woo_cat->slug; 
        //     $category_thumbnail_id = get_woocommerce_term_meta($woo_cat_id, 'thumbnail_id', true);
        //     $thumbnail_image_url = wp_get_attachment_url($category_thumbnail_id);
        //     echo ' <a href="' . get_term_link($woo_cat_id, 'product_cat') . '" class="catalog-item d-flex flex-column h-100">'
        //         . ' <div class="catalog-item__img" style="background-image: url(' . $thumbnail_image_url . ')">';

        //     echo '<h3 class="title-gradient">' . $woo_cat_name . '</h3></div>'
        //         . '<h5 class="catalog-item__title">' . $woo_cat_name . '</h5>'
        //         . "</a>\n";
        // }
        ?>
    <!-- </div> -->

    <form role="search" method="get" id="searchform" action="<?php get_site_url(); ?>/">

        <div class="search-line d-flex">
            <input type="text" value="" name="s" id="s" placeholder="Найти" />

            
            <button id="searchsubmit" type="submit" class="search-btn__triger search-btn__triger--submit  square">
                <svg width="27" height="27">
                    <use xlink:href="#search-icon"></use>
                </svg>
            </button>

            <input type="hidden" value="1" name="sentence" />
            <input type="hidden" value="product" name="post_type" />
        </div>


        <div class="search-btn square">
            <div id="search-open" class="search-btn__triger square">
                <svg width="27" height="27">
                    <use xlink:href="#search-icon"></use>
                </svg>
            </div>

            <div id="search-close" class="search-btn__triger search-btn__triger--close  square">
                <svg width="25" height="25">
                    <use xlink:href="#close-icon"></use>
                </svg>
            </div>
        </div>

    </form>



    <!-- <div class="side-menu__btn align-items-center justify-content-center">
        <div class="side-menu__btn__title d-flex align-items-center justify-content-center">
            <h5>Меню</h5>
            <span></span>
        </div>
    </div> -->

</div>