<?php
require_once('categories_header.php');
// Retrieve and display products
$selquery="SELECT products.*,categories.categories FROM products,categories where products.categories_id=categories.id order by products.id desc";
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
      $update_status_sql="update products set status='$status' where id='$id'";
      $update_sql = $conn->prepare($update_status_sql);
      $update_sql->execute();
   }
}

//Delete any product
   $type=$_GET['type'];
   if($type=='delete')
   {
      $id=$_GET['id'];
      $delete_sql="delete from products where id='$id'";
      
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
                           <h4 class="">Products </h4>
                           <h6 ><a href="manage_products.php">Add Products</a> </h6>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>ID</th>
                                       <th>Categories</th>
                                       <th>Name</th>
                                       <th>Image</th>
                                       <th>MRP</th>
                                       <th>Price</th>
                                       <th>Qty</th>
                                       
                                    </tr>
                                 </thead>
                                 
                                 
                                 <?php
                                 echo'<tbody>';
                                    
                                 $i=1;
                                 foreach($result as $row)
                                 {
                                    
                                    if($row[12] == 1){
                                       //$proStatus = 'Active';
                                       echo '<tr>
                                          <td class="serial">2.</td>
                                          <td>'.$row[0].'</td>
                                          <td>'.$row[13].'</td>
                                          <td>'.$row[2].'</td>
                                          <td>'.'<img src="/media/products/">'.$row[6].'</img>'.'</td>
                                          <td>'.$row[3].'</td>
                                          <td>'.$row[4].'</td>
                                          <td>'.$row[5].'</td>
                                          <td>'.'<span class="badge badge-complete"><a href="?type=status&operation=deactive&id='.$row[0].'">Active</a></span>'.'</td>
                                          
                                       ';
                                       
                                        
                                    }else{
                                       //$proStatus = 'Deactive';
                                       echo '<tr>
                                          <td class="serial">2.</td>
                                          <td>'.$row[0].'</td>
                                          <td>'.$row[13].'</td>
                                          <td>'.$row[2].'</td>
                                          <td>'.'<img src="/media/products/">'.$row[6].'</img>'.'</td>
                                          <td>'.$row[3].'</td>
                                          <td>'.$row[4].'</td>
                                          <td>'.$row[5].'</td>
                                          <td>'.'<span class="badge badge-pending"><a href="?type=status&operation=active&id='.$row[0].'">Deactive</a></span>'.'</td>
                                          
                                       ';
                                    }

                                    echo'<td><span class="badge badge-edit"><a href="manage_products.php?id='.$row[0].'">Edit</a></span></td>';   
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
