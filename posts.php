<?php include 'includes/header.php'; ?>
<?php
//create db object
$db = new Database();

//check url for category
if(isset($_GET['category'])){
  $category = $_GET['category'];
  //create query
  $query = "SELECT * FROM posts WHERE category = $category";
  //run query
  $posts = $db->select($query);
}else{
  //create query
  $query = "SELECT * FROM posts ORDER BY id DESC";
  //run query
  $posts = $db->select($query);
}



//create query
$query = "SELECT * FROM categories";
//run query
$categories = $db->select($query);
?>
<?php if($posts) : ?>
<?php while ($row = $posts->fetch_assoc()) : ?>
<div class="blog-post">
	<h2 class="blog-post-title">
		<?php echo $row['title']; ?>
	</h2>
	<p class="blog-post-meta">
		<?php echo formatDate($row['date']); ?> by 
		<a href="#">
			<?php echo $row['author']; ?>
		</a>
	</p>
	<p>
		<?php echo shortenText($row['body']); ?>
	</p>
	<a class="readmore" href="post.php?id=<?php echo $row['id']; ?>">Read More</a>
</div>

<?php endwhile; ?>
<?php else : ?>
<div class="blog-post">

	<p>No post yet.</p>
</div>
<?php endif; ?>

<?php include 'includes/footer.php'; 