<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500"
                         alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="/"
                           class="<?= urlIs('/') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="/about"
                           class="<?= urlIs('/about.php') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">About</a>
                        <a href="/notes"
                           class="<?= urlIs('/index.php') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Notes</a>

                        <a href="/contact"
                           class="<?= urlIs('/contact.php') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                    </div>
                </div>
            </div>
            <!-- Profile dropdown -->
            <div class="relative ml-3">
                <div class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <?php if (isset($_SESSION['user']) ?? false): ?>
                        <img class="h-8 w-8 rounded-full"
                             src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                             alt="">
                        <form action="/logout" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit"
                                    class="flex items-center px-3 py-2 rounded-md text-sm font-medium text-white hover:bg-gray-700">
                                Log
                                Out
                            </button>
                        </form>
                    <?php else: ?>
                        <a href="/register"
                           class="flex items-center px-3 py-2 rounded-md text-sm font-medium text-white hover:bg-gray-700">Register</a>
                        <a href="/login"
                           class="flex items-center px-3 py-2 rounded-md text-sm font-medium text-white hover:bg-gray-700">Log
                            In</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</nav>