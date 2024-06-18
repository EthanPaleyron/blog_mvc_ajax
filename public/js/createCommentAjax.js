const form = document.querySelector("#newComment");
const content = document.querySelector("#content_comment");
const comments = document.querySelector(".comments");
const id_blog = form.dataset.blog;
const username = form.dataset.username;
form.addEventListener("submit", (e) => {
  e.preventDefault();
  const url = `/storeComment/${id_blog}/`;
  const fromdata = new FormData(form);
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
      time.setAttribute("datetime", new Date().toISOString().split("T")[0]);
      time.textContent = new Date().toLocaleDateString("en-CA");
      commentDiv.appendChild(time);

      // Create the form with action, method, and enctype attributes
      const form = document.createElement("form");
      form.setAttribute("action", `/storeSubComment/${id_blog}/`);
      form.setAttribute("method", "post");
      form.setAttribute("enctype", "multipart/form-data");
      commentDiv.appendChild(form);

      // Create the input  with type, name, and id attributes and append it to the form
      const input = document.createElement("input");
      input.setAttribute("type", "text");
      input.setAttribute("name", "content_sub_comment");
      input.setAttribute("id", "content_sub_comment");
      form.appendChild(input);

      // Create the button  with type and class attributes and append it to the form
      const button = document.createElement("button");
      button.setAttribute("type", "submit");
      button.className = "button";
      button.textContent = "Comment";
      form.appendChild(button);

      // Append commentDiv to an existing  in the document, e.g., the body
      comments.appendChild(commentDiv);

      // Reset the form
      content.value = "";
    });
});
