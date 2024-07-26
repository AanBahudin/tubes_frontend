@foreach ($reviews as $review)
    <div class="px-5 py-3 border border-slate-200 shadow-md rounded-md">
        <h5 class="text-lg font-semibold"> Rating Given {{ $review->rating }} / 5</h5>
        <p class="text-md mt-5 text-gray-700">{{ $review->review }}</p>
    </div>
@endforeach