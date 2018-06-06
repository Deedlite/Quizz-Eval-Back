<nav>
    <?php if ($user): ?>
    <ul>
        <li><a href="<?=$router->generate('home')?>"><i class="fas fa-home"></i> Accueil</a></li>
        <li><a href="<?=$router->generate('profile')?>"><i class="fas fa-user"></i> Mon compte</a></li>
        <li><a href="<?=$router->generate('logout')?>"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
    </ul>
    <?php else : ?>
    <ul>
        <li><a href="<?=$router->generate('home')?>"><i class="fas fa-home"></i> Accueil</a></li>
        <li><a href="<?=$router->generate('signup')?>"><i class="fas fa-plus"></i> Inscription</a></li>
        <li><a href="<?=$router->generate('login')?>"><i class="fas fa-sign-in-alt"></i> Connexion</a></li>
    </ul>
    <?php endif; ?>
</nav>
