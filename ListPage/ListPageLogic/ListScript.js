$(document).ready(function () {
  $("button").click(function () {
    const selectedValues = $(".delete-checkbox:checked")
      .map(function () {
        return $(this).val();
      })
      .get()
      .join(", ");
    const delValues = selectedValues;
    $.post(
      "Core/Controller/FrontController.php",
      {
        delValues: delValues,
      },
      function (status) {
        console.log(status, delValues);
        if (delValues != "") location.reload();
      }
    );
  });
});
