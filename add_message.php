<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $summary = $_POST['summary'];
    $content = $_POST['content'];

    $stmt = $pdo->prepare("INSERT INTO messages (title, author, summary, content) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $author, $summary, $content]);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить сообщение</title>
</head>
<body>
    <h1>Добавить сообщение</h1>
    <form method="POST">
        <input type="text" name="title" placeholder="Заголовок" required><br>
        <input type="text" name="author" placeholder="Автор" required><br>
        <textarea name="summary" placeholder="Краткое содержание" required></textarea><br>
        <textarea name="content" placeholder="Полное содержание" required></textarea><br>
        <button type="submit">Сохранить</button>
    </form>
</body>
</html>