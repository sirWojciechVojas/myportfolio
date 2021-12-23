(self["webpackChunk"] = self["webpackChunk"] || []).push([["delete-modal"],{

/***/ "./assets/delete-modal.js":
/*!********************************!*\
  !*** ./assets/delete-modal.js ***!
  \********************************/
/***/ (() => {

var modals = document.getElementsByClassName("delete-modal");

for (var i = 0; i < modals.length; i++) {
  modals[i].addEventListener("click", function () {
    var title = this.getAttribute("data-title");
    var name = this.getAttribute("data-name");
    var link = this.getAttribute("data-link");
    document.getElementById("deleteModalLabel").textContent = title;
    document.getElementById("data-name").textContent = name;
    document.getElementById("data-link").setAttribute("href", link);
  });
}

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ var __webpack_exports__ = (__webpack_exec__("./assets/delete-modal.js"));
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiZGVsZXRlLW1vZGFsLmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7O0FBQUEsSUFBSUEsTUFBTSxHQUFHQyxRQUFRLENBQUNDLHNCQUFULENBQWdDLGNBQWhDLENBQWI7O0FBRUEsS0FBSSxJQUFJQyxDQUFDLEdBQUMsQ0FBVixFQUFhQSxDQUFDLEdBQUdILE1BQU0sQ0FBQ0ksTUFBeEIsRUFBZ0NELENBQUMsRUFBakMsRUFBcUM7QUFDakNILEVBQUFBLE1BQU0sQ0FBQ0csQ0FBRCxDQUFOLENBQVVFLGdCQUFWLENBQTJCLE9BQTNCLEVBQW9DLFlBQVc7QUFDM0MsUUFBSUMsS0FBSyxHQUFHLEtBQUtDLFlBQUwsQ0FBa0IsWUFBbEIsQ0FBWjtBQUNBLFFBQUlDLElBQUksR0FBRyxLQUFLRCxZQUFMLENBQWtCLFdBQWxCLENBQVg7QUFDQSxRQUFJRSxJQUFJLEdBQUcsS0FBS0YsWUFBTCxDQUFrQixXQUFsQixDQUFYO0FBRUFOLElBQUFBLFFBQVEsQ0FBQ1MsY0FBVCxDQUF3QixrQkFBeEIsRUFBNENDLFdBQTVDLEdBQTBETCxLQUExRDtBQUNBTCxJQUFBQSxRQUFRLENBQUNTLGNBQVQsQ0FBd0IsV0FBeEIsRUFBcUNDLFdBQXJDLEdBQW1ESCxJQUFuRDtBQUNBUCxJQUFBQSxRQUFRLENBQUNTLGNBQVQsQ0FBd0IsV0FBeEIsRUFBcUNFLFlBQXJDLENBQWtELE1BQWxELEVBQTBESCxJQUExRDtBQUNILEdBUkQ7QUFTSCIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL2Fzc2V0cy9kZWxldGUtbW9kYWwuanMiXSwic291cmNlc0NvbnRlbnQiOlsibGV0IG1vZGFscyA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoXCJkZWxldGUtbW9kYWxcIik7XG5cbmZvcihsZXQgaT0wOyBpIDwgbW9kYWxzLmxlbmd0aDsgaSsrKSB7XG4gICAgbW9kYWxzW2ldLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCBmdW5jdGlvbigpIHtcbiAgICAgICAgbGV0IHRpdGxlID0gdGhpcy5nZXRBdHRyaWJ1dGUoXCJkYXRhLXRpdGxlXCIpO1xuICAgICAgICBsZXQgbmFtZSA9IHRoaXMuZ2V0QXR0cmlidXRlKFwiZGF0YS1uYW1lXCIpO1xuICAgICAgICBsZXQgbGluayA9IHRoaXMuZ2V0QXR0cmlidXRlKFwiZGF0YS1saW5rXCIpO1xuICAgIFxuICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcImRlbGV0ZU1vZGFsTGFiZWxcIikudGV4dENvbnRlbnQgPSB0aXRsZTtcbiAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJkYXRhLW5hbWVcIikudGV4dENvbnRlbnQgPSBuYW1lO1xuICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcImRhdGEtbGlua1wiKS5zZXRBdHRyaWJ1dGUoXCJocmVmXCIsIGxpbmspO1xuICAgIH0pO1xufVxuIl0sIm5hbWVzIjpbIm1vZGFscyIsImRvY3VtZW50IiwiZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSIsImkiLCJsZW5ndGgiLCJhZGRFdmVudExpc3RlbmVyIiwidGl0bGUiLCJnZXRBdHRyaWJ1dGUiLCJuYW1lIiwibGluayIsImdldEVsZW1lbnRCeUlkIiwidGV4dENvbnRlbnQiLCJzZXRBdHRyaWJ1dGUiXSwic291cmNlUm9vdCI6IiJ9