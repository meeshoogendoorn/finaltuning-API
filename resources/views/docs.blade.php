<!DOCTYPE html>
<html lang="en">
<head>
    <title>finaltuning - API - DOCS</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Bootstrap 4 Template For Software Startups">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="images/favicon.png">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- FontAwesome JS-->
    <script defer src="assets/fontawesome/js/all.min.js"></script>

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.2/styles/atom-one-dark.min.css">

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/theme.css">

</head>

<body class="docs-page">
<header class="header fixed-top">
    <div class="branding docs-branding">
        <div class="container-fluid position-relative py-2">
            <div class="docs-logo-wrapper">
                <button id="docs-sidebar-toggler" class="docs-sidebar-toggler docs-sidebar-visible mr-2 d-xl-none" type="button">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="site-logo"><a class="navbar-brand" href="/"><img class="logo-icon mr-2" src="images/finaltuning_logo.png" width="200" alt="logo"><span class="logo-text">API&nbsp;<span class="text-alt">Docs</span></span></a></div>
            </div><!--//docs-logo-wrapper-->
        </div><!--//container-->
    </div><!--//branding-->
</header><!--//header-->

<div class="docs-wrapper">
    <div id="docs-sidebar" class="docs-sidebar">
        <div class="top-search-box d-lg-none p-3">
            <form class="search-form">
                <input type="text" placeholder="Search the docs..." name="search" class="form-control search-input">
                <button type="submit" class="btn search-btn" value="Search"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <nav id="docs-nav" class="docs-nav navbar">
            <ul class="section-items list-unstyled nav flex-column pb-3">
                <li class="nav-item section-title"><a class="nav-link scrollto active" href="#section-1"><span class="theme-icon-holder mr-2"><i class="fas fa-map-signs"></i></span>Introductie</a></li>
                <li class="nav-item"><a class="nav-link scrollto" href="#item-1-1">Authenticatie</a></li>
                <li class="nav-item"><a class="nav-link scrollto" href="#item-1-2">Auto's</a></li>
                <li class="nav-item"><a class="nav-link scrollto" href="#item-1-3">Auto modellen</a></li>
                <li class="nav-item"><a class="nav-link scrollto" href="#item-1-4">Generaties</a></li>
                <li class="nav-item"><a class="nav-link scrollto" href="#item-1-5">Motor type's</a></li>
                <li class="nav-item"><a class="nav-link scrollto" href="#item-1-6">Resultaat tune</a></li>
                <li class="nav-item"><a class="nav-link scrollto" href="#item-1-7">Informatie Auto</a></li>
            </ul>

        </nav><!--//docs-nav-->
    </div><!--//docs-sidebar-->
    <div class="docs-content">
        <div class="container">
            <article class="docs-article" id="section-1">
                <header class="docs-header">
                    <h1 class="docs-heading">Introductie <span class="docs-time">Laatst geupdate: 22-02-2020</span></h1>
                    <section class="docs-intro">
                        <p>Welkom bij de docs voor <code>api.finaltuning.nl</code></p>
                    </section><!--//docs-intro-->
                </header>
                <section class="docs-section" id="item-1-1">
                    <h2 class="section-heading">Authenticatie</h2>
                    <p>Er is maar 1 manier om je via de finaltuning API te authenticeren.</p>
                    <p>Dit doe je door gebruik te maken van een Bearer token</p>
                    <h5>Voorbeeld:</h5>
                    <ul>
                        <li><strong class="mr-1">Authorization:</strong> <code>Bearer `Your API Key`</code></li>
                    </ul>
                    <h5>Voorbeeld ophalen auto's met api key:</h5>
                    <div class="docs-code-block">
                        <script src="https://gist.github.com/meeshoogendoorn/7c3ea0239cfcbc66fd3fd59c04531ee3.js"></script>
                    </div>
                </section><!--//section-->

                <section class="docs-section" id="item-1-2">
                    <h2 class="section-heading">Auto's</h2>
                    <p>Om de beschikbare auto merken aan te roepen gebruiken we de url <code>https://api.finaltuning.nl/api/cars</code></p>
                    <h5>Voorbeeld ophalen auto merken:</h5>
                    <div class="docs-code-block">
                        <script src="https://gist.github.com/meeshoogendoorn/7c3ea0239cfcbc66fd3fd59c04531ee3.js"></script>
                    </div>

                    <h5>De response:</h5>
                    <p>Je ontvangt dan een JSON response terug die er als volgt uit ziet.</p>
                    <div class="docs-code-block">
                    <script src="https://gist.github.com/meeshoogendoorn/3b09e97d312465a4f4d090ae35dabab5.js"></script>
                    </div>
                </section><!--//section-->

                <section class="docs-section" id="item-1-3">
                    <h2 class="section-heading">Auto modellen</h2>
                    <p>Wil jij de modellen van een bepaald automerk ophalen dan doe je dit met het onderstaande request.</p>
                    <h5>Voorbeeld modellen van bepaald automerk op te halen.</h5>
                    <div class="docs-code-block">
                        <script src="https://gist.github.com/meeshoogendoorn/caea916b19205248da16affeb6d0aa81.js"></script>
                    </div>
                    <h5>De response:</h5>
                    <p>Je ontvangt dan een JSON response terug die er als volgt uit ziet.</p>
                    <div class="docs-code-block">
                        <script src="https://gist.github.com/meeshoogendoorn/59f05fd0b2856e566d57fe46ebc3dc94.js"></script>
                    </div>
                </section><!--//section-->

                <section class="docs-section" id="item-1-4">
                    <h2 class="section-heading">Generaties</h2>
                    <p>Wil jij de generaties van een bepaald automerk en model ophalen dan doe je dit met het onderstaande request.</p>
                    <h5>Voorbeeld generaties van bepaald automerk/model op halen.</h5>
                    <div class="docs-code-block">
                        <script src="https://gist.github.com/meeshoogendoorn/f99fffc514124960ab2183608392c97f.js"></script>
                    </div>
                    <h5>De response:</h5>
                    <p>Je ontvangt dan een JSON response terug die er als volgt uit ziet.</p>
                    <div class="docs-code-block">
                        <script src="https://gist.github.com/meeshoogendoorn/e74524d30f2d42515d71929ca4e18835.js"></script>
                    </div>
                </section><!--/

                /section-->
                <section class="docs-section" id="item-1-5">
                    <h2 class="section-heading">Motor Type's</h2>
                    <p>Wil jij de verschillende motor type's van een bepaald automerk en model/generatie ophalen dan doe je dit met het onderstaande request.</p>
                    <h5>Voorbeeld motor type's van bepaald automerk op te halen.</h5>
                    <code>LET OP: hierbij gebruik je ID die je hebt ontvangen bij de response om een generatie van een automerk/model op te halen.</code>
                    <div class="docs-code-block">
                        <script src="https://gist.github.com/meeshoogendoorn/6aa4d7672094ea30e09cf3769883200c.js"></script>
                    </div>
                    <h5>De response:</h5>
                    <p>Je ontvangt dan een JSON response terug die er als volgt uit ziet.</p>
                    <div class="docs-code-block">
                        <script src="https://gist.github.com/meeshoogendoorn/395df7f1f98ba84c12de41710eb35e9b.js"></script>
                    </div>
                </section><!--//section-->

                <section class="docs-section" id="item-1-6">
                    <h2 class="section-heading">Resultaat Tune</h2>
                    <p>Wil jij het resultaat van een auto ophalen dan doe je dit met het onderstaande request.</p>
                    <h5>Voorbeeld om resultaat op te halen.</h5>
                    <code>LET OP: hierbij gebruik je ID die je hebt ontvangen bij de response om een motor type van een automerk/model op te halen.</code>
                    <div class="docs-code-block">
                        <script src="https://gist.github.com/meeshoogendoorn/ff8893c686f2d080f5c66ddc3f56b575.js"></script>
                    </div>
                    <h5>De response:</h5>
                    <p>Je ontvangt dan een JSON response terug die er als volgt uit ziet.</p>
                    <div class="docs-code-block">
                        <script src="https://gist.github.com/meeshoogendoorn/c7b78ff8f91d130db647ad24877134b9.js"></script>
                    </div>
                </section><!--//section-->

                <section class="docs-section" id="item-1-7">
                    <h2 class="section-heading">Info Auto</h2>
                    <p>Wil jij de info van een auto ophalen die je nodig hebt bij het tunen dan doe je dit met het onderstaande request.</p>
                    <h5>Voorbeeld de info op te halen.</h5>
                    <code>LET OP: hierbij gebruik je ID die je hebt ontvangen bij de response om een motor type van een automerk/model op te halen.</code>
                    <div class="docs-code-block">
                        <script src="https://gist.github.com/meeshoogendoorn/e0cd4dd34b803ebbb81d644c7f4961f0.js"></script>
                    </div>
                    <h5>De response:</h5>
                    <p>Je ontvangt dan een JSON response terug die er als volgt uit ziet.</p>
                    <div class="docs-code-block">
                        <script src="https://gist.github.com/meeshoogendoorn/a3ee95665014e05c94135b2d775d2b83.js"></script>
                    </div>
                </section><!--//section-->

            </article>

            <footer class="footer">
                <div class="container text-center py-5">
                    <small class="copyright">Alle rechten voorbehouden &copy; <a href="https://finaltuning.nl/" target="_blank">finaltuning</a></small>
                </div>
            </footer>
        </div>
    </div>
</div><!--//docs-wrapper-->



<!-- Javascript -->
<script src="assets/plugins/jquery-3.4.1.min.js"></script>
<script src="assets/plugins/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>


<!-- Page Specific JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js"></script>
<script src="assets/js/highlight-custom.js"></script>
<script src="assets/plugins/jquery.scrollTo.min.js"></script>
<script src="assets/plugins/lightbox/dist/ekko-lightbox.min.js"></script>
<script src="assets/js/docs.js"></script>

</body>
</html>

