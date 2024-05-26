<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard Transction</title>
  <link href="/style.css" rel="stylesheet">
  @livewireStyles
</head>
<body class="mx-20">
  <div class="container">
    <div>
      <div class="text-xl font-semibold text-gray-800 mb-5">
        Balance
      </div>
      <div class="flex">
        <div class="w-1/5 flex flex-col bg-white border border-t-4 border-t-green-600 shadow-sm rounded-xl mr-10">
          <div class="p-4 md:p-5">
            <h3 class="text-lg font-bold text-gray-800 ">
              Local Balance
            </h3>
            <p class="mt-2 font-bold text-gray-900 text-4xl">
              10000.00
            </p>
    
          </div>
        </div>
        <div class="w-1/5 flex flex-col bg-white border border-t-4 border-t-blue-600 shadow-sm rounded-xl ">
          <div class="p-4 md:p-5">
            <h3 class="text-lg font-bold text-gray-800 ">
              Online Balance
            </h3>
            <p class="mt-2 font-bold text-gray-900 text-4xl">
              10000.00
            </p>
    
          </div>
        </div>
      </div>
    </div>
    <div class="mt-10 mb-4">
      <div class="text-xl font-semibold text-gray-800 mb-5">
        Create Transaction
      </div>
      <div>
        <div class="w-1/4">
          <label for="amount" class="block text-sm font-medium mb-2 ">Amount</label>
          <input type="number" id="amount" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none " >
        </div>
        <div class="flex mt-4">
          <button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            Deposit
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
            </svg>
          </button>
          <button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-teal-600 text-white hover:bg-teal-700 disabled:opacity-50 disabled:pointer-events-none ml-3">
            Withdraw
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div class="mt-10 ">
      <div class="text-xl font-semibold text-gray-800 mb-9">
        Transaction History
      </div>
      <table class="divide-y divide-gray-200">
        <thead>
          <tr>
            <th scope="col" class="text-center text-xs font-medium text-gray-500 uppercase ">No</th>
            <th scope="col" class="text-center text-xs font-medium text-gray-500 uppercase w-[20%]">Order ID</th>
            <th scope="col" class="text-center text-xs font-medium text-gray-500 uppercase w-[10%]">Category</th>
            <th scope="col" class="text-center text-xs font-medium text-gray-500 uppercase w-[30%]">Amount</th>
            <th scope="col" class="text-center text-xs font-medium text-gray-500 uppercase w-[30%]">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr class="odd:bg-white even:bg-gray-100 ">
            <td class="py-4 whitespace-nowrap text-sm font-medium text-gray-800 text-center">1</td>
            <td class="py-4 whitespace-nowrap text-sm text-gray-800 text-center">11111</td>
            <td class="py-4 whitespace-nowrap text-sm text-gray-800 text-center">
              <div>
                <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full ">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 12.75 3 3m0 0 3-3m-3 3v-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                  Withdraw
                </span>
              </div>
            </td>
            <td class="py-4 whitespace-nowrap text-sm text-gray-800 font-semibold text-end">
              10000.00
            </td>
            <td class="py-4 whitespace-nowrap text-sm text-gray-800 text-center">
              <div>
                <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full ">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                  Success
                </span>
              </div>
            </td>
           
          </tr>
          <tr class="odd:bg-white even:bg-gray-100 ">
            <td class="py-4 whitespace-nowrap text-sm font-medium text-gray-800 text-center">1</td>
            <td class="py-4 whitespace-nowrap text-sm text-gray-800 text-center">11111</td>
            <td class="py-4 whitespace-nowrap text-sm text-gray-800 text-center">
              <div>
                <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full ">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m15 11.25-3-3m0 0-3 3m3-3v7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                  
                  Deposit
                </span>
              </div>
            </td>
            <td class="py-4 whitespace-nowrap text-sm text-gray-800 font-semibold text-end">
              10000.00
            </td>
            <td class="py-4 whitespace-nowrap text-sm text-gray-800 text-center">
              <div>
                <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-orange-100 text-orange-800 rounded-full ">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                  
                  Process
                </span>
              </div>
            </td>
           
          </tr>
          <tr class="odd:bg-white even:bg-gray-100 ">
            <td class="py-4 whitespace-nowrap text-sm font-medium text-gray-800 text-center">1</td>
            <td class="py-4 whitespace-nowrap text-sm text-gray-800 text-center">11111</td>
            <td class="py-4 whitespace-nowrap text-sm text-gray-800 text-center">
              <div>
                <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full ">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m15 11.25-3-3m0 0-3 3m3-3v7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                  
                  Deposit
                </span>
              </div>
            </td>
            <td class="py-4 whitespace-nowrap text-sm text-gray-800 font-semibold text-end">
              10000.00
            </td>
            <td class="py-4 whitespace-nowrap text-sm text-gray-800 text-center">
              <div>
                <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full ">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                  
                  Failed
                </span>
              </div>
            </td>
           
          </tr>

        </tbody>
      </table>
    </div>
  </div>
  @livewireScripts
</body>
</html>