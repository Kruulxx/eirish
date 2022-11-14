<?php

require_once('index.php');  


?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Datatable</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
 
</head>
<body>
 <div class="container" style="margin-top:50px;">    
    
             <div class="border-bottom my-3"></div> 
               <div> <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Filter Payroll
                </button>
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Print Payroll
                </button>
                </div>
   
        
       <div class="border-bottom my-3"></div>
          <table class="table table-hover">
                  <thead>
                      <tr>
                        <th>EMP ID</th>
                        <th>Name</th>
                        <th>Days</th>
                        <th>Rate</th>
                        <th>Overtime</th>
                        <th>Gross Salary</th>
                        <th>Deductions</th>
                         <th>Net Salary</th>
                      </tr>

                </thead>
            </table>  
           
   </div>
   <?php require_once('footer.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready( function () {
		$('.table').DataTable();
  });
  </script>

</body>
</html>