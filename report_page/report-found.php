<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $description = $_POST['description'] ?? '';
    $color = $_POST['color'] ?? '';
    $object = $_POST['object'] ?? '';

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $fileName = time() . '_' . basename($_FILES['image']['name']);
        $uploadFile = $uploadDir . $fileName;

        move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
    }

    // Save to DB if needed (optional)

    // Redirect to Report Found Submitted page
    header("Location: http://localhost/Lost_and_Found/report_submitted.html");
    exit();
}
?>