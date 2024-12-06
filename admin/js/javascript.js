function handleScroll() {
  var navbar = document.getElementById("main");

  var sidebar = document.getElementById("mySidebar");

  if (window.scrollY > 0) {
    navbar.classList.add("border-top");
  } else {
    navbar.classList.remove("border-top");
  }
}

window.addEventListener("scroll", handleScroll);

function openNav(transition) {
  localStorage.setItem("isClosed", false);
  var opnbtn = document.getElementById("opnbtn");

  var sidebar = document.getElementById("mySidebar");
  var main = document.getElementById("main");
  var sidebarlogo = document.getElementById("sidebarlogo");
  // var nav = document.getElementById("nav");
  const sidebarItemText = document.querySelectorAll(".sidebar-item-text");
  sidebarItemText.forEach((el) => el.classList.add("show"));
  // if (!transition) {
  //   sidebar.style.transition = "none";
  //   main.style.transition = "none";
  // }
  if (window.innerWidth >= 1090) {
    opnbtn.style.display = "none";

    sidebar.style.width = "250px";
    sidebar.style.marginLeft = "0px";
    main.style.marginLeft = "250px";
    sidebar.classList.remove("shadow-lg");
    sidebar.classList.remove("border-end");

    sidebar.style.zIndex = "1";
    // setTimeout(function () {
    //   sidebar.style.transition = "width 0.2s ease";
    //   main.style.transition = "margin-left 0.1s ease";
    //   // alert("test");
    // }, 500);
  } else if (window.innerWidth >= 867) {
    sidebar.style.width = "200px";
    sidebar.style.marginLeft = "0px";
    opnbtn.style.display = "none";

    main.style.marginLeft = "200px";
    sidebar.classList.remove("border-end");
    sidebar.classList.remove("shadow-lg");

    sidebar.style.zIndex = "1";
    // setTimeout(function () {
    //   sidebar.style.transition = "width 0.2s ease";
    //   main.style.transition = "margin-left 0.1s ease";
    //   // alert("test");
    // }, 500);
  } else {
    sidebar.style.marginLeft = "0px";
    sidebar.style.width = "250px";
    opnbtn.style.display = "block";

    sidebar.style.marginTop = "50px";
    main.style.marginLeft = "0";

    sidebar.classList.add("shadow-lg");
    sidebar.classList.add("border-end");

    sidebar.style.zIndex = "4000";
    // setTimeout(function () {
    //   sidebar.style.transition = "margin-left 0.2s ease";
    //   main.style.transition = "margin-left 0.1s ease";
    //   // alert("test");
    // }, 500);
  }
}
largeScreen = false;

function closeNav(transition) {
  localStorage.setItem("isClosed", true);
  var opnbtn = document.getElementById("opnbtn");

  var sidebar = document.getElementById("mySidebar");
  var main = document.getElementById("main");
  const sidebarItemText = document.querySelectorAll(".sidebar-item-text");
  sidebarItemText.forEach((el) => el.classList.remove("show"));
  opnbtn.style.display = "block";
  // if (!transition) {
  //   sidebar.style.transition = "none";
  //   main.style.transition = "none";
  // }
  if (window.innerWidth >= 867) {
    sidebar.style.width = "60px";
    main.style.marginLeft = "60px";
  } else {
    sidebar.style.marginLeft = "-250px";
    main.style.marginLeft = "0px";

    // sidebar.style.transition = "margin-left 0.2s ease";
    // main.style.transition = "margin-left 0.1s ease";
  }
}

function toggleNav() {
  var sidebar = document.getElementById("mySidebar");
  if (window.innerWidth >= 867) {
    if (sidebar.style.width === "60px") {
      if (window.innerWidth >= 867) {
        largeScreen = false;
      }
      openNav(true);
    } else {
      closeNav(true);
      if (window.innerWidth >= 867) {
        largeScreen = true;
      }
    }
  } else {
    if (sidebar.style.marginLeft === "-250px") {
      if (window.innerWidth >= 867) {
        largeScreen = false;
      }
      openNav(true);
    } else {
      closeNav(true);
      if (window.innerWidth >= 867) {
        largeScreen = true;
      }
    }
  }
}

window.addEventListener("resize", function () {
  var closebtn = document.getElementById("closebtn");
  if (window.innerWidth >= 867) {
    
    if (!largeScreen) {
    closebtn.style.display = "none";

      openNav(true);
    }
  } else if (window.innerWidth >= 1090) {
    if (!largeScreen) {
    closebtn.style.display = "none";

      openNav(true);
    }
  } else {
    closebtn.style.display = "block";

    closeNav(true);
  }
});

document.addEventListener("DOMContentLoaded", function () {
  console.log(window.innerWidth);
  console.log(window.devicePixelRatio);

  var closebtn = document.getElementById("closebtn");
 
  if (window.innerWidth >= 867 || window.innerWidth >= 1090) {

    closebtn.style.display = "none";

    if (localStorage.getItem("isClosed") === "true") {
      closeNav(true);
    } else {
      openNav(false);
    }
  } else {
    closeNav(true);
    closebtn.style.display = "block";

  }
});


document.addEventListener('DOMContentLoaded', function() {
  // Hide the select2 elements before showing the dialog
  // Set up a MutationObserver to monitor changes to the DOM
  const observer = new MutationObserver(function(mutationsList) {
      // Iterate through mutations
      for (let mutation of mutationsList) {
          // Check if new nodes have been added to the DOM
          if (mutation.type === 'childList') {
              // Hide select2 containers once they are added to the DOM
              document.querySelectorAll('.select2-container').forEach((container) => {
                  container.style.display = 'none'; // Hide the select2 container elements
              });
          }
      }
  });

  // Configure the MutationObserver to watch for added child nodes
  observer.observe(document.body, {
      childList: true,
      subtree: true
  });


});

function generateFV(genPath,genId) {

  const idd = document.getElementById("edit-id2").value;

  if (idd.trim() !== "") {
      // Prepare the data to be sent in the POST request as a URL-encoded string
      const data = `${genId}=${encodeURIComponent(idd)}`;
    // alert(data);
      fetch(genPath, {
              method: "POST",
              headers: {
                  'Content-Type': 'application/x-www-form-urlencoded', // Set the content type to URL-encoded
              },
              body: data // Send the encoded data
          })
          .then(response => {
              const contentType = response.headers.get("Content-Type");
              if (contentType && contentType.includes("application/pdf")) {
                  return response.blob();
              }
              return response.json();
          })
          .then(data => {
              if (data instanceof Blob) {
                  const url = URL.createObjectURL(data);
                  window.open(url, "_blank");
              } else {
                  console.log("Success:", data);
                  alert("Form submitted successfully.");
              }
          });
          // .catch(error => {
          //     console.error("Error:", error);
          //     alert("An error occurred while submitting.");
          // });
  } else {
      alert("Please enter a valid Fisherfolk ID.");
  }
};
function generate(genPath,genId) {

  const idd = document.getElementById("edit-id2").value;

  if (idd.trim() !== "") {
      // Prepare the data to be sent in the POST request as a URL-encoded string
      const data = `${genId}=${encodeURIComponent(idd)}`;

      fetch(genPath, {
              method: "POST",
              headers: {
                  'Content-Type': 'application/x-www-form-urlencoded', // Set the content type to URL-encoded
              },
              body: data // Send the encoded data
          })
          .then(response => {
              const contentType = response.headers.get("Content-Type");
              if (contentType && contentType.includes("application/pdf")) {
                  return response.blob();
              }
              return response.json();
          })
          .then(data => {
              if (data instanceof Blob) {
                  const url = URL.createObjectURL(data);
                  window.open(url, "_blank");
              } else {
                  console.log("Success:", data);
                  alert("Form submitted successfully.");
              }
          });
          // .catch(error => {
          //     console.error("Error:", error);
          //     alert("An error occurred while submitting.");
          // });
  } else {
      alert("Please enter a valid Fisherfolk ID.");
  }
};
