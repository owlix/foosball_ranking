<?php
  require_once(LIBRARY_PATH . "/functions.php");

  $sql = "select g.game_id, p1.name as 'player1', p2.name as 'player2', s.p1_score, s.p2_score from games g inner join players p1 on (g.player1 = p1.id) inner join players p2 on (g.player2 = p2.id) inner join scores s on (g.game_id = s.game_id) order by g.game_id desc limit 5";
  $result = mysql_query($sql);

?>

<div class="recent-games">
  <div class="owl-carousel">
    <?php 

  while ($value = mysql_fetch_array($result)) {
  	$p1 = $value['player1'];
  	$p2 = $value['player2'];
  	$p1_score = $value['p1_score'];
  	$p2_score = $value['p2_score'];

  	echo 
  	'<div class=item>'
    .'<h5>'. $p1 .'</h5>'
    .'<h6>v.</h6>'
    .'<h5>'. $p2 .'</h5>'
    .'<h5>' . $p1_score . ' - ' . $p2_score . '</h5>'
    .'</div>';
  }

?>
  </div>
</div>

