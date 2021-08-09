<?php
$css_file = "diary.css";

//global $header, $footer;

$header="<!DOCTYPE html>
<html lang=\"ru\">

<head>

<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />

<meta name=\"viewport\" content=\"initial-scale=1.0 width=device-width user-scalable=no\" />


<script type=text/javascript >
/*
d = new Date();

h = d.getHours();



alert(h);*.
</script>

<!--<script type=\"text/javascript\" src=\"js/jQuery.js\"></script>



<script type=\"text/javascript\" src=\"./js/script1.js\"></script>-->



<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"./css/style.css\" />

<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"./css/".$css_file."\" />

<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"./css/page_nav_str.css\" />





<style>
body {1
width: 1990px;
}
</style>

<title></title>

</head>



<body onload=\"\">


<div id=\"wrapper\">

<header>

<section>

<div class=\"logo\" id=\"left_logo\">
<img />
</div>

<div class=\"logo\" id=\"right_logo\">
<img />
</div>

<div id=\"header\">
<h1>Begin of test wrapper</h1>
<h2></h2>
</div>

</section>


<form method=\"post\">
<nav>

</nav>
</form>


</header>





<div id=\"content\">


<section id=\"main\">";


$footer="
</section>


</div><!-- END OF CONTENT -->




<!--
<h2>End of test wrapper</h2><footer>

<div><ul>
<li>E-mail</li>
<li>Адрес</li>
<li>Телефон</li>
<li>Время работы</li>
</ul></div>

<!--  <div><ul>
<li>:</li>
<li>:</li>
<li>:</li>
<li>:</li>
</ul></div> -->

<div><ul>
<li>Test</li>
<li>Test</li>
<li>Test</li>
<li>Test</li>
</ul></div>-->

</footer>

</div><!-- WRAPPER ENDS! -->


</body>
</html>";


define ('HEADER', $header);

define ('FOOTER', $footer);


?>




