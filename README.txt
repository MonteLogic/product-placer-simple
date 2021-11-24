

Integrate this into the widgets.php

https://gist.github.com/dchavours/99b8999a69fd920a8b38b34da20a5e30



Current milestone 001d -
I have to make all of the fields be able to be updated and also have to style the widget. 

After that work on payment gate, then work on the fact that users can make more than one product. But focus on one single 
product for now and get that perfect before expanding. 



Right now: 
Making fields changable through the admin side. 


toDo: 
Make it so thhat the replace button actually sends logic to change the value of $picture which is: 
'$picture =  Read_Table_Data::display_table_pps_values()->product_picture_var;'


I just noticed that none of the values change at all after Save Changes is pressed. So I guess I have to register all of them
with the Settings API