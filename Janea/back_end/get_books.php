<?php

include "db.php";

$sql = "SELECT * FROM books ORDER BY id DESC";

$result = $conn->query($sql);

$books = [];

while ($row = $result->fetch_assoc()) {
    $books[] = $row;
}

echo json_encode($books);

$conn->close();

?>