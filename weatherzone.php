<?php
/*
Plugin Name: WeatherZone Embed
Plugin URI: http://om4.com.au/wordpress-plugins/weatherzone/
Description: Allows you to embed WeatherZone.com.au weather buttons on your site. Supports both weather forecast and current weather observations buttons.
Version: 1.2.1
Author: OM4
Author URI: http://om4.com.au/
Text Domain: om4-weatherzone
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/*  Copyright 2009-2012 OM4 (email : info@om4.com.au)

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
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


class OM4_WeatherZone {
	
	var $version = '1.2.1';
	
	var $dbVersion = 1;
	
	var $installedVersion;
	
	var $dirname;
	
	var $url;
	
	var $optionName = 'om4_weatherzone_db_version';
	
	static $number = 1;
	
	/**
	 * Constructor
	 *
	 */
	function OM4_WeatherZone() {
		
		// Store the name of the directory that this plugin is installed in
		$this->dirname = str_replace('/weatherzone.php', '', plugin_basename(__FILE__));
		
		$this->url = plugins_url('weatherzone/');

		register_activation_hook(__FILE__, array(&$this, 'Activate'));
		
		add_action('init', array(&$this, 'LoadDomain'));
		
		add_action('init', array(&$this, 'CheckVersion'));
		
		add_action('init', array(&$this, 'RegisterShortcode'));

		$this->installedVersion = intval(get_option($this->optionName));
	}
	
	/**
	 * Intialise I18n
	 *
	 */
	function LoadDomain() {
		load_plugin_textdomain('om4-weatherzone', WP_PLUGIN_DIR.'/'.dirname(plugin_basename(__FILE__)));
	}
	
	/**
	 * Plugin Activation Tasks
	 *
	 */
	function Activate() {
		// There aren't really any installation tasks at the moment
		if (!$this->installedVersion) {
			$this->installedVersion = $this->dbVersion;
			$this->SaveInstalledVersion();
		}
	}
	
	/**
	 * Performs any upgrade tasks if required
	 *
	 */
	function CheckVersion() {
		if ($this->installedVersion != $this->dbVersion) {
			// Upgrade tasks
			if ($this->installedVersion == 0) {
				$this->installedVersion++;
			}
			$this->SaveInstalledVersion();
		}
	}
	
	/**
	 * Register the [weatherzone] shortcode
	 */
	function RegisterShortcode() {
		add_shortcode('weatherzone', array(&$this, 'ShortcodeHandler'));
		
		// Parse shortcodes in text widgets
		// Required until http://core.trac.wordpress.org/ticket/10457 is committed
		add_filter('widget_text', 'do_shortcode');
	}
	
	
	/**
	 * [weatherzone] shortcode handler
	 */
	function ShortcodeHandler($atts, $content = null) {
	
		// List of supported shortcode attributes and their default values
		$defaults = array(
			'mode' => 'currentweather',
			'postcode' => '',
			'locality' => '',
			'showradar' => 'true'
		);
		
		// Combine the specified attributes with the default values
		$atts = shortcode_atts( $defaults, $atts);
		
		// Valid values for each parameter
		$validValues['mode'] = array('currentweather', 'forecast');
		$validValues['showradar'] = array('true', 'false');
		
		// Validate each of the parameters
		foreach ($atts as $key => $value) {
			if (isset($validValues[$key])) {
				if (!in_array($value, $validValues[$key])) {
				    unset($atts[$key]);
				}
			} else {
				$atts[$key] = esc_attr($value);
			}
		}
		
		// Ensure the required parameters have been specified
		if (!strlen($atts['mode'])) return;
		if (!strlen($atts['postcode'])) return;
		if (!strlen($atts['showradar'])) return;
		
		$html = '<div id="weatherzone_' . self::$number . '" class="weatherzone ' . $atts['mode'] . '">';

		switch ($atts['mode']) {
			case 'currentweather':
				$params = urlencode($atts['postcode']);
				if (!empty($atts['locality'])) {
					$params .= '&locality=' . urlencode($atts['locality']);
				}
				
				$html .= <<<EOD
<!--Weatherzone current weather button-->
<script type="text/javascript" src="http://www.weatherzone.com.au/woys/graphic_current.jsp?postcode=$params"></script>
EOD;
                if ($atts['showradar'] === 'true') {
                	$html .= <<<EOD
<br /><a href="http://www.weatherzone.com.au/radar.jsp">weather radar</a>
EOD;
                }
                $html .= <<<EOD
<!--end Weatherzone current weather button-->
EOD;
                break;
			
            case 'forecast':
				$params = urlencode($atts['postcode']);
                if (!empty($atts['locality'])) {
                    $params .= '&locality=' . urlencode($atts['locality']);
                }
                
                $html .= <<<EOD
<!--Weatherzone forecast button-->
<script type="text/javascript" src="http://www.weatherzone.com.au/woys/graphic_forecast.jsp?postcode=$params"></script>
EOD;
                if ($atts['showradar'] === 'true') {
                    $html .= <<<EOD
<br /><a href="http://www.weatherzone.com.au/radar.jsp">weather radar</a>
EOD;
                }
                $html .= <<<EOD
<!--end Weatherzone forecast button-->
EOD;
				break;
		}
		
		$html .= '</div>';
		
		self::$number++;
		
		return $html;
	}
	

	function SaveInstalledVersion() {
		update_option($this->optionName, $this->installedVersion);
	}
}

if(defined('ABSPATH') && defined('WPINC')) {
	if (!isset($GLOBALS["om4_WeatherZone"])) {
		$GLOBALS["om4_WeatherZone"] = new OM4_WeatherZone();
	}
}

?>