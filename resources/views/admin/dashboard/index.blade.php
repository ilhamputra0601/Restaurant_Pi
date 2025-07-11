<x-Admin-Layout>
        @include('admin.layouts.top')
        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
          <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
              <thead>
                <tr
                  class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                >
                  <th class="px-4 py-3">Client</th>
                  <th class="px-4 py-3">Date</th>
                  <th class="px-4 py-3">Status</th>
                  <th class="px-4 py-3">Action</th>
                </tr>
              </thead>
              <tbody
                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
              >
              @foreach ($data as $user)
              <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3">

                    <div class="flex items-center text-sm">
                      <!-- Avatar with inset shadow -->
                      <div
                        class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                      >
                        <img
                          class="object-cover w-full h-full rounded-full"
                          src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                          alt=""
                          loading="lazy"
                        />
                        <div
                          class="absolute inset-0 rounded-full shadow-inner"
                          aria-hidden="true"
                        ></div>
                      </div>
                      <div>
                        <p class="font-semibold">{{ $user->name }}</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">
                            {{ $user->email }}
                        </p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    {{ $user->email_verified_at }}
                  </td>
                  <td class="px-4 py-3 text-xs">
                    <span
                      class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                    >
                      Approved
                    </span>
                  </td>
                  <td class="px-4 py-3 text-sm">
                        <button onclick="confirmDelete('{{ url('/deleteuser',$user->id) }}')" type="button" class="text-gray-400 hover:text-gray-100 ml-2"
                            onclick="return confirm('Anda yakin data ini akan dihapus?')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                              </svg>
                        </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
          >
            <span class="flex items-center col-span-3">
              Showing 21-30 of 100
            </span>
            <span class="col-span-2"></span>
            <!-- Pagination -->
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
              <nav aria-label="Table navigation">
                <ul class="inline-flex items-center">
                  <li>
                    <button
                      class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                      aria-label="Previous"
                    >
                      <svg
                        aria-hidden="true"
                        class="w-4 h-4 fill-current"
                        viewBox="0 0 20 20"
                      >
                        <path
                          d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                          clip-rule="evenodd"
                          fill-rule="evenodd"
                        ></path>
                      </svg>
                    </button>
                  </li>
                  <li>
                    <button
                      class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                    >
                      1
                    </button>
                  </li>
                  <li>
                    <button
                      class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                    >
                      2
                    </button>
                  </li>
                  <li>
                    <button
                      class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"
                    >
                      3
                    </button>
                  </li>
                  <li>
                    <button
                      class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                    >
                      4
                    </button>
                  </li>
                  <li>
                    <span class="px-3 py-1">...</span>
                  </li>
                  <li>
                    <button
                      class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                    >
                      8
                    </button>
                  </li>
                  <li>
                    <button
                      class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                    >
                      9
                    </button>
                  </li>
                  <li>
                    <button
                      class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                      aria-label="Next"
                    >
                      <svg
                        class="w-4 h-4 fill-current"
                        aria-hidden="true"
                        viewBox="0 0 20 20"
                      >
                        <path
                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                          clip-rule="evenodd"
                          fill-rule="evenodd"
                        ></path>
                      </svg>
                    </button>
                  </li>
                </ul>
              </nav>
            </span>
          </div>
        </div>

        <!-- Charts -->
        <h2
          class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
        >
          Charts
        </h2>
        <div class="grid gap-6 mb-8 md:grid-cols-2">
          <div
            class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
          >
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
              Revenue
            </h4>
            <canvas id="pie"></canvas>
            <div
              class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
            >
              <!-- Chart legend -->
              <div class="flex items-center">
                <span
                  class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"
                ></span>
                <span>Shirts</span>
              </div>
              <div class="flex items-center">
                <span
                  class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"
                ></span>
                <span>Shoes</span>
              </div>
              <div class="flex items-center">
                <span
                  class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
                ></span>
                <span>Bags</span>
              </div>
            </div>
          </div>
          <div
            class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
          >
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
              Traffic
            </h4>
            <canvas id="line"></canvas>
            <div
              class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
            >
              <!-- Chart legend -->
              <div class="flex items-center">
                <span
                  class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"
                ></span>
                <span>Organic</span>
              </div>
              <div class="flex items-center">
                <span
                  class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
                ></span>
                <span>Paid</span>
              </div>
            </div>
          </div>
        </div>

</x-App-Layout>
<script>
    function confirmDelete(url) {
      if (confirm("Apakah Anda yakin ingin menghapus user ini?")) {
        window.location.href = url;
      }
    }
  </script>
