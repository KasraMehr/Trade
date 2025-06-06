<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">ساختار درختی معرف‌ها</h2>

        <div class="tree-container overflow-x-auto">
            <!-- کاربر اصلی (ریشه درخت) -->
            <div class="flex justify-center mb-8">
                <div class="relative">
                    <div class="user-card bg-gradient-to-br from-indigo-100 to-indigo-50 dark:from-indigo-900 dark:to-indigo-800 p-4 rounded-lg shadow-md text-center w-48 mx-auto">
                        <div class="avatar mx-auto mb-2">
                            <img class="h-16 w-16 rounded-full border-2 border-indigo-400 mx-auto"
                                 src="{{ $rootUser->avatar ?? asset('images/default-avatar.png') }}"
                                 alt="{{ $rootUser->name }}">
                        </div>
                        <h3 class="font-bold text-indigo-800 dark:text-indigo-200">{{ $rootUser->name }}</h3>
                        <p class="text-xs text-gray-600 dark:text-gray-300">{{ $rootUser->email }}</p>
                        <div class="mt-2 text-xs bg-indigo-600 text-white rounded-full px-2 py-1 inline-block">
                            کد معرف: {{ $rootUser->referral_code }}
                        </div>
                    </div>

                    <!-- اتصال به سطح بعدی -->
                    @if(!empty($tree))
                    <div class="connector-line h-8 w-px bg-gray-300 dark:bg-gray-600 mx-auto"></div>
                    @endif
                </div>
            </div>

            <!-- سطوح بعدی درخت -->
            @if(!empty($tree))
            <div class="tree-level level-1">
                <div class="flex justify-center space-x-8">
                    @foreach($tree as $node)
                        @include('filament.pages.user-referral-tree-node', [
                            'node' => $node,
                            'level' => 1,
                            'position' => $loop->iteration,
                            'total' => count($tree)
                        ])
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
