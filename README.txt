
After that work on payment gate, then work on the fact that users can make more than one product. But focus on one single 
product for now and get that perfect before expanding. 




toDo: 
Make it that when users change over or add pps plugin there values are saved in wp_options, 
thus, I don't have to constantly instatie obkjects to get information.

When I do this I should make it so that the text for the button automatically says Buy Now when created.  

Also, make it so the text field isn't imported anymore because it creates a redundancy.

It would be really good if I can switch all of the values of wp_ppsimple things into wp_options. 
It would be really good if I can switch all of the values of wp_ppsimple things into wp_options. 



This is how it should be refactored to =>

<?php
echo (!$starRatingOp) ? $starRatingCA : $starRatingOp 

?>



<input type="text" id="profile-picture" name="profile_picture" value="<?php  echo (!$imgURLValueOp) ? $imgURLValueCA : $imgURLValueOp ?>" />


text and description are the same thing(?)