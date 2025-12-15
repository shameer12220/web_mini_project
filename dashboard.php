<!DOCTYPE html>
<html>
<head>
    <title>Expense Tracker</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            color: #1e293b;
            padding: 40px;
            line-height: 1.6;
        }
        .container { max-width: 800px; margin: 0 auto; }
        h1 {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 40px;
            color: #0f172a;
            text-align: center;
        }
        .buttons {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }
        .btn {
            padding: 16px 32px;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 500;
            display: inline-block;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .btn{ background: #10b981; color: white; }
        
        .btn-danger { background: #ef4444; color: white; }
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Expense Tracker</h1>
        <div class="buttons">
            <a href="index.php" class="btn"> Add Expense</a>
            <a href="display.php" class="btn"> View All</a>
            <a href="display.php" class="btn"> Edit</a>
            <a href="display.php" class="btn btn-danger"> Delete</a>
        </div>
    </div>
</body>
</html>
