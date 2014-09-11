<?php
  session_start();
  if(!isset($_SESSION['id'])) { header("Location: index.php"); exit (0); }
?>

<div class="container">
  <div class="content">
    <ul class="ca-menu">
      <li><a href="#drinks">
            <span class="ca-icon">X</span>
            <div class="ca-content">
              <h2 class="ca-main">Drinks</h2>
              <h3 class="ca-sub">bebidas</h3>
            </div>
          </a>
      </li>
      <li><a href="#starters">
            <span class="ca-icon">H</span>
            <div class="ca-content">
              <h2 class="ca-main">Starters</h2>
              <h3 class="ca-sub">entradas</h3>
            </div>
          </a>
      </li>
      <li><a href="#pizzas">
            <span class="ca-icon">N</span>
            <div class="ca-content">
              <h2 class="ca-main">Pizzas</h2>
              <h3 class="ca-sub">pizzas</h3>
            </div>
          </a>
      </li>
      <li><a href="#">
            <span class="ca-icon">K</span>
            <div class="ca-content">
              <h2 class="ca-main">Pasta</h2>
              <h3 class="ca-sub">massas</h3>
            </div>
          </a>
      </li>
      <li><a href="#">
            <span class="ca-icon">O</span>
            <div class="ca-content">
              <h2 class="ca-main">Salads</h2>
              <h3 class="ca-sub">saladas</h3>
            </div>
          </a>
      </li>
      <li><a href="#">
            <span class="ca-icon">R</span>
            <div class="ca-content">
              <h2 class="ca-main">Disserts</h2>
              <h3 class="ca-sub">sobremesas</h3>
            </div>
          </a>
      </li>
    </ul>
  </div>
</div>

