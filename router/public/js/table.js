var btn1 = document.createElement('input');
var body = document.querySelector("body");
btn1.type = "button";
btn1.className = "btn";
btn1.value = "Reserver";
btn1.onclick = function () {
    var dialogres = document.getElementById("reservation_dialogue");
    dialogres.showModal();
   body.classList.toggle("dialogexist");

};


var btn2 = document.createElement('input');
btn2.type = "button";
btn2.className = "btn";
btn2.value = "check-in";
btn2.onclick = function () {
    var dialogcheckin = document.getElementById("checkin_dialogue");
    body.classList.toggle("dialogexist");
    dialogcheckin.showModal();
};

var btn3 = document.createElement('input');
btn3.type = "button";
btn3.className = "btn";
btn3.value = "check-out";
btn3.onclick = function () {
    btn3.parentElement.className = "vert";
   // body.classList.toggle("dialogexist");
    btn3.parentElement.removeChild(btn3);
};

var cells = document.querySelectorAll("td");

for (j in cells)
{
    cells[j].className="vert" ;
}
for (i in rooms_js) {

    cells[rooms_js[i]["CHAMBREID"]-1].className = "rouge";
}
function refresh_table() {
    console.log(document.getElementById("date_in").value)

}
for (var i = 0; i < cells.length; i++) {
    /*
        cells[i].addEventListener("click", function() {
            this.className= this.className === "vert" ? "orange" : "vert";
            //getval(this);
        });
        */
    cells[i].addEventListener("mouseover", function () {
        if (this.className === "vert") {
            this.appendChild(btn1);
            this.appendChild(btn2);
        }
        else {
            if (this.className === "rouge") {

                this.appendChild(btn3);
            }
            else {

                this.appendChild(btn2);
            }
        }

    })
    cells[i].addEventListener("mouseleave", function () {
       btn1.visibility="hidden" ;
        btn2.visibility="hidden" ;
        btn3.visibility="hidden" ;

    })


}

function annulerreservation() {
    var dialogres = document.getElementById("reservation_dialogue");

    dialogres.close();
    body.classList.toggle("dialogexist");


}

function annulercheckin() {
    var dialogcheckin = document.getElementById("checkin_dialogue");
    dialogcheckin.close();
    body.classList.toggle("dialogexist");

}

var resform = document.getElementById("resform") ;
resform.onsubmit=function () {
    btn1.parentElement.className = "orange";
    btn1.parentElement.removeChild(btn1);
    var dialogres = document.getElementById("reservation_dialogue");
    body.classList.toggle("dialogexist");

    dialogres.close();
    return false ;
}

var checkinform = document.getElementById("checkinform") ;
checkinform.onsubmit=function () {
    btn2.parentElement.className = "rouge";
   // btn2.parentElement.removeChild(btn1);
    btn2.parentElement.removeChild(btn2);
    var dialogcheckin = document.getElementById("checkin_dialogue");
    dialogcheckin.close();
    body.classList.toggle("dialogexist");

    return false ;
}


/*
var tbl = document.getElementById("tblMain");

if (tbl != null) {

    for (var i = 0; i < tbl.rows.length; i++) {

        for (var j = 0; j < tbl.rows[i].cells.length; j++)

            tbl.rows[i].cells[j].onclick = function () { getval(this); };

    }

}
*/
/*
function getval(cell) {

    alert(cell.innerHTML);

}
*/

/*
function add_buttons(i) {
    if (cells[i].className==="vert" )
    {
        cells[i].appendChild(btn1) ;
        cells[i].appendChild(btn2) ;
    }
    else if (cells[i].className==="rouge" )
    {
        cells[i].appendChild(btn3) ;
    }
    else if (cells[i].className==="orange" )
    {
        cells[i].appendChild(btn2) ;
    }
}
*/

