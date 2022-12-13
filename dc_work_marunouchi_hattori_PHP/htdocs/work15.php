<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WORK15</title>
</head>
<body>
  <?php

      $team1 = ["tokugawa","oda","toyotomi","takeda"];
      $team2 = ["minamoto","taira","sugawara","fujiwara"];

      

      $class01 = [];
      $class02 = [];
      
      for($p = 0;$p < count($team1);$p++){
        $a = rand(1,100);
        array_push($class01,"$team1[$p]/$a");
      }
      
      for($q= 0;$q < count($team2);$q++){
        $a = rand(1,100);
        array_push($class02,"$team2[$p]/$a");
      }

      
      $school = array($class01,$class02);
      
      $oda_array = explode('/',$school[0][1]);
      $sugawara_array = explode('/',$school[1][2]);
      $oda_score = $oda_array[1];
      $sugawara_score = $sugawara_array[1];
      if ($oda_score > $sugawara_score):
        echo "<p> oda's score: " .$oda_score . " sugawara's score: " . $sugawara_score . "点数が高いのはodaです</p>";  
      elseif($oda_score < $sugawara_score):
        echo "<p> oda's score: " .$oda_score . " sugawara's score: " . $sugawara_score . "点数が高いのはsugawaraです</p>";
      else:
        echo "<p> oda's score: " .$oda_score . " sugawara's score: " . $sugawara_score . "同じ点数です</p>";
      endif;
      for($i=0;$i<2;$i++){
        $sum = 0;
        $avg = 0;
        for($j=0;$j<4;$j++){
          $work_array = explode('/',$school[$i][$j]);
          $value = $work_array[1];
          $sum = $sum + $value;
        }
        $avg = $sum / 4;
        echo "<p> class". ($i+1) . "の平均点は" . $avg . "です。</p>";
      }  
  ?>
</body>
</html>