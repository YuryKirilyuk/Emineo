<?php
function agent_shortcode_cb($atts) {
    ob_start();

    $a = shortcode_atts( array(
        'id' => '',
        'title' => ''
    ), $atts );

    if($a['id']) {
        $agent = get_post($a['id']);
        if($agent) {

            $title = $a['title'];
            $name = $agent->post_title;
            $excerpt = $agent->post_excerpt;
            $team = get_field('team', $agent->ID);
            $email = get_field('email', $agent->ID);
            $position = get_field('position', $agent->ID);
            $phone_number = get_field('phone_number', $agent->ID);
            $facebook_link = get_field('facebook_link', $agent->ID);
            $xing_link = get_field('xing_address', $agent->ID);
            $linkedin_link = get_field('linkedin_profile', $agent->ID);
            $twitter_link = get_field('twitter_url', $agent->ID);

            ?>
            <div class="single-agent-element">
                <div class="single-agent-inner">
                    <div class="elementor-widget-wrap">
                        <div class="elementor-element elementor-widget elementor-widget-heading" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;none&quot;}" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <h3 class="elementor-heading-title elementor-size-default"><?php echo $title; ?></h3>
                            </div>
                        </div>
                        <div class="elementor-element elementor-position-top elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-element_type="widget" data-widget_type="image-box.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-image-box-wrapper">
                                    <?php if(has_post_thumbnail($agent)) { ?>
                                        <figure class="elementor-image-box-img">
                                            <?php echo get_the_post_thumbnail($agent, 'full'); ?>
                                        </figure>
                                    <?php } ?>
                                    <div class="elementor-image-box-content">
                                        <h3 class="elementor-image-box-title"><?php echo $name; ?></h3>
                                        <p class="elementor-image-box-description"><?php echo $position; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-widget elementor-widget-text-editor" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-text-editor elementor-clearfix">
                                    <p><?php echo $excerpt; ?></p>
                                    <p><?php if($email) { ?>
                                            <a class="agent-email" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                                        <?php } ?>
                                        <?php echo $phone_number; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-shape-square elementor-widget elementor-widget-social-icons"  data-element_type="widget" data-widget_type="social-icons.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-social-icons-wrapper">
                                    <?php if($facebook_link) { ?>
                                        <a href="<?php echo $facebook_link; ?>" class="elementor-icon elementor-social-icon elementor-social-icon-facebook-f elementor-animation-wobble-vertical target="_blank">
                                            <span class="elementor-screen-only">Facebook-f</span>
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    <?php } ?>
                                    <?php if($xing_link) { ?>
                                        <a href="<?php echo $xing_link; ?>" class="elementor-icon elementor-social-icon elementor-social-icon-xing elementor-animation-wobble-vertical target="_blank">
                                            <span class="elementor-screen-only">Xing</span>
                                            <i class="fab fa-xing"></i>
                                        </a>
                                <?php } ?>
                                    <?php if($linkedin_link) { ?>
                                        <a href="<?php echo $linkedin_link; ?>" class="elementor-icon elementor-social-icon elementor-social-icon-linkedin-in elementor-animation-wobble-vertical target="_blank">
                                            <span class="elementor-screen-only">Linkedin-in</span>
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                <?php } ?>
                                    <?php if($twitter_link) { ?>
                                        <a href="<?php echo $twitter_link; ?>" class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-animation-wobble-vertical target="_blank">
                                            <span class="elementor-screen-only">Twitter</span>
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-widget elementor-widget-button" data-element_type="widget" data-widget_type="button.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-button-wrapper">
                                    <a href="<?php echo get_site_url(); ?>/kontakt/" class="elementor-button-link elementor-button elementor-size-lg" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">CONTACT</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-widget elementor-widget-text-editor" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-text-editor elementor-clearfix team-name"><?php echo $team; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    
    return ob_get_clean();
}
add_shortcode('agent', 'agent_shortcode_cb');