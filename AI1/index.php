<?php
ini_set("error_reporting", E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">



<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Genetic Algorithm : TSP : PHP Implementation </title>
<style>
body {
	text-align: center;
	margin: 0px; padding: 0px;
}
body, td, th, input {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	text-align: center;
}
h1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 15px;
	text-align: center;
}
.cityCell {
	width: 60px;
}
.input {
	background-color: #CCFFFF;
	border: 1px solid #ccc;
	padding: 1px;
	margin: 1px;
}
#container {
	margin: 0 auto 0 auto; padding: 10px;
	width: 520px;
	text-align: left;
	border-left: 2px solid #333;
	border-right: 2px solid #333;
	border-bottom: 2px solid #333;
}
form {
	margin: 0px; padding: 0px;
}
.debug td {
	padding: 0 2px 0 2px;
}
</style>
</head>

<body>
<div id="container">
<h1>Genetic Algorithm : TSP : PHP Implementation</h1>
<form method="post">
<table width="500" border="0" cellspacing="2" cellpadding="0" style='border: 1px solid #999;' align="center">
  <tr>
    <td><strong>Cities</strong></td>
    <td align="center" class='cityCell'>A</td>
    <td align="center" class='cityCell'>B</td>
    <td align="center" class='cityCell'>C</td>
    <td align="center" class='cityCell'>D</td>
    <td align="center" class='cityCell'>E</td>
    <td align="center" class='cityCell'>F</td>
    <td align="center" class='cityCell'>G</td>
  </tr>
  <tr>
    <td>A</td>
    <td bgcolor="#CC3333"><div align="center">0</div></td>
    <td><div align="center">
      <input name="1_2" type="text" class="input" id="textfield" size="4" maxlength="4" value="<?php echo $_POST['1_2']?>" />
    </div></td>
    <td><div align="center">
      <input name="1_3" type="text" class="input" id="textfield2" size="4" maxlength="4" value="<?php echo $_POST['1_3']?>" />
    </div></td>
    <td><div align="center">
      <input name="1_4" type="text" class="input" id="textfield3" size="4" maxlength="4" value="<?php echo $_POST['1_4']?>" />
    </div></td>
    <td><div align="center">
      <input name="1_5" type="text" class="input" id="textfield4" size="4" maxlength="4" value="<?php echo $_POST['1_5']?>" />
    </div></td>
    <td><div align="center">
      <input name="1_6" type="text" class="input" id="textfield5" size="4" maxlength="4" value="<?php echo $_POST['1_6']?>" />
    </div></td>
    <td><div align="center">
      <input name="1_7" type="text" class="input" id="textfield6" size="4" maxlength="4" value="<?php echo $_POST['1_7']?>" />
    </div></td>
  </tr>
  <tr>
    <td>B</td>
    <td><div align="center"></div></td>
    <td bgcolor="#CC3333"><div align="center">0</div></td>
    <td><div align="center">
      <input name="2_3" type="text" class="input" id="textfield7" size="4" maxlength="4" value="<?php echo $_POST['2_3']?>" />
    </div></td>
    <td><div align="center">
      <input name="2_4" type="text" class="input" id="textfield8" size="4" maxlength="4" value="<?php echo $_POST['2_4']?>" />
    </div></td>
    <td><div align="center">
      <input name="2_5" type="text" class="input" id="textfield9" size="4" maxlength="4" value="<?php echo $_POST['2_5']?>" />
    </div></td>
    <td><div align="center">
      <input name="2_6" type="text" class="input" id="textfield10" size="4" maxlength="4" value="<?php echo $_POST['2_6']?>" />
    </div></td>
    <td><div align="center">
      <input name="2_7" type="text" class="input" id="textfield11" size="4" maxlength="4" value="<?php echo $_POST['2_7']?>" />
    </div></td>
  </tr>
  <tr>
    <td>C</td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td bgcolor="#CC3333"><div align="center">0</div></td>
    <td><div align="center">
      <input name="3_4" type="text" class="input" id="textfield12" size="4" maxlength="4" value="<?php echo $_POST['3_4']?>" />
    </div></td>
    <td><div align="center">
      <input name="3_5" type="text" class="input" id="textfield13" size="4" maxlength="4" value="<?php echo $_POST['3_5']?>" />
    </div></td>
    <td><div align="center">
      <input name="3_6" type="text" class="input" id="textfield14" size="4" maxlength="4" value="<?php echo $_POST['3_6']?>" />
    </div></td>
    <td><div align="center">
      <input name="3_7" type="text" class="input" id="textfield15" size="4" maxlength="4" value="<?php echo $_POST['3_7']?>" />
    </div></td>
  </tr>
  <tr>
    <td>D</td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td bgcolor="#CC3333"><div align="center">0</div></td>
    <td><div align="center">
      <input name="4_5" type="text" class="input" id="textfield16" size="4" maxlength="4" value="<?php echo $_POST['4_5']?>" />
    </div></td>
    <td><div align="center">
      <input name="4_6" type="text" class="input" id="textfield17" size="4" maxlength="4" value="<?php echo $_POST['4_6']?>" />
    </div></td>
    <td><div align="center">
      <input name="4_7" type="text" class="input" id="textfield18" size="4" maxlength="4" value="<?php echo $_POST['4_7']?>" />
    </div></td>
  </tr>
  <tr>
    <td>E</td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td bgcolor="#CC3333"><div align="center">0</div></td>
    <td><div align="center">
      <input name="5_6" type="text" class="input" id="textfield19" size="4" maxlength="4" value="<?php echo $_POST['5_6']?>" />
    </div></td>
    <td><div align="center">
      <input name="5_7" type="text" class="input" id="textfield20" size="4" maxlength="4" value="<?php echo $_POST['5_7']?>" />
    </div></td>
  </tr>
  <tr>
    <td>F</td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td bgcolor="#CC3333"><div align="center">0</div></td>
    <td><div align="center">
      <input name="6_7" type="text" class="input" id="textfield21" size="4" maxlength="4" value="<?php echo $_POST['6_7']?>" />
    </div></td>
  </tr>
  <tr>
    <td>G</td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td bgcolor="#CC3333"><div align="center">0</div></td>
  </tr>
</table>
<br />
<br />
<table border="0" cellspacing="2" cellpadding="0" style='border: 1px solid #999;' align="center">
  <tr>
    <td>Population</td>
    <td align="right"><input name="population" type="text" class="input" id="population" value="<?php echo $_POST['population']?>" size="5" maxlength="5" /></td>
  </tr>
  <tr>
    <td>Generations</td>
    <td align="right"><input name="generations" type="text" class="input" id="textfield24" value="<?php echo $_POST['generations']?>" size="5" maxlength="5" /></td>
  </tr>
  <tr>
    <td>Elitism</td>
    <td align="right"><input name="elitism" type="text" class="input" id="textfield25" value="<?php echo $_POST['elitism']?>" size="5" maxlength="2" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="button" id="button" value="Calculate Shortest Route" /></td>
  </tr>
</table>
</form>
<?php
if (!empty($_POST)) {
	define('CITY_COUNT', 7);
	$population = $_POST['population'] + 0;
	if ($population > 999) # Gotta protect my CPU...
		$population = 999;
		
	$generations = $_POST['generations'] + 0;
	$elitism = $_POST['elitism'] + 0;
	$names = array();
	$distances = array();
	
	$initialPopulation = array();
	$currentPopulation = array();
	$mutasiPopulation = array();
	# Take user city names and put it into an array
	for ($i = 1; $i <= CITY_COUNT; $i++) {
		$names[$i] = $_POST['name'.$i];
	}
	
	# Take user distance data and put it into a multidimensional array
	for ($i = 1; $i <= CITY_COUNT; $i++) {
		for ($j = 1; $j <= CITY_COUNT; $j++) {
			if (isset($_POST[$i . '_' . $j]))
				$distances[$i][$j] = $_POST[$i . '_' . $j];
			else if (isset($_POST[$j . '_' . $i]))
				$distances[$i][$j] = $_POST[$j . '_' . $i];
			else
				$distances[$i][$j] = 32767;
		}
	}
	
	# Building our initial population
	for($i = 0; $i < $population; $i++) {
		$initialPopulation[$i] = pickRandom();
	}
	
	for ($k = 1; $k <= $generations; $k++) {
		echo "<div><strong>Generation $k</strong></div>\n";
		# Rating population (I do some weird math to figure out their goodness level, not sure if it is good).
		echo "<pre>";
		$i = 0;
		$distanceSum = 0;
		$biggest = 0;
		foreach ($initialPopulation AS $entity) {
			$currentPopulation[$i]['dna'] = $entity;
			$currentPopulation[$i]['rate'] = rate($entity, $distances);
			$distanceSum += $currentPopulation[$i]['rate'];
			if ($currentPopulation[$i]['rate'] > $biggest)
				$biggest = $currentPopulation[$i]['rate'];
			$i++;
		}
		$biggest += 1;
		$chancesSum = 0;
		for ($i = 0; $i < $population; $i++ ) {
			$currentPopulation[$i]['metric'] = $biggest - $currentPopulation[$i]['rate'];
			$chancesSum += $currentPopulation[$i]['metric'];
		}
		for ($i = 0; $i < $population; $i++ ) {
			$currentPopulation[$i]['chances'] = $currentPopulation[$i]['metric'] / $chancesSum;
		}
		util::sort($currentPopulation, 'rate');
		$ceilSum = 0;
		for ($i = 0; $i < $population; $i++ ) {
			$currentPopulation[$i]['floor'] = $ceilSum;
			$ceilSum += $currentPopulation[$i]['chances'];
		}
		debug($currentPopulation);
		echo "</pre>\n";
		if (converging($initialPopulation))
			break;
		#Breeding time
		$initialPopulation = array();
		for ($j = 0; $j < $elitism; $j++) {
			$initialPopulation[] = $currentPopulation[$j]['dna'];
		}

		for ($j = 0; $j < $population - $elitism; $j++) {
			$rouletteMale = rand(0, 100) / 100;
			
			for ($i = $population - 1; $i >= 0; $i--) {
				if ($currentPopulation[$i]['floor'] < $rouletteMale) {
					$dad = $currentPopulation[$i]['dna'];
					break;
				}
			}
			
			$rouletteFemale = rand(0, 100) / 100;
			
			for ($i = $population - 1; $i >= 0; $i--) {
				if ($currentPopulation[$i]['floor'] < $rouletteFemale) {
					$mom = $currentPopulation[$i]['dna'];
					break;
				}
			}
			
			$child = mate($mom, $dad);
			$initialPopulation[] = $child;
		}

		#mutasi
		foreach ($mutasiPopulation AS $entity) {
			$mutasiPopulation[$i]['dna'] = $entity;
			$mutasiPopulation[$i]['dna'] = mutasi($entity);
			$i++;
		}	
	}

	echo "<div>The best solution I found is <strong>".substr($currentPopulation[0]['dna'],1)."</strong> with a mileage of <strong>".rate($currentPopulation[0]['dna'], $distances)."</strong> which took <strong>$k</strong> generations.</div>\n";
}
?>
</div>
</body>
</html>
<?php
function converging($pop) {
	$items = count(array_unique($pop));
	if ($items == 1)
		return true;
	else
		return false;
}
function pickRandom() {
	$choices = array('B', 'C', 'D', 'E', 'F', 'G');
	shuffle($choices);
	array_unshift($choices,'A');
	return implode('',$choices);
}

function rate($dna, $distances) {
	$mileage = 0;
	$letters = str_split($dna);
	for ($i = 0; $i < CITY_COUNT - 1; $i++) {
		$mileage += $distances[let2num($letters[$i])][let2num($letters[$i+1])];
	}
	$mileage += $distances[let2num($letters[0])][let2num($letters[6])];
	return $mileage;
}

function debug($ar) {
	echo "<table class='debug'>";
	echo "<tr><th>&nbsp;</th><th>DNA</th><th>Fit</th><th>Roulette</th></tr>\n";

	foreach($ar as $element => $value) {
		echo "<tr><td>" . leadingZero($element) . "</td><td>" .  substr($value['dna'], 1) . "</td><td>" . $value['rate'] . "</td><td>" . sprintf("%01.2f", $value['chances'] * 100) . "%</td></tr>\n";
	}
	echo "</table>\n";
}

function leadingZero($value) {
	if ($value < 10)
		$value = '00' . $value;
	else if ($value < 100)
		$value = '0' . $value;
	return $value;
}

//crossover
function mate($mommy, $daddy) { # VERY INEFFICIENT! Combines genes randomly from both parents and if genes are repeated we do it again.
	$baby = "AAAAAAA";
	while (substr_count($baby, 'A') != 1 || substr_count($baby, 'B') != 1 || substr_count($baby, 'C') != 1 || substr_count($baby, 'D') != 1 || substr_count($baby, 'E') != 1 || substr_count($baby, 'F') != 1 || substr_count($baby, 'G') != 1) {
		$baby = "";
		for($i = 0; $i < CITY_COUNT; $i++) {
			$chosen = mt_rand(0,1);
			if ($chosen)
				$baby .= substr($mommy, $i, 1);
			else
				$baby .= substr($daddy, $i, 1);
		}
	}
	return $baby;
}

#Mutasi
function mutasi($dna) {
	$acak_1 = rand(1,6);
	$acak_2 = rand(1,6);
	while ($acak_1 == $acak_2) {
		$acak_2 = rand(1,6);
	}
	$temp=$dna[$acak1];
	$dna[$acak_1]=$dna[$acak_2];
	$dna[$$acak_2]=$temp;
	return $dna;
}

function let2num($char) {
	if ($char == 'A')
		return 1;
	else if ($char == 'B')
		return 2;
	else if ($char == 'C')
		return 3;
	else if ($char == 'D')
		return 4;
	else if ($char == 'E')
		return 5;
	else if ($char == 'F')
		return 6;
	else if ($char == 'G')
		return 7;
	else
		die("WHOOPS");
}

class util {
    static private $sortfield = null;
    static private $sortorder = 1;
    static private function sort_callback(&$a, &$b) {
        if($a[self::$sortfield] == $b[self::$sortfield]) return 0;
        return ($a[self::$sortfield] < $b[self::$sortfield])? -self::$sortorder : self::$sortorder;
    }
    static function sort(&$v, $field, $asc=true) {
        self::$sortfield = $field;
        self::$sortorder = $asc? 1 : -1;
        usort($v, array('util', 'sort_callback'));
    }
}