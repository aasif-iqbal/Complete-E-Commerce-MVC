
<!-- Begin Page Content -->
<div class="container-fluid">
 

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Categories</h1>                     
    </div>

<!---------------------------Display Messages----------------------------> 	
<div class="col-md-12 mx-auto">
    <?php if($this->session->flashdata('delete_emp')) { ?>
    	<?php echo '<p class="alert alert-danger mt-3 text-center" id="delete">' 
          .$this->session->flashdata('delete_emp') . '</p>'; ?>
	  	<?php } $this->session->unset_userdata('delete_emp'); //unset session ?> 

      <?php if($this->session->flashdata('add_menu')) { ?>
    	<?php echo '
        <div class="alert alert-success mt-3 text-center alert-dismissible fade show" id="add" role="alert">' 
          .$this->session->flashdata('add_menu').'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></div>'; ?>
	  	<?php } $this->session->unset_userdata('add_menu');  //unset session ?> 
      
      <?php if($this->session->flashdata('update_emp')) { ?>
    	<?php echo '<p class="alert alert-info mt-3 text-center" id="update">'
          .$this->session->flashdata('update_emp') . '</p>'; ?>
	  	<?php } $this->session->unset_userdata('update_emp');  //unset session ?> 
      </div>
<!---------------------------Display Messages Ends----------------------------> 


     <!-- Area Chart -->
     <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown --> 
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add Categories</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <!-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div> -->
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
               
                <!--  -->
                <div class="card">
                    <div class="card-header">
                    <h6>Add Main Menu</h6> 
                    </div>
                        <div class="card-body">
                            <form class="row g-3" action="<?= base_url('Admin/Admin_Controller/getParentInfo'); ?>" method="POST">
                                            <div class="col-md-4">
                                            <label class="pt-2 pl-3">Add - at - Main - Menu (parent):</label>
                                                
                                            </div>
                                            <div class="col-md-4">
                                                
                                                <input type="text" class="form-control" name="parent_cat_name" id="" placeholder="Main-Menu" required>
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary mb-3">Add Parent</button>
                                            </div>
                                </form>
                        </div>
                    </div>
                    <!-- https://stackoverflow.com/questions/38081399/submit-drop-down-value-to-database-with-code-igniter -->
                    <div class="card mt-4">
                        <h6 class="card-header">Add Sub-Menu</h6>
                        <div class="card-body">
                    <!-- </?= var_dump($showParent); ?> -->
                    <form class="row g-3" action="<?= base_url('Admin/Admin_Controller/getChildInfo'); ?>" method="POST">
                        <div class="col-md-4">
                    
                        <select class="custom-select" id="parent_dd" name="fk_parent_id" onchange="enabledDropdown()">
                        <option value="0">Select - Main - Menu (parent)</option>
                        <?php foreach($showParent as $row): ?>
                        
                        <option value="<?= $row->parent_id; ?>"><?= $row->parent_category_name; ?></option>
                        <?php endforeach; ?>
                        
                        </select>
                 
                    </div>
                    <div class="col-md-4">                        
                        <input type="text" class="form-control" name="child_category_name" id="sub_menu_child" placeholder="Sub-menu-child" required disabled>
                    </div>
                    <div class="col-auto">
                        <button type="submit" id='child_btn' class="btn btn-primary mb-3" disabled>Add children</button>
                    </div>
                </form>


  </div>
</div>
               <!-- TABLE -->
                <hr>
              <?php
            //  echo("<pre/>");
            //   var_dump(($showParent)); 
              ?>
              <h2>Parent</h2>
               <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Parent-id</th>
                        <th scope="col">Menu</th>
               
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                        <tbody>
                            <?php foreach($showParent as $row): ?>
                                <?php 
                                    // if(isset($row->children)){
                                    // foreach($row->children as $child): 
                                    ?>
                        <tr>
                        <td><?= $row->parent_id; ?></td>                           
                            <td><?= $row->parent_category_name;  ?></td>
                            <td>
                                <!-- Edit -->
                                <a href="<?= base_url('edit-parent-category/').$row->parent_id; ?>" class="btn btn-primary">Edit</a> 
                                <!-- Delete -->
                                <a href="<?= base_url('delete-parent-category/').$row->parent_id;?>" ><button class="btn btn-danger" onClick='return doconfirm();'>Delete</button></a>
                            </td>
                        </tr>
                            <?php //endforeach;} ?>
                        <?php endforeach; ?>
                        
                         
                        </tbody>
                    </table>
               
                    <h2>Child</h2>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Parent-id</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Sub-Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                        <tbody>
                            <?php foreach($categories_all as $row): ?>
                                <?php 
                                    // if(isset($row->children)){
                                    // foreach($row->children as $child): 
                                    ?>
                        <tr>
                            <th scope="row"><?= $row->parent_id; ?></th>
                            <td><?= $row->parent_category_name; ?></td>
                            <td><?= $row->child_category_name;  ?></td>
                            <td>
                                <!-- Edit -->
                                <a href="<?= base_url('edit-child-category/').$row->child_id; ?>" class="btn btn-primary">Edit</a> 
                                <!-- Delete -->
                                <a href="<?= base_url('delete-child-category/').$row->child_id;?>" ><button class="btn btn-danger" onClick='return doconfirm();'>Delete</button></a>
                            </td>
                        </tr>
                            <?php //endforeach;} ?>
                        <?php endforeach; ?>             
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
    
function doconfirm()
{
    job = confirm("Are you sure to delete permanently?");
    // Job True will redirect to delete controller
    if(job!=true)
    {
        return false;
    }
}

function enabledDropdown()
{     
    
    var child_inputBox = document.getElementById('sub_menu_child');    
    var parent_dd = document.getElementById('parent_dd');
    var child_btn = document.getElementById('child_btn');

    console.log(parent_dd.value)
    if(parent_dd.value === '0'){
        
        child_inputBox.disabled = true;         
        child_btn.disabled = true;
    }else{
        child_inputBox.disabled = false;
        child_btn.disabled = false;
    }
    
    // alert('j')
}




/*
  $(document).ready(function() {    
    //hide message after 8sec
      var add    = document.getElementById("add");
      var update = document.getElementById("update");
      var delete_ = document.getElementById("delete");

      if(add){
            setTimeout(function() {
                add.style.display = 'none';
	        }, 8000);
        }
    if(update){
        setTimeout(function() {
            update.style.display = 'none';
            }, 4000);        
    }
    if(delete_){
        setTimeout(function() {
            delete_.style.display = 'none';
            }, 4000); 
    }   
});
*/
</script>
