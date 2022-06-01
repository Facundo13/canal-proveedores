@extends('layouts.app')

@section('tittle')
    Lista de facturas
@endsection

@section('content')
<div class="container flex justify-center mx-auto mt-10">
    <div class="flex flex-col">
        <div class="w-full">
            <div class="border-b border-gray-200 shadow">
                <div class="mb-3 flex justify-end">
                    @can('crear-invoice')
                        <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" href="{{ route('invoices.create')}}">Nueva factura</a>
                    @endcan
                </div>
                <table class="divide-y divide-gray-300 ">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                ID
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Nro Factura
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Fecha
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Monto
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Observaciones
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Usuario
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-300">

                        @foreach ($invoices as $invoice)
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{$invoice->id}}
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{$invoice->number}}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500">
                                    {{$invoice->date}}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{$invoice->amount}}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{$invoice->obs}}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{$invoice->user_id}}
                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                @can('editar-invoice')
                                    <a href="{{ route('invoices.edit', $invoice->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                @endcan

                                @can('borrar-invoice')
                                    <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" class="formDeleteInvoice">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                @endcan

                            </td>
                        </tr>
                        @endforeach
                                                
                    </tbody>
                </table>
                <div>
                    {!! $invoices->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.formDeleteInvoice')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    event.preventDefault()
                    event.stopPropagation()
                    Swal.fire({
                        title: '¿Estas seguro de eliminar esta factura?',
                        text: "Esta acción no se puede revertir",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Eliminar',
                        cancelButtonText: 'Cancelar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                this.submit();
                                Swal.fire(
                                    'Eliminado!',
                                    'La factura ha sido eliminado',
                                    'success'
                                )
                            }
                        })
                }, false)
                })
        })()
    </script>
@endsection

