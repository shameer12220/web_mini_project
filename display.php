<?php require 'db.php'; 
$sql = "SELECT * FROM expenses ORDER BY expense_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Expenses</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #f8fafc; color: #1e293b; padding: 40px; }
        .container { max-width: 1200px; margin: 0 auto; }
        h1 { font-size: 2rem; font-weight: 600; margin-bottom: 30px; }
        .count { color: #64748b; margin-bottom: 30px; }
        table { 
            width: 100%; background: white; 
            border-radius: 12px; overflow: hidden; 
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        th, td { 
            padding: 16px 20px; text-align: left; 
            border-bottom: 1px solid #f1f5f9;
        }
        th { background: #f8fafcff; font-weight: 600; color: #374151; }
        
        .amount { font-weight: 600; color: #059669; }
        .notes { max-width: 200px; word-wrap: break-word; }
        .btn { 
            padding: 8px 16px; border-radius: 8px; 
            text-decoration: none; font-size: 0.9rem; 
            font-weight: 500; margin-right: 8px;
        }
        .btn-edit { background: #f59e0b; color: white; }
        .btn-delete { background: #ef4444; color: white; }
        .back { 
            display: inline-block; margin-top: 30px; 
            padding: 12px 24px; background: #3b82f6; 
            color: white; text-decoration: none; 
            border-radius: 10px; font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>All Expenses</h1>
        <div class="count">Total: <?php echo $result->num_rows; ?> expenses</div>
        
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Amount</th>
                <th>Category</th>
                <th>Date</th>
                <th>Notes</th>
                <th>Actions</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td class="amount">Rs <?php echo number_format($row['amount'], 2); ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['expense_date']; ?></td>
                <td class="notes"><?php echo $row['notes'] ?: '-'; ?></td>
                <td>
                    <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-edit">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-delete" 
                       onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        <a href="dashboard.php" class="back">← Dashboard</a>
    </div>
</body>
</html>
