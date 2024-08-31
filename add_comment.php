<?php
include 'db.php';

$messageId = $_GET['message_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $author = $_POST['author'];
    $content = $_POST['content'];

    $stmt = $pdo->prepare("INSERT INTO comments (message_id, author, content) VALUES (?, ?, ?)");
    $stmt->execute([$messageId, $author, $content]);

    header("Location: view_message.php?id=$messageId");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить комментарий</title>
</head>
<body>
    <h1>Добавить комментарий</h1>
    <form method="POST">
        <input type="text" name="author" placeholder="Автор" required><br>
        <textarea name="content" placeholder="Комментарий" required></textarea><br>
        <button type="submit">Сохранить</button>
    </form>
</body>
</html>