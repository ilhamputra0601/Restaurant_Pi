@props(['values'])
<div class="mb-3 mx-14">
    <label for="{{ $slot}}"
        class="block mb-2 text-sm text-left font-medium text-gray-900 dark:text-white @error('{{ $values }}') text-red-600 dark:text-red-500 @enderror">{{ $slot }}</label>
    <input type="text" id="{{ $values }}" name="{{ $values }}"
        class="block p-2.5 w-full text-sm text-gray-900 @error('{{ $values }}') border-red-600 dark:border-red-600 @enderror bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Write your {{ $slot }} here..." autofocus required value="{{ old('$values') }}">
    @error('{{ $values }}')<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
        {{ $message }}</p> @enderror
</div>
