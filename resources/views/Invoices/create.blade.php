@extends('layouts.app')

@section('tittle')
    Crear nueva factura
@endsection

@section('content')
<x-guest-layout>
    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('invoices.store') }}">
            @csrf

            <div class="mt-4">
                <x-label for="number" :value="__('Numero de factura')" />

                <x-input id="number" class="block mt-1 w-full" type="text" name="number" :value="old('number')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="date" :value="__('Fecha de la factura')" />

                <x-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="amount" :value="__('Monto')" />

                <x-input id="amount" class="block mt-1 w-full" type="text" name="amount" :value="old('amount')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="imagen" :value="__('Imagen')" />

                <x-input id="imagen" class="block mt-1 w-full" type="text" name="imagen" :value="old('imagen')" required />
            </div>

            <div class="mt-4">
                <x-label for="obs" :value="__('Observaciones')" />

                <textarea id="obs" class="block mt-1 w-full border-gray-300" type="text" name="obs" :value="old('obs')"></textarea>
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('Crear factura') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

@endsection