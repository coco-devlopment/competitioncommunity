<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Parent theme: Bootstrapbase by Bas Brands
 * Built on: Essential by Julian Ridden
 *
 * @package   theme_lambda
 * @copyright 2019 redPIthemes
 *
 */
 global $DB,$CFG;
$hasfrontpageblocks = ($PAGE->blocks->region_has_content('side-pre', $OUTPUT) || $PAGE->blocks->region_has_content('side-post', $OUTPUT));
$carousel_pos = $PAGE->theme->settings->carousel_position;
$carousel_img_dim = $PAGE->theme->settings->carousel_img_dim;
$carousel_img_dim = substr($carousel_img_dim, 0, -2);
$pagewidth = $PAGE->theme->settings->pagewidth;
$standardlayout = FALSE;
if ($PAGE->theme->settings->block_layout == 1) {$standardlayout = TRUE;}
$sidebar = FALSE;
if ($PAGE->theme->settings->block_layout == 2) {$sidebar = TRUE;}
if (($sidebar) && (strpos($OUTPUT->body_attributes(), 'empty-region-side-pre') !== FALSE) && (strpos($OUTPUT->body_attributes(), 'editing') == FALSE)) {$sidebar = FALSE;}
if ($sidebar) {theme_lambda_init_sidebar($PAGE); $sidebar_stat = theme_lambda_get_sidebar_stat();}

if (right_to_left()) {
    $regionbsid = 'region-bs-main-and-post';
} else {
    $regionbsid = 'region-bs-main-and-pre';
}
$result_get = $DB->get_records_sql("SELECT * FROM {meta_settings} ", array());

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <noscript>
			<link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot;?>/theme/lambda/style/nojs.css" />
	</noscript>
    <!-- Google web fonts -->
    <?php require_once(dirname(__FILE__).'/includes/fonts.php'); ?>
</head>

<?php 
	$lambda_body_attributes = '';
	if ($sidebar) {$lambda_body_attributes .= ' sidebar-enabled '.$sidebar_stat;}
?>
<body <?php echo $OUTPUT->body_attributes("$lambda_body_attributes"); ?>>

<?php echo $OUTPUT->standard_top_of_body_html(); ?>

<?php if ($sidebar) { 
    //hide sidebar for index page before login
    ?>
    <!-- <div id="sidebar" class="">
    	<?php //echo $OUTPUT->blocks('side-pre');?>
        <div id="sidebar-btn"><span></span><span></span><span></span></div>
    </div> -->
<?php } ?>

<div id="wrapper">
<?php require_once(dirname(__FILE__).'/includes/header.php'); ?>
<?php if ($pagewidth == 100) {require_once(dirname(__FILE__).'/includes/slideshow.php');} ?>
<div id="page" class="container-fluid">
	<?php if ($pagewidth != 100) {require_once(dirname(__FILE__).'/includes/slideshow.php');} ?>
	<div id ="page-header-nav" class="clearfix"> </div>
    <div id="page-content" class="row-fluid">
    	<?php if ($hasfrontpageblocks==1) { ?>
            <div id="<?php echo $regionbsid ?>" class="span9">
            <div class="row-fluid">
            	<?php if ($standardlayout) { ?>
                    <section id="region-main" class="span8 pull-right">
                <?php } else { ?>
                    <section id="region-main" class="span8">
                <?php } ?>
        <?php } else { ?>
        	<div id="<?php echo $regionbsid ?>">
            <div class="row-fluid">
            	<section id="region-main" class="span12">
        <?php } ?>

                <h2>We Provide</h2>
                <div class="row-fluid">
                    <div class="span4">
                            <div class="corow clrleft align-center product-list titel-text brd-radius3 mb-4">
                                <img src="data:image/png;base64,<?= image('testseries.png'); ?>" alt="" class="img-responsive" />
                                <h3>Test Series</h3>
                                <p>Our Test series Contains questions designed from specilized subject experts which will help you in competitive exams like <b>CGPSC Prelims, CGPSC Mains, SSC etc. We contduct both offline and online test series.</b></p>
                                <span><a href="<?php echo $CFG->wwwroot; ?>/local/pagecontainer/testseries/testseries-packages.php" class="btn btn-default" title="Mains Test Series">View <i class="fa fa-angle-right"></i></a></span>

                            </div>
                    </div>
                     <div class="span4">
                            <div class="corow clrleft align-center product-list titel-text brd-radius3 mb-4">
                                <img src="data:image/png;base64,<?= image('course.png'); ?>" alt="" class="img-responsive" />
                                <h3>Courses</h3>
                                <p>We provide well structured course designed according to syllabus of different competitive examinations such as <b>CGPSC Prelims, CGPSC Mains, SSC</b> etc</p>
                                <span><a href="<?php echo $CFG->wwwroot; ?>/local/pagecontainer/testseries/course-packages.php" class="btn btn-default" title="Pre Test Series">View <i class="fa fa-angle-right"></i></a></span>
                            </div>
                    </div>
                    <div class="span4">
                            <div class="corow clrleft align-center product-list titel-text brd-radius3 mb-4">
                                <img src="data:image/png;base64,<?= image('video.png'); ?>" alt="" class="img-responsive" />
                                <h3>Videos</h3>
                                <p>We Provide different video tutorials for <b>National Current Affairs, Chhatisgarh Current Affairs, MCQ Sets, C-SAT, Chhattisgarh General Studies, English Learning etc. </b></p>
                                <span><a href="<?php echo $CFG->wwwroot; ?>/local/pagecontainer/currentaffairs/current-affair-video.php" class="btn btn-default" title="Current Affair">View <i class="fa fa-angle-right"></i></a></span>
                            </div>
                    </div>
                </div>

                <?php
                function image($img) {
                    $location = dirname($_SERVER['DOCUMENT_ROOT']);
                    $image    = $location . '/moodledata/images/thumbnail/'.$img;

                    return base64_encode(file_get_contents($image));
                }
                ?>

                    <!-- Frontpage custom coding start -->
                    <!-- <div class="text-center">
                        <a href="<?php echo $CFG->wwwroot; ?>/local/pagecontainer/testseries/testseries-course-link.php" class="btn btn-default">Product</a>
                    </div> -->
                    <!-- Frontpage custom coding start -->

            	<?php
            		echo $OUTPUT->course_content_header();
					if ($carousel_pos=='0') require_once(dirname(__FILE__).'/includes/carousel.php');
            		echo $OUTPUT->main_content();
            		echo $OUTPUT->course_content_footer();
					if ($carousel_pos=='1') require_once(dirname(__FILE__).'/includes/carousel.php');
            	?>
                </section>
        	<?php
        	if ($hasfrontpageblocks==1) { 
				if ($standardlayout) {echo $OUTPUT->blocks('side-pre', 'span4 desktop-first-column pull-left');}
				else if (!$sidebar) {echo $OUTPUT->blocks('side-pre', 'span4 desktop-first-column pull-right');}
			} ?>
            </div>
        	</div>
        <?php echo $OUTPUT->blocks('side-post', 'span3'); ?>
    </div>

    <?php if (is_siteadmin()) { ?>
	<div class="hidden-blocks">
    	<div class="row-fluid">
        	<h4><?php echo get_string('visibleadminonly', 'theme_lambda') ?></h4>
            <?php
                echo $OUTPUT->blocks('hidden-dock');
            ?>
    	</div>
	</div>
	<?php } ?>

	<a href="#top" class="back-to-top"><i class="fa fa-chevron-circle-up fa-3x"></i><span class="lambda-sr-only"><?php echo get_string('back'); ?></span></a>

	</div>
	<?php if ($CFG->version >= 2018120300) {echo $OUTPUT->standard_after_main_region_html();} ?>
	<footer id="page-footer" class="container-fluid">
		<?php require_once(dirname(__FILE__).'/includes/footer.php'); echo $OUTPUT->login_info();?>
	</footer>

	</div>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>

<!--[if lte IE 9]>
<script src="<?php echo $CFG->wwwroot;?>/theme/lambda/javascript/ie/iefix.js"></script>
<![endif]-->

<script>
<?php if ($hasslideshow) { ?>
	jQuery(function(){
		jQuery('#camera_wrap').camera({
			fx: '<?php echo $imgfx; ?>',
			height: '<?php echo $slideshow_height; ?>',
			loader: '<?php echo $loader; ?>',
			thumbnails: false,
			pagination: false,
			autoAdvance: <?php echo $advance; ?>,
			hover: false,
			navigationHover: <?php echo $navhover; ?>,
			mobileNavHover: <?php echo $navhover; ?>,
			opacityOnGrid: false
		});
	});
<?php } ?>

<?php if ($hascarousel) { ?>
	jQuery(document).ready(function(){
  		jQuery('.slider1').bxSlider({
			pager: false,
			nextSelector: '#slider-next',
			prevSelector: '#slider-prev',
			nextText: '>',
			prevText: '<',
			slideWidth: <?php echo $carousel_img_dim; ?>,
    		minSlides: 1,
    		maxSlides: 6,
			moveSlides: 1,
    		slideMargin: 10			
  		});
	});
<?php } ?>
</script>

</body>
</html>