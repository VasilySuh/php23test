<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $short_content = $_POST['short_content'];
    $full_content = $_POST['full_content'];

    $stmt = $pdo->prepare("INSERT INTO messages (title, author, short_content, full_content) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $author, $short_content, $full_content]);

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
        <textarea name="short_content" placeholder="Краткое содержание" required></textarea><br>
        <textarea name="full_content" placeholder="Полное содержание" required></textarea><br>
        <button type="submit">Сохранить</button>
    </form>
</body>

</html>