<?php 
$page=$_GET['page']; 
$hal=$_GET['hal'];
	//Lib Romawi
	function getRomawi($thn){
        	switch ($thn){
                    case 13: 
                        return "XIII";
                        break;
                     case 14: 
                        return "XIV";
                        break;
                     case 15: 
                        return "XV";
                        break;
                    case 16: 
                        return "XVI";
                        break;
                    case 17: 
                        return "XVII";
                        break;
                    case 18:
                        return "XVIII";
                        break;
                    case 19:
                        return "XIX";
                        break;
                    case 20:
                        return "XX";
                        break;
                    case 21:
                        return "XXI";
                        break;
                    case 22:
                        return "XXII";
                        break;
                    case 23:
                        return "XXIII";
                        break;
                    case 24:
                        return "XXIV";
                        break;
                    case 25:
                        return "XXV";
                        break;
              }
       }
       
?>