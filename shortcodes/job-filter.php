<?php
function job_filter_sc() {
    ob_start();
    $jobs = process_jobs_feed(JOB_FEED_URL);
    ?>
    <div class="jobs-filter-container">
        <div class="jobs-filter-inner-container">
            <form action="" method="get">
                <ul>
                    <?php
                    $shown_cats = [];
                    foreach($jobs as $job) {
                        if($job['Criteria']['Deparment'] && !in_array($job['Criteria']['Deparment'], $shown_cats)) {
                            $shown_cats[] = $job['Criteria']['Deparment'];
                        ?>
                            <li>
                                <label><input type="checkbox" name="job_categories[]" value="<?php echo $job['Criteria']['Deparment']; ?>" <?php if(isset($_GET['job_categories']) && in_array($job['Criteria']['Deparment'], (array)$_GET['job_categories'])) { echo 'checked="checked"'; } ?> /> <?php echo $job['Criteria']['Deparment']; ?></label>
                            </li>
                        <?php
                        }
                    }
                    ?>
                </ul>
            
                <input type="submit" style="display: none;" />
            </form>
        </div>
    </div>

    <script>
        jQuery(document).ready(function() {
            jQuery(document).on('change', '.jobs-filter-container input[type="checkbox"]', function() {
                jQuery(this).closest('form').trigger('submit');
            });
        });
    </script>
    <style>
        .jobs-filter-container ul {
            list-style: none;
            margin-left: 20px;
        }

        .jobs-filter-container li {
            display: inline-block;
            margin-left: 10px;
            margin-right: 10px;
        }
        .jobs-filter-container li input {
            margin-right: 3px;
        }
    </style>
    <?php
    return ob_get_clean();
}
add_shortcode('job-filter', 'job_filter_sc');