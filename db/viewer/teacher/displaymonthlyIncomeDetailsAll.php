<?
include "../../myAutoLoader.php";

$month = $_GET['month'];
$mnth_incm = 0;
$debt = 0;
$today = new DateTime('NOW');
$results = new StudentsView();
$sessions = $results->returnAllSessions();
foreach($sessions as $session){
    $session_date = new DateTime($session['session_data_act']);
    if($session_date->format('m') == $month)
        $mnth_incm += ($session['session_time'] / 60) * $session['price_hour'] - $session['paid'];
    if($session_date < $today)
        $debt += ($session['session_time'] / 60) * $session['price_hour'] - $session['paid'];
} 
echo '
<h1> Remaining monthly income: '.$mnth_incm.'ron</h1>
<h1> Debt: '.$debt.'ron';   

?>