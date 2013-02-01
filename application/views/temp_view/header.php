<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0-beta.1/jquery.mobile-1.3.0-beta.1.min.css" />
        <script src="http://code.jquery.com/jquery-1.9.0.js"></script>
        <script src="http://code.jquery.com/mobile/1.3.0-beta.1/jquery.mobile-1.3.0-beta.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
        <title><?php echo $title; ?></title>


    </head>
    <body> 
        <div data-role="page" data-theme="d"  data-add-back-btn="false">
            <div data-role="header">
                <div data-role="navbar">
                    <ul>
                        <li><a href="/index.php/newsfeed/">Nieuws</a></li>
                        <li><a href="/index.php/missingfeed/">Vermist</a></li>
                        <li><a href="#">Gezocht</a></li>
                        <li><a href="/" >Opties</a></li> <!-- class="ui-btn-active" -->
                    </ul>
                </div>
            </div>
