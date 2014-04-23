=== Userpro Member Carousel Widget ===
Contributors: donrado
Donate link: 
Tags: userpro, member carousel, vertical carousel widget, user carousel widget, userpro member listing carousel
Requires at least: 3.0.1
Tested up to: 3.8
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Use Userpro Member Directory Listing in a widget and turn it into a jquery responsive carousel, all depending on your own settings or Userpro shortcode

== Description ==

Use Userpro Member Directory Listing in a widget and turn it into a jquery responsive carousel, all depending on your 
own settings.

You need the Userpro - User Profiles for WordPress - plugin for this to work: 
http://bit.ly/userpro

Uses responsive BXSlider - http://bxslider.com / Released under the MIT license - http://opensource.org/licenses/MIT
Written by Steven Wanderski - http://stevenwanderski.com

== Installation ==

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add the custom members template to your active template folder, found in the "copy-to-theme" folder.
Make a separate userpro-folder to override the standard template. ( wp-content/themes/your-theme/userpro ) For now only the avatar image size is used to give the memberslist a unique css class to target.
4. Go to Widgets and add the Userpro Member Carousel widget 
5. Use your shortcode of chose or, for a single vertical memberlist of avatars use :

[userpro template=memberlist memberlist_v2=0 memberlist_pic_size=100 memberlist_pic_topspace=0 memberlist_pic_sidespace=0 memberlist_pic_rounded=1 memberlist_paginate=0 memberlist_show_name=1 memberlist_popup_view=0 memberlist_withavatar=0 search=0 per_page=60 memberlist_width=100%]

Make sure that the memberlist_pic_size=XXX value is unique. If it's the same as for other memberlists, they also will be transformed into carousels. I don't think that's wishfull :)

See http://userproplugin.com/userpro/docs/#shortcode_memberlist for more options.
		 
6. Adjust the settings as needed/wished and you're good to go..

7. Target css by default is : div.userpro-body.userpro-body-nopad.100
Where 100 is your avatar size. For example: memberlist_pic_size=100

To get the single column vertical effect i added 

/** for Userpro Single column vertical Carousel */
div.userpro-user {
float: left;
clear: both;
}

to the css file found in assets -> css folder.

8. Adjust Slider Controls. Default is :
    mode: 'vertical',
    slideWidth: 200,
    minSlides: 1,
    slideMargin: 10,
    controls: false,
    auto: true,
    autoStart: true,
    pause:3000,
    autoHover:true,
    pager:false

See http://bxslider.com for more control options.Or read the readme.md file in the assets/js folder.

1. Adjust css to match your design or wishes. Found in plugin folder in the subfolder assets -> css.
Or override in your custom.css/style.css file..


== Frequently Asked Questions ==



== Screenshots ==

1. description screenshot-1.png.
2. description screenshot-2.png.

== Changelog ==


2014-04-22 - 1.0
*First Release