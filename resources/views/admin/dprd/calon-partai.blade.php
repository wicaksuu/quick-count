@extends('layouts.auth')
@section('title')
Setting {{ $partai->nama }}
@endsection


@section('page')
<h4 class="text-lg font-semibold text-gray-800 mb-sm-0 grow dark:text-gray-100">
    Setting Calon {{ $type }} {{ $partai->nama }} ({{ $partai->nama }})
</h4>
<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
        <li class="inline-flex items-center">
            <a
                class="inline-flex items-center text-sm font-medium text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                {{ $type }}
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
                <a href="{{ route('setting-calon-dprd',['id'=>$partai->id]) }}"
                    class="text-sm font-medium text-gray-500 ltr:ml-1 rtl:mr-1 hover:text-gray-900 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100 dark:hover:text-white">
                    {{ $partai->nama }}
                </a>
            </div>
        </li>
    </ol>
</nav>
@endsection

@section('content')
<div class="card dark:bg-zinc-800 dark:border-zinc-600">
    <div class="m-3">
        <div class="container-fluid px-[0.625rem]">
            @livewire('componen.daftar-calon-partai',['partai'=>$partai,'type'=>$type])
        </div>
    </div>
</div>
@endsection
