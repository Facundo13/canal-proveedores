@extends('layouts.app')

@section('tittle')
    Crear nuevo rol
@endsection

@section('content')
<x-guest-layout>
    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('roles.store') }}">
            @csrf
            <div class="mt-4">
                <x-label for="name" :value="__('Nombre')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="permisos" :value="__('Permisos para este rol')" />

                        @foreach ($permission as $value )
                            <label><input type="checkbox" id="permission" value="{{$value->id}}" name="permission[]"/>{{$value->name}}</label>
                            <br/>
                        @endforeach                        
            </div>            

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Crear rol') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

@endsection