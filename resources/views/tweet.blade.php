<script type="text/javascript"> 
        var token = "<?php if (isset($token)) echo $token; ?>";
        <?php if (isset($token)) ?> localStorage.setItem("token", token)</script>
<html lang="en">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <style>
.button {
  background-color: blue;
  color: white;
  border: 2px solid black;
  margin: 20px;
  padding: 20px;
}
</style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{$result['data'][0]['text']}}
                </div>
            </div>
            <td><form action="/api/random-tweet" method="GET">
            @csrf
                <button class="btn btn-primary button" type="submit">
                   Get PDF of random tweet &rarr;
                </button>
            </form></td>
        </div>
    </div>
</x-app-layout>
</html>