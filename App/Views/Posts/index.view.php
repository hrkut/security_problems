<?php
/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Models\Post $post */
?>
<div class="container-fluid">
    <?php if ($auth->isLogged()) { ?>
        <div class="row">
            <div class="col">
                <a href="?c=posts&a=create" class="btn btn-success">Pridať nový príspevok</a>
            </div>
        </div>
    <?php } ?>
    <div class="row">
        <?php foreach ($data['data'] as $post) { ?>
            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="card my-3">
                    <?php if ($post->getPhoto()) { ?>
                        <img src="<?= $post->getPhoto() ?>" class="card-img-top" alt="...">
                    <?php } ?>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $post->getTitle() ?>
                        </h5>
                        <p class="card-text">
                            <?php echo $post->getText() ?>
                            <?php //echo htmlspecialchars($post->getText()) ?>
                        </p>
                        <?php if ($auth->isLogged()) { ?>
                            <a href="?c=posts&a=delete&id=<?= $post->getId() ?>" class="btn btn-danger">Delete</a>
                            <a href="?c=posts&a=edit&id=<?= $post->getId() ?>" class="btn btn-warning">Edit</a>
                            <a href="?c=posts&a=like&id=<?= $post->getId() ?>&likes=<?= count($post->getLikes()) ?>"
                               class="btn btn-primary"><?= count($post->getLikes()) ?> Like</a>
                        <?php } else { ?>
                            <button class="btn btn-primary"><?= count($post->getLikes()) ?> Like</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
