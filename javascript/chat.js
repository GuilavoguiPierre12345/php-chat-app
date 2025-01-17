const form = document.querySelector('.typing-area'),
inputField = form.querySelector('.input-field'),
sendBtn = form.querySelector('button'),
chatBox = document.querySelector('.chat-box');

form.onsubmit = (e) => {
    e.preventDefault();
    
}

sendBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = () => {
      if (xhr.readyState == XMLHttpRequest.DONE) {
        if (xhr.status == 200) {
          inputField.value = "";
        }
      }
    };
    // create a new formData
    let formData = new FormData(form);
    xhr.send(formData);
}

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/get-chat.php",true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200){
                let data = xhr.response;
                console.log(data);
                chatBox.innerHTML = data;
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
},500)