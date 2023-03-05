<div>
    <div class="max-w-md mx-auto mt-8">
        <form wire:submit.prevent="submit">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                <input type="text" id="name" name="name" wire:model="name"
                       class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            </div>
            <div class="mb-4">
                <label for="weight" class="block text-gray-700 font-bold mb-2">Weight:</label>
                <input type="number" id="weight" name="weight" wire:model="weight"
                       class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       required>
                @error('weight') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update
                </button>
            </div>
        </form>
    </div>

</div>

