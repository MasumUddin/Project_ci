 <h2>Department List</h2>
			<hr/>
       <?php
            $msg = $this->session->flashdata('msg');
      
            if (isset($msg)) {
                echo $msg ;
                }
             ?>
<table class="table">
  <thead>
    <tr>
      <th>No.</th>
      <th>DepName</th>
      <th>DepArea</th>
      <th>DepCode</th>
      <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 0;
    foreach ($depdata as $data) {
      $i++;

    ?>
    <tr>
      <td><?php echo$i;?></td>
      <td><?php echo $data->depname;?></td>
       <td><?php echo $data->deparea;?></td>
        <td><?php echo $data->depcode;?></td>
      
      <td>
          <a href="<?php echo base_url();?>department/editdepartment/<?php echo $data->depid;?>"><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are you ready to remove this?');" href="<?php echo base_url();?>student/deldepartment/<?php echo $data->depid;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
  <?php }?>  
  </tbody>
</table>
