<?php
    include "db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $course = $_POST['course'];
        $enrollment_date = $_POST['enrollment_date'];
        
        if (!empty($name)&& !empty($email)&& !empty($course)&& !empty($enrollment_date)){
            $sql = "INSERT INTO students (name, email, course, enrollment_date) VALUES ('$name', '$email', '$course', '$enrollment_date')";

            if ($conn->query($sql) === TRUE) {
                echo "New student added successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        else {
            echo "Please fill-in all fields.";
        }
    } 
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>
<body>
    <h2>Add Student</h2>

    <form method="post" action="create.php">
        Name: <input type="text" name="name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Course: <input type="text" name="course" required><br><br>
        Enrollment Date: <input type="date" name="enrollment_date" required><br><br>
        <button type="submit">Add Student</button>
    </form>
    <a href="index.php">Back</a>
</body>
</html>