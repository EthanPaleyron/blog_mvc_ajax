const ButtonsDelete = document.querySelectorAll(".buttonsDelete");
ButtonsDelete.forEach((ButtonDelete) => {
  ButtonDelete.addEventListener("click", (e) => {
    // dont submit the form
    e.preventDefault();
    const id_blog = ButtonDelete.dataset.id;
    let url = `/delete-blog/${id_blog}/`;
    fetch(url, { method: "get" })
      .then((response) => {
        return response;
      })
      .then((data) => {
        if (data.ok) {
          // if there are data
          // get the parent
          const parent = document.querySelector(`#blog_${id_blog}`);
          // delete element
          parent.remove();
        }
      });
  });
});
