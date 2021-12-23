let modals = document.getElementsByClassName("delete-modal");

for(let i=0; i < modals.length; i++) {
    modals[i].addEventListener("click", function() {
        let title = this.getAttribute("data-title");
        let name = this.getAttribute("data-name");
        let link = this.getAttribute("data-link");
    
        document.getElementById("deleteModalLabel").textContent = title;
        document.getElementById("data-name").textContent = name;
        document.getElementById("data-link").setAttribute("href", link);
    });
}
