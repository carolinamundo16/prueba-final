<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proyectos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
                        <h1 class="text-2xl font-bold">{{ __('Proyectos') }}</h1>
                        <a href="{{ route('projects.create') }}" class="bg-red-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Crear Proyecto</a>
                    </div>
                    <div class="mt-4">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2">{{ __('Nombre Proyecto') }}</th>
                                    <th class="px-4 py-2">{{ __('Fuente Fondos') }}</th>
                                    <th class="px-4 py-2">{{ __('Monto Planificado') }}</th>
                                    <th class="px-4 py-2">{{ __('Monto Patrocinado') }}</th>
                                    <th class="px-4 py-2">{{ __('Monto Fondos Propios') }}</th>
                                    <th class="px-4 py-2">{{ __('Acciones:') }}</th>
                            </tr>
                    </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                @forelse ($projects as $project)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $project->nombreProyecto }}</td>
                                        <td class="border px-4 py-2">{{ $project->fuenteFondos }}</td>
                                        <td class="border px-4 py-2">{{ $project->montoPlanificado }}</td>
                                        <td class="border px-4 py-2">{{ $project->montoPatrocinado }}</td>
                                        <td class="border px-4 py-2">{{ $project->montoFondosPropios }}</td>
                                        <td class="border px-4 py-2" style="width: 250px">
                                            <a href="{{ route('projects.show', $project) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" style="margin-right:5px">{{ __('Ver') }}</a>
                                            <a href="{{ route('projects.edit', $project) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">{{ __('Editar') }}</a>
                                            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline" style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">{{ __('Eliminar') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-red-500 text-white text-center">
                                        <td colspan="6" class="border px-4 py-2">{{ __('No hay proyectos para mostrar') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            @if ($projects->hasPages())
                                <tfoot class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                    <tr>
                                        <td colspan="3" class="border px-4 py-2">
                                            {{ $projects->links() }}
                                        </td>
                                    </tr>
                                </tfoot>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>