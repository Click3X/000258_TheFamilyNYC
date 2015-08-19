<?php
/*
Plugin Name: Remember Attachment Link Preferences
Plugin URI: http://www.ilfilosofo.com/blog/2007/10/30/remember-attach-prefs/
Description: Remembers your attachment "Show:" and "Link to:" preferences, so that you don't have to re-select the same ones repeatedly.
Version: 1.0
Author: Austin Matzko
Author URI: http://www.ilfilosofo.com/
*/

/*  Copyright 2007  Austin Matzko  (email : if.website at gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

class filosofo_upload_prefs {
 		
	function filosofo_upload_prefs() {
		add_action('admin_print_scripts', array(&$this, 'admin_header'));
	}

	function admin_header() {
		global $wpdb;
		?>
		<script type="text/javascript">
 		//<![CDATA[
		(function () {

			var aE = function( o, t, f ) {
				if (o.addEventListener)
					o.addEventListener(t, f, false);
				else if (o.attachEvent) 
					o.attachEvent('on' + t, f);
			}

			// cookie retrieval adapted from ppk's at http://www.quirksmode.org/js/cookies.html
			var cookieVal = function(n) {
				n += "=";
				var ca = document.cookie.split(';');
				for(var i=0;i < ca.length;i++) {
					var c = ca[i];
					while (c.charAt(0)==' ') c = c.substring(1,c.length);
					if (c.indexOf(n) == 0) return c.substring(n.length,c.length);
				}
				return null;
			}

			var assignSelect = function(itemID, itemType) {
				if (document.getElementById(itemID)) {
					var item = document.getElementById(itemID);
					// check for existing cookie setting
					if ( cookieVal(itemType) == itemID ) 
						item.checked = true;
					aE(item, 'click', function() {
						// set cookie
						var date = new Date();
						date.setTime(date.getTime()+(86400000000));
						document.cookie = itemType+"="+itemID+"; expires="+date.toGMTString()+"; path=/";
					});
				}
			}

			var options = {	'<?php echo $wpdb->prefix ?>upload-display' : ['display-full', 'display-thumb', 'display-title'],
					'<?php echo $wpdb->prefix ?>upload-link' : ['link-file', 'link-none', 'link-page']};

			var init = function() {
				// redefine WP method to call init after creating thumbnail image view
				if ( 'undefined' != typeof theFileList ) {
					theFileList.v = theFileList.imageView;
					theFileList.imageView = function(id, e) {
						theFileList.v(id, e);
						init();
					}
				}
				for ( var k in options ) 
					for ( var i = 0; i < options[k].length; i++ )
						assignSelect(options[k][i],k);
			}

			aE(window, 'load', init);

		}).call(this);
		//]]>
		</script>
		<?php 
	}

} // end class 

$filosofo_upload_prefs = new filosofo_upload_prefs();
