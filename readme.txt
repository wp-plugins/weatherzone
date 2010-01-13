=== WordPress WeatherZone Embed Plugin ===
Contributors: jamescollins, glenn-om4
Tags: weatherzone, weather, australia, shortcode, wp, wpmu
Requires at least: 2.8
Tested up to: 2.9.1
Stable tag: 1.0.0

Allows you to easily embed Australian weather data on your website. Supports both weather forecast and current weather observations buttons.

== Description ==

Allows you to easily embed Australian weather forecast and observation data on your website.

Data is provided in the form of a [WeatherZone.com.au button](http://www.weatherzone.com.au/about/freeweatherbutton.jsp). 

Supports both weather forecast and current weather observations buttons.

Requires no knowledge of JavaScript, and is compatible with both WordPress and WordPress MU (WPMU).

To use this plugin, add a `[weatherzone]` shortcode to a page on your website:

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

`[weatherzone mode="currentweather" postcode="3676" locality="wangaratta"]`

where 3676 is the postcode for Wangaratta.

= showradar =
Whether or not to display a link to the weather radar below the weather button.

Valid values for the `showradar` parameter are:

* `true`: (default) Yes, display the link
* `false`: No, do not display the link

== Installation ==

Installation of this plugin is simple:

1. Download the plugin files and copy to your Plugins directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Add a `[weatherzone]` shortcode to a page on your website. See the plugin description for a list of valid shortcode parameters/attributes.

== Frequently Asked Questions ==

= How do I add a weather button to my website? =

See the plugin's main description.
 

== Screenshots ==
1. Example current weather and forecast buttons/widgets

== Changelog ==

= v1.0.0 =

* Initial release.

== Upgrade Notice == 

= v1.0 =

Initial release.