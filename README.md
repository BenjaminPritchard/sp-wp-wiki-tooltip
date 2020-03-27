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

For more info on the original plugin please see

https://wordpress.org/plugins/wp-wiki-tooltip/
