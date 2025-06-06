<div class="relative">
    <!-- کارت کاربر -->
    <div class="user-card bg-white dark:bg-gray-700 p-3 rounded-lg shadow-sm text-center w-40 mx-auto relative z-10">
        <h3 class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ $node['user']->name }}</h3>
        <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ $node['user']->email }}</p>
        <div class="mt-1 text-xs bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 rounded-full px-2 py-0.5 inline-block">
            {{ $node['user']->referral_code }}
        </div>
    </div>

    <!-- خط اتصال به والد -->
    <div class="connector-line absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-full h-8 w-px bg-gray-300 dark:bg-gray-600"></div>

    <!-- سطوح فرزندان -->
    @if(!empty($node['children']))
        <div class="connector-line h-8 w-px bg-gray-300 dark:bg-gray-600 mx-auto"></div>

        <div class="tree-level level-{{ $level + 1 }} mt-4">
            <div class="flex justify-center space-x-4">
                @foreach($node['children'] as $child)
                    @include('filament.pages.user-referral-tree-node', [
                        'node' => $child,
                        'level' => $level + 1,
                        'position' => $loop->iteration,
                        'total' => count($node['children'])
                    ])
                @endforeach
            </div>
        </div>
    @endif
</div>
