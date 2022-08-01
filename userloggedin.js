
let notes = document.getElementById("notes-list");
let addbtn = document.getElementById("addbtn");
let array = new Array();

let title = document.getElementById("title");
let textarea = document.getElementById("area");
let confirm = document.getElementById("confirm");
addbtn.addEventListener("click", add);
function add() {
  let confirm = document.getElementById("confirm");
  if (title.value != "" && textarea.value != "") {
    let date = new Date();
    let arr = new Array();
    arr.push(title.value);
    arr.push(textarea.value);
    arr.push(`${date.getDate()}-${date.getMonth() + 1}-${date.getFullYear()}`);
    arr.push("add");
    title.value = "";
    textarea.value = "";
    json = JSON.stringify(arr);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'handle.php', true);
    xhr.onload = function () {
      let show = this.responseText;
      // console.log(show);
      if (show) {
        confirm.style.display = "block";
        confirm.innerHTML = '<div class="alert alert-success text-center" role="alert"> Your note is successfully added</div>';
      }
    }
    let value1 = "value=" + json;
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(value1);

  }
}
function show() {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', 'handleshow.php', true);
  xhr.onload = function () {
    let response = this.responseText;
    notes.innerHTML = response;

  }
  xhr.send();
}


function deleteNote(index) {
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'delete.php', true);
  xhr.onload = function () {
    let show = this.responseText;
    //console.log(show);

  }
  let value1 = "value=" + index;
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send(value1);
  show();
}

let add1 = document.getElementById("add");
let added = document.getElementById("added");
add1.addEventListener("click", () => {
  let text = document.getElementById("text");
  let notesd = document.getElementById("notes");
  text.style.display = "flex";
  notesd.style.display = "none";

});
added.addEventListener("click", () => {
  let text = document.getElementById("text");
  let notesd = document.getElementById("notes");
  text.style.display = "none";
  confirm.style.display = "none";
  notesd.style.display = "flex";
  show();
});

function editNote(index) {
  let elem = document.getElementById(`id${index}`);
  let arr = new Array();
  arr.push(index);
  arr.push(elem.value);
  // console.log(arr);
  json = JSON.stringify(arr);   
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'update.php', true);
  xhr.onload = function () {
    let check = this.responseText;
    if (check) {
      show();
    }

  }
  let value1 = "value=" + json;
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send(value1);
  
}
let upload_btn=document.getElementById("upload_btn");
upload_btn.addEventListener("click",()=>{
  // const xhr = new XMLHttpRequest();
  // xhr.open('POST', 'upload.php', true);
  // xhr.onload = function () {
  //   let data = this.responseText;
  //   console.log(show);
  //   console.log("response");
  //   textarea.innerHTML=data;
  // }
  // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  // xhr.send();
  console.log("submit button clicked");
});

function download(index)
{
  let text_id=document.getElementById("id"+index);
  let text = text_id.value;
  let file_url=document.getElementById("file_load"+index);
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'download.php', true);
  xhr.onload = function() {
    let check = this.responseText;
    console.log(check);
    if(check)
    {
      file_url.setAttribute("href","files/note.txt");
    }
  }
  let value="value="+text;
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send(value);
}