<?php
// Load the database configuration file
include_once 'config.php';

if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $emp_id   = $line[0];
                $name  = $line[1];
                $time_in  = $line[2];
                $time_out = $line[3];
                $date = $line[4];
                $no_hours = $line[5];
                
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT id FROM attendance WHERE emp_id = '".$line[1]."'";
                $prevResult = $link->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $link->query("UPDATE attendance SET emp_id = '".$emp_id."', name = '".$name."', time_in = '".$time_in."', time_out = '".$time_out."', date = '".$date."',no_hours = '".$no_hours."',  WHERE emp_id = '".$emp_id."'");
                }else{
                    // Insert member data in the database
                    $link->query("INSERT INTO attendance (emp_id, name, time_in, time_out, date, no_hours) VALUES ('".$emp_id."', '".$name."', '".$time_in."', '".$time_out."', '".$date."', '".$no_hours."')");
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

// Redirect to the listing page
header("Location: attendance.php".$qstring);