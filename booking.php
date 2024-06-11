<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $people = $_POST['people'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    // Validate form data
    if (empty($name) || empty($checkin) || empty($checkout) || empty($people) || empty($contact) || empty($email)) {
        echo "Please fill in all required fields.";
    } else {
        // Save the form data to a database (replace the database connection details with your own)
        // Database connection
    $servername = "localhost";
    $username = "thomas";
    $password = "12345";
    $dbname = "booking";

        // Create a connection to the database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check if the connection was successful
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare the SQL statement to insert the form data into the database
        $sql = "INSERT INTO bookings (name, checkin, checkout, people, contact, email, comment)
                VALUES ('$name', '$checkin', '$checkout', '$people', '$contact', '$email', '$comment')";

        // Execute the SQL statement
        if ($conn->query($sql) === TRUE) {
            echo "Booking submitted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
} else {
    // Redirect to an error page if the form was not submitted
    header("Location: error.php");
    exit();
}
?>
