<?php $this->layout( 'layout' ) ?>

<div class="container">
    <div class="row mb-5">
        <div class="info col-9">
            <h4><span>Nom : </span><?=$member->getLastName()?></h2>
            <h4><span>Prenom : </span><?=$member->getFirstName()?></h2>
            <p><span>Email : </span><?=$member->getEmail()?></p>
        </div>
    </div>
</div>
