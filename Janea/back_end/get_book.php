<?php

include "db.php";

$id = $_GET["id"];

$sql = "SELECT * FROM books WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode([
        "success" => false,
        "message" => "Book not found"
    ]);
}

$stmt->close();
$conn->close();

?>