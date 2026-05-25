@extends('layouts.app')

@section('content')

<div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl shadow-lg p-6 sm:p-10 mb-8 text-white flex flex-col sm:flex-row justify-between items-center gap-6">
    <div>
        <h1 class="text-3xl font-extrabold mb-3">Sürücü Yönetim Paneline Hoş Geldiniz</h1>
        <p class="text-blue-100 text-lg">Sistemdeki sürücüleri takip edin, filtreleyin ve yeni kayıtlar oluşturun.</p>
    </div>
    <a href="{{ route('drivers.create') }}" class="bg-white text-blue-700 hover:bg-gray-50 px-6 py-3 rounded-xl font-bold transition-all shadow-md transform hover:scale-105 whitespace-nowrap">
        + Yeni Sürücü Ekle
    </a>
</div>


<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center gap-4">
        <div class="bg-blue-100 p-4 rounded-lg text-blue-600 text-2xl">👥</div>
        <div>
            <p class="text-sm font-medium text-gray-500">Toplam Sürücü</p>
            <p class="text-2xl font-bold text-gray-900">{{ $stats['total'] }}</p>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center gap-4">
        <div class="bg-green-100 p-4 rounded-lg text-green-600 text-2xl">✅</div>
        <div>
            <p class="text-sm font-medium text-gray-500">Aktif Sürücüler</p>
            <p class="text-2xl font-bold text-gray-900">{{ $stats['active'] }}</p>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center gap-4">
        <div class="bg-red-100 p-4 rounded-lg text-red-600 text-2xl">❌</div>
        <div>
            <p class="text-sm font-medium text-gray-500">Pasif Sürücüler</p>
            <p class="text-2xl font-bold text-gray-900">{{ $stats['inactive'] }}</p>
        </div>
    </div>
</div>


@if(session('success'))
    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded-r-lg mb-6 shadow-sm">
        <p class="font-medium">{{ session('success') }}</p>
    </div>
@endif


<div class="bg-white p-5 rounded-xl shadow-sm mb-6 border border-gray-100">
    <form action="{{ route('drivers.index') }}" method="GET" class="flex flex-col md:flex-row gap-4 items-end">
        <div class="w-full md:w-2/5">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Sürücü Durumu</label>
            <select name="status" class="w-full border-gray-200 rounded-lg bg-gray-50 p-2.5 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                <option value="">Tümü</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Pasif</option>
            </select>
        </div>
        <div class="w-full md:w-2/5">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Araç Sınıfı</label>
            <select name="vehicle_type" class="w-full border-gray-200 rounded-lg bg-gray-50 p-2.5 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                <option value="">Tümü</option>
                <option value="Otomobil" {{ request('vehicle_type') == 'Otomobil' ? 'selected' : '' }}>Otomobil</option>
                <option value="Minivan" {{ request('vehicle_type') == 'Minivan' ? 'selected' : '' }}>Minivan</option>
                <option value="Kamyonet" {{ request('vehicle_type') == 'Kamyonet' ? 'selected' : '' }}>Kamyonet</option>
                <option value="Motosiklet" {{ request('vehicle_type') == 'Motosiklet' ? 'selected' : '' }}>Motosiklet</option>
            </select>
        </div>
        <div class="flex gap-3 w-full md:w-auto">
            <button type="submit" class="w-full md:w-auto bg-gray-800 hover:bg-gray-900 text-white px-6 py-2.5 rounded-lg font-medium transition-colors">Filtrele</button>
            <a href="{{ route('drivers.index') }}" class="w-full md:w-auto text-center bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-2.5 rounded-lg font-medium transition-colors">Temizle</a>
        </div>
    </form>
</div>


<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-10">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50/80">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Sürücü Profili</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">İletişim</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Araç Tipi</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Durum</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @forelse($drivers as $driver)
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold text-lg">
                                {{ mb_substr($driver->full_name, 0, 1) }}
                            </div>
                            <div class="ml-4">
                                <div class="font-semibold text-gray-900">{{ $driver->full_name }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-700 font-medium">{{ $driver->phone }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-gray-100 text-gray-800">
                            {{ $driver->vehicle_type }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($driver->status === 'active')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 border border-green-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-600"></span> Aktif
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-gray-600 border border-red-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Pasif
                            </span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 whitespace-nowrap text-center">
                        <div class="flex flex-col items-center justify-center">
                            <div class="text-6xl mb-4">📭</div>
                            <h3 class="text-lg font-medium text-gray-900 mb-1">Kayıt Bulunamadı</h3>
                            <p class="text-gray-500">Belirlediğiniz kriterlere uygun veya sisteme kayıtlı bir sürücü yok.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection