<?php

include "db.php";

$id = $_GET["id"];

$sql = "DELETE FROM books WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Book deleted successfully!"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => $stmt->error
    ]);
}

$stmt->close();
$conn->close();

?>