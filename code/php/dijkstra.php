<?php
session_start();

$_distArr = array();
$_distArr["Αλεξανδρούπολη"]["Ασπρόπυργος"] = 10;
$_distArr["Αλεξανδρούπολη"]["Ηράκλειο"] = 15;
$_distArr["Αλεξανδρούπολη"]["Θεσσαλονίκη"] = 3;

$_distArr["Ασπρόπυργος"]["Αλεξανδρούπολη"] = 10;
$_distArr["Ασπρόπυργος"]["Ηράκλειο"] = 10;
$_distArr["Ασπρόπυργος"]["Θεσσαλονίκη"] = 5;
$_distArr["Ασπρόπυργος"]["Καλαμάτα"] = 3;
$_distArr["Ασπρόπυργος"]["Λάρισα"] = 2;
$_distArr["Ασπρόπυργος"]["Μυτιλήνη"] = 8;
$_distArr["Ασπρόπυργος"]["Πάτρα"] = 2;

$_distArr["Ηράκλειο"]["Αλεξανδρούπολη"] = 15;
$_distArr["Ηράκλειο"]["Ασπρόπυργος"] = 10;
$_distArr["Ηράκλειο"]["Καλαμάτα"] = 4;

$_distArr["Θεσσαλονίκη"]["Αλεξανδρούπολη"] = 3;
$_distArr["Θεσσαλονίκη"]["Ασπρόπυργος"] = 5;
$_distArr["Θεσσαλονίκη"]["Ιωάννινα"] = 1;
$_distArr["Θεσσαλονίκη"]["Λάρισα"] = 1;

$_distArr["Ιωάννινα"]["Θεσσαλονίκη"] = 1;
$_distArr["Ιωάννινα"]["Πάτρα"] = 3;

$_distArr["Καλαμάτα"]["Ασπρόπυργος"] = 3;
$_distArr["Καλαμάτα"]["Ηράκλειο"] = 4;
$_distArr["Καλαμάτα"]["Πάτρα"] = 2;

$_distArr["Λάρισα"]["Ασπρόπυργος"] = 2;
$_distArr["Λάρισα"]["Θεσσαλονίκη"] = 1;

$_distArr["Μυτιλήνη"]["Ασπρόπυργος"] = 2;

$_distArr["Πάτρα"]["Ασπρόπυργος"] = 2;
$_distArr["Πάτρα"]["Ιωάννινα"] = 3;
$_distArr["Πάτρα"]["Καλαμάτα"] = 2;


$_timeArr = array();
$_timeArr["Αλεξανδρούπολη"]["Ασπρόπυργος"] = 1;
$_timeArr["Αλεξανδρούπολη"]["Ηράκλειο"] = 1;
$_timeArr["Αλεξανδρούπολη"]["Θεσσαλονίκη"] = 1;

$_timeArr["Ασπρόπυργος"]["Αλεξανδρούπολη"] = 1;
$_timeArr["Ασπρόπυργος"]["Ηράκλειο"] = 1;
$_timeArr["Ασπρόπυργος"]["Θεσσαλονίκη"] = 1;
$_timeArr["Ασπρόπυργος"]["Καλαμάτα"] = 1;
$_timeArr["Ασπρόπυργος"]["Λάρισα"] = 1;
$_timeArr["Ασπρόπυργος"]["Μυτιλήνη"] = 1;
$_timeArr["Ασπρόπυργος"]["Πάτρα"] = 1;

$_timeArr["Ηράκλειο"]["Αλεξανδρούπολη"] = 1;
$_timeArr["Ηράκλειο"]["Ασπρόπυργος"] = 1;
$_timeArr["Ηράκλειο"]["Καλαμάτα"] = 2;

$_timeArr["Θεσσαλονίκη"]["Αλεξανδρούπολη"] = 1;
$_timeArr["Θεσσαλονίκη"]["Ασπρόπυργος"] = 1;
$_timeArr["Θεσσαλονίκη"]["Ιωάννινα"] = 1;
$_timeArr["Θεσσαλονίκη"]["Λάρισα"] = 1;

$_timeArr["Ιωάννινα"]["Θεσσαλονίκη"] = 1;
$_timeArr["Ιωάννινα"]["Πάτρα"] = 1;

$_timeArr["Καλαμάτα"]["Ασπρόπυργος"] = 1;
$_timeArr["Καλαμάτα"]["Ηράκλειο"] = 2;
$_timeArr["Καλαμάτα"]["Πάτρα"] = 1;

$_timeArr["Λάρισα"]["Ασπρόπυργος"] = 1;
$_timeArr["Λάρισα"]["Θεσσαλονίκη"] = 1;

$_timeArr["Μυτιλήνη"]["Ασπρόπυργος"] = 1;

$_timeArr["Πάτρα"]["Ασπρόπυργος"] = 1;
$_timeArr["Πάτρα"]["Ιωάννινα"] = 1;
$_timeArr["Πάτρα"]["Καλαμάτα"] = 1;

//option = 0 -> cost, option = 1 ->time

function dijkstra($a,$b,$option)
{
	global $_distArr,$_timeArr;

	if($option == 0)
		$use = $_distArr;
	else
		$use = $_timeArr;
	//initialize the array for storing
	$S = array();//the nearest path with its parent and weight
	$Q = array();//the left nodes without the nearest path
	foreach(array_keys($use) as $val) $Q[$val] = 99999;
	$Q[$a] = 0;

	//start calculating
	while(!empty($Q)){
	    $min = array_search(min($Q), $Q);//the most min weight
	    if($min == $b) break;
	    foreach($use[$min] as $key=>$val) if(!empty($Q[$key]) && $Q[$min] + $val < $Q[$key]) {
	        $Q[$key] = $Q[$min] + $val;
	        $S[$key] = array($min, $Q[$key]);
	    }
	    unset($Q[$min]);
	}

	//list the path
	$path = array();
	$pos = $b;
	while($pos != $a){
	    $path[] = $pos;
	    $pos = $S[$pos][0];
	}
	$path[] = $a;
	$path = array_reverse($path);
	
	return array($path,$S[$b][1]);
}


function express_delivery($a,$b)
{
	global $_distArr,$_timeArr;

	$flag = 0;
	$k=0;
	$results = array(array());
	do
	{		
		$returned = dijkstra($a,$b,1);		
		$results[$k][0] = $returned[0];
		$results[$k][1] = $returned[1];

		if ($k==0) 
		{
				unset($_timeArr[$results[$k][0][0]][$results[$k][0][1]]);
				unset($_timeArr[$results[$k][0][1]][$results[$k][0][0]]);
				$k++;		
		}	
		elseif ($results[$k][1] == $results[$k-1][1])
		{
				unset($_timeArr[$results[$k][0][0]][$results[$k][0][1]]);
				unset($_timeArr[$results[$k][0][1]][$results[$k][0][0]]);
				$k++;	
		}	
		else
		{
			$flag = 1;			
		}
		
	}while($flag != 1);	

	
	$sum = array();

	
	for($m=0;$m<$k;$m++)
	{
		
		$sum[$m] = 0;		

		for($i=0;$i<count($results[$m][0])-1;$i++)
		{
		 	$sum[$m] = $sum[$m] + $_distArr[$results[$m][0][$i]][$results[$m][0][$i+1]];
			
		}
		//echo $sum[$m]."<br>";
		//echo "M = ".$m."<br>";
	}
	$min=$sum[0];
	$min_no = 0;
	for($m=1;$m<$k;$m++)
	{
		if($sum[$m]<=$min)
		{
			$min = $sum[$m];
			$min_no = $m;

		}
		
	}
	//$k = $k-1;
	$k= $k+1;
	$temp =$min +2; // το +2 αναπαριστά την μεταφορά από Hub σε Κατάστημα
	//echo "Βρέθηκαν $k διαδρομες από $a σε $b";
	
	/*echo "<br />Η βέλτιστη διαδρομή είναι ".implode('->', $results[$min_no][0]);
	echo "<br />Ο χρόνος της μεταφοράς είναι ".$results[$min_no][1]." ημέρες";
	echo "<br />Το κόστος της μεταφοράς είναι $temp ευρώ";*/
	echo implode(',', $results[$min_no][0]);
	$tmp = implode(',', $results[$min_no][0]);	
	//echo $tmp;
	$_SESSION['route']= $tmp;
	echo ",".$results[$min_no][1];
	echo ",".$temp;
}

function standard_delivery($a,$b)
{
	global $_distArr,$_timeArr;

	$flag = 0;
	$k=0;
	$results = array(array());
	do
	{		
		$returned = dijkstra($a,$b,0);		
		$results[$k][0] = $returned[0];
		$results[$k][1] = $returned[1];

		if ($k==0) 
		{
				unset($_distArr[$results[$k][0][0]][$results[$k][0][1]]);
				unset($_distArr[$results[$k][0][1]][$results[$k][0][0]]);
				$k++;		
		}	
		elseif ($results[$k][1] == $results[$k-1][1])
		{
				unset($_distArr[$results[$k][0][0]][$results[$k][0][1]]);
				unset($_distArr[$results[$k][0][1]][$results[$k][0][0]]);
				$k++;	
		}	
		else
		{
			$flag = 1;			
		}
		
	}while($flag != 1);	


		$sum = array();

		
		for($m=0;$m<$k;$m++)
		{
			
			$sum[$m] = 0;		

			for($i=0;$i<count($results[$m][0])-1;$i++)
			{
			 	$sum[$m] = $sum[$m] + $_timeArr[$results[$m][0][$i]][$results[$m][0][$i+1]];
				
			}
			//echo $sum[$m]."<br>";
			//echo "M = ".$m."<br>";
		}
		$min=$sum[0];
		$min_no = 0;
		for($m=1;$m<$k;$m++)
		{
			if($sum[$m]<=$min)
			{
				$min = $sum[$m];
				$min_no = $m;

			}
			
		}
		$k= $k+1;

	$temp =$results[$min_no][1] +2;// το +2 αναπαριστά την μεταφορά από Hub σε Κατάστημα
	//echo "Βρέθηκαν $k διαδρομες από $a σε $b";
	
/*	echo "<br />Η βέλτιστη διαδρομή είναι ".implode('->', $results[$min_no][0]);
	echo "<br />Ο χρόνος της μεταφοράς είναι $min ημέρες";
	echo "<br />Το κόστος της μεταφοράς είναι $temp ευρώ";*/
	echo implode(',', $results[$min_no][0]);
	$tmp = implode(',', $results[$min_no][0]);	
	//echo $tmp;
	$_SESSION['route']= $tmp;
	echo ",".$min;
	echo ",".$temp;
	
}


//$a = "Ηράκλειο";
$a =  $_SESSION['location'];
$b = $_POST['hub'];
$type = $_POST['delivery_type'];

//echo($a);
if($a == $b)
{
	echo $a;
	$_SESSION['route']= $a;
	echo ",1";
	echo ",2";
}
else
{


	if($type == "Standard")
	{
		standard_delivery($a,$b);
	}
	else
	{
		express_delivery($a,$b);
	}
}

?>


