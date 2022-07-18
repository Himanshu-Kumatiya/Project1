
let notes = document.getElementById("notes-list");
let addbtn = document.getElementById("addbtn");
let array = new Array();
let title = document.getElementById("title");
let textarea = document.getElementById("area");
let confirm=document.getElementById("confirm");
addbtn.addEventListener("click", add);
function add() {
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
        const xhr=new XMLHttpRequest();
        xhr.open('POST','handle.php',true);
        xhr.onload= function()
        {
          let show=this.responseText;
          console.log(show);
          if(show)
          {
            confirm.innerHTML='<div class="alert alert-success text-center" role="alert"> your note is successfully added</div>';
          }
        } 
        let value1="value="+json;
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(value1);
        
    }
}
function show() {
    const xhr=new XMLHttpRequest();
    xhr.open('GET','handleshow.php',true);
    xhr.onload= function()
    {
      let response = this.responseText;
      notes.innerHTML = response;
      
    }
    xhr.send();
}


function deleteNode(index) {
  const xhr=new XMLHttpRequest();
  xhr.open('POST','delete.php',true);
  xhr.onload= function()
  {
    let show=this.responseText;
    //console.log(show);
    
  } 
  let value1="value="+index;
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
    confirm.style.display="none";
    notesd.style.display = "flex";
    show();
});