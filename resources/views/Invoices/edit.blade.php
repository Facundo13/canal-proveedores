@extends('layouts.app')

@section('tittle')
    Editar usuario
@endsection

@section('content')
<x-guest-layout>
    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('invoices.update', $invoice->id) }}">
            @csrf
            @method('PUT')

            <div class="mt-4">
                <x-label for="numberInvoice" :value="__('Numero de factura')" />

                <x-input id="numberInvoice" class="block mt-1 w-full" type="text" name="numberInvoice" value="{{$invoice->number}}"/>
            </div>

            <div class="mt-4">
                <x-label for="dateInvoice" :value="__('Fecha de la factura')" />

                <x-input id="dateInvoice" class="block mt-1 w-full" type="date" name="dateInvoice" value="{{$invoice->date}}"/>
            </div>

            <div class="mt-4">
                <x-label for="amountInvoice" :value="__('Monto')" />

                <x-input id="amountInvoice" class="block mt-1 w-full" type="text" name="amountInvoice" value="{{$invoice->amount}}"/>
            </div>

            <div class="mt-4">
                <x-label for="img" :value="__('Imagen')" />

                <x-input id="img" class="block mt-1 w-full" type="email" name="img" value="{{$invoice->number}}"/>
            </div>

            <div class="mt-4">
                <x-label for="obs" :value="__('Observaciones')" />

                <textarea id="obs" class="block mt-1 w-full border-gray-300" type="text" name="obs" value="{{$invoice->obs}}"></textarea>
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('Moficar factura') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

@endsection