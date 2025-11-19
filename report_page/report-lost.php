<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $description = $_POST['description'] ?? '';
    $color = $_POST['color'] ?? '';
    $object = $_POST['object'] ?? '';

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

        $uploadDir = 'uploads/';   // Make sure "uploads" folder exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName = time() . '_' . basename($_FILES['image']['name']);
        $uploadFile = $uploadDir . $fileName;

        move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
    }

    // SAVE DATA LATER (no echo here!)

    // Important: Redirect must come before any output
    header("Location: report_submitted.html");
    exit();
}
?>