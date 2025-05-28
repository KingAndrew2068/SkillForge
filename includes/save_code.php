<?php
session_start();
require_once 'config.php';  

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_SESSION['username'];
    $language = $_POST['language'] ?? '';
    $code = $_POST['code'] ?? '';

    if (!$username || !$code || !$language) {
        echo json_encode(['status' => 'error', 'message' => 'Toate câmpurile sunt obligatorii.']);
        exit;
    }

    $id = uniqid("code_", true);

    $stmt = $conn->prepare("INSERT INTO codes (id, username, language, code, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssss", $id, $username, $language, $code);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'code' => $code, 'created_at' => date('Y-m-d H:i:s')]);
    } else {
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
