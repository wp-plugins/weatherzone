=== WeatherZone Embed ===
Contributors: jamescollins, glenn-om4
Donate link: https://om4.com.au/wordpress-plugins/#donate
Tags: weatherzone, weather, australia, shortcode, wp, multisite, wpmu
Requires at least: 3.5
Tested up to: 4.2
Stable tag: 1.2.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows you to easily embed Australian weather data on your website. Supports both weather forecast and current weather observations buttons.

== Description ==

Allows you to easily embed Australian weather forecast and observation data on your website.

Data is provided in the form of a [WeatherZone.com.au button](http://www.weatherzone.com.au/about/freeweatherbutton.jsp). 

Supports both weather forecast and current weather observations buttons.

Requires no knowledge of JavaScript, and is compatible with WordPress Multisite.

To use this plugin, add a `[weatherzone]` shortcode to a page or text widget on your website:

eg. `[weatherzone mode="a" postcode="b" locality="c" showradar="d"]`

Description of parameters:

= mode =

Specifies which type of weather button to add.

Valid values for the `mode` parameter are:

* `currentweather`: (default)  Current Weather Observation button
* `forecast`: Weather forecast button

= postcode =
The postcode of your desired location to show weather data for.

Required: Yes

 = locality =
You may also add a `locality` parameter if you wish. This is recommended as it will ensure that your closest weather station is provided.

For example if you wanted the current weather for Wangaratta to appear in your page, your script call would look like this:

`[weatherzone mode="currentweather" postcode="6008" locality="Shenton Park"]`

where 6008 is the postcode for Shenton Park.

= showradar =
Whether or not to display a link to the weather radar below the weather button.

Valid values for the `showradar` parameter are:

* `true`: (default) Yes, display the link
* `false`: No, do not display the link

See the [WordPress WeatherZone Embed Plugin](https://om4.com.au/wordpress-plugins/weatherzone/) home page for further information.

== Installation ==

Installation of this plugin is simple:

1. Download the plugin files and copy to your Plugins directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Add a `[weatherzone]` shortcode to a page or text widget on your website. See the plugin description for a list of valid shortcode parameters/attributes.

== Frequently Asked Questions ==

= How do I add a weather button to my website? =

See the plugin's main description.

= Can I add a weather button to my sidebar =

Yes. As of v1.0.1, you can use the [weatherzone] shortcode in a text widget.
 

== Screenshots ==
1. Example current weather and forecast buttons/widgets

== Changelog ==

= 1.2.5 =
* WordPress 4.1 compatibility.
* Readme updates.

= 1.2.4 =
* WordPress 4.0 compatibility.
* Fix deprecated function warnings.
* Readme updates.

= 1.2.2 =
* WordPress 3.5 compatibility.

= 1.2.1 =
* WordPress 3.4 compatibility.
* Clarify license as GPLv2 or later.

= 1.2 =
* Translation/localization improvements.
* WordPress 3.2 compatibility.

= 1.1 =
* WordPress 3.1 compatibility.

= 1.0.1 =
* Add support for the [weatherzone] shortcode in sidebar text widgets
* WordPress 3.0.1 compatibility

= 1.0.0 =
* Initial release.

== Upgrade Notice == 

= 1.2.2 =
* WordPress 3.5 compatibility

= 1.2.1 =
* WordPress 3.4 compatibility, clarify license as GPLv2 or later.

= 1.2 =
* Translation/localization improvements and WordPress 3.2 compatibility.

= 1.1 =
* WordPress 3.1 compatibility.

= 1.0.1 =
* This version allows the [weatherzone] shortcode to be used in sidebar text widgets