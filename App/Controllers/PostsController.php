<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\DB\Connection;
use App\Core\Model;
use App\Core\Responses\Response;
use App\Models\Like;
use App\Models\Post;

class PostsController extends AControllerBase
{
    /**
     * @param $action
     * @return bool
     */
    public function authorize($action)
    {
        if ($action == 'index') {
            return true;
        } else {
            return $this->app->getAuth()->isLogged();
        }
    }

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function index(): Response
    {
        return $this->html([
            'data' => Post::getAll()
        ]);
    }

    /**
     * @return \App\Core\Responses\RedirectResponse
     * @throws \Exception
     */
    public function like()
    {
        $post = Post::getOne($this->request()->getValue('id'));

        if ($this->request()->getValue('likes') == 0) {
            $post->addLike($this->app->getAuth()->getLoggedUserName());
        } else {
            $likes = Like::getAll("post_id = ? && who= ?", [$post->getId(), $this->app->getAuth()->getLoggedUserName()]);
            if (count($likes) == 1) {
                $likes[0]->delete();
            }
        }
        return $this->redirect("?c=posts");
    }

    /**
     * @return \App\Core\Responses\RedirectResponse
     * @throws \Exception
     */
    public function delete()
    {
        $id = $this->request()->getValue('id');
        $post = Post::getOne($id);

        if ($post->getPhoto()) {
            unlink($post->getPhoto());
        }
        Model::getConnection()->beginTransaction();
        Like::deleteLikes($id);
        $post->delete();
        Model::getConnection()->commit();
        return $this->redirect("?c=posts");
    }

    /**
     * @return \App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function edit()
    {
        return $this->html([
            'post' => Post::getOne($this->request()->getValue('id'))
        ],
            'post.form'
        );
    }

    /**
     * @return \App\Core\Responses\ViewResponse
     */
    public function create()
    {
        return $this->html([
            'post' => new Post()
        ],
            'post.form'
        );
    }

    /**
     * @return \App\Core\Responses\RedirectResponse
     * @throws \Exception
     */
    public function store()
    {
        $id = $this->request()->getValue('id');
        $post = ($id ? Post::getOne($id) : new Post());

        // fill post
        $post->setTitle($this->request()->getValue("title"));
        $post->setText($this->request()->getValue("text"));
        $post->setImg($this->processUploadedFile($post));

        $post->save();
        return $this->redirect("?c=posts");
    }

    /**
     * @param $post
     * @return string|null
     */
    private function processUploadedFile(Post $post)
    {
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
            $targetFile = "public" . DIRECTORY_SEPARATOR . "photos" . DIRECTORY_SEPARATOR . time() . "_" . $_FILES['photo']['name'];
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
                if ($post->getId() && $post->getPhoto()) {
                    unlink($post->getPhoto());
                }
                return $targetFile;
            }
        }
        return null;
    }
}