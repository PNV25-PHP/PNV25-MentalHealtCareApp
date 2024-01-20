<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
</head>
<body>
    <input type="file" id="fileInput" accept="image/*">
    <button onclick="uploadImage()">Upload Image</button>

    <script>
        function uploadImage() {
            const fileInput = document.getElementById('fileInput');
            const selectedFile = fileInput.files[0];

            if (selectedFile) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    const base64Image = e.target.result;
                    sendImageToServer(base64Image);
                };

                reader.readAsDataURL(selectedFile);
            } else {
                console.error('No file selected');
            }
        }

        function sendImageToServer(base64Image) {
            const xhr = new XMLHttpRequest();
            const url = '/upload';  // Đổi thành URL xử lý upload trên máy chủ của bạn

            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log('Image uploaded successfully');
                } else {
                    console.error('Error uploading image');
                }
            };

            const data = JSON.stringify({ image: base64Image });
            xhr.send(data);
        }
    </script>
</body>
</html>
