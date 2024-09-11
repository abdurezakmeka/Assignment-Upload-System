<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded without errors
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        // Check if file size is within limit (1MB)
        if ($_FILES["file"]["size"] > 1048576) {
            echo "Sorry, the file size must be less than 1MB.";
        } else {
            $target_dir = "uploads/"; // Change this to the desired directory for uploaded files
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if the file is allowed (document formats)
            $allowed_types = array("doc", "docx", "pdf");
            if (!in_array($file_type, $allowed_types)) {
                echo "Sorry, only DOC, DOCX, and PDF files are allowed.";
            } else {
                // Move the uploaded file to the specified directory
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    // File upload success, now store information in the database
                    $filename = $_FILES["file"]["name"];
                    $filesize = $_FILES["file"]["size"];
                    $filetype = $_FILES["file"]["type"];
                    $fullName = htmlspecialchars($_POST['fullName']); // Get the full name from the form
                    $phoneNumber = htmlspecialchars($_POST['phoneNumber']); // Get the phone number from the form
                    $course = htmlspecialchars($_POST['course']); // Get the selected course from the form

                    // Database connection
                    $db_host = "sql200.infinityfree.com";
                    $db_user = "if0_36813036";
                    $db_pass = "123thcTHC";
                    $db_name = "if0_36813036_login_db";

                    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Insert the file information into the database
                    $sql = "INSERT INTO files (filename, filesize, filetype, fullName, phoneNumber, course) VALUES ('$filename', $filesize, '$filetype', '$fullName', '$phoneNumber', '$course')";

                    if ($conn->query($sql) === TRUE) {
                        echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded and the information has been stored in the database.";
                    } else {
                        echo "Sorry, there was an error uploading your file and storing information in the database: " . $conn->error;
                    }

                    $conn->close();
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    } else {
        echo "No file was selected.";
    }
}
?>
