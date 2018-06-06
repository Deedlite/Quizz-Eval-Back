var app = {

  init: function() {

    app.basePath = $('body').data('path');

    $(document).scrollTop(0);

    $(document).ready(app.randomImg);

    $('#login').on('submit', app.login);

    $('#signup').on('submit', app.signup);

    $('.answer').each(app.shuffle);

    $('.quiz-form').ready(app.count);

    $('.quiz-form').on('submit', app.userAnswer);

  },

  count: function() {
    //compte le nombre de carte dans le quiz
    var count = $('.card').length;
    // affiche le nombre de questions dans le quiz
    $('#nb-question').text(count + 'questions');

  },

  randomImg: function() {
    //Base url de picsum
    var images = 'https://picsum.photos/286/180?image=';

    //Pour chaque source d'image on ajoute un nombre random a la fin de l'url picsum
    $('.random-img').each(function() {
      $(this).attr('src', images + (Math.floor(Math.random() * 50)));
    });

  },

  userAnswer: function(event) {

    event.preventDefault();
    //Pour chaque input radio checked
    $('input:checked').each(function() {
      //si il a la classe prop1
      if ($(this).hasClass('prop1')) {
        //on ajoute au parent selectionné la class et le css que l'on souhaite
        $(this).parents(".card-text").prev().addClass("alert alert-success");
        $(this).parents(".card-body").next().css("display", "block");
      } else {
        //si pas class prop1
        $(this).parents(".card-text").prev().addClass("alert alert-warning");
        $(this).parents(".card-body").next().css("display", "block");
      }

    });
    //on compte combien on a d'input radio check avec la class prop1
    var good = $('.prop1:checked').length;
    // et on affiche dans le dom le nombre de bonne reponse
    $('.score').text("Votre score: " + good + "/10").removeClass('alert-primary').addClass('alert-success');
    // ajout dans le bandeau du haut un lien pour rejouer
    $('<div>Rejouer !</div>').addClass('replay').appendTo('.score').css({'color': 'blue', 'cursor': 'pointer', 'text-decoration': 'underline'}).on('click', app.replay);
    //on change le text du bouton de validation et on scroll top doucement
    $('.btn').text("Rejouer !").removeClass("btn-primary").addClass("btn-success");
    $("html, body").animate({
      scrollTop: 0
    }, "slow");
    // on peut click sur le "nouveau" bouton de rejouez
    $('.btn-success').on('click', app.replay);

  },

  replay: function() {
    //rechargement de page
    location.reload();

  },

  shuffle: function() {
    //j'ai recupéré ce code sur le forum de jquery et je l'ai un peu adapté à mon cas
    //https://forum.jquery.com/topic/random-order-of-elements
    // get current ul
    var $ul = $(this);
    // get array of list items in current ul
    var $li = $ul.children('li');
    // sort array of list items in current ul randomly
    $li.sort(function(a, b) {
      // Get a random number between 0 and li length
      var temp = parseInt(Math.random() * $li.length);
      // Get 1 or 0, whether temp is odd or even
      var isOddOrEven = temp % 2;
      // Get +1 or -1, whether temp greater or smaller than li length / 2
      var isPosOrNeg = temp > $li.length / 2
        ? 1
        : -1;
      // Return -1, 0, or +1
      return (isOddOrEven * isPosOrNeg);
    })
    // append list items to ul
      .appendTo($ul);
  },

  login: function(event) {

    event.preventDefault();
    // on recupere les données
    var email = $('#email').val();
    var password = $('#password').val();
    // on crée la requete ajax
    $.ajax({
      url: app.basePath + '/login',
      method: 'post',
      data: {
        email: email,
        password: password
      },
      // format de reponse du serveur
      dataType: 'json'
    }).done(app.showErrors);

  },

  showErrors: function(errors) {

    if (errors.length === 0) {
      // il n'y a pas d'erreur on redirige
      document.location = app.basePath + '/';

    } else {
      // vide la liste des erreurs
      $('.errors').empty();
      // on affiche les errors dans une div
      $('<div>').text(errors[0]).addClass('alert alert-danger').appendTo('.errors');
    }

  },

  signup: function(event) {

    // On empêche le rechargement de la page
    event.preventDefault();

    // On récupère les informations du formulaire
    var data = {};
    var temp = $(this).serializeArray();

    temp.forEach(function(item) {
      // item.name = nom du champs
      // item.value = valeur correspondante
      data[item.name] = item.value;
    });

    $.ajax(app.basePath + '/signup', {
      method: 'post',
      data: data,
      dataType: 'json'
    }).done(app.showSignupErrors);
  },

  // Affiche la liste des messages d'erreurs
  showSignupErrors: function(errors) {

    // On vide la liste
    $('.errors').empty();

    if (errors.length === 0) {
      // L'utilisateur est bien inscrit
      // On redirige vers la page de connexion
      document.location = app.basePath + '/login';
      return;
    }

    errors.forEach(function(msg) {
      // on affiche les erreurs
      $('<div>').text(msg).addClass('alert alert-danger').appendTo('.errors');
    });
  }
};

$(app.init);
