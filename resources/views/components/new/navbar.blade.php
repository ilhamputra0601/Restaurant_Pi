  <nav
  class="relative flex w-full flex-wrap items-center justify-between bg-neutral-100 py-2 text-neutral-500 shadow-lg hover:text-neutral-700 focus:text-neutral-700 dark:bg-neutral-600 lg:py-4">
  <div class="flex w-full flex-wrap items-center justify-between px-3">
    <div>
      <a data-te-sidenav-toggle-ref
      data-te-target="#sidenav-2"
      aria-controls="#sidenav-2"
      aria-haspopup="true"

        class="my-1 mr-2 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 lg:mb-0 lg:mt-0"
        href="#">
        <img
          src="img/hamburger_digh01rn29or_64.png"
          style="height: 20px"
          alt=""
          loading="lazy" />  <H1 class="mx-2 text-xl font-semibold text-gray-50">ADMIN</H1>
      </a>
    </div>
      <!-- Right elements -->
      <div class="relative flex items-center">
        <!-- Cart Icon -->
        <a
          class="mr-4 text-white opacity-60 hover:opacity-80 focus:opacity-80"
          href="#">
          <span class="[&>svg]:w-5">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              class="h-5 w-5">
              <path
                d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
            </svg>
          </span>
        </a>

        <!-- Second dropdown container -->
        <div class="relative" data-te-dropdown-ref>
          <!-- Second dropdown trigger -->
          <a
            class="hidden-arrow flex items-center whitespace-nowrap transition duration-150 ease-in-out motion-reduce:transition-none"
            href="#"
            id="dropdownMenuButton2"
            role="button"
            data-te-dropdown-toggle-ref
            aria-expanded="false">
            <!-- User avatar -->
            <img
              src="https://tecdn.b-cdn.net/img/new/avatars/2.jpg"
              class="rounded-full"
              style="height: 25px; width: 25px"
              alt=""
              loading="lazy" />
          </a>
          <!-- Second dropdown menu -->
          <ul
            class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
            aria-labelledby="dropdownMenuButton2"
            data-te-dropdown-menu-ref>
            <!-- Second dropdown menu items -->
            <li>
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                    <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
                  </div>
              <a
                class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                href="/redirects"
                data-te-dropdown-item-ref
                >Dashboard</a
              >
            </li>
            <li>
              <a
                class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                href="/user/profile"
                data-te-dropdown-item-ref
                >Settings</a
              >
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <a  onclick="event.preventDefault();
                this.closest('form').submit();"
                class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                href="#"
                data-te-dropdown-item-ref
                >Sign Out</a>
                </Form>
            </li>
          </ul>
        </div>
      </div>
      <!-- Right elements -->

  </div>
</nav>

