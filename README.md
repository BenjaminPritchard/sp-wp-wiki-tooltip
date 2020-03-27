# Fork
This is a fork of WP Wiki Tool tip, which special support for https://spiritwiki.lightningpath.org/index.php/Main_Page

This fork only modifies the function ajax_get_wiki_page() which is in the file class.wp-wiki-tooltip-comm.php

ajax_get_wiki_page() is what is called from javascript when the user hovers over a term.

(where the term was encoded in the wordpress page like this, for example: [wiki base="SW"]Development[/wiki])

In that case, the new logic in ajax_get_wiki_page() will first call the LP API to get the definition:

http://api.lightningpath.org/v1/get_term.php?term=Development


in that case, the LP API will return JSON like this:

{
version     : 1,
status      : 1,
definition  : "The goal of human development is to create a healthy and fully functioning physical unit capable of seating high levels of Monadic Consciousness. The development process itself is much longer than currently understood, typically extending the entire lifespan.",
error_msg   : ""
}

and the definition above will appear in the pop-up. However, if no definition is available, then we will use the logic from the original plugin to use the media wiki API to get text from the current mediawiki page.

Definitions from the API are given preference if they are available because for most spirit wiki terms, the original logic in this plugin to create a pop-up from the mediawiki content doesn't work well; this is because of extraneous stuff above the actual definition, such as: 

{{template:connectionnav}}

To use this forked plugin,just download this whole thing into:

\wp-content\plugins\sp-wp-wiki-tooltip

then go to the config page for this plugin, and add a URL to use:

* Name: Spirit Wiki Article
* ID  : SW
* URL : https://spiritwiki.lightningpath.org/api.php

then inside of a page or post in WP, just embed short codes like this:

[wiki base="SW"]Development[/wiki]


# TODO
* Figure out exactly how much of the original plugin (name, etc.) to change, based on "best-practices" for creating a fork. Currently, it still has original name, etc. I don't think we want to incorporate our changes back into original plugin. I think it is better to just use this fork as our starting point for custom work from here on out. 
* Maybe consider changing logic in do_wiki_shortcode(). if we have a local copy (on the LP server) of the spirit wiki definitions, we can pregenerate all the pop-ups for the spirit wiki terms, which means they will pop straight up on hover, without having to call back to the server at all. What we have works fine for now, but it is slower than it needs to be
* Figure out how to version what we are doing, etc.

# Fork History
* Initial version 17-April-2019 by Ben


# WP Wiki Tooltip
Contributors: nida78

Tags: wiki, wikipedia, mediawiki, tooltip, tooltipster, shortcode

Requires at least: 3.0

Tested up to: 5.0.2

Stable tag: 1.9.0

Donate link: https://n1da.net/specials/wp-wiki-tooltip/spenden/

License: GPLv2 or later

Adds explaining tooltips querying their content from a MediaWiki installation, e.g. Wikipedia.org.

# Description

Adds explaining tooltips querying their content from a [MediaWiki](https://www.mediawiki.org "see MediaWiki docs") installation, e.g. [Wikipedia.org](https://www.wikipedia.org "see the well-known Wikipedia"). Therefore shortcodes can be used in Posts and Pages to mark keywords and link them to public Wiki pages. The well-known package of [Tooltipster](http://iamceege.github.io/tooltipster/ "Tooltipster rocks :)") is used to create the nice and themable tooltips.

Main features of the current version are:

* Setup at least one wanted Wiki base and several other options at a backend page
* Integrate the Wiki tooltip using shortcodes in Posts and Pages
* Shortcodes can be created by a [TinyMCE](https://codex.wordpress.org/TinyMCE) plugin

# Frequently Asked Questions

## Can I use any Wiki installation as base for my tooltips?

Sure, as long as the used installation provides an API structured like the [API of MediaWiki](https://www.mediawiki.org/wiki/API:Main_page "see API of MediaWiki") it will work perfectly. You can use one of the public Wikipedias or setup your own Wiki URL.

## Can I use several Wikis at the same time within my WordPress?

Since version 1.4.0 the plugin provides the opportunity to manage multiple Wiki URLs! The wanted Wiki can be chosen via an attribute in the shortcode.

## Am I able to style the links to Wiki pages in another way than all other links in the blog?

Yes, you can define extra CSS style properties that are used at all links to Wiki pages!

## Can I disable tooltips for mobile access?

Since version 1.7.0 you can define a minimum screen width that is necessary to show the tooltips!

## Can I use the content of a certain section instead the complete Wiki page?

Since version 1.9.0 you can request a section by its title (anchor) using an extra attribute of the shortcode (```section="anchor-of-section"```)!

# Installation

1. Upload the Wiki tooltip plugin to your blog,
2. Activate it,
3. Create at least one Wiki base and review the global options on the settings page
4. Add some shortcodes to your Posts and Pages, and
5. See nice and helpful tooltips where ever you like

# Screenshots

1. Options and Settings page: manage several Wiki URLs
2. Options and Settings page: set some options how to show tooltips
3. Options and Settings page: set some Error Handling options
4. Options and Settings page: set styling of tooltips
5. Options and Settings page: enable and style thumbnails
6. Integrate the plugin by shortcodes in Posts and Pages
7. Use the [TinyMCE](https://codex.wordpress.org/TinyMCE) plugin to get help by a popup form - also available in the Gutenberg Classic Block
8. See nice and helpful tooltips

# Changelog
The last three major releases are listed here, only. Find complete log of all changes in the [extra changelog file](https://github.com/nida78/wp-wiki-tooltip/blob/master/CHANGELOG.md)!

## [1.9.0 - C6H13NO2 | Isoleucine ]
*Release Date - January 1st, 2019*

* sections of Wiki pages can be used for tooltips, now (use shortcode attribute ```section="anchor-of-section"```)
* the used Tooltipster plugin is updated to its version 4.2.6
* a new option is available to set the animation how the tooltip appears
* the new JavaScript I18N Support was implemented for the Classic-Block of Gutenberg

## [1.8.0 - C6H9N3O2 | Histidine]
*Release Date - February 23rd, 2018*

* if tooltip trigger 'hover' is selected you can set explicitly how the link has to work
* special options for handling errors are available
* a new version of Tooltipster plugin was released that leads to some programmatic and design changes
* a preview for every tooltip designs is available at options page now

## [1.7.0 - C2H5NO2 | Glycine]
*Release Date - October 22nd, 2016*

* you can set if tooltips are triggered by click or hover
* a minimum screen width can defined that is necessary to enable tooltips

# Upgrade Notice

## General
You should review the settings page after every update

## Upgrade to 1.4.0
The former Wiki URL is not transferred into this version. Review the settings page after update to insert the wanted Wiki URL again!

## Elder Upgrades
Nothing special to consider.

[1.9.0 - C6H13NO2 | Isoleucine ]: https://github.com/nida78/wp-wiki-tooltip/releases/tag/1.9.0
[1.8.0 - C6H9N3O2 | Histidine]: https://github.com/nida78/wp-wiki-tooltip/releases/tag/1.8.0
[1.7.0 - C2H5NO2 | Glycine]: https://github.com/nida78/wp-wiki-tooltip/releases/tag/1.7.0
