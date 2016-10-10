<?php

//To get which level has the user crossed
function getLevel($string)
{
 if(strpos($string, "/level1/level1.html")!==false) return 1; 
 if(strpos($string, "/level1/level2.html")!==false) return 2;
 if(strpos($string, "/level3.html")!==false) return 3;
 if(strpos($string, "/loading.html")!==false) return 4;
 if(strpos($string, "/level5/level5.html")!==false) return 5;
 if(strpos($string, "/levelsix/levelsix.html")!==false) return 6;  
 if(strpos($string, "/levelsix/goodriddance.html")!==false) return 7; 
 if(strpos($string, "/levelsix/devilsden.html")!==false) return 8;
 if(strpos($string, "/escribeespanol.html")!==false) return 9;
 if(strpos($string, "/ochentaysiete.html")!==false) return 10;
 if(strpos($string, "/gelo.html")!==false) return 11;
 if(strpos($string, "/baaraa.html")!==false) return 12;
 if(strpos($string, "/levellostcount/compress.html")!==false) return 13;
 if(strpos($string, "/levellostcount/theanswerisalwaysbatman.html")!==false) return 14;
 if(strpos($string, "/lev5.html")!==false) return 15;
 if(strpos($string, "/levelone6/levelone6.html")!==false) return 16; 
 if(strpos($string, "/Level17.html")!==false) return 17;
 if(strpos($string, "/atharapekhatara.html")!==false)return 18;  
 if(strpos($string, "/levelunnees/levelunnees.html")!==false)return 19;  
 if(strpos($string, "/levelunnees/mickeymouse.html")!==false) return 20;
 if(strpos($string, "/leveltwo1/leveltwo1.html")!==false) return 21;
 if(strpos($string, "/leveltwo1/fox.html")!==false) return 22;
 if(strpos($string, "/leveltwo1/martinluther.html")!==false) return 23;  
 if(strpos($string, "/LeVeLtwentYfOuR/")!==false) return 24;
 if(strpos($string, "/hello/")!==false) return 25;
 if(strpos($string, "/catwoman/ridiculouslyeasylevel.html")!==false) return 26;
 if(strpos($string, "/catwoman/weeknd.html")!==false) return 27;
 if(strpos($string, "/catwoman/minusforty.html")!==false) return 28; 
 if(strpos($string, "/tventy9/")!==false) return 29;
 if(strpos($string, "/leveL3o.html")!==false) return 30; 
 if(strpos($string, "/troisuno/level31.html")!==false) return 31;  
 if(strpos($string, "/troisuno/black.html")!==false) return 32;
 if(strpos($string, "/troisuno/therese.html")!==false) return 33;
 if(strpos($string, "/thiiiiiirtyfour/level34.html")!==false) return 34;
 if(strpos($string, "/thiiiiiirtyfour/marge.html")!==false) return 35;
 if(strpos($string, "/thiiiiiirtyfour/level36.html")!==false) return 36;
 if(strpos($string, "/thiiiiiirtyfour/fakeerror.html")!==false) return 37;
 if(strpos($string, "/hashtaglevel38/level38.html")!==false) return 38;
 if(strpos($string, "/hashtaglevel38/pi.html")!==false) return 39;
 if(strpos($string, "/hashtaglevel38/hithere.html")!==false) return 40;
 if(strpos($string, "/levellostcount/newfolder/")!==false) return 41;
 if(strpos($string, "/levellostcount/surname.html")!==false) return 42;
 if(strpos($string, "/lastfolderofthegame/level43.html")!==false) return 43;  
 if(strpos($string, "/lastfolderofthegame/agentsmith.html")!==false) return 44;
 if(strpos($string, "/lastfolderofthegame/unleadedfuel.html")!==false) return 45;
 if(strpos($string, "/lastfolderofthegame/mist.html")!==false)return 46;
 else return 0;
}
?>
