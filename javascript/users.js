const searchBar = document.querySelector(".users .search input");
const searchBtn = document.querySelector(".users .search button");
const userList = document.querySelector(".users-list");
const icon = document.querySelector("i");

searchBtn.onclick = (e) => {
    if (searchBar.classList.contains("active")) {
        searchBar.classList.remove("active")
        searchBtn.classList.remove("active")
        icon.classList.replace("bi-x-square","bi-search");
    }else {
        searchBar.classList.add("active")
        searchBtn.classList.add("active")
        icon.classList.replace("bi-search", "bi-x-square");
    }
}

searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;
    if (searchTerm !== "") {
        searchBar.classList.add("active");
    }else {
        searchBar.classList.remove("active");
    }

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search.php", true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          userList.innerHTML = data;
        }
      }
    };
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send("searchTerm="+searchTerm);
}


setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET","php/user.php",true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200){
                let data = xhr.response;
                if (!searchBar.classList.contains('active')) {
                    userList.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
},500)