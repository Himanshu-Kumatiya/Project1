let notes = document.getElementById("notes-list");
let confirm=document.getElementById("confirm");
if (localStorage.getItem("notes") == null) {
    notes.innerHTML = "<div style='margin:50px; text-align:center;font-size:25px;'>You have no notes yet</div>";
}
else {
    show();
}
let addbtn = document.getElementById("addbtn");
let array = new Array();
let title = document.getElementById("title");
let textarea = document.getElementById("area");
addbtn.addEventListener("click", add);
function add() {
    if (title.value != "" && textarea.value != "") {
        let array = new Array();
        if (localStorage.getItem("notes") != null) {
            let json = JSON.parse(localStorage.getItem("notes"));
            array = json;
        }
        let date = new Date();
        let arr = new Array();
        arr.push(title.value);
        arr.push(textarea.value);
        arr.push(`${date.getDate()}-${date.getMonth() + 1}-${date.getFullYear()}`);
        title.value = "";
        textarea.value = "";
        array.push(arr);
        json = JSON.stringify(array);
        localStorage.setItem("notes", json);
        
        confirm.style.display="block";
        confirm.innerHTML='<div class="alert alert-success text-center" role="alert"> Your note is successfully added</div>';
        show();
        
    }
}
function show() {
    let json = JSON.parse(localStorage.getItem("notes"));
    let array = json;
    let div1 = "";
    array.forEach(function (element, index) {
        div1 += `<div class="divs">
                    <div class="heading-notes">${array[index][0]}</div>
                    <textarea class="text-note">${array[index][1]}</textarea>
                    <div >
                        <div class="date">${array[index][2]}</div>
                        <button class="delete" id="${index}" onclick="deleteNode(this.id)">Delete</button>
                    </div>  
                </div>`;
    });
    notes.innerHTML = div1;
}


function deleteNode(index) {
    let json = JSON.parse(localStorage.getItem("notes"));

    json.splice(index, 1);
    localStorage.setItem("notes", JSON.stringify(json));
    show();
}

// let search = document.getElementById("search-txt");
// search.addEventListener("input", () => {
//     let value = search.value;
//     let divs = document.getElementsByClassName("divs");
//     Array.from(divs).forEach(function (element) {
//         let para = element.getElementsByClassName("text-note")[0].innerText;
//         if (para.includes(value)) {
//             element.style.display = "block";
//         }
//         else {
//             element.style.display = "none";
//         }
//     });
// });
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
    notesd.style.display = "flex";
    confirm.style.display="none";
});