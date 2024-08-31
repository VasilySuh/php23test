<?php
include 'db.php';

$limit = 5; // Количество сообщений на странице
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$stmt = $pdo->query("SELECT * FROM messages LIMIT $limit OFFSET $offset");
$messages = $stmt->fetchAll();

$totalMessages = $pdo->query("SELECT COUNT(*) FROM messages")->fetchColumn();
$totalPages = ceil($totalMessages / $limit);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список сообщений</title>
</head>
<body>
    <h1>Сообщения</h1>

    <ul>
        <?php foreach ($messages as $message): ?>
            <li>
                <a href="view_message.php?id=<?= $message['id'] ?>"><?= htmlspecialchars($message['title']) ?></a>
                <p><?= htmlspecialchars($message['summary']) ?></p>
            </li>
        <?php endforeach; ?>
    </ul>

    <div>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="index.php?page=<?= $i ?>"><?= $i ?></a>
        <?php endfor; ?>
    </div>

    <a href="add_message.php">Добавить сообщение</a>
</body>
</html>