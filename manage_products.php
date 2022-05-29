<?php
require_once('categories_header.php');
$msg = "";
$name = "";
$mrp = "";
$price = "";
$qty = "";
$image = "";
$short_desc = "";
$description = "";
$meta_title = "";
$meta_desc = "";
$meta_keyword = "";
$image_required = "required";

//edit product name

if(isset($_GET['id']) && $_GET['id']!='')
{
    $image_required = "";
    $id = $_GET['id'];
    $selectSql = "SELECT * FROM products where id = '$id'";
    $selectSql = $conn->prepare($selectSql);
    $selectSql->execute();
    $count = $selectSql->rowCount();
    if($count >0)
    {
        $result = $selectSql->fetch();
        //echo'<pre>';print_r($result);echo'</pre>';
        $categories_id = $result[categories_id];
        $name = $result[name];
        $mrp = $result[mrp];
        $price = $result[price];
        $qty = $result[qty];
        $short_desc = $result[short_desc];
        $description = $result[description];
        $meta_title = $result[meta_title];
        $meta_desc = $result[meta_desc];
        $meta_keyword = $result[meta_keyword];
    }
    else
    {
        
        header('location:products_admin.php');
        die();   
    }
}

// edit/add new category

if(isset($_POST['submit']))
{
    $categories_id = $_POST['categories_id'];
    $categories_id = trim($categories_id);
    $name = $_POST['name'];
    $name = trim($name);
    $mrp = $_POST['mrp'];
    $mrp = trim($mrp);
    $price = $_POST['price'];
    $price = trim($price);
    $qty = $_POST['qty'];
    $qty = trim($qty);
    $image = $_POST['image'];
    $short_desc = $_POST['short_desc'];
    $short_desc = trim($short_desc);
    $descripton = $_POST['descripton'];
    $descripton = trim($descripton);
    $meta_title = $_POST['meta_title'];
    $meta_title = trim($meta_title);
    $meta_desc = $_POST['meta_desc'];
    $meta_desc = trim($meta_desc);
    $meta_keyword = $_POST['meta_keyword'];
    $meta_keyword = trim($meta_keyword);
    $selectCatSql = "SELECT * FROM products where name = '$name'";
    $selectCatSql = $conn->prepare($selectCatSql);
    $selectCatSql->execute();
    $test = $selectCatSql->fetch();
    $check = $selectCatSql->rowCount();
    if($check > 0)
    {
         
        if(isset($_GET['id']) && $_GET['id']!='')
        {
            $result = $selectCatSql->fetch();
            $getId = $result[id];
            if($id==$getId)
            {

            }
            else
            {
                $msg = "Product already exists";
                
            }
            
        }
        
        else
        {
            $msg = "Product already exists";
            
            
        }
        
    }

    if($_FILES['image']['type'] !='image/jpg' && $_FILES['image']['type'] !='image/png' && $_FILES['image']['type'] !='image/jpeg')
    {
        $msg = "Please select only png , jpg and jpeg format";
    }
    
    if($msg == "")
    {
        
        if(isset($_GET['id']) && $_GET['id']!='')
        {
            if($_FILES['image']['name'] !=''){
                $updateSql = "UPDATE categories set categories_id = '$categories_id',name = '$name',mrp = '$mrp',price = '$price',qty = '$qty',short_desc = '$short_desc',description = '$description',meta_title = '$meta_title',meta_desc = '$meta_desc',meta_keyword = '$meta_keyword' ,image = '$image'  where id = '$id'";
            }
            else{
                $updateSql = "UPDATE categories set categories_id = '$categories_id',name = '$name',mrp = '$mrp',price = '$price',qty = '$qty',short_desc = '$short_desc',description = '$description',meta_title = '$meta_title',meta_desc = '$meta_desc',meta_keyword = '$meta_keyword'   where id = '$id'";

            }
            $updateSql = $conn->prepare($updateSql);
            $updateSql->execute();
            
        }
    

        else
        {
            $image = rand(1111111,9999999).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],'/media/product/'. $image);
            $sql = "insert into products(categories_id,name,mrp,price,qty,short_desc,description,meta_title,meta_desc,meta_keyword,status,image) values('".$categories_id."','".$name."','".$mrp."','".$price."','".$qty."','".$short_desc."','".$description."','".$meta_title."','".$meta_desc."','".$meta_keyword."','1','$image')";
            $sql = $conn->prepare($sql);
            $sql->execute();
            
            
        }
        header('location:products_admin.php');
        die();
    }
    
    
    
}


?>

    <div class="content pb-0">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Products</strong><small> Form</small>
                        </div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body card-block">
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Categories</label>
                                <select class = "form-control" name = "categories_id">
                                    <option>Select Category</option>
                                    <?php
                                    $sthquery = "SELECT id,categories FROM categories order by categories asc";
                                    $sthquery = $conn->prepare($sthquery);
                                    $sthquery->execute();
                                    
                                    while($row = $sthquery->fetch()){

                                        if($row['id']==$categories_id)
                                        {
                                            echo"<option selected value = ".$row['id'].">".$row['categories']."</option>";
                                        }
                                        else
                                        {
                                            echo"<option value = ".$row['id'].">".$row['categories']."</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <label for="name" class=" form-control-label">Product Name</label>
                                <input type="text" name="name" placeholder="Enter product name" class="form-control" value = "<?php echo $name?>"required ><br/>
                                <label for="mrp" class=" form-control-label">Product MRP</label>
                                <input type="text" name="mrp" placeholder="Enter MRP" class="form-control" value = "<?php echo $mrp?>"required ><br/>
                                <label for="price" class=" form-control-label">Product Price</label>
                                <input type="text" name="price" placeholder="Enter product price" class="form-control" value = "<?php echo $price?>"required ><br/>
                                <label for="qty" class=" form-control-label">Quantity</label>
                                <input type="text" name="qty" placeholder="Enter product quantity" class="form-control" value = "<?php echo $qty?>"required ><br/>
                                <label for="image" class=" form-control-label">Product Image</label>
                                <input type="file" name="image" " class="form-control" <?php echo $image_required?> ><br/><br/>
                                <label for="short_desc" class=" form-control-label">Short Description of Product</label>
                                <textarea name="short_desc" placeholder="Enter short description" class="form-control" required><?php echo $short_desc?></textarea><br/>
                                <label for="description" class=" form-control-label"> Description of Product</label>
                                <textarea name="description" placeholder="Enter  description" class="form-control" required><?php echo $description?></textarea><br/>
                                <label for="meta_title" class=" form-control-label"> Product Meta Title</label>
                                <textarea name="meta_title" placeholder="Enter  meta title" class="form-control" required><?php echo $meta_title?></textarea><br/>
                                <label for="meta_desc" class=" form-control-label">  Product Meta Description</label>
                                <textarea name="meta_desc" placeholder="Enter  meta description" class="form-control" required><?php echo $meta_desc?></textarea><br/>
                                <label for="meta_keyword" class=" form-control-label"> Product Meta Keyword</label>
                                <textarea name="meta_keyword" placeholder="Enter  meta keyword" class="form-control" required><?php echo $meta_keyword?></textarea><br/>
                            <button id="payment-button" name="submit" type="submit" class="form-group"><>
                            <span id="payment-button-amount">Submit</span>
                            </button>
                            <h6 style = 'color:red'><?php echo $msg?></h6>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require_once('categories_footer.php');
?>
