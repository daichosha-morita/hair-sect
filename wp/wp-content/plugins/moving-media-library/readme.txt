=== Moving Media Library ===
Contributors: Katsushi Kawamori
Donate link: https://shop.riverforest-wp.info/donate/
Tags: media, media library, moving
Requires at least: 4.6
Requires PHP: 5.6
Tested up to: 6.0
Stable tag: 1.17
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Supports the transfer of Media Library between servers.

== Description ==

Supports the transfer of Media Library between servers.

= Export =
* Outputs the database as a JSON format file.
* Send the exported JSON file by e-mail.

= Import =
* It reads the exported JSON format file and outputs it to the database.
* Have the option to replace contents user IDs with the current user IDs.
* Have the option to replace all contents URLs.
* Have the option to replace all guid URLs.

= Maintain the following =
* ID
* user ID
* Date and time
* Folder structure
* File name
* File type
* File size
* Dimensions
* Thumbnails
* Exif data
* Alternative Text
* Caption
* Description
* Comments

= Sibling plugin =
* [Moving Users](https://wordpress.org/plugins/moving-users/).
* [Moving Contents](https://wordpress.org/plugins/moving-contents/).
* [Bulk Media Register](https://wordpress.org/plugins/bulk-media-register/).

== Installation ==

1. Upload `moving-media-library` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

none

== Screenshots ==

1. Export
2. Import

== Changelog ==

= 1.17 =
Fixed translation.

= 1.16 =
Added option to replace all guid URLs.

= 1.15 =
Added a link to the sibling plugin.
Export log optimization.
Send the exported JSON file by e-mail.

= 1.14 =
Enabled to output multiple JSON files.

= 1.13 =
Fixed translation.

= 1.12 =
Added the ability to specify the user ID when importing.
Added an option to convert URLs in the content when importing.

= 1.11 =
Fixed credit screen.

= 1.10 =
Added a note of caution.

= 1.09 =
Supported XAMPP.

= 1.08 =
Fixed an issue with database prefixes.

= 1.07 =
Fixed an issue with database prefixes.

= 1.06 =
Added a link to the [Bulk Media Register](https://wordpress.org/plugins/bulk-media-register/).

= 1.05 =
Fixed an issue with getting the date.

= 1.04 =
Fixed translation.

= 1.03 =
Fixed translation.

= 1.02 =
Fixed a problem with the JSON output of comments.

= 1.01 =
Fixed translation.

= 1.00 =
Initial release.

== Upgrade Notice ==

= 1.00 =
Initial release.
