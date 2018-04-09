

var btn1 = document.createElement('input');
btn1.type = "button";
btn1.className = "btn";
btn1.value = "Reserver";
btn1.onclick=function () {
    btn1.parentElement.className="orange" ;
    btn1.parentElement.removeChild(btn1) ;
};

var btn2 = document.createElement('input');
btn2.type = "button";
btn2.className = "btn";
btn2.value = "check-in";
btn2.onclick=function () {
    btn2.parentElement.className="rouge" ;
    btn2.parentElement.removeChild(btn2) ;
    btn2.parentElement.removeChild(btn1) ;

};

var btn3 = document.createElement('input');
btn3.type = "button";
btn3.className = "btn";
btn3.value = "check-out";
btn3.onclick=function () {
    btn3.parentElement.className="vert" ;
    btn3.parentElement.removeChild(btn3) ;
};

const cells = document.querySelectorAll("td");

for (var j = 0; j < cells.length; j++) {
    cells[j].className="vert" ;
}

for (var  i = 0; i < cells.length; i++) {
/*
    cells[i].addEventListener("click", function() {
        this.className= this.className === "vert" ? "orange" : "vert";
        //getval(this);
    });
    */
    cells[i].addEventListener("mouseover",function () {
        if (this.className==="vert" )
        {
            this.appendChild(btn1) ;
            this.appendChild(btn2) ;
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
    cells[i].addEventListener("mouseleave",function () {
        setTimeout(this.removeChild(btn1) ,2000);
        setTimeout(this.removeChild(btn2) ,2000);
        setTimeout(this.removeChild(btn3) ,2000);

    })


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

