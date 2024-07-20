@php /** @var App\Model\Pokemon $pokemon */ @endphp
<div class="flex flex-col justify-center items-center rounded-xl p-2 bg-sky-200">
    <h4 class="text-xl text-sky-950"> {{$pokemon->name}} </h4>
    <a href="{{url("/pokemon/" . $pokemon->apiId)}}"
        class="text-l text-yellow-900 hover:text-yellow-600"
    > See details </a>
</div>
