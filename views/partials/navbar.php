<nav class="bg-gray-800/50">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      <div class="flex items-center">
        <div class="shrink-0">
          <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8" />
        </div>
        <div class="hidden md:block">
          <div class="ml-10 flex items-baseline space-x-4">
            <a href="/" aria-current="page" class="rounded-md 
             <?php echo (($title ?? '') === 'Dashboard') ? 'bg-gray-950/50' : ''; ?>
             px-3 py-2 text-sm font-medium text-white">Dashboard</a>
            <a href="/team" class="rounded-md 
            <?php echo (($title ?? '') === 'Team') ? 'bg-gray-950/50' : ''; ?>
            px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Team</a>
            <a href="/projects" class="rounded-md
            <?php echo (($title ?? '') === 'Projects') ? 'bg-gray-950/50' : ''; ?>
            px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Projects</a>
            <a href="/calendar" class="rounded-md 
            <?php echo (($title ?? '') === 'Calendar') ? 'bg-gray-950/50' : ''; ?>
            px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Calendar</a>
            <a href="/notes" class="rounded-md 
            <?php echo (($title ?? '') === 'Notes') ? 'bg-gray-950/50' : ''; ?>
            px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Notes</a>
          </div>
        </div>
      </div>
      <div class="hidden md:block">
        <div class="ml-4 flex items-center md:ml-6">
          <button type="button" class="relative rounded-full p-1 text-gray-400 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View notifications</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="size-6">
              <path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>

          <!-- Profile dropdown -->
          <div class="relative ml-3">
            <button class="relative flex max-w-xs items-center rounded-full focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
              <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="size-8 rounded-full outline -outline-offset-1 outline-white/10" />
            </button>
          </div>
        </div>
      </div>
      <div class="-mr-2 flex md:hidden">
        <!-- Mobile menu button -->
        <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
          <span class="sr-only">Open main menu</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="size-6">
            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</nav>