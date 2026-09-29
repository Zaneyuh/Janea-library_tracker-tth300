<?php

include "db.php";

$id = $_GET["id"];

$data = json_decode(file_get_contents("php://input"), true);

$title = $data["title"];
$author = $data["author"];
$genre = $data["genre"];

$sql = "UPDATE books SET title = ?, author = ?, genre = ? WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $title, $author, $genre, $id);

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Book updated successfully!"
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