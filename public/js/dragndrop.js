checkboxes = document.querySelectorAll("input[name^=delete]");
Array.from(checkboxes).forEach((element)=>{
    element.addEventListener('change', (e)=>{
        if(e.target.checked && checkboxes.length == document.querySelectorAll("input[name^=delete]:checked").length)
            e.target.checked = false;
    })
})
const dialogClose = document.getElementById("dialog-close");
if(dialogClose)
  dialogClose.addEventListener("click", () => {
    const dialog = document.getElementById("dialog");
    dialog.classList.add("hide");
  });

const textArea = document.getElementById("adm-product-description");

textArea.addEventListener("input", () => {
  if (textArea.value.length > 2048) {
    textArea.value = textArea.value.substring(0, 2048);
  }
  const textAreaLength = document.getElementById("adm-product-description-length");
  textAreaLength.innerText = textArea.value.length;
});


const selectValue = (button)=>{
  const select = document.getElementById("adm-product-author");
  select.value = select.value.substring(0, select.value.lastIndexOf(';') > -1 ? select.value.lastIndexOf(';')+2  : 0);
  select.value += button.innerText + '; ';
  select.focus();
}



const search = document.getElementById("adm-product-author")
search.addEventListener("input", () => {
  search_string = search.value.toLowerCase().split(';');
  search_string = search_string[search_string.length-1].trim();
  console.log(search_string);
  Array.from(document.querySelectorAll(".dropdown-content button")).forEach((element) => {
    if (element.innerText.toLowerCase().includes(search_string.toLowerCase())) {
      element.classList.remove("hide");
    } else {
      element.classList.add("hide");
    }
  });
})
