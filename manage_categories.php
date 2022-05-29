<?php
require_once('categories_header.php');
session_start();
date_default_timezone_set('Asia/Kolkata');
$msg = "";

//edit categoy name

if(isset($_GET['id']) && $_GET['id']!='')
{
    $id = $_GET['id'];
    $selectSql = "SELECT * FROM categories where id = '$id'";
    $selectSql = $conn->prepare($selectSql);
    $selectSql->execute();
    $count = $selectSql->rowCount();
    if($count >0)
    {
        
        $result = $selectSql->fetch();
        $categories = $result[categories];
    }
    else
    {
        
        header('location:categories.php');
        die();   
    }
}

// edit/add new category

if(isset($_POST['submit']))
{
    $categories = $_POST['categories'];
    $categories = trim($categories);
    $selectCatSql = "SELECT * FROM categories where categories = '$categories'";
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
                $msg = "Category already exists";
                
            }
            
        }
        
        else
        {
            $msg = "Category already exists";
            
            
        }
        
    }
    
    if($msg == "")
    {
        
        if(isset($_GET['id']) && $_GET['id']!='')
        {
            $updateSql = "UPDATE categories set categories = '$categories'   where id = '$id'";
            $updateSql = $conn->prepare($updateSql);
            $updateSql->execute();
            
            $updated_on= date('m/d/Y h:i:s a', time());
            
            echo"$updated_on";
            echo"<pre>";print_r($updated_on);echo"</pre>";
            
        }
    

        else
        {
            $sql = "insert into categories(categories,status) values('".$categories."','1')";
            $sql = $conn->prepare($sql);
            $sql->execute();
            
            $created_on= date('m/d/Y h:i:s a', time());
            echo"$created_on";
            echo"<pre>";print_r($created_on);echo"</pre>";
            
        }
        
        
        header('location:categories.php');
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
                            <strong>Categories</strong><small> Form</small>
                        </div>
                        <form method="post">
                            <div class="card-body card-block">
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Categories</label>
                                <input type="text" name="categories" placeholder="Enter category name" class="form-control" value = "<?php echo $categories?>"required >
                                </div>
                            <button id="payment-button" name="submit" type="submit" class="form-group">
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
