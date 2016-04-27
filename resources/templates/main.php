<?php
require_once(LIBRARY_PATH . "/functions.php");
?>
<div class="container main">
  <div class="row">
  <div class="ten columns offset-by-one">
      <h1>Current Rankings</h1>
      <table class="u-full-width">
        <thead>
          <tr>
            <th>Rank</th>
            <th>Name</th>
            <th>Win</th>
            <th>Loss</th>
            <th class="mobile-hide">Matches Played</th>
            <th>Pct</th>
            <th>Rating</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          getPlayers();
          ?>
        </tbody>
      </table>
    </div>
   <!--  <div class="three columns ">
      <h1>Recent Games</h1>
      <?php      
      require_once(TEMPLATES_PATH . "/slider.php");
      ?>
    </div> -->
  </div>
</div>


