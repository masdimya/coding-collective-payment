<div>
    <div class="text-xl font-semibold text-gray-800 mb-5">
      Balance
    </div>
    <div class="flex">
      <div class="w-1/4 flex flex-col bg-white border border-t-4 border-t-green-600 shadow-sm rounded-xl mr-10">
        <div class="p-4 md:p-5">
          <h3 class="text-lg font-bold text-gray-600 ">
            Local Balance
          </h3>
          <p class="mt-2 font-bold text-gray-900 text-4xl text-end">
            {{ number_format($local,2)}}
          </p>
  
        </div>
      </div>
      <div class="w-1/4 flex flex-col bg-white border border-t-4 border-t-blue-600 shadow-sm rounded-xl ">
        <div class="p-4 md:p-5">
          <h3 class="text-lg font-bold text-gray-600 ">
            Online Balance
          </h3>
          <p class="mt-2 font-bold text-gray-900 text-4xl text-end">
            {{ number_format($wallet,2)}}
          </p>
  
        </div>
      </div>
    </div>
  </div>
