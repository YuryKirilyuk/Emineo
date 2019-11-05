<?php
function single_job_sc($atts) {
    ob_start();

    $a = shortcode_atts( array(
        'type' => 'offer',
    ), $atts );

    //ob_start();

    if(isset($_GET['posid'])) {
        $job = get_single_job($_GET['posid']);

        if($a['type'] == 'offer') {
            ?>
            <h3 class="elementor-heading-title elementor-size-default"><?php echo $job['Job Details']['Title What we offer']; ?></h3>
            <div class="elementor-text-editor elementor-clearfix"><?php echo $job['Job Details']['Text What we offer']; ?></div>
            <?php
        }
        else if($a['type'] == 'requirements') {
            ?>
            <h3 class="elementor-heading-title elementor-size-default"><?php echo $job['Job Details']['Title of requirements']; ?></h3>
            <div class="elementor-text-editor elementor-clearfix"><?php echo $job['Job Details']['Text for requirements']; ?></div>
            <?php
        }
        else if($a['type'] == 'tasks') {
            ?>
            <h3 class="elementor-heading-title elementor-size-default"><?php echo $job['Job Details']['Title of tasks']; ?></h3>
            <div class="elementor-text-editor elementor-clearfix"><?php echo $job['Job Details']['Text for tasks']; ?></div>
            <?php
        }
        else if($a['type'] == 'description') {
            ?>
            <div class="elementor-text-editor elementor-clearfix"><?php echo $job['Job Details']['Short description']; ?></div>
            <?php
        }
        else if($a['type'] == 'job_link') {
            echo $job['Application URL'];
        }
        else if($a['type'] == 'title') {
            echo $job['Job Details']['Title of job'];
        }
        else if($a['type'] == 'criteria') {
            ?>
            <div class="elementor-text-editor elementor-clearfix">
                <p>Type of employment: <?php echo $job['Criteria']['Type of employment']; ?></p>
                <p>Terminability: <?php echo $job['Criteria']['Terminability']; ?></p>
                <p>Work as: <?php echo $job['Criteria']['Work as']; ?></p>
                <p>Deparment: <?php echo $job['Criteria']['Deparment']; ?></p>
                <p>Arbeitsort: <?php echo $job['Criteria']['Work location']; ?></p>
            </div>
            <?php
        }
    }

    return html_entity_decode(ob_get_clean());
}
add_shortcode('single-job', 'single_job_sc');