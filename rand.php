<?php

		   
if(preg_match('/Dressage/',$className) || preg_match('/Western Dressage/',$className)){
$classEntries = implode("\n", $classEntries);
$line = explode("\n", $classEntries);

$results = array();
foreach($line as $horse){
$bellcurve = rand(1,99);
	$percentage = rand(0,99);
	


	if($bellcurve <= 25){
		$score = rand(30,55).'.'.str_pad($percentage,3,0,STR_PAD_LEFT);
	}elseif($bellcurve >25 && $bellcurve <=75){
		$score = rand(56,65).'.' .str_pad($percentage,3,0,STR_PAD_LEFT);
	}elseif($bellcurve > 75&& $belcurve<95){
		$score = rand(66,70).'.'. str_pad($percentage,3,0,STR_PAD_LEFT);
	}elseif($bellcurve >= 95 && $bellcurve <=100){
		$score = rand(71,85).'.'.str_pad($percentage,3,0,STR_PAD_LEFT);
	}

$results[] = $score.':'.$horse;
}

rsort($results);

		}elseif(preg_match('/Eventing/', $className)) {
			$classEntries = implode("\n", $classEntries);
$line = explode("\n", $classEntries);

$results = array();
foreach($line as $horse){
		$bellcurve = rand(1,99);
	$percentage = rand(1,2);
	
		if($percentage == 2){
		$second = .5;
		}else{	
		$second = .0;
		}

	if($bellcurve <= 25){
		$score = rand(46,55)+ $second;
	}elseif($bellcurve >25 && $bellcurve <=75){
		$score = rand(36,45)+ $second;
	}elseif($bellcurve > 75&& $belcurve<100){
		$score = rand(26,35)+ $second;
	}elseif($bellcurve == 100){
		$score = 25 + $second;
	}
	$dressagescore = $score;
	// insert into temp file, classentries[$j] and score (Score 1).


// SHOW JUMPING - Clear 1-50, unclear = 51-100; 
	// Unclear = Poles down rand 1-4. 1=4 points, 2 = 8 points, 3 = 12 points, 4 = DQ
	// Time Faults - rand(1,2) 1= yes, ,2 = no;
	// If yes, rand(1,12) 
	// add time faults to unclear faults to get SJ score.
	
	
	
	$num = rand(1,2);
		if($num == 1){
			$time = 0;
		}else{
			$time = rand(1,15) ;
			
		}
				
				
	$clear = rand(1,3);
	if($clear >2){
		$faults = 0;
	}else{
		$num = rand(1,4);
		if($num == 1){
			$faults = 4 + $time;
		}elseif($num==2){
			$faults = 8 + $time;
		}elseif($num==3){
			$faults = 12 + $time;
		}elseif($num == 4)
			$faults = 'DQ';
	}
	
		

		
	
// insert into temp file, Show Jumping $faults (Score2) where name = classentries[$j].	


// CROSS COUNTRY SCORING
// Clear Yes No
// Rand(1,7) for faults. 1 = 20pnts, 2= 40 points, 3 = 60 points, 4= 80 points, 5 = 120 points, 6= DQ
// Time faults y,n
// 0-9
// .1 to .9
$num = rand(1,2);
		if($num == 1){
			$time = 0;
		}else{
			$time1 = rand(0,9);
			$time2 = rand(1,9);
			$time = '$time1 '.'$time2';
					
		}




		$clear = rand(1,3);
	if($clear >2){
		$xfaults = 0;
	}else{
		$num = rand(1,6);
		if($num == 1){
			$xfaults = 20 + $time;
		}elseif($num ==2){
			$xfaults = 40 + $time;
		}elseif($num ==3){
			$xfaults = 60 + $time;
		}elseif($num ==4){
			$xfaults = 80 + $time;	
		}elseif($num ==5){
			$xfaults = 120 + $time;			
		}elseif($num == 6)
			$xfaults = 'DQ';
	}
	
		if($xfaults == 'DQ'){
			$timefaults = 0;
		}else{
			$num = rand(1,2);
				if($num == 1){
					$xfaults = $xfaults;
				}else{
					$time1 = rand(0,9);
					$time2 = rand(1,9);
					$time = '$time1 '.'$time2';
					$xfaults = $time + $xfaults;
				}
		}
	
	
// insert into temp file, XCOUNTRY $xfaults (Score3) where name = classentries[$j].	
$total = $faults + $xfaults + $score;
if($faults === 'DQ' || $xfaults === 'DQ'){
		if($xfaults == 'DQ'){
			$faults = 'DQ';
		}
	
	$total = 'Eliminated';

}
	
		
		$results[] = $total.':'.$score.':'.$xfaults.':'.$faults.':'.$horse;
			
			sort($results);
	}
		}
		
		else {
			shuffle($classEntries);
		}


      

		
	


		
		
		?>