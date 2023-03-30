const deleteBtn = document.querySelector('.delete-btn');

deleteBtn.addEventListener('click', () => {
  const confirmDelete = confirm('Are you sure you want to delete this item?');

  if (confirmDelete) {
    // ...
  } else {
     // ...
    return;
  }
});
