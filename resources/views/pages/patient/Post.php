<?php include_once dirname(__DIR__) . '/../layouts/HtmlHead.php'; ?>
<?php include_once dirname(__DIR__) . '/../layouts/HtmlNavbar.php'; ?>
<style>
  .scroll-container {
    max-height: 300px;
    /* Chiều cao tối đa của khu vực hiển thị */
    overflow-y: auto;
    /* Cho phép thanh trượt theo chiều dọc nếu nội dung vượt khỏi kích thước */
  }

  .content {
    height: auto;
    /* Chiều cao tự động theo nội dung */
  }

  .item {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    /* Đường viền giữa các mục */
  }
</style>

<style>
  /* Style for the form container */
  .comment-form {
    position: fixed;
    width: 50%;
  }

  /* Style for the comment input container */
  .comment-container {
    padding: 0 1rem;
    margin-bottom: 1rem;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 0.25rem;
  }

  /* Style for the comment input */
  #comment {
    width: 100%;
    font-size: 0.875rem;
    /* 14px */
    color: #333;
    border: none;
    outline: none;
    background-color: #fff;
  }

  /* Style for the buttons container */
  .button-container {
    display: flex;
    justify-content: space-between;
  }

  /* Style for the Post Comment button */
  #post-comment {
    display: flex;
    align-items: center;
    padding: 0.625rem 1rem;
    /* 10px 16px */
    font-size: 0.75rem;
    /* 12px */
    font-weight: 500;
    text-align: center;
    text-decoration: none;
    color: #000;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 0.25rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  #post-comment:hover {
    background-color: #1e4faa;
    color: #fff;
  }

  /* Style for the Cancel button */
  #cancel {
    display: inline-flex;
    align-items: center;
    padding: 0.625rem 1rem;
    /* 10px 16px */
    font-size: 0.75rem;
    /* 12px */
    font-weight: 500;
    text-align: center;
    text-decoration: none;
    color: #000;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 0.25rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  #cancel:hover {
    background-color: #1e4faa;
    color: #fff;
  }

  #form_to_show_comment {
    position: relative;
    top: 25%;
    left: 25%;
  }

  #block_post {
    margin-top: 10px;
  }
</style>
<script>
  const posts = <?= json_encode($posts) ?>;
  const comments = <?= json_encode($comments) ?>;
  var user_currently = JSON.parse(localStorage.getItem("user-info"));
  var user_currentlyId = user_currently.roleId;
</script>
<div id="show_here" class="Grid bg-slate-700"></div>
<script>
  var Show_posts = "";
  posts.map((post) => {
    var Show_post =
      `<div class="flex items-center justify-center w-screen h-100%">
        <div class="px-5 py-4 bg-white dark:bg-gray-800 shadow rounded-lg max-w-lg w-3/4" id="block_post">
            <div class="flex mb-4">
            <img class="w-12 h-12 rounded-full" src="${"http://localhost:8000/upload/user/" + post.UserImageUrl}"/>
            <div class="ml-2 mt-0.5">
              <span class="block font-medium text-base leading-snug text-black dark:text-gray-100">${post.UserFullName}</span>
              <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">${post.PostCreatedAt}</span>
            </div>
          </div>
          <p class="text-gray-800 dark:text-gray-100 leading-snug md:leading-normal">${post.PostContent}</p>
          <div class="mt-5">
            <img src="${"http://localhost:8000/upload/user/" + post.PostImage}" alt="" class="w-full h-41 object-cover object-center">
          </div>
          <div class="flex items-center mt-4 space-x-4">
        <button class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium" onclick="enterContent(${post.PostId})">
            <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
            </svg>
            add a comment
        </button>
    </div>
        </div>
        </div>
        <section class="lg:py-16 antialiased bg-slate-700">
          <div class="max-w-2xl mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion (${post.CommentCount})</h2>
            </div>
            <div class="scroll-container">
              <div class="content">`
    comments.map((comment) => {
      if (comment.PostId == post.PostId) {
        Show_post += `<article class="p-4 m-2 text-base bg-white rounded-lg dark:bg-gray-900">
    <footer class="flex justify-between items-center mb-2">
        <div class="flex items-center">
            <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img class="mr-2 w-6 h-6 rounded-full" src="${"http://localhost:8000/upload/user/" + comment.UserImageUrl}" alt="${comment.UserFullName}">${comment.UserFullName}</p>
            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="${comment.CreatedAt}" title="${comment.CreatedAt}"></time>${comment.CreatedAt}</p>
        </div>
        <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
            </svg>
            <span class="sr-only">Comment settings</span>
        </button>
        <!-- Dropdown menu -->
        <div id="dropdownComment1" class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                <li>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                </li>
            </ul>
        </div>
    </footer>
    <p class="text-gray-500 dark:text-gray-400">${comment.CommentContent}</p>
</article>`
      }
    })
    Show_posts += Show_post + `</div> </div> </section> <p style="padding: 8px; color: #334155;"></p>`;
  })
  document.getElementById('show_here').innerHTML = Show_posts;
</script>
<!-- button create post -->
<div class="fixed bottom-0 right-0 mb-9 mr-9" onclick="CreatePost()">
  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    Create Post
  </button>
</div>

<!-- component form post -->
<div class="fixed z-0 flex top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-3/6" id="form-post">
  <div class="heading text-center font-bold text-2xl m-5 text-gray-800">New Post</div>
  <div class="mx-auto w-500 flex flex-col border border-gray-300 p-4 shadow-lg max-w-2xl bg-white">
    <input class="title border border-gray-300 p-2 mb-4 outline-none" type="file" id="image_of_post">
    <textarea class="description sec p-3 h-80 border border-gray-300 outline-none" spellcheck="false" placeholder="Describe everything about this post here" id="text_content"></textarea>
    <!-- icons -->
    <div class="icons flex text-gray-500 m-2">
      <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
      </svg>
      <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
      </svg>
      <div class="count ml-auto text-gray-400 text-xs font-semibold">0/300</div>
    </div>
    <!-- buttons -->
    <div class="buttons flex">
      <div class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto" onclick="Close()">Cancel</div>
      <button class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500" onclick="addPost()">Post</button>
    </div>
  </div>
</div>
<div id="form_to_show_comment" style="position: fixed;"></div>
<script>
  const form = document.getElementById("form-post")
  form.style.display = 'none'

  function CreatePost() {
    form.style.display = "block"
  }

  function Close() {
    form.style.display = 'none'
  }

  function enterContent(postId) {
    var form_content = `<form class="comment-form" id="Cancale_comment">
  <div class="comment-container">
    <label for="comment" class="sr-only">Your comment</label>
    <textarea id="comment" rows="6" placeholder="Write a comment..."></textarea>
  </div>
  <div class="button-container">
    <button onclick="addComment(${postId})" id="post-comment">Post comment</button>
    <button onclick="Cancale_comment()" id="cancel">Cancel</button>
  </div>
</form>
`
    document.getElementById('form_to_show_comment').innerHTML = form_content;
  }

  function Cancale_comment() {
    document.getElementById('Cancale_comment').style.display = "none";
  }

  async function addComment(PostId) {
    var content_comment = document.getElementById('comment').value;

    const post_comment = {
      PostId: PostId,
      UserId: user_currentlyId,
      CommentContent: content_comment
    };

    try {
      const response = await fetch('/api/comment/addComment', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(post_comment)
      });

      const data = await response.json();

      if (data.success) {
        window.location.href = '/patient/post';
      } else {
        console.error('Có lỗi khi thêm comment:', data.error);
        alert("you need to enter text");
      }
    } catch (error) {
      console.error('Lỗi kết nối:', error);
    }
  }


  async function addPost() {
    var urlImage = await uploadImage();
    var content = document.getElementById('text_content').value;

    const postData = {
      userId: user_currentlyId,
      content: content,
      urlImage: urlImage,
    };

    fetch('/api/patient/Post/AddPost', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(postData),
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          window.location.href = '/patient/post';
        } else {
          console.error('Có lỗi khi thêm bài viết:', data.error);
          alert("you need to enter text");
        }
      })
      .catch(error => {
        console.error('Lỗi kết nối:', error);
      });
  }
  // Hàm uploadImage sử dụng Axios
  function sendImageToServer(base64Image) {
    return new Promise((resolve, reject) => {
      axios.post('/upload_image', {
          image: base64Image
        })
        .then(response => {
          console.log('Image uploaded successfully');
          const imageUrl = response.data.imageUrl;
          console.log('Image URL:', imageUrl);
          resolve(imageUrl);
        })
        .catch(error => {
          console.error('Error uploading image', error);
          reject(error);
        });
    });
  }

  async function uploadImage() {
    const fileInput = document.getElementById('image_of_post');
    const selectedFile = fileInput.files[0];

    if (selectedFile) {
      const reader = new FileReader();

      return new Promise((resolve, reject) => {
        reader.onload = function(e) {
          const base64Image = e.target.result;
          sendImageToServer(base64Image)
            .then(imageUrl => resolve(imageUrl))
            .catch(error => reject(error));
        };
        reader.readAsDataURL(selectedFile);
      });
    } else {
      return Promise.reject('No file selected');
    }
  }
</script>



<?php include_once dirname(__DIR__) . '/../layouts/HtmlTail.php' ?>