"use strict";
// ADD ANNONCE VARS
let addAnnonceModal = document.querySelector("#add_annonce_modal");
let addAnnonceBtn = document.querySelector("#add_annonce_btn");
let closeAddModal = document.querySelector(".close-add-modal");
// DELETE ANNONCE VARS
let deleteAnnonceIcons = document.querySelectorAll(".delete-annonce-icon");
let deleteAnnonceModal = document.querySelector("#delete-confirmation");
let closeDeleteConfirmation = document.querySelector(".close-delete-modal");
let deleteBtnConfirmation = document.querySelector("#delete-confirmation-btn");
// MODAL VARS
let moreInfoBtns = document.querySelectorAll(".more-info");
let btnCloseModal = document.querySelector(".close-modal");
let moreInfoModal = document.querySelector("#more_info_modal");
let overlay = document.querySelector(".overlay");

const openModal = function (modal, overlay, display) {
  modal.style.display = display;
  overlay.classList.remove("hidden");
  window.scrollTo(0, 0);
};
const closeModal = function (modal, overlay, display) {
  modal.style.display = display;
  overlay.classList.add("hidden");
};
// OPEN DELETE CONFIRMATION MODAL WHEN CLICKING ON DELETE ICONS
deleteAnnonceIcons.forEach((deleteAnnonceIcon) => {
  deleteAnnonceIcon.addEventListener("click", () => {
    openModal(deleteAnnonceModal, overlay, "block");
  });
});
// OPEN MORE INFOS MODAL WHEN CLICKING ON MORE INFO BUTTONS
moreInfoBtns.forEach((moreInfoBtn) => {
  moreInfoBtn.addEventListener("click", () => {
    openModal(moreInfoModal, overlay, "flex");
  });
});
// CLOSE DELETE CONFIRMATION MODAL
closeDeleteConfirmation.addEventListener("click", () => {
  closeModal(deleteAnnonceModal, overlay, "none");
});
overlay.addEventListener("click", () => {
  closeModal(deleteAnnonceModal, overlay, "none");
});
deleteBtnConfirmation.addEventListener("click", (e) => {
  closeModal(deleteAnnonceModal, overlay, "none");
  window.open("index.php");
});
// GET ANNONCE MORE INFOS
const getmoreInfo = (id) => {
  const xhttp = new XMLHttpRequest();
  xhttp.open("GET", `getAnnonce.php?id=${id}`, true);
  xhttp.send();
  xhttp.onload = function () {
    if (this.readyState == 4 && this.status == 200) {
      let annonceInfo = this.responseText;
      moreInfoModal.innerHTML = annonceInfo;
      let btnCloseModal = document.querySelector(".close-modal");
      btnCloseModal.addEventListener("click", () => {
        closeModal(moreInfoModal, overlay, "none");
      });
      overlay.addEventListener("click", () => {
        closeModal(moreInfoModal, overlay, "none");
      });
    }
  };
};
let annonceIdToDelete;
const idOfDeletion = (id) => {
  annonceIdToDelete = id;
  let xhttp = new XMLHttpRequest();
  xhttp.open("GET", `index.php?id-to-delete=${id}`, true);
  xhttp.send();
  //Send the proper header information along with the request
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(id);
    }
  };
};
const deleteAnnonce = (id) => {
  let xhttp = new XMLHttpRequest();
  xhttp.open("GET", `deleteAnnonce.php?annonce-to-delete=${id}`, true);
  xhttp.send();
  //Send the proper header information along with the request
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.response);
    }
  };
};
deleteBtnConfirmation.addEventListener("click", (e) => {
  deleteAnnonce(annonceIdToDelete);
});
const editAnnonce = (id) => {
  var xhttp = new XMLHttpRequest();
  xhttp.open("GET", `editAnnonce.php?id-to-edit=${id}`, true);
  xhttp.send();
  //Send the proper header information along with the request
  xhttp.onreadystatechange = function () {
    //Call a function when the state changes.
    if (this.readyState == 4 && this.status == 200) {
      let editModal = this.responseText;
      document.querySelector(".edit-annonce-modal").innerHTML = editModal;
      let editAnnonceModal = document.querySelector(".edit-annonce-modal");
      let closeEditModal = document.querySelector(".close-edit-modal");
      document
        .querySelectorAll(".edit-annonce-icon")
        .forEach((editAnnonceIcon) => {
          editAnnonceIcon.addEventListener("click", (e) => {
            openModal(editAnnonceModal, overlay, "flex");
          });
        });

      closeEditModal.addEventListener("click", (e) => {
        closeModal(editAnnonceModal, overlay, "none");
      });
      overlay.addEventListener("click", () => {
        closeModal(editAnnonceModal, overlay, "none");
      });
    }
  };
};
if (document.querySelector(".edit-annonce-modal")) {
}
// OPEN ADD ANNONCE MODAL WHEN CLICKING ADD
addAnnonceBtn.addEventListener("click", (e) => {
  openModal(addAnnonceModal, overlay, "block");
});
closeAddModal.addEventListener("click", () => {
  closeModal(addAnnonceModal, overlay, "none");
});
overlay.addEventListener("click", () => {
  closeModal(addAnnonceModal, overlay, "none");
});

const filterAnnonces = (min, max, type) => {
  const xhttp = new XMLHttpRequest();
  xhttp.open(
    "GET",
    `filterAnnonces.php?type=${type}&min=${min}&max=${max}`,
    true
  );
  xhttp.send();
  xhttp.onload = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.response);
      let filteredCards = this.response;
      document.querySelector(".cards").innerHTML = "";
      document.querySelector(".cards").innerHTML = filteredCards;
    }
  };
};
filter_btn.addEventListener("click", (e) => {
  let minPrice = document.querySelector("#minPrice").value;
  let maxPrice = document.querySelector("#maxPrice").value;
  let annoncestype = document.querySelector("#annonces-type").value;
  console.log(minPrice);
  console.log(maxPrice);
  console.log(annoncestype);
  filterAnnonces(minPrice, maxPrice, annoncestype);
});
