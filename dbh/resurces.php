<?php

require('connection.php');

if($_POST['function'] ?? null){
    echo $_POST['function']();
}

function mapMonths(){
    global $connection;
    $monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    $query = 'SELECT * FROM user';
    $result = mysqli_query($connection, $query);
    $userMonths = [];
  
    while ($user = mysqli_fetch_array($result)){
        if($user['approvated'] == 1){
            $userMonths[$user['fullName']] = [];
        }
    }
  
    foreach ($monthNames as $month) {
        $minAssigned = PHP_INT_MAX;
        $minUser = '';
  
        foreach ($userMonths as $user => $months) {
            if (count($months) < $minAssigned) {
                $minAssigned = count($months);
                $minUser = $user;
            }
        }
  
        $userMonths[$minUser][] = $month;
    }
  
    return $userMonths;
}

function getCalendar(){
  $userMonths = mapMonths();
  $maxMonthsAssigned = max(array_map('count', $userMonths));
  $output = '';

  $output .= '<thead><tr><th>Persone</th>';
  for ($i = 0; $i < $maxMonthsAssigned; $i++) {
      $output .= '<th>Mese ' . ($i + 1) . '</th>';
  }
  $output .= '</tr></thead>';

  $output .= '<tbody>';
  foreach ($userMonths as $user => $months) {
      $output .= '<tr><th>' . $user . '</th>';
      foreach ($months as $month) {
          $output .= '<th>' . $month . '</th>';
      }
      for ($i = count($months); $i < $maxMonthsAssigned; $i++) {
          $output .= '<th></th>';
      }
      $output .= '</tr>';
  }
  $output .= '</tbody>';

  echo $output;
}
