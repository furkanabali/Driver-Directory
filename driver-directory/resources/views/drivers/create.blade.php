@extends('layouts.app')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <div>
        <h1 class="text-3xl font-extrabold text-gray-900 mb-1">Yeni Sürücü Ekle</h1>
        <p class="text-gray-500">Sisteme yeni bir sürücü kaydı oluşturun.</p>
    </div>
    <a href="{{ route('drivers.index') }}" class="flex items-center text-gray-600 hover:text-blue-600 font-medium transition-colors bg-white px-4 py-2 rounded-lg border border-gray-200 shadow-sm hover:shadow">
        <span class="mr-2">&larr;</span> Listeye Dön
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden max-w-3xl">
    <div class="p-6 sm:p-8">
        <form action="{{ route('drivers.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="col-span-1 md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Ad Soyad</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-lg">👤</span>
                        <input type="text" name="full_name" value="{{ old('full_name') }}" class="w-full pl-10 border-gray-200 rounded-xl bg-gray-50 p-3 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all @error('full_name') border-red-500 ring-1 ring-red-500 @enderror" placeholder="Örn: Furkan Abalı">
                    </div>
                    @error('full_name') <span class="text-red-500 text-sm mt-1.5 flex items-center gap-1">⚠️ {{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Telefon Numarası</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-lg">📱</span>
                        <input type="text" name="phone" id="phone_input" value="{{ old('phone') }}" maxlength="10" class="w-full pl-10 border-gray-200 rounded-xl bg-gray-50 p-3 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all @error('phone') border-red-500 ring-1 ring-red-500 @enderror" placeholder="5XX XXX XX XX">
                    </div>
                    <p class="text-xs text-gray-400 mt-1.5">Başında 0 olmadan 10 haneli giriniz.</p>
                    @error('phone') <span class="text-red-500 text-sm mt-1.5 flex items-center gap-1">⚠️ {{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Araç Sınıfı</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-lg">🚙</span>
                        <select name="vehicle_type" class="w-full pl-10 border-gray-200 rounded-xl bg-gray-50 p-3 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all @error('vehicle_type') border-red-500 ring-1 ring-red-500 @enderror">
                            <option value="">Seçiniz</option>
                            <option value="Otomobil" {{ old('vehicle_type') == 'Otomobil' ? 'selected' : '' }}>Otomobil</option>
                            <option value="Minivan" {{ old('vehicle_type') == 'Minivan' ? 'selected' : '' }}>Minivan</option>
                            <option value="Kamyonet" {{ old('vehicle_type') == 'Kamyonet' ? 'selected' : '' }}>Kamyonet</option>
                            <option value="Motosiklet" {{ old('vehicle_type') == 'Motosiklet' ? 'selected' : '' }}>Motosiklet</option>
                        </select>
                    </div>
                    @error('vehicle_type') <span class="text-red-500 text-sm mt-1.5 flex items-center gap-1">⚠️ {{ $message }}</span> @enderror
                </div>

                <div class="col-span-1 md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-3">Sürücü Durumu</label>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <label class="flex-1 border border-gray-200 rounded-xl p-4 cursor-pointer hover:bg-blue-50 transition-colors flex items-center gap-3 @error('status') border-red-500 @enderror">
                            <input type="radio" name="status" value="active" class="w-5 h-5 text-blue-600 focus:ring-blue-500" {{ old('status', 'active') == 'active' ? 'checked' : '' }}>
                            <div>
                                <span class="block font-bold text-gray-800">Aktif</span>
                                <span class="block text-sm text-gray-500">Sürücü göreve hazır.</span>
                            </div>
                        </label>
                        <label class="flex-1 border border-gray-200 rounded-xl p-4 cursor-pointer hover:bg-red-50 transition-colors flex items-center gap-3 @error('status') border-red-500 @enderror">
                            <input type="radio" name="status" value="inactive" class="w-5 h-5 text-red-600 focus:ring-red-500" {{ old('status') == 'inactive' ? 'checked' : '' }}>
                            <div>
                                <span class="block font-bold text-gray-800">Pasif</span>
                                <span class="block text-sm text-gray-500">Sürücü şu an çalışmıyor.</span>
                            </div>
                        </label>
                    </div>
                    @error('status') <span class="text-red-500 text-sm mt-1.5 flex items-center gap-1">⚠️ {{ $message }}</span> @enderror
                </div>
            </div>

            <div class="border-t border-gray-100 pt-6 flex justify-end">
                <button type="submit" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white px-8 py-3.5 rounded-xl font-bold transition-transform transform hover:scale-105 shadow-md flex justify-center items-center gap-2">
                    <span>💾</span> Kaydı Tamamla
                </button>
            </div>
        </form>
    </div>
</div>


<script>
    document.getElementById('phone_input').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>
@endsection