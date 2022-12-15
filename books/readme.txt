=== Books ===
Contributors: Alwyn Barry
Tags: book, books, library
Requires at least: 4.1
Tested up to: 6.1.1
Stable tag: 0.1.0
License: GPLv2 or later

Books is a basic library of books database where each book has author, publisher and a category.

== Description ==

Books is a basic library of books database where each book has author, publisher and a category.
The goal is to provide a simple way to show a list of books (optionally by category).


Current features include:

* Shortcode with a list books (optionally by category).
* Simple and clean admin interface that integrates seamlessly into WordPress admin.
* Localization. Own languages can be added very easily through [GlotPress](https://translate.wordpress.org/projects/wp-plugins/books).

= Support =

If you have a problem or a feature request, please send a message to the author.


= Demo =

Currently there is no demo site


= Contributions =


== Installation ==

= Installation =

* Install the plugin through the admin page "Plugins".
* Alternatively, unpack and upload the contents of the zipfile to your '/wp-content/plugins/' directory.
* Activate the plugin through the 'Plugins' menu in WordPress.
* Place the shortcode '[books]' in a page.
* Add new Books, Authors, Publishers through the admin menus.

= License =

The plugin itself is released under the GNU General Public License. A copy of this license can be found at the license homepage or in the simple-prayer-diary.php file at the top.


== Frequently Asked Questions ==

= I only want to show books in the simple list from a category. =

You can use a shortcode parameter for showing events only from certain categories:

	[books category="Fiction,Children"]

= I want to limit the number of books in the shortcode. =

You can use a shortcode parameter for showing a limited number of books:

	[books posts_per_page="5"]


== Screenshots ==

None as yet


== Changelog ==

= 0.1.0 =
* 2022-12-14
* Initial release.
