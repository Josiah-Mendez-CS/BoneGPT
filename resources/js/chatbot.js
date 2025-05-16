chatbotBubble.addEventListener("click", () => {
            chatbotContainer.style.display = "flex";
            chatbotBubble.style.display = "none";
        });

        // Close chatbot container
        closeButton.addEventListener("click", () => {
            chatbotContainer.style.display = "none";
            chatbotBubble.style.display = "flex";
        });
        
        userInput.addEventListener("keypress", async (e) => {
            if (e.key === "Enter") {
                e.preventDefault();
                console.log("key pressed")
                const userMessage = userInput.value.trim();
                if (userMessage === "") return;

                appendMessage(userMessage, "user");
                userInput.value = ""; // Clear the input
                // http://soc-sdp-27.soc.uconn.edu/api/chatbot
                // Send user input to the backend LLM API
                // original url: http://127.0.0.1:5000/chatbot
                //https://rossa.soc.uconn.edu/api/rag-upload
                try {
                    const response = await fetch("http://localhost:5000/chatbot", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded",
                        },
                        body: new URLSearchParams({ message: userMessage }),
                    });
                    const data = await response.json();
                    appendMessage(data.reply, "bot");
                } catch (error) {
                    console.error("Error:", error);
                    appendMessage("Could not get response.", "bot");
                }
            }
        });