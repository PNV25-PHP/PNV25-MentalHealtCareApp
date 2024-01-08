<?php include_once dirname(__DIR__) . '/../layouts/HtmlHead.php' ?>
<style>
  body {
    margin: 0;
    overflow: hidden;
  }
  #sky {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #000;
  }
  .star {
    position: absolute;
    background-color: #FFF;
    border-radius: 50%;
    pointer-events: none;
  }
</style>
<script>
  const posts = <?= json_encode($posts) ?>;
</script>
<div id="show_here" class="Grid"></div>
<script>
  var Show_posts = "";
  posts.map((post) => {
    var Show_post =
      `<div class="p-8 flex items-center justify-center w-screen h-100%">
        <div class="px-5 py-4 bg-white dark:bg-gray-800 shadow rounded-lg max-w-lg w-3/4">
            <div class="flex mb-4">
            <img class="w-12 h-12 rounded-full" src="${post.Url_Image}"/>
            <div class="ml-2 mt-0.5">
              <span class="block font-medium text-base leading-snug text-black dark:text-gray-100">${post.FullName}</span>
              <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">${post.CreatedAt}</span>
            </div>
          </div>
          <p class="text-gray-800 dark:text-gray-100 leading-snug md:leading-normal">${post.Content}</p>
          <div class="mt-5">
            <img src="${post.Image}" alt="" class="w-full h-41 object-cover object-center">
          </div>
        </div>
        </div>`
    Show_posts += Show_post;
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
    <input class="title border border-gray-300 p-2 mb-4 outline-none" spellcheck="false" placeholder="Title" type="file">
    <textarea class="description sec p-3 h-80 border border-gray-300 outline-none" spellcheck="false" placeholder="Describe everything about this post here"></textarea>

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
      <div class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Post</div>
    </div>
  </div>
</div>
<script src="../../assets/script.js"></script>
<script>
  const form = document.getElementById("form-post")
  form.style.display = 'none'

  function CreatePost() {
    form.style.display = "block"
  }

  function Close() {
    form.style.display = 'none'
  }
</script>
<?php include_once dirname(__DIR__) . '/../layouts/HtmlTail.php' ?>