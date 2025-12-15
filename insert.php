<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $expense_date = $_POST['expense_date'];
    $notes = $_POST['notes'];

    $stmt = $conn->prepare("INSERT INTO expenses (title, amount, category, expense_date, notes) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sdsss", $title, $amount, $category, $expense_date, $notes);
    $stmt->execute();

    $stmt->close();
    $conn->close();

    
    
}
?>
