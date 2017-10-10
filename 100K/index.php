<?php
/**
 * Created by PhpStorm.
 * User: Shai
 * Date: 19/11/2016
 * Time: 18:44
 */

 session_start();
$counter_name = "counter.txt";
// Check if a text file exists. If not create one and initialize it to zero.
if (!file_exists($counter_name)) {
  $f = fopen($counter_name, "w");
  fwrite($f,"0");
  fclose($f);
}
// Read the current value of our counter file
$f = fopen($counter_name,"r");
$counterVal = fread($f, filesize($counter_name));
fclose($f);
// Has visitor been counted in this session?
// If not, increase counter value by one
if(!isset($_SESSION['hasVisited'])){
  $_SESSION['hasVisited']="yes";
  $counterVal++;
  $f = fopen($counter_name, "w");
  fwrite($f, $counterVal);
  fclose($f); 
}

$income=0;



$myfile = fopen("income.txt", "r") or die("Unable to open file!");
$income= fgets($myfile);
fclose($myfile);


$percent=($income/100000)*100;

$today=date("j")-1;
$daysofmonth=date("t");

$monthsofar=round($today/$daysofmonth,2);
$monthsofarprecent=round($today/$daysofmonth,2)*100;

$howmuchweshouldhave=round($monthsofar*100000,2);

?>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:fb="http://ogp.me/ns/fb#">

<head>
    <meta charset="UTF8">
<meta property="og:type" content="image" />
<meta property="og:image" content="fb.jpg" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>

        @import url('https://fonts.googleapis.com/css?family=Alef');
        body {
            background-image: url("bg.jpg");


            font-family: 'Alef', sans-serif;


        }

        .progress-bar {
            background-color: rgba(200, 178, 154, 1.2); !important;
        }

        .center-text {
            position: relative;
            top: 50%;
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            text-align: center;
            display: block;
            color: white;
            text-shadow: 0 1px 5px grey;
            clear: both;
        }

        h2 { color: #111; font-size: 30px; font-weight: 300; line-height: 32px; margin: 0 0 72px; text-align: center; }
    </style>
<title lang="he" dir="rtl">100K</title>

</head>
<body lang="he" dir="rtl">
<div>

    <p>


    <h1 class="center-text">


        היעד: 100,000 שקלים בחודש

    </h1>

    </p>

</div>
<div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar"
         aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?=$percent;?>%">
        <?=$percent;?>%
    </div>
</div>

<div>
    <h1 class="center-text">

עד כה הכנסנו החודש: <?= $income;?> שקלים
    </h1>
	    <h1 class="center-text">
עד כה היינו אמורים להכניס: <?=$howmuchweshouldhave;?> שקלים
    </h1>
<div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar"
         aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?=$monthsofarprecent;?>%">
        <?=$monthsofarprecent;?>%
</div>


</div>
    <h2>
בהמשך להחלטת האסיפה הכללית, הצבנו לעצמנו קו אדום לפיו בשלושת החודשים הקרובים על ההכנסות החודשיות לעמוד על 
<b>
100 אלף שקלים בחודש, כל חודש
</b>

<br/>
רוצות ורוצים לעזור להפוך את הקואופ למקום שלכולנו יהיה נחמד יותר לבוא אליו ולקנות בו? <a href="mailto:jade.gubay@gmail.com">פנו לג'ייד</a> והצטרפו לאחד מהצוותים
		
		
    </h2>
</div>
<?=$counterVal;?>
/<body>
</html>