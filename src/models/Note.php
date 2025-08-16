<?php

namespace Php\Notes\models;

use PDO;
use PDOException;
use Php\Notes\lib\Database;

class Note extends Database {
    private string $uuid;

    public function __construct(private string $title, private string $content)
    {
        parent::__construct(); // clase padre

        $this->uuid = uniqid();
    }

    // guardar la informacion de la nota
    public function save() {
        $query = $this->connect()->prepare('INSERT INTO notes (uuid, title, content, updated_at) values (:uuid, :title, :content, NOW())');

        $query->execute([
            'content' => $this->content,
            'title' => $this->title,
            'uuid' => $this->uuid
        ]);
    }

    // actualizar la informacion de la nota
    public function update() {
        $query = $this->connect()->prepare('UPDATE notes SET title = :title, content = :content, updated_at = NOW() WHERE uuid = :uuid');

        $query->execute([
            'content' => $this->content,
            'title' => $this->title,
            'uuid' => $this->uuid
        ]);
    }

    // obtener una nota
    static function get($uuid) {
        $db = new Database();
        $query = $db->connect()->prepare('SELECT * FROM notes WHERE uuid = :uuid');

        $query->execute(['uuid' => $uuid]);

        $note = Note::createFromArray($query->fetch(PDO::FETCH_ASSOC));

        return $note;
    }

    // obtener todas las notas
    static function getAll() {
        $db = new Database();
        $query = $db->connect()->prepare('SELECT * FROM notes');

        $notes = [];

        $query->execute();

        while($r = $query->fetch(PDO::FETCH_ASSOC)) {
            $note = Note::createFromArray($r);
            array_push($notes, $note);
        }

        return $notes;
    }

    static function createFromArray($arr) {
        $note = new Note($arr['title'], $arr['content']);
        $note->setUuid($arr['uuid']);

        return $note;
    }

    // getter uuid
    public function getUuid() {
        return $this->uuid;
    }

    // setter uuid
    public function setUuid($value) {
        $this->uuid = $value;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($value) {
        $this->title = $value;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($value) {
        $this->content = $value;
    }
}
