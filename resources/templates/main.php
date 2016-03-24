<?php
require_once("../resources/config.php");
require_once(LIBRARY_PATH . "/functions.php");
?>
<div class="container">
  <div class="row">
    <div class="nine columns">
      <h5>Current Rankings</h5>
      <table class="u-full-width">
        <thead>
          <tr>
            <th>Name</th>
            <th>Wins</th>
            <th>Losses</th>
            <th>Games Played</th>
            <th>Win Pct</th>
            <th>Ranking</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          getPlayers();
          ?>
        </tbody>
      </table>
    </div>
    <div class="three columns">
      <h5>Recent Games</h5>
      <?php      
      require_once(TEMPLATES_PATH . "/slider.php");
      ?>
    </div>
  </div>
</div>


