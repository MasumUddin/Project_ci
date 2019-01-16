 <h2>Student List</h2>
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
      <th>Name</th>
      <th>Dep</th>
      <th>Roll</th>
      <th>Reg</th>
      <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 0;
    foreach ($studentdata as $sdata) {
      $i++;

    ?>
    <tr>
      <td><?php echo$i;?></td>
      <td><?php echo $sdata->name;?></td>
       <td><?php echo $sdata->dep;?></td>
        <td><?php echo $sdata->roll;?></td>
         <td><?php echo $sdata->reg;?></td>
      
      <td>
          <a href="<?php echo base_url();?>student/editstudent/<?php echo $sdata->sid;?>"><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are you ready to remove this?');" href="<?php echo base_url();?>student/delstudent/<?php echo $sdata->sid;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
  <?php }?>
    
  </tbody>
</table>
