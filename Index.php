<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include 'C:\xampp\htdocs\swtest_v1\scss\List\ProdList.css'; ?></style>
    <title>Product List</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
  </head>

  <body>
    <div class="container">

      <header>
        <h1>Product List</h1>
        <div id="header-border"></div>
      </header>

      <div class="header-buttons">
        <input type="button" class="Add" onclick="location.href=
        'http://localhost/swtest_v1/IndexTwo.php';" value="Add" />
        <button>MASS DELETE</button>
      </div>

      <div class="content">  
        <?php
          include_once 'C:\xampp\htdocs\swtest_v1\Funcs.php';
          include_once 'C:\xampp\htdocs\swtest_v1\TableGen.php';

          TableGen::genTable();
          
          
        ?>
        <script src="ListScript.js"></script>
        
      </div> 
       
      <footer>
        Scandiweb test assignment
      </footer>

    </div>
  </body>
</html>