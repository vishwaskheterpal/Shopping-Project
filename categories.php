<?php
require_once('categories_header.php');
session_start();

// Retrieve and display categories
$selquery="SELECT * FROM categories order by id ";
$sth = $conn->prepare($selquery);
$sth->execute();
$result = $sth->fetchAll(\PDO::FETCH_NUM);

//Active to deactive and deactive to active
if(isset($_GET['type']) && $_GET['type']!=''){
   $type=$_GET['type'];
   if($type=='status'){
      $operation=$_GET['operation'];
      $id=$_GET['id'];
      if($operation=='active')
      {
         $status='1';
      }else
      {
         $status='0';
      }
      $update_status_sql="update categories set status='$status'where id='$id'";
      $update_sql = $conn->prepare($update_status_sql);
      $update_sql->execute();
      //date_default_timezone_set('Asia/Kolkata');
      //$updated_on= date('m/d/Y h:i:s a', time());
      //echo"$updated_on";
   }
}

//Delete any category
   $type=$_GET['type'];
   if($type=='delete')
   {
      $id=$_GET['id'];
      $delete_sql="delete from categories where id='$id'";
      
      $delete_sql = $conn->prepare($delete_sql);
      $delete_sql->execute();
   }


?>
         <div class="content pb-0">
            <div class="">                        
               <div class="">
                  <div class="">
                     <div class="">
                        <div class="">
                           <h4 class="">Categories </h4>
                           <h6 ><a href="manage_categories.php">Add Categories</a> </h6>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>ID</th>
                                       <th>Categories</th>
                                       <th>ParentId</th>
                                       <th>Created On</th>
                                       <th>Updated On</th>
                                       <th>Status</th>
                                       <th>Operation</th>

                                    </tr>
                                 </thead>
                                 <?php
                                
                                 echo'<tbody>';
                                    
                                 //echo"Creation time is: ". $created_on;
                                 //echo"Creation time is: ". $updated_on;
                                 foreach($result as $row)
                                 {
                                    
                                    if($row[3] == 1){
                                       //$catStatus = 'Active';
                                       echo '<tr>
                                          <td class="serial">2.</td>
                                          <td>'.$row[0].'</td>
                                          <td>'.$row[1].'</td>
                                          <td>'.$row[2].'</td>
                                          <td>'.$created_on.'</td>
                                          <td>'.$updated_on.'</td>
                                          <td>'.'<span class="badge badge-complete"><a href="?type=status&operation=deactive&id='.$row[0].'">Active</a></span>'.'</td>
                                          
                                       ';
                                       
                                        
                                    }else{
                                       //$catStatus = 'Deactive';
                                       echo '<tr>
                                          <td class="serial">2.</td>
                                          <td>'.$row[0].'</td>
                                          <td>'.$row[1].'</td>
                                          <td>'.$row[2].'</td>
                                          <td>'.$created_on.'</td>
                                          <td>'.$updated_on.'</td>
                                          <td>'.'<span class="badge badge-pending"><a href="?type=status&operation=active&id='.$row[0].'">Deactive</a></span>'.'</td>
                                          
                                       ';
                                    }

                                    echo'<td><span class="badge badge-edit"><a href="manage_categories.php?id='.$row[0].'">Edit</a></span></td>';   
                                    echo'</tr>';

                                    echo'<td><span class="badge badge-delete"><a href="?type=delete&id='.$row[0].'">Delete</a></span></td>';   
                                    echo'</tr>';
                                 }
                                 echo'</tbody>';
                                    ?>
                                 
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
<?php
require_once('categories_footer.php');
?>
