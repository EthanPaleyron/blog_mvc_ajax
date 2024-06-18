const formsComment = document.querySelectorAll(".newComment");
let formsSubComment = document.querySelectorAll(".newSubComment");

formsComment.forEach((form) => {
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    const id_blog = form.dataset.blog;
    const username = form.dataset.username;

    const content = document.querySelector("#content_comment" + id_blog);
    const comments = document.querySelector("#comments" + id_blog);

    const url = `/storeComment/${id_blog}/`;
    const fromdata = new FormData(form);
    if (content.value !== "" && content.value.length <= 250) {
      fetch(url, { method: "POST", body: fromdata })
        .then((response) => {
          return response.json();
        })
        .then((data) => {
          // Create the div  with class "comment"
          const commentDiv = document.createElement("div");
          commentDiv.className = "comment";

          // Create the strong  and append it to commentDiv
          const strong = document.createElement("strong");
          strong.textContent = username;
          commentDiv.appendChild(strong);

          // Create the p  and append it to commentDiv
          const p = document.createElement("p");
          p.textContent = content.value;
          commentDiv.appendChild(p);

          // Create the time element with the datetime attribute and append it to commentDiv
          const time = document.createElement("time");
          time.setAttribute("datetime", data.datetime);
          time.textContent = data.date;
          commentDiv.appendChild(time);

          // Create the form with action, method, and enctype attributes
          const form = document.createElement("form");
          form.className = "newSubComment";
          form.dataset.comment = data.id;
          form.dataset.username = username;
          form.addEventListener("submit", (e) => subComment(e, form));
          commentDiv.appendChild(form);

          // Create the input  with type, name, and id attributes and append it to the form
          const input = document.createElement("input");
          input.setAttribute("type", "text");
          input.setAttribute("name", "content_sub_comment");
          input.setAttribute("id", "content_sub_comment" + data.id);
          form.appendChild(input);

          // Create the button  with type and class attributes and append it to the form
          const button = document.createElement("button");
          button.setAttribute("type", "submit");
          button.className = "button";
          button.textContent = "Comment";
          form.appendChild(button);

          // Create the div  with class "comment"
          const subCommentDiv = document.createElement("div");
          subCommentDiv.id = "sub_comments" + data.id;

          // Append commentDiv to an existing  in the document, e.g., the body
          commentDiv.appendChild(subCommentDiv);
          comments.appendChild(commentDiv);

          // Reset the form
          content.value = "";
          formsSubComment = document.querySelectorAll(".newSubComment");
        });
    }
  });
});

formsSubComment.forEach((form) => {
  form.addEventListener("submit", (e) => subComment(e, form));
});

function subComment(e, form) {
  e.preventDefault();

  const id_comment = form.dataset.comment;
  const username = form.dataset.username;

  const content = document.querySelector("#content_sub_comment" + id_comment);
  const subComments = document.querySelector("#sub_comments" + id_comment);

  const url = `/storeSubComment/${id_comment}/`;
  const fromdata = new FormData(form);
  if (content.value !== "" && content.value.length <= 250) {
    fetch(url, { method: "POST", body: fromdata })
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        // Create the div  with class "comment"
        const subCommentDiv = document.createElement("div");
        subCommentDiv.className = "sub_comment";

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
        time.setAttribute("datetime", data.datetime);
        time.textContent = data.date;
        subCommentDiv.appendChild(time);

        // Append subCommentDiv to an existing  in the document, e.g., the body
        subComments.appendChild(subCommentDiv);

        // Reset the form
        content.value = "";
      });
  }
}
