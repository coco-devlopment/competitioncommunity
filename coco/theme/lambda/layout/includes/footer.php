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
$footerl = 'footer-left';
$footerm = 'footer-middle';
$footerr = 'footer-right';

$hasfootnote = (empty($PAGE->theme->settings->footnote)) ? false : $PAGE->theme->settings->footnote;
$hasfooterleft = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('footer-left', $OUTPUT));
$hasfootermiddle = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('footer-middle', $OUTPUT));
$hasfooterright = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('footer-right', $OUTPUT));

?>
	<div class="row-fluid">
		<?php
            		echo $OUTPUT->footerblocks($footerl, 'span4');

            		echo $OUTPUT->footerblocks($footerm, 'span4');

            		echo $OUTPUT->footerblocks($footerr, 'span4');
		?>
 	</div>

	<div class="footerlinks">
    	<div class="row-fluid">
    		<p class="helplink"><?php echo page_doc_link(get_string('moodledocslink')); ?></p>
    		<?php if ($hasfootnote) {
				$footnote_HTML = format_text($hasfootnote,FORMAT_HTML);
        		echo '<div class="footnote">'.$footnote_HTML.'</div>';
    		} ?>
		</div>
        
        <?php if($PAGE->theme->settings->socials_position==0) { ?>
    		<?php require_once(dirname(__FILE__).'/socials.php');?>
    	<?php
		} ?>
        
   	</div>

<script type="text/javascript" src="http://13.232.81.166/theme/lambda/jquery/custom.js"></script>

<script type="text/javascript">
    //--- Script start for numeric validation ---//
    $(function() {
        $(document).on('keydown', '.num-validate', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,116,190])||(/65|67|86|88/.test(e.keyCode)&&(e.ctrlKey===true||e.metaKey===true))&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});

        // Disable Ctrl+x, ctrl+c and ctrl+v for non-numeric
        $('.num-validate').on('keypress input', function() {
            var value = $(this).val();
            value = value.replace(/\D+/, ''); // removes any non-number char
            $(this).val(value);
        });
    });
    //--- Script end for numeric validation ---// 
</script>