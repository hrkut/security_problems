<?php

namespace App\Models;

use App\Core\Model;

class Like extends Model
{
    protected ?int $id;
    protected ?int $post_id;
    protected ?string $who;

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
     * @return int|null
     */
    public function getPostId(): ?int
    {
        return $this->post_id;
    }

    /**
     * @param int|null $post_id
     */
    public function setPostId(?int $post_id): void
    {
        $this->post_id = $post_id;
    }

    /**
     * @return string|null
     */
    public function getWho(): ?string
    {
        return $this->who;
    }

    /**
     * @param string|null $who
     */
    public function setWho(?string $who): void
    {
        $this->who = $who;
    }

    /**
     * @param $postId
     * @return void
     * @throws \Exception
     */
    public static function deleteLikes($postId)
    {
        $likes = Like::getAll("post_id = ?", [$postId]);
        foreach ($likes as $like) {
            $like->delete();
        }
    }

}