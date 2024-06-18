const forms = document.querySelectorAll(".newSubComment");

forms.forEach((form) => {
  form.addEventListener("submit", (e) => {
    e.preventDefault();

    const id_comment = form.dataset.comment;
    const username = form.dataset.username;

    const content = document.querySelector("#content_sub_comment" + id_comment);
    const subComments = document.querySelector("#sub_comments" + id_comment);

    const url = `/storeSubComment/${id_comment}/`;
    const fromdata = new FormData(form);
    fetch(url, { method: "POST", body: fromdata })
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        // Create the div  with class "comment"
        const subCommentDiv = document.createElement("div");
        subCommentDiv.className = "comment";

        // Create the strong  and append it to subCommentDiv
        const strong = document.createElement("strong");
        strong.textContent = username;
        subCommentDiv.appendChild(strong);

        // Create the p  and append it to subCommentDiv
        const p = document.createElement("p");
        p.textContent = content.value;
        subCommentDiv.appendChild(p);

        // Create the time element with the datetime attribute and append it to subCommentDiv
        const time = document.createElement("time");
        time.setAttribute("datetime", new Date().toISOString().split("T")[0]);
        time.textContent = new Date().toLocaleDateString("en-CA");
        subCommentDiv.appendChild(time);

        // Append subCommentDiv to an existing  in the document, e.g., the body
        subComments.appendChild(subCommentDiv);

        // Reset the form
        content.value = "";
      });
  });
});
