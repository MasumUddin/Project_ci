            <h2>Edit Department</h2>
			<hr/>
        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url();?>department/updateDepartment" method="post">
                  <input type="hidden" name="depid" value="<?php echo $depById->depid;?>" class="form-control span12">
                <div class="form-group">
                    <label>Update Department Name</label>
                    <input type="text" name="depname" value="<?php echo $depById->depname;?>" class="form-control span12">
                </div>
                 <div class="form-group">
                    <label>Update Area</label>
                    <input type="text" name="deparea" value="<?php echo $depById->deparea;?>" class="form-control span12">
                </div>
                 <div class="form-group">
                    <label>Update Code</label>
                    <input type="text" name="depcode" value="<?php echo $depById->depcode;?>" class="form-control span12">
                </div>
              
                <div class="form-group">
				<input type="submit"class="btn btn-primary" value="Submit"> 
                </div>
                   
            </form>
        </div>			