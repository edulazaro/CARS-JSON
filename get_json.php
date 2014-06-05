<?php
//THis is the PHP file that generates the JSON to be readed by the script through a call with AJAX

$count=0;
$file = fopen('all_vehicles.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  $cars[$count]['make'] =$line[0];
  $cars[$count]['model'] =$line[1];
  $cars[$count]['derivative'] =$line[2]; 
  $cars[$count]['index'] =$line[3];  

  
	 $json_string[] = array('MAKE' => $line[0],
                   'MODEL' => $line[1],
                   'DERIVATE' => $line[2],
                   'INDEX' => $line[3],
        );  
  
  $count++;
}

fclose($file);

echo '' . json_encode($json_string) . '';

?>		





