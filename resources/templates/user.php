<?php
require_once(LIBRARY_PATH . "/functions.php");

$id = $_GET['id']; 

$sql = "select * from players where id = '$id'";

$result = mysql_query($sql);

$info = mysql_fetch_array($result);

$sql = "SELECT scores.game_id, player1, p1_score, player2, p2_score, games.created_date FROM games INNER JOIN scores ON scores.game_id = games.game_id where player1 = '$id' or player2 = '$id' order by game_id desc";

$result = mysql_query($sql);

$players = mysql_query("SELECT id, name, game_id, player1, player2 FROM players INNER JOIN games ON player1 = id OR player2 = id order by game_id desc");

$ranking = mysql_query("SELECT * from players order by rank desc");

$winPercentage = winPercentage($info['win'], $info['loss']);
?>

<div class="container main">
  <div class="row">
    <div class="five columns profile">
      <div class="profile-info">
        <div class="profile-head">
          <h1><?php echo $info['name']; ?></h1>
        </div>
        <div class="profile-body">
          <h5>Current Rank: <span><?php echo getRanking($id, $ranking); ?></span></h5>
          <h5>Current Rating: <?php echo $info['rank']; ?></h5>
          <h6>Win Percentage: <?php echo $winPercentage ?>%</h6>
          <h6>W/L: <?php echo $info['win'] . ' - ' . $info['loss'] ?></h6>
        </div>
      </div>
    </div>
    <div class="five columns offset-by-two">
      <h5>Rating Over Last 10 Games</h5>
      <div class="rank-chart">
        <canvas id="canvas" height="200" width="300"></canvas>
      </div>
      <script>

      $.ajax({
        method: "POST",
        url: "get-rank-data.php",
        data: { id: $.urlParam('id') },
        dataType:'json'

      }).done(function(data){
        var alldata =[];
        for(i=0; i<data.length;i++){

          alldata.push(parseInt(data[i].rank));
        }
        createChart(alldata.reverse());

      });

      function createChart(data){

        var lineChartData = {
          labels : ["","","","","","","","","","",],
          datasets : [
          {
            label: "Rank Graph",
            fillColor : "rgba(220,220,220,0.2)",
            strokeColor : "rgba(51,195,240,1)",
            pointColor : "rgba(240,51,51,1)",
            pointStrokeColor : "#fff",
            pointHighlightFill : "#fff",
            pointHighlightStroke : "rgba(220,220,220,1)",
            data : data
          },
          ]
        }

        var ctx = document.getElementById("canvas").getContext("2d");
        window.myLine = new Chart(ctx).Line(lineChartData, {
          responsive: true
        });
      }
    </script>
  </div>
</div>
<div class="row">
  <div class="12 columns">
    <h5>Matches</h5>
    <table class="u-full-width">
      <thead>
        <tr>
          <th>Opponent</th>
          <th>Score</th>
          <th>Outcome</th>
          <th class="mobile-hide">Date</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($value = mysql_fetch_array($result)) {

          $date = convertDate($value['created_date']);

          $user_score = chooseColumn($value['player1'], $value['p1_score'], $value['p2_score']);

          $opp_score = chooseColumn($value['player1'], $value['p2_score'], $value['p1_score']);

          $wl = outcome($user_score, $opp_score);

          echo 
          "<tr><td>"
          . displayOpp($value['player1'], $value['player2'], $players)
          .  tag($user_score, $opp_score)
          . "</td><td>"
          .  $user_score . " - ". $opp_score
          . "</td><td>"
          . $wl
          . "</td><td class=mobile-hide>"
          . $date
          . "</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>

<?php
function chooseColumn($a, $c, $d) {
  $id = $_GET['id']; 

  if ( $a === $id){

    return $c;
    
  } else {

    return $d;
  }

}

function tag($i, $j){
  
  if ($i === '10' and $j === '0') {
    
    return "<span class='tag f'>FATALITY</span>";
  
  } elseif ($i === '9' and $j < '2') {
   
    return "<span class='tag h'>HUMILIATION</span>";
  
  }
}

function displayOpp ($p1, $p2, $ps){

  $id = $_GET['id'];

  while ($val = mysql_fetch_array($ps)) {

    if ($val['id'] !== $id) {
      
      if ($p1 === $val['id']){

        return "<a href=user.php?id=". $p1 . ">" . $val['name'] . "</a>";
        
      } elseif ($p2 === $val['id']) {

        return  "<a href=user.php?id=". $p2 . ">" . $val['name'] . "</a>";
        
      }

    }

  }
}

function getRanking($a, $b){
  $count = 0;
 
 while ($val = mysql_fetch_array($b)) {
    
    $count = $count + 1;
    
    if ($val['id'] === $a) {

      return $count;

    }
  }
}


?>


