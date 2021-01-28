<?php
include '../../myAutoLoader.php';

$result = new StudentsView();
$sessions = $result->returnAllSessionsByYear((new \DateTime('NOW'))->format("Y"));



$length = 11;
$margin = $length / 4;
//Date
$date = new DateTime('00-01-'. (new \DateTime())->format("YY"));
$firstDayOfYear= (new \DateTime('01-01-'. (new \DateTime())->format("YY")))->format('w');
$daysInYear = (new \DateTime('31-12-'. (new \DateTime())->format("YY")))->format('z')+1;
$lastDayOfYear = (new \DateTime('31-12-'. (new \DateTime())->format("YY")))->format('w');

$sess = deleteDoubles($sessions);
echo '<span>'.count($sessions).' sessions in '.(new \DateTime('NOW'))->format('Y').'</span>';
echo '<div class="allSessionsGraph"><svg width="'.(53*($length+$margin)).'" class="session_graph"><g class="session_callendar">';

for($i = 0;$i<53;$i++){
    $daysInWeek = 0;
    echo '<g transform="translate('.$i*($length+$margin).', 30)">';
    if($i == 0) $a = 7 - $firstDayOfYear; else if($i == 52) $a = 7 - (7 - $lastDayOfYear)+1; else $a = 7;
    for($j = 0;$j<$a;$j++){
        $date->modify('+1 day');
        $distance = ($i == 0) ? (7-$a+$daysInWeek)*($length+$margin) : $j*($length+$margin);
        $color = 'var(--glass)';
        if((new \DateTime($sess[0]['session_data_act']))->format('m-d') == $date->format('m-d')){
            if((new \DateTime($sess[0]['session_data_act']))->format('m-d') < (new \DateTime())->format('m-d')) $color ='#63E06C'; else if((new \DateTime($sess[0]['session_data_act']))->format('m-d') > (new \DateTime())->format('m-d')) $color = '#68C8FF'; else $color =  '#FF6F6F';
            array_shift($sess);
        }
            echo '<rect class="day" x="0" y="'.$distance.'" width="'.$length.'" height="'.$length.'" fill="'.$color.'" rx="'.($length/4).'" data="'.$date->format('d-m-Y').'"></rect>';
        $daysInWeek++;
    }
    echo'</g>';
}
for($i =0;$i<12;$i++){
    echo '<text class="month" x="'.($i*(53*($length+$margin)/12)+$length*2).'" y="20" fill="var(--color-text)">'.(new \DateTime('01-'.($i+1).'-'. (new \DateTime())->format("YY")))->format('M').'</text>';
}
echo '</g>';
echo '</div>';

function deleteDoubles($ses){
    $array = array();
    forEach($ses as $session){
        if((new \DateTime($array[count($array)-1]['session_data_act']))->format('d-m-Y') != (new \DateTime($session['session_data_act']))->format('d-m-Y'))
            array_push($array, $session);
    }
    return $array;
}
?>