<!DOCTYPE html>
<html>
<?php
  require_once(LIBRARY_PATH . "/head.php");
  require_once(LIBRARY_PATH . "/functions.php"); 
?>
<body>
  <!-- Preloader -->
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
  <header>
    <div class="container">
      <div class="header-inner">
        <div class="row"> 
          <div class="twelve columns">
            <nav>
              <button class="mobile-menu">Menu</button>
              <div class="nav">
                <ul>
                  <li><a href="index" class="button button-primary">Rankings</a></li>
                  <li><a href="log-game" class="button button-primary">Log Games</a></li>
                  <li><a href="add-player" class="button">Sign Up</a></li>
                </ul>
                <ul class="mobile-hide">
                  <li><form class="search-form" action="user.php">
                      <select name="id" id="search" >
                      <option></option>
                        <?php populateDropDown();?>
                      </select>
                    <button id="search" type="submit">VIEW</button>
                    </form>
                    </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>