<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-3xl text-seance-800 dark:text-seance-200 leading-tight">
            {{ __('Quest Log') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-cover bg-center" style="background-image: url('{{ asset('images/parchment-background.jpg') }}');">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Display success message --}}
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-md" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="overflow-hidden shadow-xl rounded-lg">
                <x-hero-profile :user="$user" /> <div class="mt-8">  {{-- Quest Log Section --}}
                <div class="bg-white/75 overflow-hidden shadow-xl sm:rounded-lg p-6">
                    @if ($acceptedQuests->count() > 0)
                        <h3 class="text-lg font-semibold mb-4">Accepted Quests</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($acceptedQuests as $questLog)
                                <x-quest-card :quest="$questLog->quest" :questLog="$questLog" :statusColor="$questLog->statusColor"/>
                            @endforeach
                        </div>
                    @endif

                    @if ($exceptionRequests->count() > 0)
                        <h3 class="text-lg font-semibold mt-8 mb-4">Exception Requests</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($exceptionRequests as $questLog)
                                <x-quest-card :quest="$questLog->quest" :questLog="$questLog" :statusColor="$questLog->statusColor"/>
                            @endforeach
                        </div>
                    @endif

                    @if ($completedQuests->count() > 0)
                        <h3 class="text-lg font-semibold mt-8 mb-4">Completed Quests</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($completedQuests as $questLog)
                                <x-quest-card :quest="$questLog->quest" :questLog="$questLog" :statusColor="$questLog->statusColor"/>
                            @endforeach
                        </div>
                    @endif

                    @if ($acceptedQuests->count() == 0 && $exceptionRequests->count() == 0 && $completedQuests->count() == 0)
                        <p class="text-center text-slate-400">No quests in your log yet.</p>
                    @endif
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
