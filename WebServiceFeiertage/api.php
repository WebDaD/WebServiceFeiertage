<?php
/**
 * WebService to get Feiertage
 *
 *
 * @version 0.1
 * @param $_GET["command"] A GET Command: CHECK or LIST or GET
 * @param $_POST["command"] A POST Command: CHECK or LIST or GET
 * @param $_GET["parm"] A GET Parameter: DATE or YEAR or NOW or getParm
 * @param $_POST["parm"]A POST Parameter: DATE or YEAR or NOW or getParm
 * @param $_GET["out"] A GET Output: XML or JSON or HTML
 * @param $_POST["out"] A POST Output: XML or JSON or HTML
 * @param $_GET["reg"] A GET Region: eg DE-BY, US, ...
 * @param $_POST["reg"] A POST Region: eg DE-BY, US, ...
 * @since 0.1
 * @author Dominik Sigmund
 *
 */

$TITLE = "WebServiceFeiertage";
$VERSION = "0.5";
$AUTHOR = "Dominik Sigmund";
$CONTACT = "dominik.sigmund@webdad.eu";

//TODO: Add Languages

//Standarttext
$html  = "<h1>".$TITLE."</h1>";

$html .= "<p>Version: ".$VERSION." by ".$AUTHOR."</p>";
$html .= "<p>Use this WebService to get Information of Holidays in a Year or Check if a Date is a Holiday.<br/>This Service and its Code is under <a href=\"http://wsf.webdad.eu/LICENSE\">GPLv3</a></p>";
$html .= "<p style=\"color:darkred;\">".$TITLE." will save your IP and the URL you called to analyize the usage of this service.</p>";

$html .= "<h2>How to</h2>";
$html .= "<p>Just Call the Following URL:</p>";
$html .= "<p>http://wsf.webdad.eu/<a href=\"#commands\">COMMAND</a>/PARAMETER/<a href=\"#out\">OUTPUT</a>/<a href=\"#reg\">REGION</a></p>";
$html .= "<p>Or POST the following Parameters to http://wsf.webdad.eu/api.php</p>";
$html .= "<p><a href=\"#commands\">command</a>, parm, <a href=\"#out\">out</a>, <a href=\"#reg\">reg</a></p>";

$html .= "<h2> Examples </h2>";
$html .= "<dl>";
$html .= "	<dt><a href=\"http://wsf.webdad.eu/LIST/NOW/XML/de-by\" target=\"_blank\">http://wsf.webdad.eu/LIST/NOW/XML/de-by</a></dt>";
$html .= "		<dd>Get a XML-List of all Holidays in this year in Bavaria / Germany</dd>";
$html .= "	<dt><a href=\"http://wsf.webdad.eu/CHECK/NOW/JSON/de-by\" target=\"_blank\">http://wsf.webdad.eu/CHECK/NOW/JSON/de-by</a></dt>";
$html .= "		<dd>Get a JSON-Element containing ob today is a holiday in Bavaria / Germany</dd>";
$html .= "</dl>";

$html .= "<h2 id=\"commands\"> Commands </h2>";
$html .= "<p>This is a list of all possible Commands</p>";
$html .= "<ul>";
$html .= "	<li><a href=\"#cmd_check\">CHECK</a></li>";
$html .= "	<li><a href=\"#cmd_list\">LIST</a></li>";
$html .= "	<li><a href=\"#cmd_get\">GET</a></li>";
$html .= "</ul>";

$html .= "<h3 id=\"cmd_check\">CHECK</h3>";
$html .= "<p>This Command Checks a specific date to be a holiday.</p>";
$html .= "<h4> Parameters </h4>";
$html .= "<table>";
$html .= "<tr>";
$html .= "	<th>Parameter</th>";
$html .= "	<th>Description</th>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "	<td>NOW</td>";
$html .= "	<td>Checks Today</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "	<td>YYYY-MM-DD</td>";
$html .= "	<td>CHecks this Date to be a holiday</td>";
$html .= "</tr>";
$html .= "</table>";

$html .= "<h3 id=\"cmd_list\">LIST</h3>";
$html .= "<p>This Command lists all Holidays for its Parameter</p>";
$html .= "<h4> Parameters </h4>";
$html .= "<table>";
$html .= "<tr>";
$html .= "	<th>Parameter</th>";
$html .= "	<th>Description</th>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "	<td>NOW</td>";
$html .= "	<td>The Year we are in right now</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "	<td>YYYY</td>";
$html .= "	<td>Enter a 4-digit-year to get the holidays for this year</td>";
$html .= "</tr>";
$html .= "</table>";

$html .= "<h3 id=\"cmd_get\">GET</h3>";
$html .= "<p>This Command allows you to get values for paramters</p>";
$html .= "<h4> Parameters </h4>";
$html .= "<table>";
$html .= "<tr>";
$html .= "	<th>Parameter</th>";
$html .= "	<th>Description</th>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "	<td>REGIONS</td>";
$html .= "	<td>Gets all possible Regions</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "	<td>COMMANDS</td>";
$html .= "	<td>Gets all possible Commands</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "	<td>OUTPUTS</td>";
$html .= "	<td>Gets all possible Outputs</td>";
$html .= "</tr>";
$html .= "</table>";

$html .= "<h2 id=\"out\"> Output </h2>";
$html .= "<p>Here is a List of implemented Output Options.</p>";
$html .= "<table>";
$html .= "<tr>";
$html .= "	<th>Type</th>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "	<td>XML</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "	<td>HTML</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "	<td>JSON</td>";
$html .= "</tr>";
$html .= "</table>";

$html .= "<h2 id=\"reg\"> Regions </h2>";
$html .= "<p>Here is a List of implemented Regions and their correspoding code.</p>";
$html .= "<table>";
$html .= "<tr>";
$html .= "	<th>Region</th>";
$html .= "	<th>Code</th>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "	<td>Germany - Bavaria</td>";
$html .= "	<td>de-by</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "	<td>United States of America</td>";
$html .= "	<td>us</td>";
$html .= "</tr>";
$html .= "</table>";

$html .= "<h2>Contact</h2>";
$html .= "<p>You have problems using wsf? <br/>You found a bug?<br/> Your Region is not implemented?<br/>Just write to:<br/><b><a href=\"mailto:dominik.sigmund@webdad.eu\">dominik(dot)sigmund(st)webdad(dot)eu</a></b></p>";

if(count($_GET) == 0 && count($_POST) == 0){
	die($html);	
}

//Get Pars
$command=getPar("command",true,"No Command given.");
$parm =getPar("parm",true,"No Parameter given.");
$output=getPar("out",true,"No Outputtype given.");
$region=getPar("reg",true,"No Region given."); 

//SAVE IP-Adress and some Data
mysql_connect("localhost","d0177257","QcrwfG4hd55tFrqT");
mysql_select_db("d0177257");
mysql_query("INSERT INTO holidays (ipaddr, method, querystring) VALUES ('".$_SERVER['REMOTE_ADDR']."', '".$_SERVER['REQUEST_METHOD']."', '".$_SERVER['QUERY_STRING']."')");
mysql_close();

//Matches:
$match_year = '/^[0-9]{4}$/';
$match_date = '/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/';

//Main Switch on Command
switch($command){
	case "CHECK":
		if($parm=="NOW"){
			$html = checkFeiertag(date('Y-m-d'));
		}
		else if(preg_match($match_date, $parm)){
			$html = checkFeiertag($parm);
		}
		else {
			die(error($parm." is not a valid Parameter for Command CHECK.<br/>").$html); 
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
			die(error($parm." is not a valid Parameter for Command LIST.<br/>").$html); 
		}
		break;
	case "GET":
		switch($parm){
			case "COMMANDS":
				$html = getCommands();
				break;
			case "REGIONS":
				$html = getRegions();
				break;
			case "OUTPUTS":
				$html = getOutputs();
				break;
			default:
				die(error($parm." is not a valid Parameter for Command GET.<br/>").$html);
				break;
		}
		break;
	default:
		die(error($command." is not a valid command.<br/>").$html);
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
		echo error($output." is not a valid output format.");
		echo $html;
		echo "</body></html>";
		break;
}




function htmlheader(){
	global $TITLE, $AUTHOR;
	$h="<html>";
	$h.="	<head>";
	$h.= "		<title>".$TITLE."</title>";
	$h.= "		<meta name=\"description\" content=\"A Webservice to Check or List Holidays for specific dates or now\" />";
	$h.= "		<meta name=\"keywords\" content=\"webservice, service, rest, restful, holidays\" />";
	$h.= "		<meta name=\"author\" content=\"".$AUTHOR."\">";
	$h.= "		<meta name=\"robots\" content=\"index, follow\">";
	$h.= "		<meta name=\"revisit-after\" content=\"3 month\">";
	$h.= "		<style>.errorhead{border:2px solid red;background-color:red;color:white;padding:4px 4px 4px 4px;}</style>";
	$h.= "		<style>.error{border:2px solid red;background-color:white;color:red;padding:4px 4px 4px 4px;}</style>";
	$h.="	</head>";
	$h.="	<body>";
	return $h;
}

function checkFeiertag($day){
	//global pars
	global $html, $command, $parm, $output, $region;
	
	$check = "false";
	$name = "";
	//split day into three vars
	$t = explode("-", $day);
	$y = $t[0];
	$m = $t[1];
	$d = $t[2];
	
	//get feiertage for region
	$dates = getFeiertage($y);
	
	//check if array contains day
	foreach($dates AS $date){
		if($date["day"] == $d && $date["month"] == $m && $date["year"] == $y){
			$check ="true";
			$name = $date["name"];
			break;
		}
	}
	//return formated output (true, false AND name if true)
	if($output=="XML"){
		$h = "<wsf command=\"".$command."\" parm=\"".$parm."\" region=\"".$region."\">";
		$h .="	<check>".$day."</check>";
		$h .="	<result>".$check."</result>";
		$h .="	<details>".$name."</details>";
		$h .="</wsf>";
	}
	else if($output=="HTML"){
		$h = "<h1>Commands</h1>";
		$h .= "<h2>".$command." ".$parm." in ".$region."</h2>";
		$h .= "<table>";
		$h .="	<tr>";
		$h .="		<th>Check</th>";
		$h .="		<td>".$day."</td>";
		$h .="	</tr>";
		$h .="	<tr>";
		$h .="		<th>Result</th>";
		$h .="		<td>".$check."</td>";
		$h .="	</tr>";
		$h .="	<tr>";
		$h .="		<th>Details</th>";
		$h .="		<td>".$name."</td>";
		$h .="	</tr>";
		$h .= "</table>";
	}
	else if($output=="JSON"){
		$h = "{\"Service\": \"WSF\", \"Command\": \"".$command."\", \"Parameter\": \"".$parm."\", \"Region\": \"".$region."\", \"Results\": {[";
		$h .="	\"".$day."\",";
		$h .="	\"".$check."\",";
		$h .="	\"".$name."\",";
		$h = rtrim($h,",");
		$h .="]} }";
	}
	else{
		$h=$html;
	}
	return $h;
}

function getCommands(){
	global $command, $parm, $output, $region, $html;
	if($output=="XML"){
		$h = "<wsf command=\"".$command."\" parm=\"".$parm."\" region=\"".$region."\">";
		$h .="	<command>LIST</command>";
		$h .="	<command>CHECK</command>";
		$h .="	<command>GET</command>";
		$h .="</wsf>";
	}
	else if($output=="HTML"){
		$h = "<h1>Commands</h1>";
		$h .= "<h2>".$command." ".$parm." in ".$region."</h2>";
		$h .= "<table>";
		$h .="	<tr>";
		$h .="		<td>LIST</td>";
		$h .="	</tr>";
		$h .="	<tr>";
		$h .="		<td>CHECK</td>";
		$h .="	</tr>";
		$h .="	<tr>";
		$h .="		<td>GET</td>";
		$h .="	</tr>";
		$h .= "</table>";
	}
	else if($output=="JSON"){
		$h = "{\"Service\": \"WSF\", \"Command\": \"".$command."\", \"Parameter\": \"".$parm."\", \"Region\": \"".$region."\", \"Commands\": {[";
		$h .="	\"LIST\",";
		$h .="	\"CHECK\",";
		$h .="	\"GET\",";
		$h = rtrim($h,",");
		$h .="]} }";
	}
	else{
		$h=$html;
	}
	return $h;
}
function getRegions(){
	global $command, $parm, $output, $region, $html;
	if($output=="XML"){
		$h = "<wsf command=\"".$command."\" parm=\"".$parm."\" region=\"".$region."\">";
		$h .="	<region>de-by</region>";
		$h .="	<region>us</region>";
		$h .="</wsf>";
	}
	else if($output=="HTML"){
		$h = "<h1>Regions</h1>";
		$h .= "<h2>".$command." ".$parm." in ".$region."</h2>";
		$h .= "<table>";
		$h .="	<tr>";
		$h .="		<td>de-by</td>";
		$h .="	</tr>";
		$h .="	<tr>";
		$h .="		<td>us</td>";
		$h .="	</tr>";
		$h .= "</table>";
	}
	else if($output=="JSON"){
		$h = "{\"Service\": \"WSF\", \"Command\": \"".$command."\", \"Parameter\": \"".$parm."\", \"Region\": \"".$region."\", \"Regions\": {[";
		$h .="	\"de-by\",";
		$h .="	\"us\",";
		$h = rtrim($h,",");
		$h .="]} }";
	}
	else{
		$h=$html;
	}
	return $h;
}
function getOutputs(){
	global $command, $parm, $output, $region, $html;
	if($output=="XML"){
		$h = "<wsf command=\"".$command."\" parm=\"".$parm."\" region=\"".$region."\">";
		$h .="	<output>XML</output>";
		$h .="	<output>HTML</output>";
		$h .="	<output>JSON</output>";
		$h .="</wsf>";
	}
	else if($output=="HTML"){
		$h = "<h1>Outputs</h1>";
		$h .= "<h2>".$command." ".$parm." in ".$region."</h2>";
		$h .= "<table>";
		$h .="	<tr>";
		$h .="		<td>XML</td>";
		$h .="	</tr>";
		$h .="	<tr>";
		$h .="		<td>HTML</td>";
		$h .="	</tr>";
		$h .="	<tr>";
		$h .="		<td>JSON</td>";
		$h .="	</tr>";
		$h .= "</table>";
	}
	else if($output=="JSON"){
		$h = "{\"Service\": \"WSF\", \"Command\": \"".$command."\", \"Parameter\": \"".$parm."\", \"Region\": \"".$region."\", \"Outputs\": {[";
		$h .="	\"XML\",";
		$h .="	\"HTML\",";
		$h .="	\"JSON\",";
		$h = rtrim($h,",");
		$h .="]} }";
	}
	else{
		$h=$html;
	}
	return $h;
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
	global $command, $parm, $output, $region, $html;
	
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
	else if($output=="JSON"){
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
	else{
		$h=$html;
	}
	return $h;
}

function getFeiertage($year){
	
	//global pars
	global $html,$command, $parm, $output, $region;
	
	$dates = array();
	
	switch($region){
		case "de-by":
			$dates[0]=array( "day" => "01", "month"=> "01", "year" => $year, "name" => "Neujahr");
			$dates[1]=array( "day" => "06", "month"=> "01", "year" => $year, "name" => "Heilige 3 Könige");
			$dates[2]=array( "day" => "01", "month"=> "05", "year" => $year, "name" => "Tag der Arbeit");
			$dates[3]=array( "day" => "15", "month"=> "08", "year" => $year, "name" => "Mariä Himmelfahrt");
			$dates[4]=array( "day" => "03", "month"=> "10", "year" => $year, "name" => "Tag der Deutschen Einheit");
			$dates[5]=array( "day" => "01", "month"=> "11", "year" => $year, "name" => "Allerheiligen");
			$dates[6]=array( "day" => "25", "month"=> "12", "year" => $year, "name" => "1. Weihnachtsfeiertag");
			$dates[7]=array( "day" => "26", "month"=> "12", "year" => $year, "name" => "2. Weihnachtsfeiertag");
			$dates = easterdates($year, $dates);
			break;
		case "us": 
			$dates[0]=array( "day" => "01", "month"=> "01", "year" => $year, "name" => "New Year's Day");
			$dates[1] = getDayInMonth("3", "monday", "01",$year, "Martin Luther King Day");
			$dates[2] = getDayInMonth("3", "monday", "02",$year, "Washington's Birthday");
			$dates[3] = getDayInMonth("last", "monday", "05",$year, "Memorial Day");
			$dates[4]=array( "day" => "04", "month"=> "07", "year" => $year, "name" => "Independence Day");
			$dates[5] = getDayInMonth("1", "monday", "09",$year, "Labor Day");
			$dates[6] = getDayInMonth("2", "monday", "10",$year, "Columbus Day");
			$dates[7]=array( "day" => "11", "month"=> "11", "year" => $year, "name" => "Veterans Day");
			$dates[8] = getDayInMonth("4", "thursday", "11",$year, "Thanksgiving Day");
			$dates[7]=array( "day" => "25", "month"=> "12", "year" => $year, "name" => "Christmas Day");
			break;
		//TODO: Add Regions (at all other de's)
		default:
			die(error($region." is not yet implemented.").$html);
			break;
	}	
	return $dates;
}

function getDayInMonth($number, $day, $month,$year, $name){
	$date = array();
	$date["name"] = $name;
	$month = intval($month);
	$monthName = date("F", mktime(0, 0, 0, $month, 10));
	switch($number){
		case "1":$number="first";break;
		case "2":$number="second";break;
		case "3":$number="third";break;
		case "4":$number="fourth";break;
		default:break;
	}
	$tc = strtotime($number.' '.$day.' of '.$monthName.' '.$year);
	$date["day"] = date('d',$tc);
	$date["month"] = date('m',$tc);
	$date["year"] = date('Y',$tc);
	
	return $date;
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

function error($msg){
	return "<table><tr><td class=\"errorhead\">ERROR</td></tr><tr><td class=\"error\"><b>".$msg."</b><br/>Please Check the Manual below.</td></tr></table>";
}
?>