<?php include 'includes/header.php'; ?>
<?php
//create db object
$db = new Database();

if(isset($_POST['submit'])){
  //assign vars
  $name = mysqli_real_escape_string($db->link, $_POST['name']);
  //simple validation
  if($name == ''){
    //set error
    $error = 'Please fill out all required fields';
  } else {
    $query = "INSERT INTO categories (name) VALUES ('$name')";
    $insert_row = $db->insert($query);
  }
}
?>
<form role="form" method="post" action="add_category.php">
  <div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter Category">
  </div>
 
  <div class="form-group">

  <input name="submit" type="submit" class="btn btn-default" value="Submit" />
  <button class="btn btn-default"><a href="index.php" >Cancel</a></button>

  </div>
</form>

<?php include 'includes/footer.php'; ?>