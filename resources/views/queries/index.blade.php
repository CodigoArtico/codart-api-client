<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-50 dark:bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codart API Client - Consultas en Vivo</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="h-full text-gray-800 dark:text-gray-100 font-sans antialiased bg-gray-50 dark:bg-gray-950">

    <!-- Header / Navbar -->
    <header class="sticky top-0 z-30 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-tr from-purple-600 to-indigo-500 text-white shadow-lg shadow-purple-500/25">
                    <i class="fa-solid fa-code-branch text-lg"></i>
                </div>
                <div>
                    <h1 class="text-lg font-bold text-gray-900 dark:text-white leading-tight">Codart API Client</h1>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Portal de Consultas y Verificación de APIs</p>
                </div>
            </div>
            
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-950/60 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-800">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    API Online
                </span>
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Welcome Banner -->
        <div class="mb-8 p-6 md:p-8 rounded-2xl bg-gradient-to-r from-purple-900 via-indigo-900 to-slate-900 text-white shadow-xl relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-purple-500/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="relative z-10">
                <span class="inline-block px-3 py-1 rounded-lg bg-white/10 backdrop-blur-md text-xs font-semibold text-purple-200 uppercase tracking-wider mb-2">
                    Ecosistema Codart
                </span>
                <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight">Centro de Consultas de API</h2>
                <p class="mt-2 text-sm md:text-base text-gray-300 max-w-3xl leading-relaxed">
                    Consulta en tiempo real la información de ciudadanas, empresas, teléfonos, placas y más a través de nuestros servicios REST autenticados.
                </p>
            </div>
        </div>

        <!-- Cards Grid -->
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">

            <!-- 1. DNI Standard -->
            <section id="busqueda-dni" class="rounded-2xl border border-sky-100 bg-gradient-to-br from-sky-50/50 to-white p-5 shadow-sm dark:border-sky-900/60 dark:from-sky-950/30 dark:to-gray-900">
                <div class="flex items-start justify-between gap-4 mb-4">
                    <div>
                        <span class="inline-flex items-center rounded-full bg-sky-100 px-3 py-1 text-[10px] font-bold text-sky-700 dark:bg-sky-900/60 dark:text-sky-200">
                            RENIEC - DNI
                        </span>
                        <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">Búsqueda por DNI</h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Consulta la información del ciudadano por DNI de 8 dígitos.</p>
                    </div>
                    <div class="flex p-3 items-center justify-center rounded-xl bg-sky-500 text-white shadow-lg shadow-sky-500/20">
                        <i class="fa-regular fa-id-card text-xl"></i>
                    </div>
                </div>

                <form onsubmit="handleQuerySubmit(event, '/api/dni', 'resultado-dni')" class="space-y-4">
                    <div>
                        <label for="input-dni" class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Número de DNI</label>
                        <input type="text" id="input-dni" name="dni" maxlength="8" required placeholder="Ej: 71234567"
                            class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                    </div>
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-sky-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-sky-700 transition active:scale-[0.99]">
                        <i class="fa-solid fa-magnifying-glass"></i> Consultar DNI
                    </button>
                </form>

                <div id="resultado-dni" class="mt-4 hidden"></div>
            </section>

            <!-- 2. RUC Standard -->
            <section id="busqueda-ruc" class="rounded-2xl border border-sky-100 bg-gradient-to-br from-sky-50/50 to-white p-5 shadow-sm dark:border-sky-900/60 dark:from-sky-950/30 dark:to-gray-900">
                <div class="flex items-start justify-between gap-4 mb-4">
                    <div>
                        <span class="inline-flex items-center rounded-full bg-sky-100 px-3 py-1 text-[10px] font-bold text-sky-700 dark:bg-sky-900/60 dark:text-sky-200">
                            SUNAT - RUC
                        </span>
                        <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">Búsqueda por RUC</h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Consulta datos de contribuyente y razón social SUNAT por RUC.</p>
                    </div>
                    <div class="flex p-3 items-center justify-center rounded-xl bg-sky-500 text-white shadow-lg shadow-sky-500/20">
                        <i class="fa-solid fa-building-columns text-xl"></i>
                    </div>
                </div>

                <form onsubmit="handleQuerySubmit(event, '/api/ruc', 'resultado-ruc')" class="space-y-4">
                    <div>
                        <label for="input-ruc" class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Número de RUC</label>
                        <input type="text" id="input-ruc" name="ruc" maxlength="11" required placeholder="Ej: 20123456789"
                            class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                    </div>
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-sky-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-sky-700 transition active:scale-[0.99]">
                        <i class="fa-solid fa-magnifying-glass"></i> Consultar RUC
                    </button>
                </form>

                <div id="resultado-ruc" class="mt-4 hidden"></div>
            </section>

            <!-- 3. DNI Virtual -->
            <section id="busqueda-fd-dniv" class="rounded-2xl border border-slate-200 bg-gradient-to-br from-slate-50/50 to-white p-5 shadow-sm dark:border-slate-800 dark:from-slate-900/40 dark:to-gray-900">
                <div class="flex items-start justify-between gap-4 mb-4">
                    <div>
                        <span class="inline-flex items-center rounded-full bg-slate-200 px-3 py-1 text-[10px] font-bold text-slate-700 dark:bg-slate-800 dark:text-slate-200">
                            RENIEC - VIRTUAL
                        </span>
                        <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">DNI Virtual</h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Consulta la ficha virtual de identidad del ciudadano.</p>
                    </div>
                    <div class="flex p-3 items-center justify-center rounded-xl bg-slate-700 text-white shadow-lg shadow-slate-700/20">
                        <i class="fa-solid fa-address-card text-xl"></i>
                    </div>
                </div>

                <form onsubmit="handleQuerySubmit(event, '/api/dniv', 'resultado-dniv')" class="space-y-4">
                    <div>
                        <label for="input-dniv" class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">DNI</label>
                        <input type="text" id="input-dniv" name="dni" maxlength="8" required placeholder="00000000"
                            class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-slate-500 focus:ring-2 focus:ring-slate-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                    </div>
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-slate-800 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-900 transition active:scale-[0.99]">
                        <i class="fa-solid fa-magnifying-glass"></i> Consultar DNI Virtual
                    </button>
                </form>

                <div id="resultado-dniv" class="mt-4 hidden"></div>
            </section>

            <!-- 4. DNI Electrónico -->
            <section id="busqueda-fd-dnivel" class="rounded-2xl border border-slate-200 bg-gradient-to-br from-slate-50/50 to-white p-5 shadow-sm dark:border-slate-800 dark:from-slate-900/40 dark:to-gray-900">
                <div class="flex items-start justify-between gap-4 mb-4">
                    <div>
                        <span class="inline-flex items-center rounded-full bg-slate-200 px-3 py-1 text-[10px] font-bold text-slate-700 dark:bg-slate-800 dark:text-slate-200">
                            RENIEC - ELECTRÓNICO
                        </span>
                        <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">DNI Electrónico</h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Consulta la información del DNI electrónico.</p>
                    </div>
                    <div class="flex p-3 items-center justify-center rounded-xl bg-slate-700 text-white shadow-lg shadow-slate-700/20">
                        <i class="fa-solid fa-id-card text-xl"></i>
                    </div>
                </div>

                <form onsubmit="handleQuerySubmit(event, '/api/dnivel', 'resultado-dnivel')" class="space-y-4">
                    <div>
                        <label for="input-dnivel" class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">DNI</label>
                        <input type="text" id="input-dnivel" name="dni" maxlength="8" required placeholder="00000000"
                            class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-slate-500 focus:ring-2 focus:ring-slate-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                    </div>
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-slate-800 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-900 transition active:scale-[0.99]">
                        <i class="fa-solid fa-magnifying-glass"></i> Consultar DNI Electrónico
                    </button>
                </form>

                <div id="resultado-dnivel" class="mt-4 hidden"></div>
            </section>

            <!-- 5. DNI Full -->
            <section id="busqueda-fd-dni" class="rounded-2xl border border-violet-100 bg-gradient-to-br from-violet-50/50 to-white p-5 shadow-sm dark:border-violet-900/60 dark:from-violet-950/30 dark:to-gray-900">
                <div class="flex items-start justify-between gap-4 mb-4">
                    <div>
                        <span class="inline-flex items-center rounded-full bg-violet-100 px-3 py-1 text-[10px] font-bold text-violet-700 dark:bg-violet-900/60 dark:text-violet-200">
                            INFORMACIÓN COMPLETA
                        </span>
                        <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">DNI Full</h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Ficha completa de datos personales y residencia.</p>
                    </div>
                    <div class="flex p-3 items-center justify-center rounded-xl bg-violet-600 text-white shadow-lg shadow-violet-600/20">
                        <i class="fa-solid fa-user-gear text-xl"></i>
                    </div>
                </div>

                <form onsubmit="handleQuerySubmit(event, '/api/dni-full', 'resultado-fd-dni')" class="space-y-4">
                    <div>
                        <label for="input-fd-dni" class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">DNI</label>
                        <input type="text" id="input-fd-dni" name="dni" maxlength="8" required placeholder="00000000"
                            class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-violet-500 focus:ring-2 focus:ring-violet-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                    </div>
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-violet-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-violet-700 transition active:scale-[0.99]">
                        <i class="fa-solid fa-magnifying-glass"></i> Consultar DNI Full
                    </button>
                </form>

                <div id="resultado-fd-dni" class="mt-4 hidden"></div>
            </section>

            <!-- 6. Nombres -->
            <section id="busqueda-fd-nm" class="rounded-2xl border border-violet-100 bg-gradient-to-br from-violet-50/50 to-white p-5 shadow-sm dark:border-violet-900/60 dark:from-violet-950/30 dark:to-gray-900">
                <div class="flex items-start justify-between gap-4 mb-4">
                    <div>
                        <span class="inline-flex items-center rounded-full bg-violet-100 px-3 py-1 text-[10px] font-bold text-violet-700 dark:bg-violet-900/60 dark:text-violet-200">
                            BÚSQUEDA POR NOMBRE
                        </span>
                        <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">Búsqueda por Nombres</h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Encuentra registros por nombres y apellidos.</p>
                    </div>
                    <div class="flex p-3 items-center justify-center rounded-xl bg-violet-600 text-white shadow-lg shadow-violet-600/20">
                        <i class="fa-solid fa-users-viewfinder text-xl"></i>
                    </div>
                </div>

                <form onsubmit="handleQuerySubmit(event, '/api/nombres', 'resultado-fd-nm')" class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Nombres</label>
                            <input type="text" name="nombres" required placeholder="Juan" class="w-full rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Paterno</label>
                            <input type="text" name="paterno" required placeholder="Perez" class="w-full rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Materno</label>
                            <input type="text" name="materno" required placeholder="Gomez" class="w-full rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        </div>
                    </div>
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-violet-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-violet-700 transition active:scale-[0.99]">
                        <i class="fa-solid fa-magnifying-glass"></i> Consultar por Nombres
                    </button>
                </form>

                <div id="resultado-fd-nm" class="mt-4 hidden"></div>
            </section>

            <!-- 7. Teléfonos -->
            <section id="busqueda-fd-telp" class="rounded-2xl border border-indigo-100 bg-gradient-to-br from-indigo-50/50 to-white p-5 shadow-sm dark:border-indigo-900/60 dark:from-indigo-950/30 dark:to-gray-900">
                <div class="flex items-start justify-between gap-4 mb-4">
                    <div>
                        <span class="inline-flex items-center rounded-full bg-indigo-100 px-3 py-1 text-[10px] font-bold text-indigo-700 dark:bg-indigo-900/60 dark:text-indigo-200">
                            TELEFONÍA Y CELULARES
                        </span>
                        <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">Consulta de Teléfono / Celular</h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Obtén la titularidad o números asociados a un DNI o número telefónico.</p>
                    </div>
                    <div class="flex p-3 items-center justify-center rounded-xl bg-indigo-600 text-white shadow-lg shadow-indigo-600/20">
                        <i class="fa-solid fa-mobile-screen-button text-xl"></i>
                    </div>
                </div>

                <form onsubmit="handleQuerySubmit(event, '/api/telefonos', 'resultado-fd-telp')" class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">DNI o Número de Celular</label>
                        <input type="text" name="query" required placeholder="Ej: 987654321 o 71234567"
                            class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                    </div>
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-indigo-700 transition active:scale-[0.99]">
                        <i class="fa-solid fa-magnifying-glass"></i> Consultar Teléfonos
                    </button>
                </form>

                <div id="resultado-fd-telp" class="mt-4 hidden"></div>
            </section>

            <!-- 8. Placa Vehicular -->
            <section id="busqueda-fd-pla" class="rounded-2xl border border-emerald-100 bg-gradient-to-br from-emerald-50/50 to-white p-5 shadow-sm dark:border-emerald-900/60 dark:from-emerald-950/30 dark:to-gray-900">
                <div class="flex items-start justify-between gap-4 mb-4">
                    <div>
                        <span class="inline-flex items-center rounded-full bg-emerald-100 px-3 py-1 text-[10px] font-bold text-emerald-700 dark:bg-emerald-900/60 dark:text-emerald-200">
                            SUNARP - VEHICULAR
                        </span>
                        <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">Consulta de Placa</h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Información vehicular por número de placa.</p>
                    </div>
                    <div class="flex p-3 items-center justify-center rounded-xl bg-emerald-600 text-white shadow-lg shadow-emerald-600/20">
                        <i class="fa-solid fa-car-side text-xl"></i>
                    </div>
                </div>

                <form onsubmit="handleQuerySubmit(event, '/api/placa', 'resultado-fd-pla')" class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Número de Placa</label>
                        <input type="text" name="placa" required placeholder="Ej: ABC123"
                            class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white uppercase">
                    </div>
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-emerald-700 transition active:scale-[0.99]">
                        <i class="fa-solid fa-magnifying-glass"></i> Consultar Placa
                    </button>
                </form>

                <div id="resultado-fd-pla" class="mt-4 hidden"></div>
            </section>

        </div>

    </main>

    <!-- Footer -->
    <footer class="mt-16 border-t border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 py-6">
        <div class="max-w-7xl mx-auto px-4 text-center text-xs text-gray-500 dark:text-gray-400">
            <p>Codart API Client &copy; {{ date('Y') }} — Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- JavaScript Handler for AJAX Queries -->
    <script>
        async function handleQuerySubmit(event, endpoint, containerId) {
            event.preventDefault();
            const form = event.target;
            const submitBtn = form.querySelector('button[type="submit"]');
            const resultBox = document.getElementById(containerId);
            
            // Extract form inputs into object
            const formData = new FormData(form);
            const params = {};
            formData.forEach((val, key) => { params[key] = val; });

            // UI loading state
            const originalBtnHtml = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = `<i class="fa-solid fa-circle-notch fa-spin"></i> Consultando...`;
            
            resultBox.classList.remove('hidden');
            resultBox.innerHTML = `
                <div class="p-4 rounded-xl bg-gray-900 text-gray-200 text-xs font-mono border border-gray-800 animate-pulse flex items-center justify-between">
                    <span>Enviando petición a la API...</span>
                    <i class="fa-solid fa-spinner fa-spin text-purple-400"></i>
                </div>
            `;

            try {
                const response = await fetch('/api/execute-query', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        endpoint: endpoint,
                        method: 'GET',
                        params: params
                    })
                });

                const data = await response.json();
                renderJsonResponse(resultBox, data);
            } catch (err) {
                renderJsonResponse(resultBox, {
                    status: 500,
                    success: false,
                    error: err.message || 'Error inesperado al conectar con el servidor.'
                });
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnHtml;
            }
        }

        function renderJsonResponse(container, data) {
            const formattedJson = JSON.stringify(data, null, 2);
            const isSuccess = data.success !== false && data.status >= 200 && data.status < 300;
            const badgeColor = isSuccess ? 'bg-emerald-500' : 'bg-rose-500';

            container.innerHTML = `
                <div class="rounded-xl border border-gray-800 bg-gray-950 overflow-hidden shadow-lg">
                    <div class="px-4 py-2 bg-gray-900 border-b border-gray-800 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full ${badgeColor}"></span>
                            <span class="text-xs font-mono font-semibold text-gray-300">Status: ${data.status || 200}</span>
                        </div>
                        <button onclick="copyToClipboard(this)" data-json='${formattedJson.replace(/'/g, "&apos;")}' type="button" 
                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-[11px] font-medium bg-gray-800 hover:bg-gray-700 text-gray-300 transition">
                            <i class="fa-regular fa-copy"></i> Copiar JSON
                        </button>
                    </div>
                    <pre class="p-4 text-xs font-mono text-emerald-400 overflow-x-auto max-h-80 leading-relaxed">${escapeHtml(formattedJson)}</pre>
                </div>
            `;
        }

        function escapeHtml(text) {
            return text
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }

        function copyToClipboard(btn) {
            const jsonText = btn.getAttribute('data-json');
            navigator.clipboard.writeText(jsonText).then(() => {
                const originalHtml = btn.innerHTML;
                btn.innerHTML = `<i class="fa-solid fa-check text-emerald-400"></i> Copiado!`;
                setTimeout(() => { btn.innerHTML = originalHtml; }, 2000);
            });
        }
    </script>
</body>
</html>
