<?php
/** @var Array $data */
/** @var Post $post */

use App\Models\Post;

$post = $data['post'];
?>
<div class="container">
    <div class="row>">
        <div class="col">
            <h3>Editácia/pridanie príspevku</h3>
            <form action="?c=posts&a=store" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?= $post->getId() ?>" name="id">
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="title"
                           value="<?= htmlspecialchars($post->getTitle()) ?>">
                </div>
                <div class="mb-3">
                    <label for="text">Obsah:</label>
                    <textarea class="form-control" id="text" name="text" style="height: 100px"><?= $post->getText() ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Obrázok:</label>
                    <input class="form-control" type="file" id="photo" name="photo">
                </div>
                <button type="submit" class="btn btn-primary">Odoslať príspevok</button>
            </form>
        </div>
    </div>
</div>
