<?php
require_once('categories_header.php');
// Retrieve and display categories
$selquery="SELECT * FROM store_user order by id desc ";
$sth = $conn->prepare($selquery);
$sth->execute();
$result = $sth->fetchAll(\PDO::FETCH_NUM);



//Delete any category
   $type=$_GET['type'];
   if($type=='delete')
   {
      $id=$_GET['id'];
      $delete_sql="delete from store_user where id='$id'";
      
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
                           <h4 class="">Users </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>Mobile No.</th>
                                       <th>Email</th>
                                       <th>Usertype</th>
                                       <th>Delete</th>
                                    </tr>
                                 </thead>
                                 <?php
                                 echo'<tbody>';
                                    
                                 $i=1;
                                 foreach($result as $row)
                                 {
                                       echo '<tr>
                                          <td class="serial">2.</td>
                                          <td>'.$row[0].'</td>
                                          <td>'.$row[1].'</td>
                                          <td>'.$row[2].'</td>
                                          <td>'.$row[3].'</td>
                                          <td>'.$row[5].'</td>';
                                          
                                          
                                    

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
