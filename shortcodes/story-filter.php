<?php
function story_filter_sc($atts) {
    ob_start();

    $industries = get_terms([
        'hide_empty' => true,
        'taxonomy' => 'industry'
    ]);

    $services = get_terms([
        'hide_empty' => true,
        'taxonomy' => 'service'
    ]);

    ?>
    <div class="success-stories-filter">
        <ul>
            <li>
                <a href="" class="category-title">Branche <span class="menu-arrow"></span></a>
                <ul>
                    <?php
                    if($industries) {
                        foreach($industries as $industry) {
                            ?>
                            <li><a href="" data-type="industry" data-itemid="<?php echo $industry->term_id; ?>"><?php echo $industry->name; ?></a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </li>
            <li>
                <a href="" class="category-title">Dienstleistungen <span class="menu-arrow"></span></a>
                <ul>
                    <?php
                    if($services) {
                        foreach($services as $service) {
                            ?>
                            <li><a href="" data-type="service" data-posttype="story" data-itemid="<?php echo $service->term_id; ?>"><?php echo $service->name; ?></a></li>
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
add_shortcode('story-filter', 'story_filter_sc');


function story_filter_description_sc() {
    ob_start();
    ?>
    <div class="story-description"></div>
    <?php

    return ob_get_clean();
}
add_shortcode('story-filter-description', 'story_filter_description_sc');


function story_filter_items_sc() {
    ob_start();
    ?>
    <div class="story-items-container">
        <div class="story-items-inner-container"></div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('story-filter-items', 'story_filter_items_sc');