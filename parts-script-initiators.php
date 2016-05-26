<!--
Non-Foundation js
-->
<!***********ALL PAGES**************>  
<script src="<?php echo get_template_directory_uri() ?>/assets/js/foundation.min.js"></script> 
<script src="<?php echo get_template_directory_uri() ?>/assets/js/vendor/app-min.js"></script> 
<script src="<?php echo get_template_directory_uri() ?>/assets/js/vendor/offcanvas.js"></script>

<!**********TABLET/MOBILE MENUS**************>  
<?php if(is_tablet()) {  ?>
		<script>
			jQuery(document).ready(function () {
			    jQuery('#main_nav').meanmenu({meanScreenWidth: "767"});
			});
		</script>
		<style>#search-bar {margin-top:50px;}</style>
<?php } else { ?>
	<script>
		jQuery(document).ready(function () {
		    jQuery('#main_nav').meanmenu();
		});
	</script>
<?php } ?>

<!***********DIRECTORY**************>
<?php $theme_option = flagship_sub_get_global_options();
if ( is_page_template( 'template-people-directory.php' ) && $theme_option['flagship_sub_directory_search']  == '1' )  { ?>
  	<script src="<?php echo get_template_directory_uri() ?>/assets/js/vendor/min.page.directory.js"></script>
  	<script>
	    var $j = jQuery.noConflict();
	    $j(window).load(function() {
	        var filterFromQuerystring = getParameterByName('filter');
	        $j('.filter a[data-filter=".' + filterFromQuerystring  + '"]').click();
	    });
	</script>

	
<!***********DIRECTORY**************>
<?php } 
if ( is_page_template( 'template-courses-undergrad.php' ) || is_page_template( 'template-courses-all.php' ))   { ?>
  	<script src="<?php echo get_template_directory_uri() ?>/assets/js/vendor/page.courses-min.js"></script>


<!***********SINGLE ITEMS (NEWS & PEOPLE_**************>
<?php } if (is_page_template('template-program-people.php')) { ?>
	
  	<script src="<?php echo get_template_directory_uri() ?>/assets/js/vendor/min.page.directory.js"></script>
<? } 
	$about_id = ksas_get_page_id('about');
	$archive_id = ksas_get_page_id('archive');
	$people_id = ksas_get_page_id('people');
	$faculty_id = ksas_get_page_id('faculty');
?>
<?php if (  is_singular('post') ) { ?>
	<script>
		var $j = jQuery.noConflict();
		$j(document).ready(function(){
			$j('li.page-id-<?php echo $about_id; ?>').addClass('current_page_ancestor');
			$j('li.page-id-<?php echo $archive_id; ?>').addClass('current_page_parent');
			});
	</script>
<?php } ?>

<?php if ( is_singular('people') ) { ?>
	<script>
		var $k = jQuery.noConflict();
		$k(document).ready(function(){
			$k('li.page-id-<?php echo $people_id; ?>').addClass('current_page_ancestor');
			$k('li.page-id-<?php echo $faculty_id; ?>').addClass('current_page_parent');
			});
	</script>
<?php } ?>

<!***********EVENT CALENDAR**************>
<?php if ( is_page_template( 'template-calendar.php' ))  { $theme_option = flagship_sub_get_global_options(); ?>   				
	<script src="<?php echo get_template_directory_uri() ?>/assets/js/vendor/min.easyXDM.js"></script>
	<?php $calendar_url = $theme_option['flagship_sub_calendar_address'];
		$url_for_script = "http://krieger.jhu.edu/calendar/calendar_holder.html?url=" . $calendar_url . "/"; ?>

				<script>
				    new easyXDM.Socket({
				        remote: "<?php echo $url_for_script; ?>",
				        container: document.getElementById("calendar_container"),
				        onMessage: function(message, origin){
				            this.container.getElementsByTagName("iframe")[0].style.height = message + "px";
				            this.container.getElementsByTagName("iframe")[0].style.width = "100%";
				        }
				    });
				</script>

<?php } ?>

<!***********EVENT CALENDAR - MOBILE**************>
<?php if ( is_page_template( 'template-calendar-mobile.php' ))  { $theme_option = flagship_sub_get_global_options(); ?>   				
	<script src="<?php echo get_template_directory_uri() ?>/assets/js/vendor/min.easyXDM.js"></script>
	<?php $calendar_url = $theme_option['flagship_sub_calendar_address'];
		$url_for_script = "http://krieger.jhu.edu/calendar/calendar_holder.html?url=" . $calendar_url . "/list/bymonth"; ?>

				<script>
				    new easyXDM.Socket({
				        remote: "<?php echo $url_for_script; ?>",
				        container: document.getElementById("calendar_container"),
				        onMessage: function(message, origin){
				            this.container.getElementsByTagName("iframe")[0].style.height = message + "px";
				            this.container.getElementsByTagName("iframe")[0].style.width = "100%";
				        }
				    });
				    var $j = jQuery.noConflict();
				    $j('td.SECalendarNoEvent').prev('td.SECalendarEventDate').css('display', 'none');
				</script>

<?php } ?>

<!***********FULL WIDTH IMAGES**************>

<script src="<?php echo get_template_directory_uri() ?>/assets/js/vendor/jquery.backstretch.min.js"></script>


<script>
jQuery.noConflict();
jQuery(document).foundation();
</script>