<?php
include '../../myAutoLoader.php';

$result = new StudentsView();
$sessions = $result->returnAllSessionsByYear((new \DateTime('NOW'))->format("Y"));



$length = 12;
$margin = $length / 4;
//Date
$date = new DateTime('00-01-'. (new \DateTime())->format("YY"));
$firstDayOfYear= (new \DateTime('01-01-'. (new \DateTime())->format("YY")))->format('w');
$daysInYear = (new \DateTime('31-12-'. (new \DateTime())->format("YY")))->format('z')+1;
$lastDayOfYear = (new \DateTime('31-12-'. (new \DateTime())->format("YY")))->format('w');

$sess = deleteDoubles($sessions);

echo '<svg width="'.(53*($length+$margin)).'"><g>';

for($i = 0;$i<53;$i++){
    $daysInWeek = 0;
    echo '<g transform="translate('.$i*($length+$margin).', 30)">';
    if($i == 0) $a = 7 - $firstDayOfYear; else if($i == 52) $a = 7 - (7 - $lastDayOfYear)+1; else $a = 7;
    for($j = 0;$j<$a;$j++){
        $date->modify('+1 day');
        $distance = ($i == 0) ? (7-$a+$daysInWeek)*($length+$margin) : $j*($length+$margin);
        $color = 'var(--bg-panel)';
        if((new \DateTime($sess[0]['session_data_act']))->format('d-m-Y') == $date->format('d-m-Y')){
            $color = '#63E06C';
            array_shift($sess);
        }
            echo '<rect class="day" x="0" y="'.$distance.'" width="'.$length.'" height="'.$length.'" style="fill:'.$color.';stroke-width:.1;stroke:var(--color-text)" rx="2" data="'.$date->format('d-m-Y').'"></rect>';
        $daysInWeek++;
    }
    echo'</g>';
}
for($i =0;$i<12;$i++){
    
    echo '<text x="'.($i*(53*($length+$margin)/12)+$length*2).'" y="20">'.(new \DateTime('01-'.($i+1).'-'. (new \DateTime())->format("YY")))->format('M').'</text>';
}
echo '</g>';

function deleteDoubles($ses){
    $array = array();
    forEach($ses as $session){
        if((new \DateTime($array[count($array)-1]['session_data_act']))->format('d-m-Y') != (new \DateTime($session['session_data_act']))->format('d-m-Y'))
            array_push($array, $session);
    }
    return $array;
}
?>