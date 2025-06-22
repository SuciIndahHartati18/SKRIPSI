<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTS Manhajussalam Jorong</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    
    <div class="bg-white flex flex-col justify-between items-center px-6 gap-3" style="font-family: Times New Roman, Times, serif;">
        <div class="w-full flex flex-col gap-3">
            <div class="w-full flex justify-between items-center">
                <img src="{{ asset('images/Logo.png') }}" alt="Logo's" class="w-24 bg-cover bg-center">
                
                <div class="flex flex-col gap-1">
                    <p class="font-bold text-center text-4xl">MTs.S Manhajussalam</p>
                    <p class="text-center text-xl">Jl. A Yani Km 98,5 Jorong Kec. Jorong, Kab. Tanah Laut</p>
                </div>
    
                <span></span>
            </div>
    
            <span class="w-full" style="border: 1px solid;"></span>
            
            {{ $slot }}
        </div>

        <div class="w-full flex justify-end">
            <div class="w-1/5 flex flex-col justify-between">
                <div class="flex flex-col text-center px-4">
                    <span>Jorong, {{ \Carbon\Carbon::now()->translatedFormat('l d-F-Y') }}</span>
                    <span>Kepala Sekolah</span>
                </div>

                <br><br><br><br>

                <span class="w-full" style="border: 1px solid;"></span>
            </div>
        </div>
    </div>

</body>
</html>