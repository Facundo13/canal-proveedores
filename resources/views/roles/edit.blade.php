@extends('layouts.app')

@section('tittle')
    Editar rol
@endsection

@section('content')
<x-guest-layout>
    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('roles.update', $role->id) }}"> 
            @csrf
            @method('PUT')

            <div class="mt-4">
                <x-label for="name" :value="__('Nombre')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$role->name}}"/>
            </div> 

            <div class="mt-4">
                <x-label for="permisos" :value="__('Permisos para este rol')" />

                @foreach ($permission as $value )
                    @if (in_array($value->id, $rolePermissions))
                        <label><input type="checkbox" id="permission" value="{{$value->id}}" name="permission[]" checked/>{{$value->name}}</label>
                        <br/>
                    @else
                        <label><input type="checkbox" id="permission" value="{{$value->id}}" name="permission[]"/>{{$value->name}}</label>
                        <br/>
                    @endif
                @endforeach
            </div>            

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Modificar rol') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

@endsection