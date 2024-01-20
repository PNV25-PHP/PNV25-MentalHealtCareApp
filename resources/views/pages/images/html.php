<?php include_once dirname(__DIR__) . '/../layouts/HtmlHead.php' ?>
<body>
    <p id="in">hhh</p>
    <!-- <input type="file" id="fileInput" accept="image/*"> -->
    <button onclick="uploadImage()">Upload Image</button>

    <script>
        // Hàm uploadImage sử dụng Axios
        function uploadImage() {
            const fileInput = document.getElementById('fileInput');
            const selectedFile = fileInput.files[0];

            if (selectedFile) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const base64Image = e.target.result;
                    document.getElementById("in").innerHTML = base64Image;
                    sendImageToServer(base64Image);
                };

                reader.readAsDataURL(selectedFile);
            } else {
                console.error('No file selected');
            }
        }

        // Hàm sendImageToServer sử dụng Axios
        function sendImageToServer(base64Image) {

            axios.post('/upload_image', {
                    image: base64Image
                })
                .then(response => {
                    console.log('Image uploaded successfully');
                })
                .catch(error => {
                    console.error('Error uploading image', error);
                });
        }
    </script>
</body>

</html>