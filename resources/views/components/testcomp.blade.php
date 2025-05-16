<style>
    <?php include '/home/ajacob/BoneGPT/resources/css/chatbot.css'; ?>
</style>
<div>
    <span class="message">Hello</span>
</div>
<div id="chatbot-bubble" class="chatbot-bubble">
    <button class="open-chat" id="chatbot-bubble">Open</button>
</div>
<div id="chatbot-container" class="chatbot-container">
        <div class="chatbot-header">
            <span>Chatbot</span>
            <button id="close-chatbot">×</button>
        </div>
        <!-- Tabs for Chat and RAG -->
        <ul class="nav nav-tabs" id="chatbot-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="chat-tab" data-bs-toggle="tab" href="#chat" role="tab">Chat-R</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="rag-tab" data-bs-toggle="tab" href="#rag" role="tab">RAG</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="new-chat-tab" data-bs-toggle="tab" href="#new-chat" role="tab">Chat-S</a>
            </li>
        </ul>
        <div class="tab-content" id="chatbot-tabs-content">
            <!-- Chat Tab -->
            <div class="tab-pane fade show active" id="chat" role="tabpanel">
                <div id="chatbot-messages" class="chatbot-messages"></div>
                <div class="chatbot-input-container">
                    <input id="user-input" class="chatbot-input" type="text" placeholder="Type a message..." autocomplete="off">
                </div>
                <!-- View Graphical Data Button -->
                <div id="navigate-graph" class="text-center mt-3 hidden">
                    <a href="/chart" class="btn btn-primary btn-lg">View Graphical Data</a>
                </div>
            </div>
            <!-- RAG Tab -->
            <div class="tab-pane fade" id="rag" role="tabpanel">
                <div class="text-center p-3">
                    <h5>Upload Your Files</h5>
                    <form id="upload-form" enctype="multipart/form-data">
                        <input type="file" name="rag-file" id="rag-file" class="form-control mb-2" accept="application/*">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="new-chat" role="tabpanel">
                <div id="new-chat-messages" class="chatbot-messages"></div>
                    <div class="chatbot-input-container">
                        <input id="new-chat-input" class="chatbot-input" type="text" placeholder="Type a message..." autocomplete="off">
                    </div>
            </div>
        </div>
    </div>

<script src="/home/ajacob/BoneGPT/resources/js/chatbot.js"></script>

<script>
    const chatbotBubble = document.getElementById("chatbot-bubble");
    const chatbotContainer = document.getElementById("chatbot-container");
    const closeButton = document.getElementById("close-chatbot");
    const chatMessages = document.getElementById("chatbot-messages");
    const userInput = document.getElementById("user-input");
    const navigateGraph = document.getElementById("navigate-graph");

    // Open chatbot container
    chatbotBubble.addEventListener("click", () => {
        chatbotContainer.style.display = "flex";
        chatbotBubble.style.display = "none";
    });

    // Close chatbot container
    closeButton.addEventListener("click", () => {
        chatbotContainer.style.display = "none";
        chatbotBubble.style.display = "flex";
    });

    // Handle user input
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

    function appendMessage(message, sender) {
        const div = document.createElement("div");
        div.classList.add("chat-bubble", sender);
        div.innerText = message;
        chatMessages.appendChild(div);
        setTimeout(() => {
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }, 100);
    }

    document.getElementById("toggle-info").addEventListener("click", function () {
        let infoBox = document.getElementById("study-info-box");
        if (infoBox.style.display === "none" || infoBox.style.display === "") {
            infoBox.style.display = "block"; // Show box
            document.getElementById("study-info-content").innerText = "This study focuses on ... (you can dynamically load data here)";
        } else {
            infoBox.style.display = "none"; // Hide box
        }
    });

    // Handle file upload for RAG
    document.getElementById("upload-form").addEventListener("submit", async (e) => {
        e.preventDefault();
        
        const formData = new FormData(); // hey this is JiWon 
        const ragFile = document.getElementById("rag-file").files[0];

        if (ragFile) {
            formData.append("file", ragFile);
            // this is JiWon 
            try {
                // "http://127.0.0.1:5000/data-chatbot"
                //
                //127.0.0.1:5000
                //http://soc-sdp-27.soc.uconn.edu/api/rag-upload
                const response = await fetch("http://localhost:5000/api/rag-upload", {
                    method: "POST",
                    body: formData,
                });

                const data = await response.json();
                alert(data.message); // Notify user of upload status
            } catch (error) {
                console.error("Error uploading file:", error);
                alert("Error uploading file.");
            }
        } else {
            alert("Please select a file before uploading.");
        }
    });
</script>
</div>