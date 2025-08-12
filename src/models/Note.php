<?php

namespace Php\Notes\models;
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

        $query->execute([ 'uuid' => $uuid ]);

        $note = new Note();
    }

    // getter uuid
    public function getUuid() {
        return $this->uuid;
    }

    // setter uuid
    public function setUuid($value) {
        $this->uuid = $value;
    }
}
