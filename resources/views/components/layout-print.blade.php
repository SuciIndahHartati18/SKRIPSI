<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100">
    
    <div class="bg-white h-screen flex flex-col justify-between items-center p-6" style="font-family: Times New Roman, Times, serif;">
        <div class="w-full flex flex-col gap-3">
            <!-- heading -->
            <div class="w-full flex justify-between items-center">
                <img src="{{ asset('images/Logo.png') }}" alt="Logo's" class="w-24 bg-cover bg-center">
                
                <div class="flex flex-col gap-1">
                    <p class="font-bold text-center text-4xl">MTs.S Manhajussalam</p>
                    <p class="text-center text-xl">Jl. A Yani Km 98,5 Jorong Kec. Jorong, Kab. Tanah Laut</p>
                </div>
        
                <span></span>
            </div>
        
            <span class="w-full" style="border: 1px solid;"></span>
            
            <!-- tabel -->
            <div class="w-full flex flex-col items-center gap-3">
                {{ $slot }}
            </div>
        </div>
    
        <!-- footing -->
        <div class="w-full h-32 flex justify-end">
            <div class="w-1/6 flex flex-col justify-between">
                <div class="flex flex-col px-4">
                    <span>Jorong,</span>
                    <span>Kepala Sekolah</span>
                </div>
    
                <span class="w-full" style="border: 1px solid;"></span>
            </div>
        </div>
    </div>

</body>

</html>