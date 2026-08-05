 @if ($type === 'ERROR')
 <div class="border border-red-500 bg-red-100 rounded-lg p-4">
        <h1 class="text-lg font-bold text-red-700">Error</h1>
        <p class ="text-red-500">{{$slot}}</p>
    </div>

@elseif ($type === "WARNING")

    <div class="border border-yellow-500 bg-yellow-100 rounded-lg p-4">
        <h1 class="text-lg font-bold text-yellow-700">Warning</h1>
        <p class ="text-yellow-500">{{$slot}}</p>
    </div>

@else

    <div class="border border-blue-500 bg-blue-100 rounded-lg p-4">
        <h1 class="text-lg font-bold text-blue-700">Info</h1>
        <p class ="text-blue-500">{{$slot}}</p>
    </div>

@endif