function emptyCheck(field) {

  if (!field.val().trim()) {
    $("#" + field.attr("id") + "-" + "mistake").show();
    field.addClass("validation");
    return false;

  } else {
    console.log(this.id);
    $("#" + field.attr("id") + "-" + "mistake").hide();
    field.removeClass("validation");
    return true;
  }
}

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

function typeCheck() {
  var allGood = false;

  if (type == "DVD") {
    if (!emptyCheck($("#size"))) {

      $("#Size-mistake").show();
      return false;
    } else {
      if (!sizeCheck()) {
        $("#Size-mistake").show();
        return false;
      } else {
        $("#Size-mistake").hide();
        allGood = true;
      }
    }
  } else if (type == "Furniture") {
    const results = ['#height', '#width', '#length'].map(str => emptyCheck($(str)));
    if (results.includes(false)) {

      console.log(results);

      return false;
    } else {
      if (!dimensionCheck()) {
        return false;
      } else {
        allGood = true;
      }
    }
  } else if (type == "Book") {
    if (!emptyCheck($("#weight"))) {
      $("#Weight-mistake").show();
      return false;
    } else {
      if (!weightCheck()) {
        return false;
      } else {
        $("#Weight-mistake").hide();
        allGood = true;
      }
    }
  }
  console.log(allGood);
  return allGood;
}

function getProduct() {
  var product = [];
  var typeInput = "#" + "type_" + type + " :input";
  var typeID = "#" + "type_" + type;
  var attrConcat = "";
  var i = 1;
  console.log(typeInput);

  //get parrent attributes that are the same for all product types
  $(".parentAttr input").each(function () {
    product.push($(this).val());
  });
  product[2] += "$";

  //get specific attributes for type
  if ($(typeInput).length > 1) {
    $(typeInput).each(function () {
      attrConcat += $(this).val();
      while (i < $(typeInput).length) {
        i++;
        attrConcat += "x";
        return;
      }
    });
    product.push(attrConcat);
  } else {
    $(typeInput).each(function () {
      product.push($(this).val());
    });
  }
  if (type == "DVD") {
    product[3] = "Size: " + product[3] + " MB";
    console.log(product);
    return product;
  } else if (type == "Book") {
    product[3] = "Weight: " + product[3] + "KG";
    console.log(product);
    return product;
  } else if (type == "Furniture") {
    product[3] = "Dimension: " + product[3];
    console.log(product);
    return product;
  }


}

//input error hidding
$(".parentAttr p").hide();
$("#Size-mistake").hide();
$("#Weight-mistake").hide();
$("#height-mistake").hide();
$("#width-mistake").hide();
$("#length-mistake").hide();

//dynamic form switching
$(".product").hide();
$("#productType").change(function () {
  window.type = this.value;
  $(".product").hide();
  $("#" + "type_" + this.value).show();
});

//product save button (on click) function
$("#product_form").submit(function (e) {
  e.preventDefault();
  if (typeof type == "undefined") {
    return false;
  }
  if (PAcheck() && typeCheck()) {
    var prodArray = getProduct();
    $.post("AddCall.php", {
      product: JSON.stringify(prodArray)
    }, function () {
      console.log("all good");
      window.location.href = "http://localhost/swtest_v1/ListPage/Index.php";
    }).fail(function () {
      console.log("fail");
    });
  }
});