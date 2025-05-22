document.getElementById("generate-study-btn").addEventListener("click", async () => {
    try {
        //http://soc-sdp-27.soc.uconn.edu/api
        // 127.0.0.1:5000
        //https://rossa.soc.uconn.edu/api/simultaneous_generate_text
        console.log("clicked");
        const response = await fetch("http://localhost:5000/api/simultaneous_generate_text")
        const data = await response.json();
        alert("Study information generated!")

        document.getElementById("title").value = data.study_information.studyTitle || "No Title Generated, Ensure you upload RAG document first";
        document.getElementById("summary").value = data.study_information.studySummary || "No Summary Generated, Ensure you upload RAG document first";
        document.getElementById("funding_sources").value = data.study_information.funding || "No Funding Generated, Ensure you upload RAG document first";
        document.getElementById("conflicts").value = data.study_information.conflicts || "No Funding Generated, Ensure you upload RAG document first";
        document.getElementById("completion_date").value = data.study_information.Date;
        if (data.published == 1) {
            document.getElementById("published_yes").checked = true;
        } 
        else {
            document.getElementById("published_no").checked = true;
        }
                
    } catch (error) {
        console.error("Failed to generate study information", error);
        alert("Failed to generate study information.");
    }
});

document.addEventListener("DOMContentLoaded", () => {
// Function to populate fields from output_answer.json
async function populateFields() {
    try {
        const response = await fetch("/home/ajacob/BoneGPT/output_answer.json");
        const data = await response.json();

        // Populate fields
        document.getElementById("title").value = data.study_information.studyTitle || "No Title Available";
        document.getElementById("summary").value = data.study_information.studySummary || "No Summary Available";
        document.getElementById("funding_sources").value = data.study_information.funding || "No Funding Information";
        document.getElementById("conflicts").value = data.study_information.conflicts || "No Conflict Information";
        document.getElementById("completion_date").value = data.study_information.Date || "No Completion Date";

        // Handle published status
        if (data.published == 1) {
            document.getElementById("published_yes").checked = true;
        } else {
            document.getElementById("published_no").checked = true;
        }
    } catch (error) {
        console.error("Failed to load study information from output_answer.json", error);
    }
}
document.getElementById("study-information-tab").addEventListener("click", () => {
    populateFields();
    });
});