<div class="container main">
  <div class="row">
    <form action="user-submit.php" method="post" id="add-user-form" onsubmit="validateForm(this) return;">
      <div class="row">
        <div class="eight columns offset-by-one">
          <h1>Create Account</h1>
          <h6>Enter your name to start tracking your results.</h6>
        </div>
       </div>
       <div class="row">
        <div class="four columns offset-by-one">
          <input class="u-full-width" type="text" placeholder="Name" name="name" id="user-input">
          <input class="button-primary cta" type="submit" value="Join!">
        </div>
        <!-- <div class="five columns offset-by-one">
        <h5>I think foosball is a combination of soccer and shish kabobs.</h5>
        <p>-Mitch Hedberg</p>
        </div> -->
      </div>
    </form>
  </div>
</div>