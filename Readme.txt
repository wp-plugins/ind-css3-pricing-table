=== Plugin Name ===
Contributors: artheme
Donate link: http://ctuts.com/contact/
Tags: pricing table, css3, table, pricing, shortcode
Requires at least: 3.3
Tested up to: 3.8.1
Stable tag: 2.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

IND CSS3 Pricing Table 

== Description ==

Create unlimited pricing table in your Wordpress website with IND CSS3 Pricing Table plugin.

= Key Features =

- Unlimited colors: You could choose any color for your pricing table.
- Unlimited columns and rows
- Stylized with CSS3
- 3 different styles
- Dynamic width: You could specfy the width of your pricing table from admin area.
- Shortcode to locate your pricing table in any page you wish.
- Ribbons
- Use any font as you want.
- Hover style.
- Subscription period.

== Installation ==

Automatic installation through WordPress:

1. Log-in to your WordPress site.
2. Hover over Plugins and click Add New.
3. Under Search type in IND CSS3 Pricing Table, then click Search Plugins.
4. In the results page, click Install Now.
5. Once installed, click "Activate Plugin". You're done!

Manual installation:

1. Download plugin here http://wordpress.org/plugins/ind-css3-pricing-table
2. Extract file to the 'wp-content/plugins' folder.
3. Go to plugin manager in wordpress admin.
4. Find plugin named "IND Pricing Table".
5. Click "Activate" and you are done

If you need technical help not found on the site email me at admin@ctuts.com


== Frequently Asked Questions ==

= How to use IND CSS3 Pricing Table? =
- Go to "Create New Table"
- Fill up the available form.
*Parent column will be the first column that contains any feature's name. This is optional.
*Core columns are the columns those contains the plan name, price, features and button.
- To add column, click "Add Column" (red button).
- To remove column, click "Remove Column" button that will showed up after "Add Column" button when the available column is more than one.
- To add row, click the '+' button next to 'Feature' field.
- To remove row, click the 'x' button next to 'Feature' field.
- To sort 'Feature' field, click and hold '<^>' and move it to the place you want then drag. Please not that the feature can only be placed in the feature area.

= How do I change the color and width? =
You can specify the color and layout with the tool available in "Table Color and Layout" section (below the Cpre Columns section).

- BACKGROUND GRADIENT is the main table color.
This tool is to specify the color of your pricing table.
* "top" is the top color of table color gradient.
* "bottom" is the bottom color of table color gradient.

- FONT / TEXT
- Font Family - Type the font name to specify the font of your pricing table. Please do google search on how to add font to wordpress if you want to use your own font.
- text color: color of the text
- text shadow: h = horisontal shadow, v = vertical shadow, blur= shadow blur spread. Just type number in the form field, no need to use 'px'.

- Plan width:
The width of each column of "Core Columns"
* default width: is the width of the core columns before hover.
* hover width: is the width of the core columns when mouse is hovered above the column.
Just type number to specify the width, no need to use 'px'.
Please not that you should give proper width or it will make one of the column go under another columns.

- Button Style
You can use this tool to styling the button.
*button text color: color of the button's text.

- Gradient Default
is the button color before hover
*top: top color of the button gradient.
bottom: bottom color of the button gradient

- Gradient Hover
Button color when the mouse is hovered
*top: top color of the button gradient.
*bottom: bottom color of the button gradient.

Click Publish after you finish. and insert the shortcode in the page as you wish to display the pricing table.

= How To Preview The Table? =
There are currently no preview tool available for this plugin, so you need to place the shorcode to the page you wish and reload it each time you save any change created to your pricing table. You could create a test page for previewing.

= How to center the table position? =
To center the table, just use center tag with the shortcode (you need to do it with the html editor of wordpress post/ page editor to do this).
Example: <center>[ind_pricingtable id="1149"]</center>.

Please note that center tag will only work for the 'Core Columns' and does not affecting the "Parent Column". So it is not recommended to center the table with the center tag when you use "Parent Column" on your table. The best practice to center the table with "Parent Column" is by specifying margin-left of div#parenttable in the css file named indshow.css inside the "css" folder of this plugin.

= How to remove the "Parent Column"? =
Empty the "Text" field and delete each "Feature's Name" field after the first field of its sort by clicking the 'x' button next to it, then leave one field blank by deleting its content and then click "Update" button.

= What should I not do? =
Please do not do the following:
- Remove "Feature" or "Feature's Name" field when there are only one kind of its sort in the form. If it is happen, then just reload the table editor.

If you have another question/s regarding this wp plugin, then please post your question on the support forum.


== Screenshots ==

1. Default table style
2. Custom color
3. Hover style
4. Another Style hovered
5. Pricing table with custom font
6. 3 columns

== Changelog ==


= 2.2.1 - 02 March 2014 =
- Fixing broken Admin layout on Wordpress version 3.8.1.

= 2.2 - 16 February 2014 =
- Adding HTML input support for "Feature" field.

= 2.1 - 19 December 2013 =

= 2.0 - 19 September 2013 =
- Add color option for each column
- Fix saving problem

= 1.0 - 13 September 2013 =
Release notes.


== Upgrade Notice ==
- Add ability to differentiate color for each column on version 2.0.