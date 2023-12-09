<?php

namespace App\Models;

use DOMDocument;

class Post extends \App\Core\Model
{
    protected ?int $id = 0;
    protected ?string $text = "";
    protected ?string $title = "";
    protected ?string $img = "";


    public function addLike($name)
    {
        $like = new Like();
        $like->setWho($name);
        $like->setPostId($this->getId());
        $like->save();
    }

    public function getLikes()
    {
        if (!$this->getId()) {
            return [];
        }
        return Like::getAll("post_id = ? ", [$this->getId()]);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     */
    public function setText(?string $text): void
    {
        $this->text = $text;
        //$this->text = strip_tags($text, '<img>');
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getPhoto(): ?string
    {
        return $this->img;
    }

    /**
     * @param string|null $img
     */
    public function setImg(?string $img): void
    {
        $this->img = $img;
    }
}