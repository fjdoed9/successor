<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight py-4">
            {{ __('投稿') }}
        </h2>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-3/4 py-8">
            <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4 flex">
                    <label for="image" class="font-bold dark:text-slate-50 w-36">会社画像:</label>
                    <input type="file" name="image" id="image" class="dark:text-slate-50 flex-1">
                </div>

                <div class="mb-4 flex">
                    <label for="manufacturer" class="font-bold dark:text-slate-50 w-36">会社名:</label>
                    <input type="text" name="manufacturer" id="manufacturer" class="dark:text-gray-900 flex-1">
                </div>

                <div class="mb-4 flex">
                    <label class="font-bold dark:text-slate-50 w-36">上場・非上場:</label>
                    <div class="flex flex-1 items-center">
                        <div class="flex items-center">
                            <label for="event-0" class="mr-2 flex items-center">
                                <input type="radio" name="event" id="event-0" value="0" class="text-blue-500">
                                <span class="dark:text-white">上場</span>
                            </label>
                        </div>
                        <div class="flex items-center">
                            <label for="event-1" class="mr-2 flex items-center">
                                <input type="radio" name="event" id="event-1" value="1" class="text-blue-500">
                                <span class="dark:text-white">非上場</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mb-4 flex">
                    <label for="model" class="font-bold dark:text-slate-50 w-36">創業者:</label>
                    <input type="text" name="model" id="model" class="dark:text-gray-900 flex-1">
                </div>
                <div class="mb-4 flex">
                    <label for="model" class="font-bold dark:text-slate-50 w-36">従業員数:</label>
                    <input type="text" name="model" id="model" class="dark:text-gray-900 flex-1">
                </div>

                <div class="mb-4 flex">
                    <label for="similar_products" class="font-bold dark:text-slate-50 w-36">業種:</label>
                    <input type="text" name="similar_products" id="similar_products" class="dark:text-gray-900 flex-1">
                </div>

                <div class="mb-4 flex">
                    <label for="free_review" class="font-bold dark:text-slate-50 w-36">起業理由:</label>
                    <textarea name="free_review" id="free_review" class="dark:text-gray-900 flex-1 h-40 resize-y"></textarea>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit" class="bg-blue-700 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded shadow-md">
                        作成
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
