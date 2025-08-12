<?php

use Php\Notes\models\Note;

if (count($_POST) > 0) {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';

    $note = new Note($title, $content);
    $note->save();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <h1>Create note</h1>

    <form action="?view=create" method="POST">
        <input type="text" name="title" id="title" placeholder="Title...">
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <button type="submit">Create Note</button>
    </form>
</body>
</html>
