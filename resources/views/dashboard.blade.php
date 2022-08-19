<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    <div style="display: flex; justify-content: space-between">
                        @if(\Illuminate\Support\Facades\Auth::user()->role === 'Директор')
                            <button type="button" class="btn btn-danger w-25 boss">Директор</button>
                            <button type="button" class="btn btn-danger w-25 manager">Менеджер</button>
                            <button type="button" class="btn btn-danger w-25 performer">Исполнитель</button>
                        @elseif(\Illuminate\Support\Facades\Auth::user()->role === 'Менеджер')
                            <button type="button" class="btn btn-danger w-25" disabled>Директор</button>
                            <button type="button" class="btn btn-danger w-25 manager">Менеджер</button>
                            <button type="button" class="btn btn-danger w-25 performer">Исполнитель</button>
                        @elseif(\Illuminate\Support\Facades\Auth::user()->role === 'Исполнитель')
                            <button type="button" class="btn btn-danger w-25" disabled>Директор</button>
                            <button type="button" class="btn btn-danger w-25" disabled>Менеджер</button>
                            <button type="button" class="btn btn-danger w-25 performer">Исполнитель</button>
                        @endif
                    </div>
                    <div style="display: flex;flex-wrap: wrap; margin-top: 10px" class="list">

                    </div>
                </div>
                <input type="hidden" class="role" value="{{ \Illuminate\Support\Facades\Auth::user()->role }}">
                <button type="button" class="btn btn-primary w-100 save">Сохранить все записи</button>
            </div>
        </div>
    </div>
</x-app-layout>
