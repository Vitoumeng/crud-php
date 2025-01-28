<?php
include './db/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (name, email, phone, course) VALUES ('$name', '$email', '$phone', '$course')";
    if ($cnn->query($sql) === TRUE) {
        header("Location: index.php"); 
    } else {
        echo "Error: " . $sql . "<br>" . $cnn->error;
    }
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
    <h1>Add New Student</h1>

        <ul>
            <li><a href="./index.php">View</a></li>
            <li><a href="#">Add</a></li>
            <li><a href="">Edit</a></li>
        </ul>
    </header>

    <main>
        <form method="POST">
            Name: <input type="text" name="name" placeholder="Name" required><br>
            Email: <input type="email" name="email" placeholder="Email" required><br>
            Phone: <input type="text" name="phone" placeholder="Phone" require><br>
            Course: <input type="text" name="course" placeholder="Course"><br>
            <button type="submit">Add Student</button>
        </form>
    </main>
</body>
</html>

<?php
    $cnn->close();
?>