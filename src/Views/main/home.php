<?php $this->layout( 'layout' )?>

<section class="presentation">
    <h2>Bienvenue sur <strong>O'Quiz</strong> <?php if ($user): ?> <?=$user['first_name']?><?php endif;?></h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
        aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</section>
<section class="quiz-list">
    <?php foreach ($quizzes as $quizz) :?>
        <div class="card quiz-card">
            <img class="random-img card-img-top" src="" alt="image du quiz">
            <div class="card-body">
                <h3 class="card-title">
                    <a href="<?=$router->generate('quiz_read', [ 'id' => $quizz->getId() ])?>">
                        <?=$quizz->getTitle()?>
                    </a>
                </h3>
                <h4 class="card-subtitle mb-2"><?=$quizz->getDescription()?></h4>
                <p class="card-text text-muted">by <?=$quizz->getFirstName()?> <?=$quizz->getLastName()?></p>
            </div>
        </div>
    <?php endforeach ?>
</section>
