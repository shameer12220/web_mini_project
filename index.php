<?php 
require 'db.php'; 
$message = '';

if ($_POST) {
    $title = $_POST['title'];
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $date = $_POST['date'];
    $notes = $_POST['notes'];
    
    $sql = "INSERT INTO expenses (title, amount, category, expense_date, notes) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdsss", $title, $amount, $category, $date, $notes);
    if ($stmt->execute()) {
        $message = "Expense added successfully!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Expense</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #f8fafc; color: #1e293b; padding: 40px; }
        .container { max-width: 500px; margin: 0 auto; }
        h1 { font-size: 2rem; font-weight: 600; margin-bottom: 30px; text-align: center; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: 500; color: #374151; }
        input, select, textarea {
            width: 100%;
            padding: 14px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-family: inherit;
            
        }
        
        textarea { min-height: 80px; }
        .btn { 
            width: 100%; padding: 16px; background: #10b981; 
            color: white; border: none; border-radius: 10px; 
            font-size: 1.1rem; font-weight: 500; cursor: pointer;
        }
        .btn:hover { background: #059669; }
        .message { 
            padding: 16px; margin-bottom: 20px; 
            background: #d1fae5; border-radius: 10px; 
            text-align: center; font-weight: 500;
        }
        .back { 
            display: inline-block; margin-top: 20px; 
            color: #3b82f6; 
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add New Expense</h1>
        <?php if ($message): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" required>
            </div>
            <div class="form-group">
                <label>Amount</label>
                <input type="number" name="amount" >
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category" required>
                    <option value="">Choose category</option>
                    <option value="Food">Food</option>
                    <option value="Transport">Transport</option>
                    <option value="Shopping">Shopping</option>
                    <option value="Bills">Bills</option>
                    <option value="Entertainment">Entertainment</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label>Date</label>
                <input type="date" name="date" required>
            </div>
            <div class="form-group">
                <label>Notes</label>
                <textarea name="notes"></textarea>
            </div>
            <button type="submit" class="btn">Add Expense</button>
        </form>
        <a href="dashboard.php" class="back">← Back to Dashboard</a>
    </div>
</body>
</html>
