<?php 
    include "./db/config.php";

    // Fetch students
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM students WHERE id='$id'";
        $result = $cnn->query($sql);
        $row = $result->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>
<body>
<header>
    <h1>Edit Student</h1>

        <ul>
            <li><a href="./index.php">View</a></li>
            <li><a href="./add_student.php">Add</a></li>
            <li><a href="#">Edit</a></li>
        </ul>
    </header>

    <main>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" placeholder="Name" required><br>
            Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Email" required><br>
            Phone: <input type="text" name="phone" value="<?php echo $row['phone']; ?>" placeholder="Phone" require><br>
            Course: <input type="text" name="course" value="<?php echo $row['course']; ?>" placeholder="Course"><br>
            <button type="submit">Edit Student</button>
        </form>
    </main>
</body>
</html>

<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $course = $_POST['course'];

        $sql = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' WHERE id='$id'";
        if ($cnn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error updating record: ". $conn->error;
        }
    }

?>