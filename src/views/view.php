<?php
use Php\Notes\models\Note;

if (isset($_GET['id'])) {
    $note = Note::get($_GET['id']);
} else {
    header('Location: http://localhost/notes_app/?view=home');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>
<body>
    <?php echo $note->getTitle(); ?>
</body>
</html>
