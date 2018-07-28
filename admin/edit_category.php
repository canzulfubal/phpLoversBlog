<?php include 'includes/header.php'; ?>
<?php
$id = $_GET['id'];

//create db object
$db = new Database();

//create query
$query = "SELECT * FROM categories WHERE id = $id";
//run query
$category = $db->select($query)->fetch_assoc();
?>
<?php
if(isset($_POST['submit'])){
  //assign vars
  $name = mysqli_real_escape_string($db->link, $_POST['name']);
  //simple validation
  if($name == ''){
    //set error
    $error = 'Please fill out all required fields';
  } else {
    $query = "UPDATE categories SET name = '$name' WHERE id = $id";
    $update_row = $db->update($query);
  }
}
?>
<?php
if(isset($_POST['delete'])){
    $query = "DELETE FROM categories WHERE id = $id";
    $delete_row = $db->delete($query);
}
?>
<form role="form" method="post" action="edit_category.php?id=<?php echo $id ?>">
  <div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter Category" value="<?php echo $category['name']?>">
  </div>
 
  <div class="form-group">

  <input name="submit" type="submit" class="btn btn-default" value="Submit" />
  <button class="btn btn-default"><a href="index.php" >Cancel</a></button>
  <input name="delete" type="submit" class="btn btn-danger" value="Delete" />

  </div>
</form>

<?php include 'includes/footer.php'; ?>