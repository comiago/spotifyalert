<?php

require('connection.php');

if($_POST['function'] ?? null){
    echo $_POST['function']();
}


if($_GET['function'] ?? null){
    echo $_GET['function']();
}

// function getUsers(){
//     global $connection;
//     $monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
//     $query = 'SELECT fullName FROM user';
//     $result = mysqli_query($connection, $query);
//     $output = '<thead><tr><th>Persone</th>';
//     $number = (count($monthNames) % mysqli_num_rows($result) == 0) ? $monthsForEach : $monthsForEach + 1;
//     for ($i = 0; $i < $number; $i++) {
//         $output .= '<th>Mese ' . ($i + 1) . '</th>';
//     }
//     $output .= '</tr></thead>';
//     // while ($user = mysqli_fetch_array($result)){
//     //     $output .= '<tbody><th>' . $user['fullName'] . '</th>';
//     //     for($i = 0; $i < count($monthNames); $i += 2){
//     //         $output .= '<th>' . $monthNames[$i] . '</th>';
//     //     }
//     //     $output .= '</tbody>';
//     // }
//     echo $output;
// }

function getUsers(){
  global $connection;
  $monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  $query = 'SELECT fullName FROM user';
  $result = mysqli_query($connection, $query);
  $output = '';
  $userMonths = [];

  // Inizializza gli utenti con un array vuoto di mesi assegnati
  while ($user = mysqli_fetch_array($result)){
      $userMonths[$user['fullName']] = [];
  }

  // Ciclo attraverso i mesi e assegna ciascun mese all'utente con meno mesi assegnati finora
  foreach ($monthNames as $month) {
      $minAssigned = PHP_INT_MAX;
      $minUser = '';

      // Trova l'utente con meno mesi assegnati
      foreach ($userMonths as $user => $months) {
          if (count($months) < $minAssigned) {
              $minAssigned = count($months);
              $minUser = $user;
          }
      }

      $userMonths[$minUser][] = $month;
  }

  $maxMonthsAssigned = max(array_map('count', $userMonths));

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
