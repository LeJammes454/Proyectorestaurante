const content_text = document.querySelectorAll(".content_text");
const container = document.getElementById("container");

container.addEventListener("click", (e) => {
  let number = e.target.dataset.number;
  let value = e.target.classList.contains("btn");

  if (value) {
    Speed(number);
    return;
  }
  e.stopPropagation();
});

const Speed = (number) => {
  for (let index of content_text) {
    index.classList.remove("block");
    index.dataset.seccion === number ? index.classList.add("block") : "";
  }
};