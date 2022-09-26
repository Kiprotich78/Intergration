const input = document.querySelector('input');
const btn = document.querySelector('button');
const wait = document.querySelector('.waiting');

registerUrl();

setTimeout(function(){
    confirmationUrl();
    validationUrl();
}, 5000);


input.addEventListener('keyup', () => {
    wait.classList.remove('active');
    if (input.value) {
        btn.style.opacity = 1;
    }
    else {
        btn.style.opacity = 0;
    }

});
btn.addEventListener('click', () => {
    wait.classList.add('active');
});

function registerUrl() {
    xhrRequest('/intergration/registerUrl.php');
}

function validationUrl() {
    xhrRequest('/intergration/validationUrl.php');
}

function confirmationUrl() {
    xhrRequest('/intergration/confirmationUrl.php');
}

function xhrRequest(path) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', path, true)
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const response = this.responseText;
            console.log(response);
        }
    }
    xhr.send();
}

