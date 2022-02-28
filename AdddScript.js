class Item {
  constructor(sku, name, price) {
    this.sku = sku
    this.name = name
    this.price = price
  }
  
  emptyCheck2(value) {
    return value != ""
  }

  validate() {
    var isNameEmpty = this.emptyCheck2(this.name)
    var isSKUEmpty = this.emptyCheck2(this.sku)
    var isPriceEmpty = this.emptyCheck2(this.price)

    return !isNameEmpty && !isSKUEmpty && !isPriceEmpty 
  }

  serialize() {
    return [this.sku, this.name, this.price]
  }
}

class DVD extends Item {
  constructor(sku, name, price, size, type) {
    super(sku, name, price)
    this.size = $("#size").val().trim()
    this.type = 1

  }

  validate() {
    var isParentValid = super.validate()
    var isSizeEmpty = this.emptyCheck2(this.size)

    return !isParentValid && !isSizeEmpty
  }

  serialize() {
    var attributes = super.serialize()
    attributes.push(this.size)
    return attributes
  }
}

class Book extends Item {
  constructor(sku, name, price, weight, type) {
    super(sku, name, price)
    this.weight = $("#weight").val().trim()
    this.type = 2
  }

  validate() {
    var isParentValid = super.validate()
    var isWeightEmpty = this.emptyCheck2(this.weight)

    return isParentValid && !isWeightEmpty
  }

  serialize() {
    var attributes = super.serialize()
    attributes.push(this.price)
    return attributes
  }
}

class Furniture extends Item {
  constructor(sku, name, price, width, height, length, type){
    super(sku, name, price)
    this.width = $("#width").val().trim()
    this.height = $("#height").val().trim()
    this.length = $("#length").val().trim()
    this.type = 3
  }

  validate() {
    var isParentValid = super.validate()
    var isWidthEmpty = this.emptyCheck2(this.width)
    var isHeightEmpty = this.emptyCheck2(this.height)
    var isLengthEmpty = this.emptyCheck2(this.length)

    return isParentValid && !isWidthEmpty && !isHeightEmpty && !isLengthEmpty
  }

  serialize() {
    var attributes = super.serialize()
    attributes.push(this.width, this.height, this.length)
    return attributes
  }
}

function emptyCheck2(value) {
  return value.trim() != ""
}

// function emptyCheck(field) {

//   if (!field.val().trim()) {
//     $("#" + field.attr("id") + "-" + "mistake").show();
//     field.addClass("validation");
//     return false;

//   } else {
//     console.log(this.id);
//     $("#" + field.attr("id") + "-" + "mistake").hide();
//     field.removeClass("validation");
//     return true;
//   }
// }

function priceCheck() {
  var priceField = $("#price").val().trim();
  var priceValid = new RegExp("^\\d{1,5}(\\.\\d{2})$|^\\d{1,5}$");
  if (priceValid.test(priceField) == true) {
    return true;
  } else {
    return false;
  }
} 

function sizeCheck() {
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

function dimensionCheck() {
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

function weightCheck() {
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

function PAcheck() {
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

  if (!priceCheck()) {
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

window.onload = function hide() {
  $(".parentAttr p").hide();
  $("#Size-mistake").hide();
  $("#Weight-mistake").hide();
  $("#height-mistake").hide();
  $("#width-mistake").hide();
  $("#length-mistake").hide();
  $(".product").hide();
}
  
function makeProduct(productType) {
  var skuField = $("#sku").val().trim();
  var nameField = $("#name").val().trim();
  var priceField = $("#price").val().trim();

  // var prod = null
  switch (productType) {
    case "DVD": return new DVD(skuField, nameField, priceField)
    case "Book": return new Book(skuField, nameField, priceField)
    case "Furniture": return new Furniture(skuField, nameField, priceField)
  }
  // return prod
}

//dynamic form switching
$("#productType").change(function () {
  window.type = this.value;
  $(".product").hide();
  $("#" + "type_" + this.value).show();
});

function validatorLookup(val) {
  let validators =
  {
    'dvd': 'DVDValidator',
    'book': 'BookValidator', 
    'furniture': 'FurnitureValidator',
    'none': 'NoneValidator'
  }
  let result = validators[val];
  return result;
}

//product save button (on click) function
$("#product_form").submit(function (e) {
  e.preventDefault();
  
  var product = makeProduct(type)
  var isValid = product.validate()
  var attributes = product.serialize()
  

  $.post("FrontController.php", {
      product: JSON.stringify(product)
    }, function () {
      console.log("all good");
      console.log(isValid)
      console.log(product)
      window.location.href = "http://localhost/swtest_v1/Index.php";
    }).fail(function () {
      console.log("fail");
    });
});
