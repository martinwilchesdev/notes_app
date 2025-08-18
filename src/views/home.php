<?php
use Php\Notes\models\Note;

$notes = Note::getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/views/resources/main.css">
    <title>Home</title>
</head>
<body>
    <main>
        <h1>Home</h1>

        <a href="?view=create" class="btn">Create note</a>

        <div class="home-card__container">
            <?php foreach($notes as $note): ?>
                <a href="?view=view&uuid=<?php echo $note->getUuid(); ?>" class="home-card">
                    <div class="note-preview">
                        <h2 class="title"><?php echo $note->getTitle(); ?></h2>
                        <p class="content"><?php echo $note->getContent(); ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>
