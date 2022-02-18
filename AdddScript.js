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

window.onload = function hide() {
  $(".parentAttr p").hide();
  $("#Size-mistake").hide();
  $("#Weight-mistake").hide();
  $("#height-mistake").hide();
  $("#width-mistake").hide();
  $("#length-mistake").hide();
  $(".product").hide();
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
  let validator = validatorLookup(type);
});
