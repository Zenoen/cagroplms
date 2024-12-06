const form = document.getElementById("messageForm");

form.addEventListener("submit", sendMessage);

function sendMessage(event) {
    event.preventDefault();

    const apikey = document.querySelector("#apikey").value; // Get the API key
    const number = document.querySelector("#number").value;
    const message = document.querySelector("#message").value;

    const parameters = {
        apikey: apikey, // Include the API key here
        number: number,
        message: message,
    };

    fetch("https://api.semaphore.co/api/v4/messages", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: new URLSearchParams(parameters),
    })
        .then((response) => response.text())
        .then((output) => {
            console.log(output);
        })
        .catch((error) => {
            console.error(error);
        });
    
    form.reset(); // Reset the form after submission
}
