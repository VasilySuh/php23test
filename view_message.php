<?php
include 'db.php';

$messageId = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM messages WHERE id = ?");
$stmt->execute([$messageId]);
$message = $stmt->fetch();

$stmt = $pdo->prepare("SELECT * FROM comments WHERE message_id = ?");
$stmt->execute([$messageId]);
$comments = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($message['title']) ?></title>
</head>

<body>
    <a href="../phptest23/"></a>
    <h1><?= htmlspecialchars($message['title']) ?></h1>
    <p><?= htmlspecialchars($message['full_content']) ?></p>

    <h2>Комментарии</h2>
    <ul>
        <?php foreach ($comments as $comment): ?>
            <li><?= htmlspecialchars($comment['author']) ?>: <?= htmlspecialchars($comment['content']) ?></li>
        <?php endforeach; ?>
    </ul>

    <a href="add_comment.php?message_id=<?= $messageId ?>">Добавить комментарий</a>
</body>

</html>