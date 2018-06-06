<?php $this->layout( 'layout' ) ?>

<div class="container">
    <div class="row mb-5">
        <div class="col-12 col-md-8 m-auto area">
            <h2 class="text-center">Inscription</h2>

            <div class="errors">
                <?php foreach($errors as $error): ?>
                    <div class="alert alert-danger"><?=$error?></div>
                <?php endforeach; ?>
            </div>

            <form id="signup" class="" action="<?=$router->generate('signup')?>" method="post">
                <div class="form-group">
                    <label>Email</label>
                    <input
                        type="text"
                        class="form-control"
                        name="email"
                        value="<?=($fields['email'] ?? '')?>"
                        placeholder="jonsnow@winterfell.com"
                        >
                </div>
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input
                        type="password"
                        class="form-control"
                        name="password"
                        value=""
                        placeholder="azerty"
                        >
                </div>
                <div class="form-group">
                    <label>Ressaisissez votre mot de passe</label>
                    <input
                        type="password"
                        class="form-control"
                        name="password_confirm"
                        value=""
                        placeholder="azerty"
                        >
                </div>
                <div class="form-group">
                    <label>Prénom</label>
                    <input
                        type="text"
                        class="form-control"
                        name="first_name"
                        value="<?=($fields['first_name'] ?? '')?>"
                        placeholder="Jon"
                        >
                </div>
                <div class="form-group">
                    <label>Nom</label>
                    <input
                        type="text"
                        class="form-control"
                        name="last_name"
                        value="<?=($fields['last_name'] ?? '')?>"
                        placeholder="Snow"
                        >
                </div>
                <div class="text-center">
                    <button class="btn btn-primary">Créer le compte</button>
                </div>
            </form>
        </div>
    </div>
</div>
