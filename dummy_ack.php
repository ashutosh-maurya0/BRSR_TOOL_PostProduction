<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/jpg" href="images/cusrrs.jpg">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Entity NGRBC Policy Form</title>
        <link rel="stylesheet" href="sec_C/sec_C.css">
        <style>
            .hidden {
                display: none;
            }

            @media screen and (max-width: 800px) {
                #cinDiv {
                    display: none;
                }
            }
        </style>
    </head>

    <?php
        session_start();
        if (isset($_SESSION['cin']))
            $cin = $_SESSION['cin'];
    ?>

    <body>
        <header class="header">
            
            <ul class="main-nav">
                <li><a href="print/print_A.php" target="_blank">Print Section A</a></li>
                <li><a href="print/print_B.php" target="_blank">Print Section B</a></li>
                <li><a href="print/print_C.php" target="_blank">Print Section C</a></li>
                <li><a href="xbrl-generator/run_nodejs.php?cin=<?php echo isset($_SESSION['cin']) ? $_SESSION['cin'] : ''; ?>">Print XBRL</a></li>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </header>
        <div class="container">
            <h1>THANK YOU!</h1>
            <div class="policy">
                <h3>Your <?php if (isset($_SESSION['cin'])) echo("(CIN: $cin)"); else echo("")?> response for forms A, B and C have been successfully recorded.</h3>
            </div>
        </div>
    </body>
</html>
