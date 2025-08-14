<?php
include_once "../../db/config.php";
include_once "../function.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../admin/?q=course&error=Invalid+request');
    exit();
}

// Get form data
$id          = $_POST['id'] ?? '';
$title       = trim($_POST['title'] ?? '');
$alt         = trim($_POST['alt'] ?? '');
$overview    = $_POST['overview'] ?? '';
$ki_thakbe   = json_encode($_POST['ki_thakbe'] ?? []);
$description = trim($_POST['description'] ?? '');
$joined      = intval($_POST['joined'] ?? 0);
$old_price   = isset($_POST['old_price']) ? floatval($_POST['old_price']) : null;
$section     = intval($_POST['section'] ?? 0);
$duration    = trim($_POST['duration'] ?? '');
$lessons     = intval($_POST['lessons'] ?? 0);
$price       = floatval($_POST['price'] ?? 0);
$status      = intval($_POST['status'] ?? 0);
$url_hint    = trim($_POST['url_hint'] ?? '');
$remove_img  = isset($_POST['remove_img']);

if (empty($title)) {
    header("Location: ../../admin/?e=course&id=" . encryptSt($id) . "&error=Title+is+a+required+field.");
    exit();
}

try {
    $img_name = null;

    // Get current image
    $current_img_stmt = $conn->prepare("SELECT img FROM course WHERE id = ?");
    $current_img_stmt->bind_param("i", $id);
    $current_img_stmt->execute();
    $current_img_result = $current_img_stmt->get_result();
    $current_img = $current_img_result->fetch_assoc()['img'] ?? null;
    $current_img_stmt->close();

    // Upload new image
    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $upload = uploadImage($_FILES['img'], '../upload/', 'course_');

        if ($upload['success']) {
            if (!empty($current_img) && file_exists('../upload/' . $current_img)) {
                unlink('../upload/' . $current_img);
            }
            $img_name = basename($upload['target_file']);
        } else {
            header("Location: ../../admin/?e=course&id=" . encryptSt($id) . "&error=" . urlencode($upload['message']));
            exit();
        }

    } elseif ($remove_img && !empty($current_img)) {
        if (file_exists('../upload/' . $current_img)) {
            unlink('../upload/' . $current_img);
        }
        $img_name = null;

    } else {
        $img_name = $current_img;
    }

    // Update
    if (!empty($id)) {
        $sql = "UPDATE course SET 
                title=?, alt=?, overview=?, ki_thakbe=?, img=?, description=?, 
                joined=?, old_price=?, section=?, duration=?, lessons=?, price=?, status=?, url_hint=?
            WHERE id=?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "ssssssidsisdssi",
            $title, $alt, $overview, $ki_thakbe, $img_name, $description,
            $joined, $old_price, $section, $duration, $lessons, $price, $status, $url_hint, $id
        );

        if ($stmt->execute()) {
            $stmt->close();
            header("Location: ../../admin/?e=course&id=" . encryptSt($id) . "&success=Course+updated+successfully!");
            exit();
        } else {
            throw new Exception("Database error: " . $stmt->error);
        }

    } 
    // Insert
    else {
        $sql = "INSERT INTO course 
                (title, alt, overview, ki_thakbe, img, description, joined, old_price, section, duration, lessons, price, status, url_hint)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "ssssssidsisdss",
            $title, $alt, $overview, $ki_thakbe, $img_name, $description,
            $joined, $old_price, $section, $duration, $lessons, $price, $status, $url_hint
        );

        if ($stmt->execute()) {
            $new_id = $conn->insert_id;
            $stmt->close();
            header("Location: ../../admin/?e=course&id=" . encryptSt($new_id) . "&success=Course+created+successfully!");
            exit();
        } else {
            throw new Exception("Database error: " . $stmt->error);
        }
    }

} catch (Exception $e) {
    header("Location: ../../admin/?e=course&id=" . encryptSt($id) . "&error=" . urlencode($e->getMessage()));
    exit();
}

$conn->close();
?>
