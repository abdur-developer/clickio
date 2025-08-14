<?php
include_once "../../db/config.php";

// Set JSON header right at the start
header('Content-Type: application/json');



// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../admin/?q=course_module&error=Invalid+request');
    exit();
}

// Validate required fields
$id = isset($_POST['id']) ? intval($_POST['id']) : null;
$title = trim($_POST['title'] ?? '');
$module_id = isset($_POST['module_id']) ? intval($_POST['module_id']) : 0;

if (empty($title)) {
   header("Location: ../../admin/?e=module_details&id=" . encryptSt($module_id) . "&error=Title+is+a+required+field.");
   exit();
}

try {
    // Prepare SQL based on whether we're updating or inserting
    if ($id) {
        $sql = "UPDATE module_details SET title = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $title, $id);
    } else {
        $sql = "INSERT INTO module_details (module_id, title) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $module_id, $title);
    }

    if (!$stmt->execute()) {
        throw new Exception("Database error: " . $stmt->error);
    }

    $new_id = $id ?: $conn->insert_id;
    $stmt->close();

    header("Location: ../../admin/?e=module_details&id=" . encryptSt($new_id) . "&success=Operation+completed+successfully");
    exit();

} catch (Exception $e) {
    header("Location: ../../admin/?e=module_details&id=" . encryptSt($module_id) . "&error=" . urlencode($e->getMessage()));
}