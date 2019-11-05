<?php
function single_job_sc($atts) {
    ob_start();

    $a = shortcode_atts( array(
        'type' => 'offer',
    ), $atts );

    ob_start();

    if(isset($_GET['posid'])) {
        $job = get_single_job($_GET['posid']);

        if($a['type'] == 'offer') {
            ?>
            <div class="elementor-element elementor-element-1babbce6 elementor-widget elementor-widget-heading animated fadeInLeft" data-id="1babbce6" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			        <h3 class="elementor-heading-title elementor-size-default"><?php echo $job['Job Details']['Title What we offer']; ?></h3>
                </div>
			</div>

            <div class="elementor-element elementor-element-3f2734c7 elementor-widget elementor-widget-text-editor animated fadeInLeft" data-id="3f2734c7" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;,&quot;_animation_delay&quot;:500}" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
					<div class="elementor-text-editor elementor-clearfix"><?php echo $job['Job Details']['Text What we offer']; ?></div>
				</div>
			</div>
            <?php
        }

        else if($a['type'] == 'requirements') {
            ?>
            <div class="elementor-element elementor-element-1babbce6 elementor-widget elementor-widget-heading animated fadeInLeft" data-id="1babbce6" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="heading.default">
                <div class="elementor-widget-container">
                    <h3 class="elementor-heading-title elementor-size-default"><?php echo $job['Job Details']['Title of requirements']; ?></h3>
                </div>
            </div>

            <div class="elementor-element elementor-element-3f2734c7 elementor-widget elementor-widget-text-editor animated fadeInLeft" data-id="3f2734c7" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;,&quot;_animation_delay&quot;:500}" data-widget_type="text-editor.default">
                <div class="elementor-widget-container">
                    <div class="elementor-text-editor elementor-clearfix"><?php echo $job['Job Details']['Text for requirements']; ?></div>
                </div>
            </div>
            <?php
        }

        else if($a['type'] == 'tasks') {
            ?>
            <div class="elementor-element elementor-element-1babbce6 elementor-widget elementor-widget-heading animated fadeInLeft" data-id="1babbce6" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			        <h3 class="elementor-heading-title elementor-size-default"><?php echo $job['Job Details']['Title of tasks']; ?></h3>
                </div>
			</div>

            <div class="elementor-element elementor-element-3f2734c7 elementor-widget elementor-widget-text-editor animated fadeInLeft" data-id="3f2734c7" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;,&quot;_animation_delay&quot;:500}" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
					<div class="elementor-text-editor elementor-clearfix"><?php echo $job['Job Details']['Text for tasks']; ?></div>
				</div>
			</div>
            <?php
        }

        else if($a['type'] == 'description') {
            ?>
            <div class="elementor-element elementor-element-1babbce6 elementor-widget elementor-widget-heading animated fadeInLeft" data-id="1babbce6" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			        <h3 class="elementor-heading-title elementor-size-default">Wir freuen uns auf deine Bewerbung</h3>
                </div>
			</div>

            <div class="elementor-element elementor-element-3f2734c7 elementor-widget elementor-widget-text-editor animated fadeInLeft" data-id="3f2734c7" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;,&quot;_animation_delay&quot;:500}" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
					<div class="elementor-text-editor elementor-clearfix"><?php echo $job['Job Details']['Short description']; ?></div>
				</div>
			</div>
            <?php
        }

        else if($a['type'] == 'criteria') {
            ?>
            <div class="elementor-widget-wrap">

				<div class="elementor-element elementor-element-f8a8be7 elementor-widget elementor-widget-heading animated fadeInRight" data-id="f8a8be7" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;}" data-widget_type="heading.default">
				    <div class="elementor-widget-container">
			            <h3 class="elementor-heading-title elementor-size-default">Das wichtigste in Kürze</h3>
                    </div>
				</div>

				<div class="elementor-element elementor-element-48f53a12 elementor-widget elementor-widget-text-editor animated fadeInRight" data-id="48f53a12" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;,&quot;_animation_delay&quot;:500}" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-text-editor elementor-clearfix">
                            <p>Arbeitsort: <?php echo $job['Criteria']['Work location']; ?></p>
                            <p>Pensum: 100 %</p><p>Arbeitsbeginn: 1 November 2019</p>
                        </div>
                    </div>
				</div>

				<div class="elementor-element elementor-element-36fae462 elementor-align-center elementor-widget elementor-widget-button animated fadeInUp" data-id="36fae462" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}" data-widget_type="button.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper">
                            <a href="#" class="elementor-button-link elementor-button elementor-size-sm" role="button">
                                <span class="elementor-button-content-wrapper">
                                    <span class="elementor-button-text">Jetzt Bewerben</span>
                                </span>
                            </a>
                        </div>
                    </div>
				</div>

            </div>
            <?php
        }

    }

    return html_entity_decode(ob_get_clean());
}
add_shortcode('single-job', 'single_job_sc');