<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Main -->

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="" >
                <img class="card-img-top" src="<?= (base_url('assets/upload/').$article[0]->name_img) ?? ''?>" alt="<?=$article[0]->title ?? ''?>" >
                <div class="card-body ">
                    <h5 class="card-title"><?= $article[0]->title ?? ''?></h5>
                    <div class=""> <?= $article[0]->name_cat.' - '.$article[0]->city?>  </div>
                    <div class="font-weight-bold"> <?=$article[0]->price?> €</div>
                    <div class="small text-muted pb-3"><?= date('d/m/Y à H:i', strtotime($article[0]->created_at))?></div>
                    <p class="card-text pt-3 border-top"> <span class="font-weight-bold"> Description : </span> <br>
                    <?= $article[0]->description_art?></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 d-md-flex flex-column align-items-end shadow border" id="contact">
            <div class="mt-3">Vendeur: <?= $article[0]->pseudo?></div>
            <?php if(!empty($article[0]->phone)):?>
                <div class="mt-3">Mail: <?=$article[0]->mail?></div>
            <?php endif?>
            <div class="mt-3">Contact: <?= $article[0]->phone ?? $article[0]->mail?></div>
            <div class="mt-3"><a href="<?= base_url('index.php/Article_controller/list_articles_by_user/'.$article[0]->pseudo)?>">Voir les annonces de ce vendeur</a></div>
        </div>
    </div>
</div>