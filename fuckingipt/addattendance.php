<?php
    include "config.php";
?>

<div class="modal fade" id="add-attendance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Employee Attendance</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-label">Employee</label>
                        <select name="employee"  required="true" class="form-control">
                              <option  value="" class="text-muted">Select Employee</option>

                              <?php 
                              $pos = "SELECT `id`, `name` FROM `employee`;";
                              $res = mysqli_query($link, $pos);
                              while($row = mysqli_fetch_assoc($res)){

                              ?>
                              
                              <option value="<?php echo $row['id']  ?>"><?php echo $row['name']  ?></option>
                            <?php } ?>
                          </select>
                      </div>
        </div>
      
         <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
           <button name="save" type="submit" class="btn btn-dark">Save</button>
         </div>
    </div>
  </div>
</div>

<?php require_once('scripts.php'); ?>
