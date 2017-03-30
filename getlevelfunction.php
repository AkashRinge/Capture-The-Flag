<?php

//To get which level has the user crossed
function getLevel($string)
{
 if(strpos($string, "/level1/level1.php")!==false) return 1; 
 if(strpos($string, "/level1/level2.php")!==false) return 2;
 if(strpos($string, "/level3.php")!==false) return 3;
 if(strpos($string, "/loading.php")!==false) return 4;
 if(strpos($string, "/level5/level5.php")!==false) return 5;
 if(strpos($string, "/levelsix/levelsix.php")!==false) return 6;  
 if(strpos($string, "/levelsix/goodriddance.php")!==false) return 7; 
 if(strpos($string, "/levelsix/devilsden.php")!==false) return 8;
 if(strpos($string, "/escribeespanol.php")!==false) return 9;
 if(strpos($string, "/ochentaysiete.php")!==false) return 10;
 if(strpos($string, "/gelo.php")!==false) return 11;
 if(strpos($string, "/baaraa.php")!==false) return 12;
 if(strpos($string, "/levellostcount/compress.php")!==false) return 13;
 if(strpos($string, "/levellostcount/theanswerisalwaysbatman.php")!==false) return 14;
 if(strpos($string, "/lev5.php")!==false) return 15;
 if(strpos($string, "/levelone6/levelone6.php")!==false) return 16; 
 if(strpos($string, "/Level17.php")!==false) return 17;
 if(strpos($string, "/atharapekhatara.php")!==false)return 18;  
 if(strpos($string, "/levelunnees/levelunnees.php")!==false)return 19;  
 if(strpos($string, "/levelunnees/mickeymouse.php")!==false) return 20;
 if(strpos($string, "/leveltwo1/leveltwo1.php")!==false) return 21;
 if(strpos($string, "/leveltwo1/fox.php")!==false) return 22;
 if(strpos($string, "/leveltwo1/martinluther.php")!==false) return 23;  
 if(strpos($string, "/LeVeLtwentYfOuR")!==false) return 24;
 if(strpos($string, "/LeVeLtwentYfOuR/")!==false) return 24;
 if(strpos($string, "/hello")!==false) return 25;
 if(strpos($string, "/hello/")!==false) return 25;
 if(strpos($string, "/catwoman/ridiculouslyeasylevel.php")!==false) return 26;
 if(strpos($string, "/catwoman/weeknd.php")!==false) return 27;
 if(strpos($string, "/catwoman/minusforty.php")!==false) return 28; 
 if(strpos($string, "/tventy9")!==false) return 29;
 if(strpos($string, "/tventy9/")!==false) return 29;
 if(strpos($string, "/leveL3o.php")!==false) return 30; 
 if(strpos($string, "/troisuno/level31.php")!==false) return 31;  
 if(strpos($string, "/troisuno/black.php")!==false) return 32;
 if(strpos($string, "/troisuno/therese.php")!==false) return 33;
 if(strpos($string, "/thiiiiiirtyfour/level34.php")!==false) return 34;
 if(strpos($string, "/thiiiiiirtyfour/marge.php")!==false) return 35;
 if(strpos($string, "/thiiiiiirtyfour/level36.php")!==false) return 36;
 if(strpos($string, "/thiiiiiirtyfour/fakeerror.php")!==false) return 37;
 if(strpos($string, "/hashtaglevel38/level38.php")!==false) return 38;
 if(strpos($string, "/hashtaglevel38/pi.php")!==false) return 39;
 if(strpos($string, "/hashtaglevel38/hithere.php")!==false) return 40;
 if(strpos($string, "/levellostcount/newfolder")!==false) return 41;
 if(strpos($string, "/levellostcount/newfolder/")!==false) return 41;
 if(strpos($string, "/levellostcount/surname.php")!==false) return 42;
 if(strpos($string, "/lastfolderofthegame/level43.php")!==false) return 43;  
 if(strpos($string, "/lastfolderofthegame/agentsmith.php")!==false) return 44;
 if(strpos($string, "/lastfolderofthegame/unleadedfuel.php")!==false) return 45;
 if(strpos($string, "/lastfolderofthegame/mist.php")!==false)return 46;
 if(strpos($string, "/lolJK/level47.php")!==false)return 47;
 if(strpos($string, "/lolJK/fourthousandfivehundred.php")!==false)return 48;
 if(strpos($string, "/lolJK/anagram.php")!==false)return 49;
 if(strpos($string, "/halfcentury/nextLevel.php")!==false)return 50;
 if(strpos($string, "/halfcentury/levL51.php")!==false)return 51;

 
 else return 0;
}
?>
