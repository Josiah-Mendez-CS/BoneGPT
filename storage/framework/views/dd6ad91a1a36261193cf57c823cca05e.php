<?php $__env->startSection('title', 'Study Information'); ?>

<?php $__env->startSection('content'); ?>
<head>
    <style>
        <?php include '/home/ajacob/BoneGPT/resources/css/chatbot.css'; ?>
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mb-4">Study Information</h1>
        <!-- Action is just a placeholder since we won't store the data -->
        <form method="GET" action="<?php echo e(route('study.study-information', ['study' => 1])); ?>" >
            <?php echo csrf_field(); ?>
            
            <div class="mb-3">
                <label for="title" class="form-label">Study Title</label>
                <input type="text" class="form-control" 
                    id="title" name="title" value="" >
            </div>

            <div class="mb-3">
                <label for="summary" class="form-label">Study Summary</label>
                <div class="d-flex">
                    <textarea class="form-control" 
                            id="summary" name="summary" rows="4" ></textarea>
                    <button type="button" class="btn btn-info ms-2" id="toggle-info">View abstract</button>
                </div>
            </div>
            
            <div id="study-info-box" class="p-3 border rounded bg-light mt-2" style="display: none;">
                <h5>Abstract</h5>
                <p id="study-info-content">No information available.</p>
            </div>


            <div class="mb-3">
                <label for="funding_sources" class="form-label">Funding Sources</label>
                <textarea class="form-control" id="funding_sources" name="funding_sources" rows="2" ></textarea>
            </div>

            <div class="mb-3">
                <label for="conflicts" class="form-label">Conflicts of Interest</label>
                <textarea class="form-control" id="conflicts" name="conflicts" rows="2" ></textarea>
            </div>

            <div class="mb-3">
                <label for="completion_date" class="form-label">Study Completion Date</label>
                <input class="form-control" 
                    id="completion_date" name="completion_date" 
                    value="" >
            </div>

            <h2 class="h4 mt-5 mb-4">Publication Information</h2>

            <div x-data="{ 
                isPublished: {'false')},
                publicationPlan: '<?php echo e(old('is_published') == '1' ? '' : (old('publication_plan', $study->publication_plan ?? ''))); ?>',
                showSpecialIssueInfo() { return this.publicationPlan === 'special_issue' },
                showEmbargoField() { return this.publicationPlan === 'different_journal' }
            }">
                <div class="mb-3">
                    <label class="form-label">Has this study been published?</label>
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" 
                                name="is_published" id="published_yes" value="1"
                                x-model="isPublished" >
                            <label class="form-check-label" for="published_yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" 
                                name="is_published" id="published_no" value="0"
                                x-model="isPublished" >
                            <label class="form-check-label" for="published_no">No</label>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="mt-4 d-flex">
                <button type="button" class="btn btn-primary" >Save</button> <!-- Disabled Save Button -->
                
            </div>
        </form>
    </div>
    <?php include_once "/home/ajacob/BoneGPT/resources/views/components/testcomp.blade.php";?>
    <div style="position: fixed; bottom: 20px; right: 370px; z-index: 10000;">
        <button id="generate-study-btn" class="btn btn-success" style="display: block; visibility: visible;">Click here to generate study information</button>
    </div>
    <script>
        document.getElementById("generate-study-btn").addEventListener("click", async () => {
            try {
                //http://soc-sdp-27.soc.uconn.edu/api
                // 127.0.0.1:5000
                //https://rossa.soc.uconn.edu/api/simultaneous_generate_text
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

        // Event listener for tab switching
        document.getElementById("study-information-tab").addEventListener("click", () => {
            populateFields();
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ajacob/BoneGPT/resources/views/study/study-information.blade.php ENDPATH**/ ?>