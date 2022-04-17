<x-app-layout>
  <div class="filters flex space-x-6">
    <div class="w-1/3">
      <select name="" id="" class="w-full bg-white rounded-xl border-none px-4 py-2">
        <option value="Option 1">Option 1</option>
        <option value="Option 2">Option 2</option>
        <option value="Option 3">Option 3</option>
        <option value="Option 4">Option 4</option>
      </select>
    </div>
    <div class="w-1/3">
      <select name="" id="" class="w-full bg-white rounded-xl border-none px-4 py-2">
        <option value="Option 1">Option 1</option>
        <option value="Option 2">Option 2</option>
        <option value="Option 3">Option 3</option>
        <option value="Option 4">Option 4</option>
      </select>
    </div>

    <div class="w-2/3 relative">

      <input type="search" placeholder="Find an idea" class="placeholder-gray-900 bg-white w-full rounded-xl border-none pl-8 px-4 py-2" />
      <div class="absolute top-0 flex items-center h-full ml-2">
        <svg class="w-4 h-full text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>

      </div>
    </div>
  </div>
  <!-- end filters -->

  <div class="ideas-container space-y-6 my-6">
    <div class="idea-container bg-white rounded-xl flex hover:shadow-card transition duration-150 ease-in cursor-pointer">
      <div class="border-r border-gray-100 px-5 py-8">
        <div class="text-center">
          <div class="font-semibold text-2xl">12</div>
          <div class="text-gray-500">Votes</div>
          <div class="mt-8">
            <button class="w-20 bg-gray-200 border border-gray-200 font-bold text-md uppercase 
            rounded-xl px-4 py-3
            hover:border-gray-400 transition duration-150 ease-in">Vote</button>

          </div>
        </div>
      </div>

      <div class="flex px-4 py-6">
        <a href="#" class="flex-none">
          <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
        </a>
        <div class="mx-4">
          <h4 class="text-xl font-semibold">
            <a href="#" class="hover:underline">A random title can go here...</a>
          </h4>
          <div class="text-gray-600 mt-3">
            <p class="line-clamp-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi quibusdam sunt id commodi officiis consectetur repudiandae quod laudantium atque mollitia, ex quis sapiente fugiat cupiditate cum explicabo rerum odit eligendi saepe facere quo aspernatur distinctio. Iusto omnis officiis aliquam, repellendus quaerat tempora quos itaque nisi praesentium ipsa odit vel eligendi saepe fuga qui quidem consequuntur labore harum ad laudantium! Odit eos eum quis corrupti laudantium numquam quasi. Maxime dignissimos pariatur aspernatur debitis! Sit minus illo laudantium deleniti harum fugiat quae ipsa voluptates neque? Fugit in minima, cumque perferendis illum commodi alias doloremque exercitationem voluptate quam quod sed quibusdam cum placeat.</p>
          </div>
          <div class="flex items-center justify-between mt-6">
            <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
              <div>10 hours ago</div>
              <div>&bullet;</div>
              <div>Category 1</div>
              <div>&bullet;</div>
              <div class="text-gray-900">Comments 3</div>
            </div>
            <div x-data="{ isOpen:false }" class="flex items-center space-x-2">
              <div class="bg-yellow-200 text-xs font-bold uppercase rounded-full text-center w-28 h-8 py-2 px-4">Open</div>
              <button @click="isOpen=!isOpen" class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-8 transition duration-150 ease-in py-2 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                  <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                </svg>
                <ul x-show="isOpen" class="absolute w-44 font-semibold bg-white shadow-dialog rounded-xl py-3 ml-2">
                  <li><a href="#" class="block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">Mark as Spam</a></li>
                  <li><a href="#" class="text-red-700 block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">Delete post</a></li>
                </ul>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- end idea-container -->
    <div class="idea-container bg-white rounded-xl flex hover:shadow-card transition duration-150 ease-in cursor-pointer">
      <div class="border-r border-gray-100 px-5 py-8">
        <div class="text-center">
          <div class="font-semibold text-2xl text-blue-500">12</div>
          <div class="text-blue-500">Votes</div>
          <div class="mt-8">
            <button class="w-20 bg-blue-500 border border-blue-500 font-bold text-md text-white uppercase 
            rounded-xl px-4 py-3
            hover:border-gray-400 transition duration-150 ease-in">Voted</button>

          </div>
        </div>
      </div>

      <div class="flex flex-1 px-4 py-6">
        <div class="flex-none">
          <a href="#">
            <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
          </a>
        </div>
        <div class="mx-4 w-full">
          <h4 class="text-xl font-semibold">
            <a href="#" class="hover:underline">A random title can go here...</a>
          </h4>
          <div class="text-gray-600 mt-3">
            <p class="line-clamp-3">Lorem ipsum dolor sit amet consectetur,</p>
          </div>
          <div class="flex items-center justify-between mt-6">
            <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
              <div>10 hours ago</div>
              <div>&bullet;</div>
              <div>Category 1</div>
              <div>&bullet;</div>
              <div class="text-gray-900">Comments 3</div>
            </div>
            <div class="flex items-center space-x-2">
              <div class="bg-lime-200 text-xs font-bold uppercase rounded-full text-center w-28 h-8 py-2 px-4">In progress</div>
              <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-8 transition duration-150 ease-in py-2 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                  <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                </svg>
                <ul class="hidden absolute w-44 font-semibold bg-white shadow-dialog rounded-xl py-3 ml-2">
                  <li><a href="#" class="block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">Mark as Spam</a></li>
                  <li><a href="#" class="text-red-700 block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">Delete post</a></li>
                </ul>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- end idea-container -->
    <div class="idea-container bg-white rounded-xl flex hover:shadow-card transition duration-150 ease-in cursor-pointer">
      <div class="border-r border-gray-100 px-5 py-8">
        <div class="text-center">
          <div class="font-semibold text-2xl">12</div>
          <div class="text-gray-500">Votes</div>
          <div class="mt-8">
            <button class="w-20 bg-gray-200 border border-gray-200 font-bold text-md uppercase 
            rounded-xl px-4 py-3
            hover:border-gray-400 transition duration-150 ease-in">Vote</button>

          </div>
        </div>
      </div>

      <div class="flex px-4 py-6">
        <a href="#" class="flex-none">
          <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
        </a>
        <div class="mx-4">
          <h4 class="text-xl font-semibold">
            <a href="#" class="hover:underline">A random title can go here...</a>
          </h4>
          <div class="text-gray-600 mt-3">
            <p class="line-clamp-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi quibusdam sunt id commodi officiis consectetur repudiandae quod laudantium atque mollitia, ex quis sapiente fugiat cupiditate cum explicabo rerum odit eligendi saepe facere quo aspernatur distinctio. Iusto omnis officiis aliquam, repellendus quaerat tempora quos itaque nisi praesentium ipsa odit vel eligendi saepe fuga qui quidem consequuntur labore harum ad laudantium! Odit eos eum quis corrupti laudantium numquam quasi. Maxime dignissimos pariatur aspernatur debitis! Sit minus illo laudantium deleniti harum fugiat quae ipsa voluptates neque? Fugit in minima, cumque perferendis illum commodi alias doloremque exercitationem voluptate quam quod sed quibusdam cum placeat.</p>
          </div>
          <div class="flex items-center justify-between mt-6">
            <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
              <div>10 hours ago</div>
              <div>&bullet;</div>
              <div>Category 1</div>
              <div>&bullet;</div>
              <div class="text-gray-900">Comments 3</div>
            </div>
            <div class="flex items-center space-x-2">
              <div class="bg-gray-200 text-xs font-bold uppercase rounded-full text-center w-28 h-8 py-2 px-4">Closed</div>
              <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-8 transition duration-150 ease-in py-2 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                  <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                </svg>
                <ul class="hidden absolute w-44 font-semibold bg-white shadow-dialog rounded-xl py-3 ml-2">
                  <li><a href="#" class="block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">Mark as Spam</a></li>
                  <li><a href="#" class="text-red-700 block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">Delete post</a></li>
                </ul>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- end idea-container -->
    <div class="idea-container bg-white rounded-xl flex hover:shadow-card transition duration-150 ease-in cursor-pointer">
      <div class="border-r border-gray-100 px-5 py-8">
        <div class="text-center">
          <div class="font-semibold text-2xl">12</div>
          <div class="text-gray-500">Votes</div>
          <div class="mt-8">
            <button class="w-20 bg-gray-200 border border-gray-200 font-bold text-md uppercase 
            rounded-xl px-4 py-3
            hover:border-gray-400 transition duration-150 ease-in">Vote</button>

          </div>
        </div>
      </div>

      <div class="flex px-4 py-6">
        <a href="#" class="flex-none">
          <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
        </a>
        <div class="mx-4">
          <h4 class="text-xl font-semibold">
            <a href="#" class="hover:underline">A random title can go here...</a>
          </h4>
          <div class="text-gray-600 mt-3">
            <p class="line-clamp-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi quibusdam sunt id commodi officiis consectetur repudiandae quod laudantium atque mollitia, ex quis sapiente fugiat cupiditate cum explicabo rerum odit eligendi saepe facere quo aspernatur distinctio. Iusto omnis officiis aliquam, repellendus quaerat tempora quos itaque nisi praesentium ipsa odit vel eligendi saepe fuga qui quidem consequuntur labore harum ad laudantium! Odit eos eum quis corrupti laudantium numquam quasi. Maxime dignissimos pariatur aspernatur debitis! Sit minus illo laudantium deleniti harum fugiat quae ipsa voluptates neque? Fugit in minima, cumque perferendis illum commodi alias doloremque exercitationem voluptate quam quod sed quibusdam cum placeat.</p>
          </div>
          <div class="flex items-center justify-between mt-6">
            <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
              <div>10 hours ago</div>
              <div>&bullet;</div>
              <div>Category 1</div>
              <div>&bullet;</div>
              <div class="text-gray-900">Comments 3</div>
            </div>
            <div class="flex items-center space-x-2">
              <div class="bg-blue-200 text-xs font-bold uppercase rounded-full text-center w-28 h-8 py-2 px-4">Answered</div>
              <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-8 transition duration-150 ease-in py-2 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                  <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                </svg>
                <ul class="hidden absolute w-44 font-semibold bg-white shadow-dialog rounded-xl py-3 ml-2">
                  <li><a href="#" class="block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">Mark as Spam</a></li>
                  <li><a href="#" class="text-red-700 block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">Delete post</a></li>
                </ul>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- end idea-container -->
  </div> <!-- end ideas container -->
</x-app-layout>