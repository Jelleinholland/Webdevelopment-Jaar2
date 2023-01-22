<?php
class Article implements JsonSerializable {

    public int $id;
    public string $title;
    public string $content;
    public string $author;
    public string $posted_at;

    public function jsonSerialize():mixed
    {
        return get_object_vars($this);
    }
    
    public function setId(int $id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }
}
?>