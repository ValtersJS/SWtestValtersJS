class Item {
  constructor(sku, name, price) {
    this.sku = sku;
    this.name = name;
    this.price = price + "$";
  }

  emptyCheck(value) {
    if (value.trim() != "") {
      return true;
    }else {
      return false;
    }
  }

  priceCheck() {
    var priceField = $("#price").val().trim();
    var priceValid = new RegExp("^\\d{1,5}(\\.\\d{2})$|^\\d{1,5}$");
    if (priceValid.test(priceField) == true) {
      return true;
    }else {
      return false;
    }
  }

  sizeCheck() {
    var sizeField = $("#size").val().trim();
    var sizeValid = new RegExp("^\\d{1,3}$");
    if (sizeValid.test(sizeField) == true) {
      $("#size").removeClass("validation");
      return true;
    } else {
      $("#size").addClass("validation");
      return false;
    }
  }
  
  dimensionCheck() {
    var heightField = $("#height").val().trim();
    var widthField = $("#width").val().trim();
    var lengthField = $("#length").val().trim();
    var dimensionValid = new RegExp("^\\d{1,4}$");
    var i = 0;
  
    $("#type_Furniture input").each(function () {
      if (dimensionValid.test($(this).val().trim())) {
        i++;
        $(this).removeClass("validation");
      } else {
        $(this).addClass("validation");
      }
    });
    if (i == 3) {
      return true;
    }
  }
  
  weightCheck() {
    var weightField = $("#weight").val().trim();
    var weightValid = new RegExp("^\\d{1,3}$");
    if (weightValid.test(weightField) == true) {
      $("#weight").removeClass("validation");
      return true;
    } else {
      $("#weight").addClass("validation");
      return false;
    }
  }
  
  pAcheck() {
    var count = 0;
    var pCheck = false;
    var fieldErrorName;
    var pID;
  
    $(".parentAttr input").each(function () {
      fieldErrorName = $(this).attr("name");
      pID = "#" + fieldErrorName + "-" + "mistake";
  
      if (!this.value.trim()) {
        $(this).addClass("validation");
        $(pID).show();
        console.log(pID);
      } else {
        $(this).removeClass("validation");
        $(pID).hide();
        count++;
      }
    });
  
    if (!this.priceCheck()) {
      $("#price").addClass("validation");
      // $(pID).show();
    } else {
      $("#price").removeClass("validation");
      // $(pID).hide();
      pCheck = true;
    }
  
    if (count == 3 && pCheck == true) {
      return true;
    }
  }

  validate() {
    // var isNameEmpty = this.emptyCheck(this.name);
    // var isSKUEmpty = this.emptyCheck(this.sku);
    // var isPriceEmpty = this.emptyCheck(this.price);
    var isParentCorrect = this.pAcheck();
    var isPriceCorrect = this.priceCheck(this.price);

    // return isNameEmpty && isSKUEmpty && isPriceEmpty;
    return isParentCorrect && isPriceCorrect;
  }

  serialize() {
    return [this.sku, this.name, this.price];
  }
}

class DVD extends Item {
  constructor(sku, name, price, size, type) {
    super(sku, name, price);
    this.size = $("#size").val().trim();
    this.type = 1;
  }

  validate() {
    var isParentValid = super.validate();
    var isSizeEmpty = this.emptyCheck(this.size);
    var isSizeCorrect = this.sizeCheck();
    (!isSizeEmpty) ? $("#Size-mistake").show() : $("#Size-mistake").hide();
    
    return isParentValid && isSizeEmpty && isSizeCorrect;
  }

  prepare() {
    var isValid = this.validate();
    this.size = "Size: " + this.size + "MB";
    return isValid;
  }
}

class Book extends Item {
  constructor(sku, name, price, weight, type) {
    super(sku, name, price);
    this.weight = $("#weight").val().trim();
    this.type = 2;
  }

  validate() {
    var isParentValid = super.validate();
    var isWeightEmpty = this.emptyCheck(this.weight);
    var isWeightCorrect = this.weightCheck();
    (!isWeightEmpty) ? $("#Weight-mistake").show() : $("#Weight-mistake").hide();

    return isParentValid && isWeightEmpty && isWeightCorrect;
  }

  prepare() {
    var isValid = this.validate();
    this.weight = "Weight: " + this.weight + "KG";
    return isValid;
  }
}

class Furniture extends Item {
  constructor(sku, name, price, width, height, length, type) {
    super(sku, name, price);
    this.width = $("#width").val().trim();
    this.height = $("#height").val().trim();
    this.length = $("#length").val().trim();
    this.type = 3;
  }

  validate() {
    var isParentValid = super.validate();
    var isWidthEmpty = this.emptyCheck(this.width);
    var isHeightEmpty = this.emptyCheck(this.height);
    var isLengthEmpty = this.emptyCheck(this.length);
    var isDimensionCorrect = this.dimensionCheck();
    (!isWidthEmpty) ? $("#Width-mistake").show() : $("#Width-mistake").hide();
    (!isHeightEmpty) ? $("#Height-mistake").show() : $("#Height-mistake").hide();
    (!isLengthEmpty) ? $("#Length-mistake").show() : $("#Length-mistake").hide();

    return isParentValid && isWidthEmpty && isHeightEmpty && isLengthEmpty;
  }

  prepare() {
    return this.validate();
  }
}

window.onload = function hide() {
  $(".parentAttr p").hide();
  $("#Size-mistake").hide();
  $("#Weight-mistake").hide();
  $("#Height-mistake").hide();
  $("#Width-mistake").hide();
  $("#Length-mistake").hide();
  $(".product").hide();
};

function makeProduct(productType) {
  var skuField = $("#sku").val().trim();
  var nameField = $("#name").val().trim();
  var priceField = $("#price").val().trim();

  switch (productType) {
    case "DVD":
      return new DVD(skuField, nameField, priceField);
    case "Book":
      return new Book(skuField, nameField, priceField);
    case "Furniture":
      return new Furniture(skuField, nameField, priceField);
  }
}

//dynamic form switching
$("#productType").change(function () {
  window.type = this.value;
  $(".product").hide();
  $("#" + "type_" + this.value).show();
});

//product save button (on click) function
$("#product_form").submit(function (e) {
  e.preventDefault();
  if(typeof type != "undefined") {
    var product = makeProduct(type);
    // var isValid = product.validate();
    var isValid = product.prepare();
    // var attributes = product.serialize();

    if (isValid) {
      $.post(
        "FrontController.php",
        {
          product: JSON.stringify(product),
        },
        function (status) {
          console.log(status);
          console.log("all good");
          console.log(isValid);
          console.log(product);
          // console.log(attributes);
          window.location.href = "http://localhost/swtest_v1/Index.php";
        }
      ).fail(function () {
        console.log("fail");
      });
    }
  }
});
