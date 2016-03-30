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
          <option></option>
           <?php
           populateDropDown();
           ?>
         </select>
       </div>
       <div class="three columns">
        <label >Player 2</label>
        <select name="p2">
        <option></option>
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
    <div class="row form-row">
      <div class="three columns">
        <input class="u-full-width score-input" type="number" placeholder="Player 1 Score" name="p1-score[]">
      </div>
      <div class="three columns">
        <input class="u-full-width score-input" type="number" placeholder="Player 2 Score" name="p2-score[]">
      </div>
    </div>
    <input id="add-game" type="button" value="+">
    <div class="row button-row">
      <div class="six columns">
        <input class="button-primary" type="submit" value="Log Games">
      </div>
    </div>
  </form>
</div>
</div>
</div>

<script>
var count = 1;
$('#add-game').on('click', function(e) {
  e.preventDefault();

  count = count + 1;
  var rowTemplate = '<div class="row"><div class="three columns"><label>Game ' + count + '</label></div></div><div class="row form-row"><div class="three columns"><input class="u-full-width score-input" type="number" placeholder="Player 1 Score" name="p1-score[]"></div><div class="three columns"><input class="u-full-width score-input" type="number" placeholder="Player 2 Score" name="p2-score[]"></div></div>';

  $('#add-game').before(rowTemplate);
    
});
</script