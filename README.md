CARS-JSON
=========

This form is a test to convert from a .CSV file to JSON format and then into an array to display it in a dynamic form.

This form requires a .CSV file called all_vehicles.csv in the parent directory with the information about cars as follows: 

- Make
- Model
- Derivative  (Sub-Model)
- Index (concatenation of all 3 previous fields used to ensure no
duplication)

There is an example "index.php" of how to use the form; just add the script and the stylesheet in the header and call the 
form anywhere calling the following function with javascript: 

<script type="text/javascript" src="./cars_form.js"></script>
 

callig the form:
cars_form('form_container','destino','post'); 

where form_container is the ID of the div where the form is placed, destino is the name of the html page the form is
redirected and post is the method (get/post) of sending the data.
