var checkAll = document.getElementById("check-all");
var checkboxes = document.querySelectorAll('.form-check-input');

checkAll.addEventListener("click", function () {

  checkboxes.forEach(function (checkbox) {
    checkbox.checked = checkAll.checked;
  });
});
