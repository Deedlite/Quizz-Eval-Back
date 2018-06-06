<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$basePath?>/public/css/style.css">
    <script src="https://use.fontawesome.com/releases/v5.0.10/js/solid.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.10/js/fontawesome.js"></script>
    <title>Oquiz</title>
</head>

<body data-path="<?=$basePath?>">
    
    <div class="container">
        <header class="text-center">
            <img class="img-fluid" src="<?=$basePath?>/docs/img/quizimg.png" alt="logo du quiz">
            <?=$this->insert( 'partials/nav' )?>
        </header>
        <main>
            <?=$this->section('content')?>
        </main>
        <footer>
            &copy; Copyright <?=date('Y')?> - O'clock
        </footer>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="<?=$basePath?>/public/js/app.js"></script>
</body>

</html>
