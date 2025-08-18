<?php
use Php\Notes\models\Note;

if (count($_POST) > 0) {
    $content = $_POST['content'] ?? '';
    $title = $_POST['title'] ?? '';
    $uuid = $_POST['uuid'];

    $note = Note::get($uuid);

    $note->setTitle($title);
    $note->setContent($content);

    $note->update();
} else if (isset($_GET['uuid'])) {
    $note = Note::get($_GET['uuid']);
} else {
    header('Location: http://localhost/notes_app/?view=home');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/views/resources/main.css">
    <title>View</title>
</head>
<body>
    <main>
        <form action="?view=view&uuid=<?php echo $note->getUuid(); ?>" method="POST">
            <input type="text" name="title" id="title" placeholder="Title..." value="<?php echo $note->getTitle(); ?>">
            <textarea name="content" id="content" cols="30" rows="10"><?php echo $note->getContent(); ?></textarea>
            <input type="hidden" name="uuid" value="<?php echo $note->getUuid(); ?>">
            <button type="submit">Update Note</button>
        </form>
        <a href="?view=home" class="btn">Back</a>
    </main>
</body>
</html>
