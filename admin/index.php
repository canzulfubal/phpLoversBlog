<?php include 'includes/header.php'; ?>
<?php
//create DB object
$db = new Database();
//select query
$query = "SELECT posts.*, categories.name AS catname, categories.id AS catid
        FROM posts
        INNER JOIN categories
        ON posts.category = categories.id
        ORDER BY posts.id DESC";
//run query
$posts = $db->select($query);

//select query
$query = "SELECT * FROM categories ORDER BY id DESC";
//run query
$categories = $db->select($query);
?>


<!-- CONTENT HERE -->
<table class="table table-stripped">
<tr>
<td>Post ID#</td>
<td>Post Title</td>
<td>Category</td>
<td>Author</td>
<td>Date</td>
</tr>
<?php while($row = $posts->fetch_assoc()) : ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><a href="edit_post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td>
<td><?php echo $row['catname']; ?></td>
<td><?php echo $row['author']; ?></td>
<td><?php echo formatDate($row['date']); ?></td>
</tr>
<?php endwhile; ?>

    </table>

    <table class="table table-stripped">
<tr>
<td>Category ID#</td>
<td>Category Name</td>
</tr>
<?php while($row = $categories->fetch_assoc()) : ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><a href="edit_category.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
</tr>
<?php endwhile; ?>
    </table>
<?php include 'includes/footer.php'; 