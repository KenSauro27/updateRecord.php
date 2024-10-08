<?php

include 'dbconfig.php';

try {
    // Define the teacher ID and the new values
    $teacher_id = 1; // Change this to the ID of the teacher you want to update
    $new_first_name = 'Alice';
    $new_last_name = 'Smith';
    $new_email = 'alice.smith@example.com';
    $new_phone = '555-5678';

    // Prepare an SQL statement for updating the Teachers table
    $stmt = $conn->prepare("UPDATE Teachers SET first_name = ?, last_name = ?, email = ?, phone = ? WHERE teacher_id = ?");

    // Execute the prepared statement with the new values and the teacher ID
    $stmt->execute([$new_first_name, $new_last_name, $new_email, $new_phone, $teacher_id]);

    // Check if any rows were affected (updated)
    if ($stmt->rowCount() > 0) {
        echo "Teacher updated successfully.";
    } else {
        echo "No teacher found with that ID or no changes made.";
    }
} catch (PDOException $e) {
    // Handle any database errors
    echo "Failed to update teacher. Please try again later.";
    error_log($e->getMessage()); // Log the error for debugging
}
?>
