        var body = document.querySelector("body");


        //MODAL WORKING FOR FIREFOX FOR RESERVATION DIALAOGUE - CHANGED AFTER PROBLEM WITH DIALOG
        var btn1 = document.createElement('input');

        btn1.type = "button";
        btn1.className = "btn";
        btn1.value = "Reserver";

        var dialogres = document.getElementById("reservation_dialogue");
        var span = document.getElementById("spanclose");

        btn1.onclick = function () {
            dialogres.style.display = "block";
        };

        span.onclick = function() {
            dialogres.style.display = "none";
        }



        //MODAL WORKING FOR FIREFOX CHECKIN DIALAOGUE - CHANGED AFTER PROBLEM WITH DIALOG
        var btn2 = document.createElement('input');

        btn2.type = "button";
        btn2.className = "btn";
        btn2.value = "Check-in";

        var dialogcheckin = document.getElementById("checkin_dialogue");

        btn2.onclick = function () {
            dialogcheckin.style.display = "block";
        };

        var span2 = document.getElementById("spanclose2");

        span2.onclick = function() {
            dialogcheckin.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == dialogcheckin || event.target == dialogres) {
                dialogcheckin.style.display = "none";
                dialogres.style.display = "none";
            }
        }



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

        for (j in cells) {
            cells[j].className = "vert";
        }
        for (i in rooms_js) {

            cells[rooms_js[i]["CHAMBREID"] - 1].className = "rouge";
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
                    this.id = "room "+i;
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
                btn1.visibility = "hidden";
                btn2.visibility = "hidden";
                btn3.visibility = "hidden";

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

        var resform = document.getElementById("resform");

        resform.onsubmit = function () {
            btn1.parentElement.className = "orange";
            btn1.parentElement.removeChild(btn1);
            var dialogres = document.getElementById("reservation_dialogue");
            dialogres.style.display = "none";
            return true;
        }

        var checkinform = document.getElementById("checkinform");

        var roomnumberc = document.getElementById("roomnumberc");


        checkinform.onsubmit = function () {
            roomnumberc.value = btn2.parentElement.id;

            btn2.parentElement.className = "rouge";
            // btn2.parentElement.removeChild(btn1);
            btn2.parentElement.removeChild(btn2);
            var dialogcheckin = document.getElementById("checkin_dialogue");
            dialogcheckin.style.display = "none";
            return true;
        }


