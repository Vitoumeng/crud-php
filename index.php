<?php 
    include "./db/config.php";

    $sql = "SELECT * FROM students";
    $results = $cnn -> query($sql);    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Student List</h1>

        <ul>
            <li><a href="#">View</a></li>
            <li><a href="./add_student.php">Add</a></li>
            <li><a href="./edit_student.php">Edit</a></li>
        </ul>
    </header>

    <main>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Course</th>
                <th>Actions</th>
            </tr>
        <?php while ($row = $results->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['course']; ?></td>
                <td>
                    <a href="edit_student.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="./delete_student.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    </main>


</body>
</html>