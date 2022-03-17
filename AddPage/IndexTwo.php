<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Add</title>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <style><?php include '..\scss\Add\ProdAdd.css'; ?></style> 
</head>

<Body>
  <div class="container">
    <div class="header-text">
      <h1>Product Add</h1>
      <div id="header-border"></div>
    </div>

    <div class="header-buttons">
      <input type="submit" class="Save" form="product_form" value="Save">
      <input type="button" class="Cancel" onclick="location.href='../Index.php';" value="Cancel" />
    </div>

    <div class="content">

      <form id="product_form" action="ItemAdd.php" method="post">
        <div class="parentAttr">
          <label>SKU</label> <input type="text" name="Sku" id="sku" autocomplete="off">
          <p id="Sku-mistake">Please, submit required data</p><br>
          <label>Name</label> <input type="text" name="Name" id="name" autocomplete="off">
          <p id="Name-mistake">Please, submit required data</p><br>
          <label>Price ($)</label> <input type="text" name="Price" id="price" autocomplete="off">
          <p id="Price-mistake">Please, submit required data</p><br>
        </div>

        <div class="dropdown">
          <label>Type Switcher</label>
          <select id="productType" autocomplete="off">
            <option selected disabled hidden>Type Switcher</option>
            <option value="DVD">DVD</option>
            <option value="Book">Book</option>
            <option value="Furniture">Furniture</option>
          </select><br>
        </div>


        <div class="product" name="Size" id="type_DVD">
          <label>Size (MB)</label> <input type="text" name="Atribute" id="size" autocomplete="off">
          <p id="Size-mistake">Please, submit required data</p>
          <p>Please provide the size in MB</p>
        </div>

        <div class="product" name="Weight" id="type_Book">
          <label>Weight (KG)</label> <input type="text" name="Atribute" id="weight" autocomplete="off">
          <p id="Weight-mistake">Please, submit required data</p>
          <p>Please provide weight in KG</p>
        </div>

        <div class="product" name="Dimension" id="type_Furniture">
          <label>Height (CM)</label> <input type="text" name="Atribute" id="height" autocomplete="off">
          <p id="Height-mistake">Please, submit required data</p><br>
          <label>Width (CM)</label> <input type="text" name="Atribute" id="width" autocomplete="off">
          <p id="Width-mistake">Please, submit required data</p><br>
          <label>Length (CM)</label> <input type="text" name="Atribute" id="length" autocomplete="off">
          <p id="Length-mistake">Please, submit required data</p><br>
          <p>Please provide dimensions in HxWxL</p>
        </div>
      </form>
    </div>

    <div class="footer">
      <div id="footer-border"></div>
      <p>Scandiweb test assignment</p>
    </div>

    <script src="AdddScript.js"></script>
  </div>
</body>

</html>