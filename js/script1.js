function submit_wrapper($a, $b, $c, $d)
{ 

if($d!="")
{
$c=window.prompt($d, $c);
}
$str='<input type="hidden" name="'+$b+'" value="'+$c+'" />';
jQuery($a).prepend($str);
} 
function poi()
{
window.alert("Testing...");
$y=window.prompt("Enter tags", "body");
$x=jQuery($y).html();
window.alert($x);
}
function launch() 
{
jQuery("#nav_m_container").toggle();
}



function  submit_css_changer($m)
{
$q=jQuery($m).css('width');
$w=jQuery($m).css('height');
$e=jQuery($m).css('margin-left');
$r=jQuery($m).css('margin-bottom');
$q=parseInt($q);
$w=parseInt($w);
$e=parseInt($e);
$r=parseInt($r);
$q=$q*1.3;
$w=$w*1.1;
$e=$e/1.4;
$r=$r/1.2;
jQuery($m).css('width', $q);
jQuery($m).css('height', $w);
jQuery($m).css('margin-left', $e);
jQuery($m).css('margin-bottom', $r);
jQuery($m).css('background-color', '#aa0000');
jQuery($m).css('color', 'black');
//jQuery($m).css('text-shadow', 'white 1px 1px 1px');
}

