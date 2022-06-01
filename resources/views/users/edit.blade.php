@extends('layouts.app')

@section('tittle')
    Editar usuario
@endsection

@section('content')
<x-guest-layout>
    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mt-4">
                <x-label for="name" :value="__('Nombre')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" />
            </div>

            <div class="mt-4">
                <x-label for="lastname" :value="__('Apellido')" />

                <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" value="{{$user->lastname}}" />
            </div>

            <div class="mt-4">
                <x-label for="Cuit" :value="__('Cuit')" />

                <x-input id="cuit" class="block mt-1 w-full" type="text" name="cuit" value="{{$user->cuit}}" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$user->email}}" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Contraseña')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmar contraseña')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation"/>
            </div>

            <!-- Rol -->
            <div class="mt-4">
                <x-label for="rol" :value="__('Elegir Rol')" />

                <select name="roles" id="roles" class="block mt-1 w-full border-gray-300">   
                    @foreach ($userRole as $roleUser)
                        <option value='{{$roleUser}}' selected>{{$roleUser}}</option>
                        @foreach ($roles as $role)
                        @if ($role != $roleUser)
                            <option value='{{$role}}'>{{$role}}</option>
                        @endif
                    @endforeach 
                    @endforeach                        
                       
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('Editar usuario') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

@endsection