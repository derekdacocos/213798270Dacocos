<?php
    include 'db.php';

    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM students WHERE id=$id");
    $row = $result->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $course = $_POST['course'];
        $enrollment_date = $_POST['enrollment_date'];
        
        if (!empty($name)&& !empty($email)&& !empty($course)&& !empty($enrollment_date)){
            $sql = "UPDATE students SET name='$name', email='$email', course='$course', enrollment_date='$enrollment_date' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo "Student successfully updated!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        else {
            echo "Please fill-in all fields.";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student</h2>
    <form method="POST" action="">
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
        Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
        Course: <input type="text" name="course" value="<?php echo $row['course']; ?>" required><br><br>
        Enrollment Date: <input type="date" name="enrollment_date" value="<?php echo $row['enrollment_date']; ?>" required><br><br>
        <button type="submit">Update Student</button><br><br>
        <a href="index.php">Back</a>
    </form>
</body>
</html>
