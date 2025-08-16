<?php
use Php\Notes\models\Note;

$notes = Note::getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Home</h1>

    <?php foreach($notes as $note): ?>
        <a href="?view=view&uuid=<?php echo $note->getUuid(); ?>">
            <div class="note-preview">
                <div class="title"><?php echo $note->getTitle(); ?></div>
            </div>
        </a>
    <?php endforeach; ?>
</body>
</html>
