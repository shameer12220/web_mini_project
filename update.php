<?php 
require 'db.php'; 
$id = $_GET['id'] ?? 0;

if ($_POST) {
    $title = $_POST['title'];
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $date = $_POST['date'];
    $notes = $_POST['notes'];
    
    $sql = "UPDATE expenses SET title=?, amount=?, category=?, expense_date=?, notes=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdsssi", $title, $amount, $category, $date, $notes, $id);
    $stmt->execute();
    header("Location: display.php");
    exit();
}

$sql = "SELECT * FROM expenses WHERE id=$id";
$result = $conn->query($sql);
$expense = $result->fetch_assoc() ?: [];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Expense</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #f8fafc; color: #1e293b; padding: 40px; }
        .container { max-width: 500px; margin: 0 auto; }
        h1 { font-size: 2rem; font-weight: 600; margin-bottom: 30px; text-align: center; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: 500; color: #374151; }
        input, select, textarea {
            width: 100%; padding: 14px; border: 2px solid #e2e8f0;
            border-radius: 10px; font-size: 1rem; font-family: inherit;
        }
        input:focus, select:focus, textarea:focus { outline: none; border-color: #3b82f6; }
        textarea { resize: vertical; min-height: 80px; }
        .btn { width: 100%; padding: 16px; background: #f59e0b; color: white; 
               border: none; border-radius: 10px; font-size: 1.1rem; 
               font-weight: 500; cursor: pointer; }
        .btn:hover { background: #d97706; }
        .back { display: inline-block; margin-top: 20px; color: #3b82f6; 
                text-decoration: none; font-weight: 500; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Expense #<?php echo $id; ?></h1>
        <form method="POST">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="<?php echo $expense['title'] ?? ''; ?>" required>
            </div>
            <div class="form-group">
                <label>Amount</label>
                <input type="number" name="amount" step="0.01" 
                       value="<?php echo $expense['amount'] ?? ''; ?>" required>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category" required>
                    <option value="Food" <?php echo (($expense['category']??'')=='Food')?'selected':'';?>>Food</option>
                    <option value="Transport" <?php echo (($expense['category']??'')=='Transport')?'selected':'';?>>Transport</option>
                    <option value="Shopping" <?php echo (($expense['category']??'')=='Shopping')?'selected':'';?>>Shopping</option>
                    <option value="Bills" <?php echo (($expense['category']??'')=='Bills')?'selected':'';?>>Bills</option>
                    <option value="Entertainment" <?php echo (($expense['category']??'')=='Entertainment')?'selected':'';?>>Entertainment</option>
                    <option value="Other" <?php echo (($expense['category']??'')=='Other')?'selected':'';?>>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label>Date</label>
                <input type="date" name="date" value="<?php echo $expense['expense_date'] ?? ''; ?>" required>
            </div>
            <div class="form-group">
                <label>Notes</label>
                <textarea name="notes"><?php echo $expense['notes'] ?? ''; ?></textarea>
            </div>
            <button type="submit" class="btn">Update Expense</button>
        </form>
        <a href="dashboard.php" class="back">← Dashboard</a>
    </div>
</body>
</html>
