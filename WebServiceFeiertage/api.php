<?php
/**
 * WebService to get Feiertage
 *
 *
 * @version 0.1
 * @param $_GET["command"] A GET Command: CHECK or LIST
 * @param $_POST["command"] A POST Command: CHECK or LIST
 * @param $_GET["parm"] A GET Parameter: DATE or YEAR or NOW 
 * @param $_POST["parm"]A POST Parameter: DATE or YEAR or NOW
 * @param $_GET["out"] A GET Output: XML or JSON or HTML
 * @param $_POST["out"] A POST Output: XML or JSON or HTML
 * @param $_GET["reg"] A GET Region: eg DE-BY, US, ...
 * @param $_POST["reg"] A POST Region: eg DE-BY, US, ...
 * @since 0.1
 * @author Dominik Sigmund
 *
 */

//TODO: Format CSS for HTML

//TODO: Languages

//Standarttext
$html="<h1>WebService to get Feiertag</h1>";
//TODO: Write Manual

if(count($_GET) == 0 && count($_POST) == 0){
	die($html);	
}

//TODO: Remake htaccess
//GEt Pars
$command=getPar("command",true,"No Command given.");
$parm =getPar("parm",true,"No Parameter given.");
$output=getPar("out",true,"No Outputtype given.");
$region=getPar("reg",true,"No Region given."); //TODO: Implement Region in getFeiertage

//Matches:
$match_year='((?:(?:[1]{1}\\d{1}\\d{1}\\d{1})|(?:[2]{1}\\d{3})))(?![\\d])';
//TODO: match_date YYYY-MM-DD

//Main Switch on Command
switch($command){
	case "CHECK":
		if($parm=="NOW"){
			$html = checkFeiertag(date('d'));
		}
		else if(preg_match($match_date, $parm)){
			$html = checkFeiertag($parm);
		}
		else {
			die(parm." is not a valid Parameter for Command CHECK.<br/>".$html); //TODO: error(msg) -> <span style="reddisch">msg</span>
		}
		break;
	case "LIST":
		if($parm=="NOW"){
			$html = listFeiertage(date('Y'));
		}
		else if(preg_match($match_year, $parm)){
			$html = listFeiertage($parm);
		}
		else {
			die(parm." is not a valid Parameter for Command LIST.<br/>".$html); //TODO: error(msg) -> <span style="reddisch">msg</span>
		}
		break;
	default:
		die($command." is not a valid command.<br/>".$html);
}

switch($output){
	case "HTML":
		echo htmlheader();
		echo $html;
		echo "</body></html>";
		break;
	case "XML":
		header("Content-Type:text/xml");
		echo $html;
		break;
	case "JSON":
		header('Content-type: application/json');
		echo $html;
		break;
	default:
		echo htmlheader();
		//TODO: Error
		echo $html;
		echo "</body></html>";
		break;
}

//Commands: GET|LIST
	//GET: get daystatus for DATE or NOW 
	//LIST: get feiertage for YEAR or NOW

//Parameter: DAY || YEAR || NOW

//Output: XML|JSON|HTML


function htmlheader(){
	$h="<html>";
	$h.="	<head>";
	//TODO: INsert Head <title, metadata>
	$h.="	</head>";
	$h.="	<body>";
	return $h;
}

function checkFeiertag($day){
	//TODO: check if year-month-day is a feiertag
	
}

/**
 * Returns a List of Feiertage to the Client
 *
 *  @param $year Year to get Feiertage for
 *  @param $format OutputFormat. May be XML, HTML or JSON
 *  @since 0.1
 *  @return String
 *  @version 0.1
 *  @author Dominik Sigmund
 */
function listFeiertage($year){
	//global pars
	global $html, $command, $parm, $output, $region;
	
	$dates = getFeiertage($year);
	
	if($output=="XML"){
		$h = "<wsf command=\"".$command."\" parm=\"".$parm."\" region=\"".$region."\">";
		foreach ($dates as $val){
		$h .="	<feiertag>";
		$h .="		<day>".$val["day"]."</day>";
		$h .="		<month>".$val["month"]."</month>";
		$h .="		<year>".$val["year"]."</year>";
		$h .="		<name>".$val["name"]."</name>";
		$h .="	</feiertag>";
		}
		$h .="</wsf>";
	}
	else if($output=="HTML"){
		$h = "<h1>Feiertage</h1>";
		$h .= "<h2>".$command." ".$parm." in ".$region."</h2>";
		$h .= "<table>";
		$h .="	<tr>";
		$h .="		<td>Tag</td>";
		$h .="		<td>Monat</td>";
		$h .="		<td>Jahr</td>";
		$h .="		<td>Name</td>";
		$h .="	</tr>";
		foreach ($dates as $val){
			$h .="	<tr>";
			$h .="		<td>".$val["day"]."</td>";
			$h .="		<td>".$val["month"]."</td>";
			$h .="		<td>".$val["year"]."</td>";
			$h .="		<td>".$val["name"]."</td>";
			$h .="	</tr>";
		}
		$h .= "</table>";
	}
	else { //JSON
		$h = "{\"Service\": \"WSF\", \"Command\": \"".$command."\", \"Parameter\": \"".$parm."\", \"Region\": \"".$region."\", \"Feiertage\": {[";
		foreach ($dates as $val){
			$h .="	[";
			$h .="	\"".$val["day"]."\",";
			$h .="	\"".$val["month"]."\",";
			$h .="	\"".$val["year"]."\",";
			$h .="	\"".$val["name"]."\"";
			$h .="	],";
		}
		$h = rtrim($h,",");
		$h .="]} }";
	}
	return $h;
}

function getFeiertage($year){
	
	//global pars
	global $html, $command, $parm, $output, $region;
	
	$dates = array();
	
	//TODO: This function should use region !
	//FixDates
	$dates[0]=array( "day" => "01", "month"=> "01", "year" => $year, "name" => "Neujahr");
	$dates[1]=array( "day" => "06", "month"=> "01", "year" => $year, "name" => "Heilige 3 Könige");
	$dates[2]=array( "day" => "01", "month"=> "05", "year" => $year, "name" => "Tag der Arbeit");
	$dates[3]=array( "day" => "15", "month"=> "08", "year" => $year, "name" => "Mariä Himmelfahrt");
	$dates[4]=array( "day" => "03", "month"=> "10", "year" => $year, "name" => "Tag der Deutschen Einheit");
	$dates[5]=array( "day" => "01", "month"=> "11", "year" => $year, "name" => "Allerheiligen");
	$dates[6]=array( "day" => "25", "month"=> "12", "year" => $year, "name" => "1. Weihnachtsfeiertag");
	$dates[7]=array( "day" => "26", "month"=> "12", "year" => $year, "name" => "2. Weihnachtsfeiertag");
	
	$dates = easterdates($year, $dates);
	
	return $dates;
}

function easterdates($year, $dates){
	$easterDate  = easter_date($year);
	$easterDay   = date('d', $easterDate);
	$easterMonth = date('m', $easterDate);
	$easterYear   = date('Y', $easterDate);
    
    array_push($dates, array( "day" => $easterDay, "month"=> $easterMonth, "year" => $year, "name" => "Ostersonntag"));
    
    $kfr =  mktime(0, 0, 0, $easterMonth, $easterDay - 2,  $easterYear);
    array_push($dates, array( "day" => date('d', $kfr), "month"=>  date('m', $kfr), "year" => $year, "name" => "Karfreitag"));
    
    $om =  mktime(0, 0, 0, $easterMonth, $easterDay + 1,  $easterYear);
    array_push($dates, array( "day" => date('d', $om), "month"=>  date('m', $om), "year" => $year, "name" => "Ostermontag"));
    
    $ch =  mktime(0, 0, 0, $easterMonth, $easterDay + 39,  $easterYear);
    array_push($dates, array( "day" => date('d', $ch), "month"=>  date('m', $ch), "year" => $year, "name" => "Christi Himmelfahrt"));
    
    $ps =  mktime(0, 0, 0, $easterMonth, $easterDay + 49,  $easterYear);
    array_push($dates, array( "day" => date('d', $ps), "month"=>  date('m', $ps), "year" => $year, "name" => "Pfingstsonntag"));
    
    $pm =  mktime(0, 0, 0, $easterMonth, $easterDay + 50,  $easterYear);
    array_push($dates, array( "day" => date('d', $pm), "month"=>  date('m', $pm), "year" => $year, "name" => "Pfingstmontag"));
    
    $fl =  mktime(0, 0, 0, $easterMonth, $easterDay + 60,  $easterYear);
    array_push($dates, array( "day" => date('d', $fl), "month"=>  date('m', $fl), "year" => $year, "name" => "Fronleichnam"));
    
	return $dates;
}

/**
 * Returns the Value if a given $_GET or $_POST. May be Mandatory (Script dies if not there)
 *
 *  @param $par Parameter to get from GET or POST
 *  @param $mandatory Do we need this? Defaults to False
 *  @param $message What is the dying message? Defaults to ""
 *  @since 0.1
 *  @return value of $par
 *  @version 1.0
 *  @author Dominik Sigmund
 */
function getPar($par, $mandatory=false, $message=""){
	
	//global pars
	global $html, $command, $parm, $output, $region;
	$r = "";
	if($_GET[$par]==""){
		if($_POST[$par]==""){
			if($mandatory){
				die($message."<br/>".$html);
			}
			else {
				$r="";
			}
		}
		else {
			$r=$_POST[$par];
		}
	}
	else {
		$r=$_GET[$par];
	}
	return $r;
}
?>