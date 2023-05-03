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