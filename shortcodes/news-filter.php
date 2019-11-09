<?php
function news_filter_sc($atts) {
    ob_start();

    $categories = get_terms([
        'hide_empty' => true,
        'taxonomy' => 'category'
    ]);
    ?>
    <div class="success-stories-filter">
        <ul>
            <li>
                <a href="" class="category-title">Categories <span class="menu-arrow"></span></a>
                <ul>
                    <?php
                    if($categories) {
                        foreach($categories as $category) {
                            ?>
                            <li><a href="" data-type="category" data-posttype="post" data-itemid="<?php echo $category->term_id; ?>"><?php echo $category->name; ?></a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </li>
        </ul>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('news-filter', 'news_filter_sc');


function news_filter_description_sc() {
    ob_start();
    ?>
    <div class="story-description"></div>
    <?php

    return ob_get_clean();
}
add_shortcode('news-filter-description', 'news_filter_description_sc');


function news_filter_items_sc() {
    ob_start();
    ?>
    <div class="story-items-container">
        <div class="story-items-inner-container"></div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('news-filter-items', 'news_filter_items_sc');