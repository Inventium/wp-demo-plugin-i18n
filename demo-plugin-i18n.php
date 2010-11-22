<?php
/*
 Plugin Name: Demo Plugin i18n
 Plugin URI: http://website-in-a-weekend.net/plugins
 Description: Very concise example of i18n implementation.
 Version: 0.1
 Author: Dave Doolin
 Author URI: http://website-in-a-weekend.net/plugins
 */

/*  
 Copyright 2009  Dave Doolin  (email : david.doolin@gmail.com)

MIT License

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
 */


if (!defined('WP_CONTENT_URL'))
define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');

// Technique copied from Joost de Valk sociable plugin
$dpipluginpath = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/';

if (!class_exists("demo_plugin_i18n")) {

    class demo_plugin_i18n {

        function demo_plugin_i18n() {
            register_activation_hook(__FILE__,array($plugin_class, 'activate_i18n'));
            add_action('admin_menu', array ( & $this, 'on_admin_menu'));
			add_action('init', array(&$this,'activate_translations'),10);
        }

        // Empty, placeholder
        function activate_i18n() {
        }

        function activate_translations() {
	        global $dpipluginpath;
            load_plugin_textdomain('dpi', $dpipluginpath.'/lang', 'demo-plugin-i18n/lang');
        }


        function on_admin_menu() {
            add_options_page(__('Demo i18n Page','dpi'), __('Demo i18n','dpi'), 8, __FILE__ ,array(& $this, 'i18n_options'));
        }
		
		function i18n_options() {
	        global $dpipluginpath;			
?>
<div class="wrap">
	<h2>
        <?php _e("Let's get on with it!",'dpi') ?>
    </h2>
</div>
<?php						
		}
    }	
}
									
$wpdpd = new demo_plugin_i18n();
?>
