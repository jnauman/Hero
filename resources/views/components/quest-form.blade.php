<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <form method="POST" action="{{ $quest ? route('quests.update', $quest->id) : route('quests.store') }}">
        @csrf
        @if($quest)
            @method('PUT')
        @endif
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('title', $quest->title ?? '') }}" required>
            @error('title')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="5" required>{{ old('description', $quest->description ?? '') }}</textarea>
            @error('description')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

		<div>
            <label for="summary" class="block text-sm font-medium text-gray-700">Summary</label>
            <textarea name="summary" id="summary" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="5" required>{{ old('summary', $quest->summary ?? '') }}</textarea>
            @error('summary')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="points" class="block text-sm font-medium text-gray-700">Points</label>
            <input type="number" name="points" id="points" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" min="1" value="{{ old('points', $quest->points ?? '') }}" required>
            @error('points')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

		<div>
            <label for="min_level" class="block text-sm font-medium text-gray-700">Minimum Level</label>
            <input type="number" name="min_level" id="points" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" min="0" value="{{ old('min_level', $quest->min_level ?? '') }}" required>
            @error('min_level')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('start_date', $quest->start_date ?? '') }}">
            @error('start_date')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="expires_date" class="block text-sm font-medium text-gray-700">Expires Date</label>
            <input type="date" name="expires_date" id="expires_date" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('expires_date', $quest->expires_date ?? '') }}">
            @error('expires_date')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
            <select name="category_id" id="category_id" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == old('category_id', $quest->category_id ?? '')) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="campaign_id" class="block text-sm font-medium text-gray-700">Campaign</label>
            <select name="campaign_id" id="campaign_id" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">Select Campaign (if applicable)</option>
                @foreach ($campaigns as $campaign)
                    <option value="{{ $campaign->id }}" @if ($campaign->id == old('campaign_id', $quest->campaign_id ?? '')) selected @endif>{{ $campaign->title }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="repeatable" class="block text-sm font-medium text-gray-700">Repeatable</label>
            <input type="number" name="repeatable" id="repeatable" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                min="0"
                value="{{ old('repeatable', $quest->repeatable ?? 0) }}">
            @error('repeatable')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
            <small class="text-gray-500">How many times can this quest be repeated? (0 for non-repeatable)</small>
        </div>

		<div>
            <label for="repeatable_text" class="block text-sm font-medium text-gray-700">Repeatable Text</label>
            <textarea name="repeatable_text" id="repeatable_text" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="5" required>{{ old('repeatable_text', $quest->repeatable_text ?? '') }}</textarea>
            @error('repeatable_text')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

		<div>
            <label for="fine_print" class="block text-sm font-medium text-gray-700">Fine Print</label>
            <textarea name="fine_print" id="fine_print" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="5" required>{{ old('fine_print', $quest->fine_print ?? '') }}</textarea>
            @error('fine_print')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

		<div>
            <label for="turn_in_text" class="block text-sm font-medium text-gray-700">Turn In Text</label>
            <textarea name="turn_in_text" id="turn_in_text" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="5" required>{{ old('turn_in_text', $quest->turn_in_text ?? '') }}</textarea>
            @error('turn_in_text')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mt-4 md:col-span-2">
                <button type="submit" class="bg-seance-700 hover:bg-seance-800 focus:ring-4 focus:ring-seance-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-seance-600 dark:hover:bg-seance-700 focus:outline-none dark:focus:ring-seance-800">
                    {{ $submitButtonText }}
                </button>
            </div>
        </div>
    </form>
</div>
