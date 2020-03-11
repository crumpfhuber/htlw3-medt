let status = false;

function changeIt() {
    let el = document.getElementById("header");
    setInterval(function () {
        status = !status;

        if (status) {
            el.innerText = "luck";
            el.style.backgroundColor = "red";
        } else {
            el.innerText = "Good";
            el.style.backgroundColor = "yellow";
        }

    }, 1000);
}
