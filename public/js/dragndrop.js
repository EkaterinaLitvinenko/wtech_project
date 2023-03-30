const dropzone = document.getElementById("dropzone");
const fileInput = document.getElementById("file-input");
const previewArea = document.getElementById("preview-container");

fileInput.addEventListener("change", handleFileSelect);
dropzone.addEventListener("dragover", handleDragOver);
dropzone.addEventListener("dragleave", handleDragLeave);
dropzone.addEventListener("drop", handleFileSelect);

function handleFileSelect(evt) {
  evt.preventDefault();

  let files;

  if (evt.type === "change") {
    files = evt.target.files;
  } else if (evt.type === "drop") {
    files = evt.dataTransfer.files;
  }

  for (let i = 0, f; (f = files[i]); i++) {
    if (!f.type.match("image.*")) {
      continue;
    }

    const reader = new FileReader();

    reader.onload = (function (theFile) {
      return function (e) {
        const img = document.createElement("img");
        img.setAttribute("class", "img-thumbnail");
        img.setAttribute("src", e.target.result);
        img.setAttribute("alt", theFile.name);

        previewArea.appendChild(img);
      };
    })(f);

    reader.readAsDataURL(f);
  }
}

function handleDragOver(evt) {
  evt.preventDefault();
  dropzone.classList.add("dragover");
}

function handleDragLeave(evt) {
  evt.preventDefault();
  dropzone.classList.remove("dragover");
}
