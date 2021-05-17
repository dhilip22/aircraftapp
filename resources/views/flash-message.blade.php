@if ($message = Session::get('success'))
<div id="alert-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
  <strong class="font-bold">Success: </strong>
  <span class="block sm:inline">{{$message}}</span>
  <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
      <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)"><span>×</span></button>
  </span>
</div>
@endif
  
@if ($message = Session::get('error'))

<div id="alert-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
  <strong class="font-bold">Error: </strong>
  <span class="block sm:inline">{{$message}}</span>
  <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
      <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)"><span>×</span></button>
  </span>
</div>
@endif
   
@if ($message = Session::get('warning'))
<div id="alert-message" class="bg-yellow-100 border border-yellow-400 text-gray-700 px-4 py-3 rounded relative" role="alert">
  <strong class="font-bold">Warning: </strong>
  <span class="block sm:inline">{{$message}}</span>
  <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
      <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)"><span>×</span></button>
  </span>
</div>
@endif
   
@if ($message = Session::get('info'))
<div id="alert-message" class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
  <strong class="font-bold">Error</strong>
  <span class="block sm:inline">{{$message}}</span>
  <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
      <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)"><span>×</span></button>
  </span>
</div>
@endif
  
@if ($errors->any())
<div id="alert-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
  <strong class="font-bold">Error: </strong>
    @foreach ($errors->all() as $error)
        <span class="block sm:inline">{{$error}}</span>
    @endforeach
  <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
      <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)"><span>×</span></button>
  </span>
</div>
@endif
