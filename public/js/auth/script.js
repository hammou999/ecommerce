const ul = document.querySelector("ul"),
input = document.querySelector(".input-skills"),
tagNumb = document.querySelector(".details span");

let maxTags = 10,
tags = ["coding", "nepal"];

countTags();
createTag();

function countTags(){
    input.focus();
    tagNumb.innerText = maxTags - tags.length;
}

function createTag(){
    ul.querySelectorAll("li").forEach(li => li.remove());
    tags.slice().reverse().forEach(tag =>{
        let liTag = `<li>${tag} <i class="uit uit-multiply" onclick="remove(this, '${tag}')"></i></li>`;
        ul.insertAdjacentHTML("afterbegin", liTag);
    });
    countTags();
}

function remove(element, tag){
    let index  = tags.indexOf(tag);
    tags = [...tags.slice(0, index), ...tags.slice(index + 1)];
    element.parentElement.remove();
    countTags();
}

function addTag(e){
    if(e.key == "Enter"){
        let tag = e.target.value.replace(/\s+/g, ' ');
        if(tag.length > 1 && !tags.includes(tag)){
            if(tags.length < 10){
                tag.split(',').forEach(tag => {
                    tags.push(tag);
                    createTag();
                });
            }
        }
        e.target.value = "";
    }
}

input.addEventListener("keyup", addTag);

const removeBtn = document.querySelector(".details button");
removeBtn.addEventListener("click", () =>{
    tags.length = 0;
    ul.querySelectorAll("li").forEach(li => li.remove());
    countTags();
});

//------------------------------------
const selected1 = document.querySelector(".selected1");
const optionsContainer1 = document.querySelector(".options-container1");
const optionsList1 = document.querySelectorAll(".option1");
const selected2 = document.querySelector(".selected2");
const optionsContainer2 = document.querySelector(".options-container2");
const optionsList2 = document.querySelectorAll(".option2");

selected1.addEventListener("click", () => {
  optionsContainer1.classList.toggle("active");
});

optionsList1.forEach(o => {
  o.addEventListener("click", () => {
    selected1.innerHTML = o.querySelector("label").innerHTML;
    optionsContainer1.classList.remove("active");
  });
});

window.addEventListener('mouseup', function(event){
    if(event.target!=selected1){
        optionsContainer1.classList.remove("active");
      }
      if(event.target!=selected2){
        optionsContainer2.classList.remove("active");
      }
  })


selected2.addEventListener("click", () => {
  optionsContainer2.classList.toggle("active");
});

optionsList2.forEach(o => {
  o.addEventListener("click", () => {
    selected2.innerHTML = o.querySelector("label").innerHTML;
    optionsContainer2.classList.remove("active");
  });
});

