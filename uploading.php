<?php
namespace SillyUtility;
require 'sources/autoload.php';
require 'sources/config.php';

if (empty($_REQUEST['uuid'])) {
  $error = ErrorPage::userErrorWithTitleAndMessage('Bill upload', 'Missing uuid, please go back and try again');
  $error->renderAndDie();
}
if (!preg_match('/^[a-z0-9-]+$/i',$_REQUEST['uuid'])) {
  $error = ErrorPage::userErrorWithTitleAndMessage('Bill upload', 'Bad uuid');
  $error->renderAndDie();
}
$uuid = $_REQUEST['uuid'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="William Entriken">
    <title>Silly Utility</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" crossorigin="anonymous">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link rel="stylesheet" href="main.css">

</head>

<body>
    <div class="primary-color-band">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand page-scroll" href="/">Silly Utility</a>
                </div>
            </div>
        </nav>
        
        <section class="selling-point text-xs-center">
            <div class="section-heading">
                <h1 class="display-3">
                  <i class="fa fa-check" aria-hidden="true"></i>
                  We got all the pages, thanks!
                </h1>
                <form class=" text-center text-xs-center" method="post" action="uploaded" enctype="multipart/form-data">
                    <input type="hidden" name="uuid" value="<?= $uuid ?>">
                    <h3 class=" text-center text-xs-center">
                      What is the ZIP code for this bill?
                    </h3>
                    <input class="form-control form-control-lg m-x-auto" type="text" pattern="\d*" name="zip" placeholder="ZIP Code" style="width:10em">
                    <h3 class=" text-center text-xs-center">
                      May we mail you if (and only if) a neighbor shares a bill?
                    </h3>
                    <input class="form-control m-x-auto form-control-lg" type="email" name="email" placeholder="email@mail.com" style="width:20em">
                    <hr>
                    <h3 class="text-center text-xs-center">
                      Would you please provide any extra details about this bill?
                    </h3>
                    <p>Company</p>
                    <input class="form-control m-x-auto form-control-lg" type="text" name="company" style="width:20em">
                    <hr>
                    <p>Billing date</p>
                    <input class="form-control m-x-auto form-control-lg" type="date" name="date" style="width:20em">
                    <hr>
                    <p>Franchise authority (name and address, if listed on bill)</p>
                    <input class="form-control m-x-auto form-control-lg" type="text" name="franchise" style="width:20em">
                    <hr>
                    <button class="btn btn-lg btn btn-success"><i class="fa fa-heart" aria-hidden="true"></i> Send details</button>
                    <p><i class="fa fa-arrow-up" aria-hidden="true"></i> That's the final button</p>
                </form>
            </div>
        </section>

    <footer class="text-xs-center">
            <p>Made by <a href="http://phor.net/">William Entriken</a> because I think utilities are a racket.</p>
            <p>Please mail volunteers<span>@</span>sillyutility.net to assist with this project.</p>
            <p>Privacy policy: we publish what you give us, that's the point.</p>
    </footer>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52764-24', 'auto');
  ga('send', 'pageview');

</script>
</body>

</html>
