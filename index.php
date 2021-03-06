<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>LiveQuestion</title>
      <link rel="stylesheet" type="text/css" href="styles/indexStyle.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
      <script type="text/javascript" src="script/indexScript.js"></script>
      <link rel="icon" href="img/favicon.png" type="image/png">
   </head>
   <body>
      <header>
         <?php
            require("navbar.php");
            ?>
         <div class="container headerBlock">
            <div class="figureAccueil">
               <div class="figureAccueil2"></div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <h1>Lorem ipsum <br> dolor sit <br> amet.</h1>
                  <p>Sed elit libero, accumsan et volutpat id, aliquam <br> tristique odio. Mauris sed lectus a justo
                     malesuada <br> dapibus. Morbi eleifend tellus nisi, sed ullamcorper <br> mi tincidunt faucibus.
                     Mauris justo tortor, tempor <br> ut odio in, dictum malesuada eros.
                  </p>
                  <a href="" class="btn bouton headerBouton"><span class="headButton">Bouton CTA</span></a>
               </div>
               <div class="col-md-6">
                  <img src="img/step-1.png">
               </div>
            </div>
         </div>
      </header>
      <div class="borderBottomHeader"></div>
      <section id="section1">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <img src="img/i1.png">
                  <h5>Suits Your Style</h5>
                  <p>Drogon sed ut perspiciatis unde omnis iste error <br> sit voluptatem accusantium doloremque <br>
                     laudantium, totam aperiam eaque Arya.
                  </p>
               </div>
               <div class="col-md-4">
                  <img src="img/i2.png">
                  <h5>Ut posuere molestie</h5>
                  <p>Duis convallis convallis tellus imp interdum. Non <br> diam phasellus vestibulum lorem sed risus
                     <br> ultricies Tyrion. Enim blandit volupat.
                  </p>
               </div>
               <div class="col-md-4">
                  <img src="img/i3.png">
                  <h5>Vestibulum ut erat consectetur</h5>
                  <p>Eunuch sed blandit libero volutpat sed cras. <br> Cersei quis imperdiet tincidunt unuch pulvinar
                     <br> sapien. Habitasse platea Davos vestibulum.
                  </p>
               </div>
            </div>
         </div>
      </section>
      <section id="section2">
         <div class="container">
            <div class="section2CenteredText">
               <h2>Aenean magna odio</h2>
               <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem <br> accusantium doloremque
                  laudantium,
                  totam
                  rem aperiam,
                  eaque ipsa.
               </p>
            </div>
            <div id="demo" class="carousel slide" data-ride="carousel">
               <div class="lienSection2">
                  <a data-target="#demo" data-slide-to="0" class="btn boutonCarousel">Lien1</a>
                  <a data-target="#demo" data-slide-to="1" class="btn boutonCarousel">Lien2</a>
                  <a data-target="#demo" data-slide-to="2" class="btn boutonCarousel">Lien3</a>
               </div>
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <img src="img/step-2.jpg" alt="Los Angeles">
                     <div class="subtitles">
                        <h2>Praesent vitae velit tristique <span>old alos</span></h2>
                        <p>Ned ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                           laudantium, totam rem aperiam,
                           eaque ipsa.
                        </p>
                        <div class="card1">
                           <img class="rounded-circle" src="img/persona3.jpg">
                           <p>"Proin vel dolor dictum, congue tellus at, lobortis neque"</p>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="subtitles-inv">
                        <h2>Duis et eros lorem.</h2>
                        <p>Ned ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                           laudantium, totam rem aperiam,
                           eaque ipsa.
                        </p>
                        <div class="card2">
                           <img class="rounded-circle" src="img/persona2.jpg">
                           <p>"Aliquam gravida magna ut"</p>
                        </div>
                     </div>
                     <img class="inv" src="img/step-3.jpg" alt="Chicago">
                  </div>
                  <div class="carousel-item">
                     <div class="subtitles-inv">
                        <h2>Curabitur gravida metus at mi <span>malesuada</span>.</h2>
                        <p>Ned ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                           laudantium, totam rem aperiam,
                           eaque ipsa.
                        </p>
                        <div class="card3">
                           <img class="rounded-circle" src="img/persona1.jpg">
                           <p>"malesuada."</p>
                        </div>
                     </div>
                     <img class="inv" src="img/step-4.png" alt="New York">
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section id="Section3">
         <img src="img/iplay.png">
         <h2 class="h2Section3">"Nulla venegatis magna fringilla"</h2>
      </section>
      <section id="Section4">
         <div class="contenuApp">
            <div class="texteApp">
               <h4>Etiam laot,<span> alique sceleris.</span></h4>
               <br>
               <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem<br> accusantium doloremque laudantium,
                  totam rem aperiam, easque ipsa.
               </p>
            </div>
            <div class="iconApp">
               <button type="button" class="btn btn-light btn-lg"><img class="imgMarques" src="img/marque1.jpg"> Kyan
               Boards</button>
               <button type="button" class="btn btn-light btn-lg"><img class="imgMarques" src="img/marque2.jpg">
               Atica</button>
               <button type="button" class="btn btn-light btn-lg"><img class="imgMarques" src="img/marque3.jpg">
               Triva</button>
            </div>
            <div class="iconApp">
               <button type="button" class="btn btn-light btn-lg"><img class="imgMarques" src="img/marque4.jpg">
               Kanba</button>
               <button type="button" class="btn btn-light btn-lg"><img class="imgMarques" src="img/marque5.jpg"> Tvit
               Forms</button>
               <button type="button" class="btn btn-light btn-lg"><img class="imgMarques" src="img/marque6.jpg">
               Aven</button>
               <button type="button" class="btn btn-light btn-lg"><img class="imgMarques" src="img/marque7.jpg">
               Utosia</button>
            </div>
         </div>
      </section>
      <div class="borderBottomSection4"></div>
      <section id="Section5">
         <div class="container">
            <div class="titreFaq">
               <h4>FAQ</h4>
               <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem<br> accusantium doloremque laudantium,
                  totam rem aperiam, easque ipsa.
               </p>
            </div>
            <div class="questionFaq">
               <div class="question1">
                  <p><span class="section5TextColor1 changeColor">Can I upgrade later on?</span><span
                     class="iconeFleche"><i class="fas fa-caret-right iconeFlecheJS1"></i></span></p>
                  <p class="text1">Integer ut Oberyn massa. Sed feugiat vitae turpis a porta. Aliquam <br> sagittis
                     interdum Melisandre. Vivamus ornare pharetra diam sit <br> amet tincidunt. Eunuch sit amet
                     pharetra odio. Vivamus in tempor <br> ipsum, sit amet elementum neque. Sed faucibus posuere
                     pharetra.<br> In imperdiet eleifend dui a aliquet. Aliquam imperdiet Tyrion purus <br> vitae
                     rutrum. Donec eu commodo nunc. Mauris dignissim lectus <br> massa, eget cursus quam mollis id.
                     Eddard sit amet ex Jon nibh <br> maximus cursus at vitae mi. Duis tincidunt aliquam mi sed
                     sagittis.
                  </p>
               </div>
               <div class="question2">
                  <p><span class="section5TextColor2 changeColor">Can I port my data from another
                     provider?</span><span class="iconeFleche"><i
                        class="fas fa-caret-right iconeFlecheJS2"></i></span>
                  </p>
                  <p class="text2">Integer ut Oberyn massa. Sed feugiat vitae turpis a porta. Aliquam <br> sagittis
                     interdum Melisandre. Vivamus ornare pharetra diam sit <br> amet tincidunt. Eunuch sit amet
                     pharetra odio. Vivamus in tempor <br> ipsum, sit amet elementum neque. Sed faucibus posuere
                     pharetra.<br> In imperdiet eleifend dui a aliquet. Aliquam imperdiet Tyrion purus <br> vitae
                     rutrum. Donec eu commodo nunc. Mauris dignissim lectus <br> massa, eget cursus quam mollis id.
                     Eddard sit amet ex Jon nibh <br> maximus cursus at vitae mi. Duis tincidunt aliquam mi sed
                     sagittis.
                  </p>
               </div>
               <div class="question3">
                  <p><span class="section5TextColor3 changeColor">Are my food photos stored forever in the
                     cloud?</span><span class="iconeFleche"><i
                        class="fas fa-caret-right iconeFlecheJS3"></i></span>
                  </p>
                  <p class="text3">Integer ut Oberyn massa. Sed feugiat vitae turpis a porta. Aliquam <br> sagittis
                     interdum Melisandre. Vivamus ornare pharetra diam sit <br> amet tincidunt. Eunuch sit amet
                     pharetra odio. Vivamus in tempor <br> ipsum, sit amet elementum neque. Sed faucibus posuere
                     pharetra.<br> In imperdiet eleifend dui a aliquet. Aliquam imperdiet Tyrion purus <br> vitae
                     rutrum. Donec eu commodo nunc. Mauris dignissim lectus <br> massa, eget cursus quam mollis id.
                     Eddard sit amet ex Jon nibh <br> maximus cursus at vitae mi. Duis tincidunt aliquam mi sed
                     sagittis.
                  </p>
               </div>
               <div class="question4">
                  <p><span class="section5TextColor4 changeColor">Who foots the bill for that?</span><span
                     class="iconeFleche"><i class="fas fa-caret-right iconeFlecheJS4"></i></span></p>
                  <p class="text4">Integer ut Oberyn massa. Sed feugiat vitae turpis a porta. Aliquam <br> sagittis
                     interdum Melisandre. Vivamus ornare pharetra diam sit <br> amet tincidunt. Eunuch sit amet
                     pharetra odio. Vivamus in tempor <br> ipsum, sit amet elementum neque. Sed faucibus posuere
                     pharetra.<br> In imperdiet eleifend dui a aliquet. Aliquam imperdiet Tyrion purus <br> vitae
                     rutrum. Donec eu commodo nunc. Mauris dignissim lectus <br> massa, eget cursus quam mollis id.
                     Eddard sit amet ex Jon nibh <br> maximus cursus at vitae mi. Duis tincidunt aliquam mi sed
                     sagittis.
                  </p>
               </div>
               <div class="question5">
                  <p><span class="section5TextColor5 changeColor">What's the real cost?</span><span
                     class="iconeFleche"><i class="fas fa-caret-right iconeFlecheJS5"></i></span></p>
                  <p class="text5">Integer ut Oberyn massa. Sed feugiat vitae turpis a porta. Aliquam <br> sagittis
                     interdum Melisandre. Vivamus ornare pharetra diam sit <br> amet tincidunt. Eunuch sit amet
                     pharetra odio. Vivamus in tempor <br> ipsum, sit amet elementum neque. Sed faucibus posuere
                     pharetra.<br> In imperdiet eleifend dui a aliquet. Aliquam imperdiet Tyrion purus <br> vitae
                     rutrum. Donec eu commodo nunc. Mauris dignissim lectus <br> massa, eget cursus quam mollis id.
                     Eddard sit amet ex Jon nibh <br> maximus cursus at vitae mi. Duis tincidunt aliquam mi sed
                     sagittis.
                  </p>
               </div>
               <div class="question6">
                  <p><span class="section5TextColor6 changeColor">Can my company request a custom plan?</span><span
                     class="iconeFleche"><i class="fas fa-caret-right iconeFlecheJS6"></i></span></p>
                  <p class="text6">Integer ut Oberyn massa. Sed feugiat vitae turpis a porta. Aliquam <br> sagittis
                     interdum Melisandre. Vivamus ornare pharetra diam sit <br> amet tincidunt. Eunuch sit amet
                     pharetra odio. Vivamus in tempor <br> ipsum, sit amet elementum neque. Sed faucibus posuere
                     pharetra.<br> In imperdiet eleifend dui a aliquet. Aliquam imperdiet Tyrion purus <br> vitae
                     rutrum. Donec eu commodo nunc. Mauris dignissim lectus <br> massa, eget cursus quam mollis id.
                     Eddard sit amet ex Jon nibh <br> maximus cursus at vitae mi. Duis tincidunt aliquam mi sed
                     sagittis.
                  </p>
               </div>
               <div class="boutonFaq">
                  <button type="button" class="btn btn-light disabled">Still have unanswered questions?<span
                     class="boutonRose"> Get in touch</span></button>
               </div>
            </div>
         </div>
      </section>
      <div class="borderBottomDivSection5">
         <div class="borderBottomSection5"></div>
      </div>
      <?php
         require("footer.php");
         ?>
   </body>
</html>