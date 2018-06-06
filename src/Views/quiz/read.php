<?php $this->layout( 'layout' ) ?>
<div class="quiz-description">

    <div id="nb-question"></div>
    <h1><?=$quiz->getTitle()?></h1>
    <h2><?=$quiz->getDescription()?></h2>
    <p>by <?=$quiz->getFirstName()?> <?=$quiz->getLastName()?></p>

</div>

<div class="alert alert-primary score">
    <p>Nouveau jeu: Répondez au maximum de question avant de valider !</p>
</div>
<form class="quiz-form" action="<?=$router->generate('quiz_read', [ 'id' => $quiz->getId() ])?>" method="post" data-id="<?=$quiz->getId()?>">
    <div class="question-list">
        <?php foreach ($questions as $question) :?>
            <div class="card question-card">
                <div class="card-body">
                    <div class="level <?=$question->getName()?>">
                        <?=$question->getName()?>
                    </div>
                    <h4 class="card-header"><?=$question->getQuestion()?></h4>
                    <div class="card-text">
                        <?php if($user): ?>
                        <ul class="answer">
                            <li>
                                <input
                                    type="radio"
                                    name="answer<?=$question->getId()?>"
                                    id="answer<?=$question->getId()?>-1"
                                    class="prop1"
                                    value="<?=$question->getProp1()?>">

                                <label for="answer<?=$question->getId()?>-1">
                                    <?=$question->getProp1()?>
                                </label>
                            </li>
                            <li>
                                <input
                                    type="radio"
                                    name="answer<?=$question->getId()?>"
                                    id="answer<?=$question->getId()?>-2"
                                    class="prop2"
                                    value="<?=$question->getProp2()?>">

                                <label for="answer<?=$question->getId()?>-2">
                                    <?=$question->getProp2()?>
                                </label>
                            </li>
                            <li>
                                <input
                                    type="radio"
                                    name="answer<?=$question->getId()?>"
                                    id="answer<?=$question->getId()?>-3"
                                    class="prop3"
                                    value="<?=$question->getProp3()?>">

                                <label for="answer<?=$question->getId()?>-3">
                                    <?=$question->getProp3()?>
                                </label>
                            </li>
                            <li>
                                <input
                                    type="radio"
                                    name="answer<?=$question->getId()?>"
                                    id="answer<?=$question->getId()?>-4"
                                    class="prop4"
                                    value="<?=$question->getProp4()?>">

                                <label for="answer<?=$question->getId()?>-4">
                                    <?=$question->getProp4()?>
                                </label>
                            </li>
                        </ul>
                        <?php else: ?>
                            <ul class="answer">
                                <li><?=$question->getProp1()?></li>
                                <li><?=$question->getProp2()?></li>
                                <li><?=$question->getProp3()?></li>
                                <li><?=$question->getProp4()?></li>
                            </ul>
                        <?php endif;?>
                    </div>
                </div>
                <div class="annecdote">
                    <?=$question->getAnecdote()?>
                    <a href="https://fr.wikipedia.org/wiki/<?=$question->getWiki()?>" target="_blank">
                        wiki: <?=$question->getWiki()?>
                    </a>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <?php if ($user): ?>
    <button class="btn btn-primary btn-block">OK !</button>
    <?php else : ?>
    <a class="btn btn-primary btn-block" href="<?=$router->generate('login')?>">Connectez-vous pour jouer !</a>
    <?php endif;?>
</form>
