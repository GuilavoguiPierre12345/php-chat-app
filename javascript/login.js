const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector('.error-txt');


form.onsubmit = (e) => {
    e.preventDefault();
}

continueBtn.onclick = (e) => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/login.php",true);
    xhr.onload = () => {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200)  {
                let data = xhr.response;
                if (data === 'success') {

                } else {
                    errorText.textContent = data;
                    errorText.style.display = 'block';
                }
            }
        }
    }
    // create a new formData
    let formData = new FormData(form);
    xhr.send(formData);
}
