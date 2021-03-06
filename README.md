SkinnerBase2.0 - Code Name "Meemo"
=====
First and foremost, it is important to note that the Meemo Theme is built upon Zurb Foundation's framework. It not only speeds up coding - for us developers - but includes many features that would otherwise be difficult to include such as modals.

#Features
##Responsive Theme (Breakpoints)
Features five different breakpoings, which are easily referred to as "small", "medium", "large", "xlarge" and "xxlarge".
Each breakpoint has been designed to work nicely with different sized devices:
1. The small breakpoint works well with mobiles.
2. The medium breakpoint works well with tablet devices (such as iPads), or e-readers like the Kindle, or netbooks.
3. The large breakpoint works well with laptops. Tested for laptops up to 15" screen sizes.
4. The xxlarge breakpoint works well with larger laptops, such as above 17" screen sizes. It also works great with smaller desktop screens (typical with older computers).
5. The xxlarge breakpoint is designed to work with wide screen desktops.
##Navigation
###Main Navigation
The theme consists of complex navigation code, that is designed to work fluidly with different sized devices.
For example, the small breakpoint consists of a singular navigation found at the top of the page. It is a mobile (touch) enabled navigation that will slide out from the left with menu links when pressed. This navigation can handle drop down menus.
Medium breakpoint features a different styled header navigation, that is designed to contain a certain number of links. This navigation can handle drop down menus.
For large, and above, breakpoints a secondary navigation menu is enabled as a "left sidebar". This sidebar *cannot* support drop downs. The header navigation is by default hidden for large and above.
###Pagination
Pagination has been enabled, using the famous "kriesi" pagination code. It allows you to adjust how many page numbers can seen, whether to include arrows representing more and less pages, and so on.
###Similar Posts
By default, wordpress does not have Jetpack plugin installed. I highly suggest it. One feature that is useful is the simliar posts navigation section found at the bottom of the post.
If you do not wish to install Jetpack, you can enable a home grown version by adding the following code to single.php and page.php:

<?php get_template_part( 'loop', 'related' ); ?>

##User Management
###Login, Register and Lost Password
Located in the header navigation bar.
When user logs into website, a small "Welcome *user*" message is displayed. This message checks if the user has defined a first name in their profile, else it refers to their username. For example, if a first name is displayed it might display "Welcome Kat". Else, it will refer to a username such as "Welcome Kat Skinner".
When logged in, users will have access to a button that allows them to update their profile on the website. By providing this option, are giving users the ability to provide you with more information that you might only be otherwise gained through surveys. A clear understanding of your users will let you provide better targetted content.

##Search Form and Results
This theme has a fully functional search form.
If results are found, they are counted and then listed with excerpts.
If results are not found, a serarch fail page is returned which gives the user the option to research, as well as lists the most common and latest posts/pages.

##Masonry Support For Posts
This theme utilizes the famous Masonry code to maximise "readibility" of the post pages. It removes any wasted "white" space between the posts, lining them up to display as many as possible in a visually appealing and effective manner.

##Jetpack Support
If you choose to use the plugin Jetpack, the theme has been tested with all the widgets to make sure that pleasing visual style and funcationality are 100% working.

#WooThemes Integration
##WooCommerce
###Shopping Cart

##Sensei Plugin