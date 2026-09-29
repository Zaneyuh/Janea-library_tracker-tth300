<?php

include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

$title = $data["title"];
$author = $data["author"];
$genre = $data["genre"];

$sql = "INSERT INTO books (title, author, genre) VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $title, $author, $genre);

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Book added successfully!",
        "id" => $stmt->insert_id
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