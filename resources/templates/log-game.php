<?php
require_once(LIBRARY_PATH . "/functions.php"); 
?>
<div class="container"> 
  <div class="row">
  <div class="eleven columns offset-by-one">
      <h1>Log Games</h1>
      <h6>Select opponents and enter scores for each match.</h6>
      <form action="game-submit.php" method="post" id="log-game-form">
       <div class="row">
        <div class="three columns">
          <label >Player 1</label>
          <select name="p1" placeholder="Player 1">
           <?php
           populateDropDown();
           ?>
         </select>
       </div>
       <div class="three columns">
        <label >Player 2</label>
        <select name="p2">
          <?php
          populateDropDown();
          ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="three columns">
        <label>Game 1</label>
      </div>
    </div>
    <div class="row">
      <div class="three columns">
        <input class="u-full-width score-input" type="number" placeholder="Player 1 Score" name="p1-score[]">
      </div>
      <div class="three columns">
        <input class="u-full-width score-input" type="number" placeholder="Player 2 Score" name="p2-score[]">
      </div>
    </div>
    <div class="row">
      <div class="three columns">
        <label>Game 2</label>
      </div>
    </div>
    <div class="row">
      <div class="three columns">
        <input class="u-full-width score-input" type="number" placeholder="Player 1 Score" name="p1-score[]">
      </div>
      <div class="three columns">
        <input class="u-full-width score-input" type="number" placeholder="Player 2 Score" name="p2-score[]">
      </div>
    </div>
    <div class="row">
      <div class="three columns">
        <label>Game 3</label>
      </div>
    </div>
    <div class="row">
      <div class="three columns">
        <input class="u-full-width score-input" type="number" placeholder="Player 1 Score" name="p1-score[]">
      </div>
      <div class="three columns">
        <input class="u-full-width score-input" type="number" placeholder="Player 2 Score" name="p2-score[]">
      </div>
    </div>
    <div class="row">
      <div class="six columns">
        <input class="button-primary" type="submit" value="Submit Games">
      </div>
    </div>
  </form>
</div>
</div>
</div>