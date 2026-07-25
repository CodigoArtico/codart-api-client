<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-50 dark:bg-gray-950">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codart API Client - 20 Consultas en Vivo</title>
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

    <!-- Header / Navbar (Sticky & Always Visible) -->
    <header
        class="sticky top-0 z-50 bg-white/90 dark:bg-gray-900/90 backdrop-blur-md border-b border-gray-200 dark:border-gray-800 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{ asset('img/portada.png') }}" alt="Codart API Logo"
                    class="h-10 w-auto object-contain rounded-lg shadow-sm">
                <div>
                    <h1 class="text-lg font-bold text-gray-900 dark:text-white leading-tight">Codart API Client</h1>
                    <p class="text-xs text-gray-500 dark:text-gray-400 leading-none">Portal de Consultas y Verificación
                        de APIs</p>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <span
                    class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs whitespace-nowrap font-semibold bg-emerald-100 text-emerald-800 dark:bg-emerald-950/60 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-800">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    20 APIs Conectadas
                </span>
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- <!-- Welcome Banner --> --}}
        {{-- <div class="mb-8 p-6 md:p-8 rounded-2xl bg-gradient-to-r from-purple-900 via-indigo-900 to-slate-900 text-white shadow-xl relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-purple-500/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="relative z-10">
                <span class="inline-block px-3 py-1 rounded-lg bg-white/10 backdrop-blur-md text-xs font-semibold text-purple-200 uppercase tracking-wider mb-2">
                    Ecosistema Codart API
                </span>
                <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight">Centro de Consultas REST</h2>
                <p class="mt-2 text-sm md:text-base text-gray-300 max-w-3xl leading-relaxed">
                    Ejecuta consultas en tiempo real. Alterna entre la <strong class="text-white">Vista Renderizada</strong> (con visor automático de Imágenes y PDFs Base64) y la <strong class="text-white">Respuesta JSON</strong>.
                </p>
            </div>
        </div> --}}

        <!-- Cards Grid (items-start ensures top alignment for all cards) -->
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 items-start">

            <!-- 1. DNI Standard -->
            <section id="busqueda-dni"
                class="rounded-2xl border border-sky-100 bg-gradient-to-br from-sky-50/50 to-white p-5 shadow-sm dark:border-sky-900/60 dark:from-sky-950/30 dark:to-gray-900">
                <div>
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span
                                class="inline-flex items-center rounded-full bg-sky-100 px-3 py-1 text-[10px] font-bold text-sky-700 dark:bg-sky-900/60 dark:text-sky-200">
                                RENIEC - DNI
                            </span>
                            <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">1. Búsqueda por DNI</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Consulta la información del
                                ciudadano por DNI de 8 dígitos.</p>
                        </div>
                        <div
                            class="flex p-3 items-center justify-center rounded-xl bg-sky-500 text-white shadow-lg shadow-sky-500/20">
                            <i class="fa-regular fa-id-card text-xl"></i>
                        </div>
                    </div>

                    <form onsubmit="handleQuerySubmit(event, '/api/v1/consultas/reniec/dni/{dni}', 'resultado-dni')"
                        class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Número de
                                DNI</label>
                            <input type="text" name="dni" maxlength="8" required placeholder="Ej: 71234567"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        </div>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-sky-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-sky-700 transition active:scale-[0.99]">
                            <i class="fa-solid fa-magnifying-glass"></i> Consultar DNI RENIEC
                        </button>
                    </form>
                </div>
                <div id="resultado-dni" class="mt-4 hidden col-span-1 xl:col-span-2"></div>
            </section>

            <!-- 2. RUC Standard -->
            <section id="busqueda-ruc"
                class="rounded-2xl border border-sky-100 bg-gradient-to-br from-sky-50/50 to-white p-5 shadow-sm dark:border-sky-900/60 dark:from-sky-950/30 dark:to-gray-900">
                <div>
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span
                                class="inline-flex items-center rounded-full bg-sky-100 px-3 py-1 text-[10px] font-bold text-sky-700 dark:bg-sky-900/60 dark:text-sky-200">
                                SUNAT - RUC
                            </span>
                            <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">2. Búsqueda por RUC</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Consulta datos de contribuyente y
                                razón social SUNAT por RUC.</p>
                        </div>
                        <div
                            class="flex p-3 items-center justify-center rounded-xl bg-sky-500 text-white shadow-lg shadow-sky-500/20">
                            <i class="fa-solid fa-building-columns text-xl"></i>
                        </div>
                    </div>

                    <form onsubmit="handleQuerySubmit(event, '/api/v1/consultas/sunat/ruc/{ruc}', 'resultado-ruc')"
                        class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Número de
                                RUC</label>
                            <input type="text" name="ruc" maxlength="11" required placeholder="Ej: 20123456789"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        </div>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-sky-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-sky-700 transition active:scale-[0.99]">
                            <i class="fa-solid fa-magnifying-glass"></i> Consultar RUC SUNAT
                        </button>
                    </form>
                </div>
                <div id="resultado-ruc" class="mt-4 hidden col-span-1 xl:col-span-2"></div>
            </section>

            <!-- 3. DNI Virtual -->
            <section id="busqueda-fd-dniv"
                class="rounded-2xl border border-slate-200 bg-gradient-to-br from-slate-50/50 to-white p-5 shadow-sm dark:border-slate-800 dark:from-slate-900/40 dark:to-gray-900">
                <div>
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span
                                class="inline-flex items-center rounded-full bg-slate-200 px-3 py-1 text-[10px] font-bold text-slate-700 dark:bg-slate-800 dark:text-slate-200">
                                RENIEC - VIRTUAL
                            </span>
                            <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">3. DNI Virtual</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Ficha de datos básicos e
                                identidad ciudadana.</p>
                        </div>
                        <div
                            class="flex p-3 items-center justify-center rounded-xl bg-slate-700 text-white shadow-lg shadow-slate-700/20">
                            <i class="fa-solid fa-address-card text-xl"></i>
                        </div>
                    </div>

                    <form onsubmit="handleQuerySubmit(event, '/api/v1/consultas/fd/dniv/{dni}', 'resultado-dniv')"
                        class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">DNI</label>
                            <input type="text" name="dni" maxlength="8" required placeholder="00000000"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-slate-500 focus:ring-2 focus:ring-slate-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        </div>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-slate-800 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-900 transition active:scale-[0.99]">
                            <i class="fa-solid fa-magnifying-glass"></i> Consultar DNI Virtual
                        </button>
                    </form>
                </div>
                <div id="resultado-dniv" class="mt-4 hidden col-span-1 xl:col-span-2"></div>
            </section>

            <!-- 4. DNI Electrónico -->
            <section id="busqueda-fd-dnivel"
                class="rounded-2xl border border-slate-200 bg-gradient-to-br from-slate-50/50 to-white p-5 shadow-sm dark:border-slate-800 dark:from-slate-900/40 dark:to-gray-900">
                <div>
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span
                                class="inline-flex items-center rounded-full bg-slate-200 px-3 py-1 text-[10px] font-bold text-slate-700 dark:bg-slate-800 dark:text-slate-200">
                                RENIEC - ELECTRÓNICO
                            </span>
                            <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">4. DNI Electrónico</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Información ampliada del DNI
                                electrónico.</p>
                        </div>
                        <div
                            class="flex p-3 items-center justify-center rounded-xl bg-slate-700 text-white shadow-lg shadow-slate-700/20">
                            <i class="fa-solid fa-id-card text-xl"></i>
                        </div>
                    </div>

                    <form onsubmit="handleQuerySubmit(event, '/api/v1/consultas/fd/dnivel/{dni}', 'resultado-dnivel')"
                        class="space-y-4">
                        <div>
                            <label
                                class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">DNI</label>
                            <input type="text" name="dni" maxlength="8" required placeholder="00000000"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-slate-500 focus:ring-2 focus:ring-slate-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        </div>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-slate-800 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-900 transition active:scale-[0.99]">
                            <i class="fa-solid fa-magnifying-glass"></i> Consultar DNI Electrónico
                        </button>
                    </form>
                </div>
                <div id="resultado-dnivel" class="mt-4 hidden col-span-1 xl:col-span-2"></div>
            </section>

            <!-- 5. DNI Full -->
            <section id="busqueda-fd-dni"
                class="rounded-2xl border border-violet-100 bg-gradient-to-br from-violet-50/50 to-white p-5 shadow-sm dark:border-violet-900/60 dark:from-violet-950/30 dark:to-gray-900">
                <div>
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span
                                class="inline-flex items-center rounded-full bg-violet-100 px-3 py-1 text-[10px] font-bold text-violet-700 dark:bg-violet-900/60 dark:text-violet-200">
                                INFORMACIÓN COMPLETA
                            </span>
                            <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">5. DNI Full</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Ficha completa de datos
                                personales y ubicación.</p>
                        </div>
                        <div
                            class="flex p-3 items-center justify-center rounded-xl bg-violet-600 text-white shadow-lg shadow-violet-600/20">
                            <i class="fa-solid fa-user-gear text-xl"></i>
                        </div>
                    </div>

                    <form onsubmit="handleQuerySubmit(event, '/api/v1/consultas/fd/dni/{dni}', 'resultado-fd-dni')"
                        class="space-y-4">
                        <div>
                            <label
                                class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">DNI</label>
                            <input type="text" name="dni" maxlength="8" required placeholder="00000000"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-violet-500 focus:ring-2 focus:ring-violet-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        </div>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-violet-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-violet-700 transition active:scale-[0.99]">
                            <i class="fa-solid fa-magnifying-glass"></i> Consultar DNI Full
                        </button>
                    </form>
                </div>
                <div id="resultado-fd-dni" class="mt-4 hidden col-span-1 xl:col-span-2"></div>
            </section>

            <!-- 6. DNI Full T -->
            <section id="busqueda-fd-dnit"
                class="rounded-2xl border border-violet-100 bg-gradient-to-br from-violet-50/50 to-white p-5 shadow-sm dark:border-violet-900/60 dark:from-violet-950/30 dark:to-gray-900">
                <div>
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span
                                class="inline-flex items-center rounded-full bg-violet-100 px-3 py-1 text-[10px] font-bold text-violet-700 dark:bg-violet-900/60 dark:text-violet-200">
                                INFORMACIÓN COMPLETA T
                            </span>
                            <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">6. DNI Full T</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Ficha completa de titularidad y
                                registro extendido.</p>
                        </div>
                        <div
                            class="flex p-3 items-center justify-center rounded-xl bg-violet-600 text-white shadow-lg shadow-violet-600/20">
                            <i class="fa-solid fa-id-card-clip text-xl"></i>
                        </div>
                    </div>

                    <form onsubmit="handleQuerySubmit(event, '/api/v1/consultas/fd/dnit/{dni}', 'resultado-fd-dnit')"
                        class="space-y-4">
                        <div>
                            <label
                                class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">DNI</label>
                            <input type="text" name="dni" maxlength="8" required placeholder="00000000"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-violet-500 focus:ring-2 focus:ring-violet-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        </div>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-violet-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-violet-700 transition active:scale-[0.99]">
                            <i class="fa-solid fa-magnifying-glass"></i> Consultar DNI Full T
                        </button>
                    </form>
                </div>
                <div id="resultado-fd-dnit" class="mt-4 hidden col-span-1 xl:col-span-2"></div>
            </section>

            <!-- 7. Nombres -->
            <section id="busqueda-fd-nm"
                class="rounded-2xl border border-violet-100 bg-gradient-to-br from-violet-50/50 to-white p-5 shadow-sm dark:border-violet-900/60 dark:from-violet-950/30 dark:to-gray-900">
                <div>
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span
                                class="inline-flex items-center rounded-full bg-violet-100 px-3 py-1 text-[10px] font-bold text-violet-700 dark:bg-violet-900/60 dark:text-violet-200">
                                BÚSQUEDA POR NOMBRE
                            </span>
                            <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">7. Búsqueda por Nombres
                            </h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Encuentra registros por nombres
                                y apellidos (ingresa al menos 2 campos).</p>
                        </div>
                        <div
                            class="flex p-3 items-center justify-center rounded-xl bg-violet-600 text-white shadow-lg shadow-violet-600/20">
                            <i class="fa-solid fa-users-viewfinder text-xl"></i>
                        </div>
                    </div>

                    <form onsubmit="handleQuerySubmit(event, '/api/v1/consultas/fd/nm', 'resultado-fd-nm')"
                        class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <div>
                                <label
                                    class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Nombres
                                    (n1)</label>
                                <input type="text" name="n1" placeholder="Juan"
                                    class="w-full rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                            </div>
                            <div>
                                <label
                                    class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Paterno
                                    (ap1)</label>
                                <input type="text" name="ap1" placeholder="Perez"
                                    class="w-full rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                            </div>
                            <div>
                                <label
                                    class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Materno
                                    (ap2)</label>
                                <input type="text" name="ap2" placeholder="Gomez"
                                    class="w-full rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-violet-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-violet-700 transition active:scale-[0.99]">
                            <i class="fa-solid fa-magnifying-glass"></i> Consultar por Nombres
                        </button>
                    </form>
                </div>
                <div id="resultado-fd-nm" class="mt-4 hidden col-span-1 xl:col-span-2"></div>
            </section>

            <!-- 8. Árbol Genealógico -->
            <section id="busqueda-fd-ag"
                class="rounded-2xl border border-violet-100 bg-gradient-to-br from-violet-50/50 to-white p-5 shadow-sm dark:border-violet-900/60 dark:from-violet-950/30 dark:to-gray-900">
                <div>
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span
                                class="inline-flex items-center rounded-full bg-violet-100 px-3 py-1 text-[10px] font-bold text-violet-700 dark:bg-violet-900/60 dark:text-violet-200">
                                FAMILIA Y FAMILIARES
                            </span>
                            <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">8. Árbol Genealógico</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Consulta de padres, hijos y
                                núcleo familiar.</p>
                        </div>
                        <div
                            class="flex p-3 items-center justify-center rounded-xl bg-violet-600 text-white shadow-lg shadow-violet-600/20">
                            <i class="fa-solid fa-users text-xl"></i>
                        </div>
                    </div>

                    <form onsubmit="handleQuerySubmit(event, '/api/v1/consultas/fd/ag/{dni}', 'resultado-fd-ag')"
                        class="space-y-4">
                        <div>
                            <label
                                class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">DNI</label>
                            <input type="text" name="dni" maxlength="8" required placeholder="00000000"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-violet-500 focus:ring-2 focus:ring-violet-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        </div>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-violet-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-violet-700 transition active:scale-[0.99]">
                            <i class="fa-solid fa-magnifying-glass"></i> Consultar Árbol Genealógico
                        </button>
                    </form>
                </div>
                <div id="resultado-fd-ag" class="mt-4 hidden col-span-1 xl:col-span-2"></div>
            </section>

            <!-- 9. Dirección -->
            <section id="busqueda-fd-dir"
                class="rounded-2xl border border-blue-100 bg-gradient-to-br from-blue-50/50 to-white p-5 shadow-sm dark:border-blue-900/60 dark:from-blue-950/30 dark:to-gray-900">
                <div>
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span
                                class="inline-flex items-center rounded-full bg-blue-100 px-3 py-1 text-[10px] font-bold text-blue-700 dark:bg-blue-900/60 dark:text-blue-200">
                                DOMICILIO Y UBICACIÓN
                            </span>
                            <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">9. Consulta de Dirección
                            </h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Dirección declarada y ubicación
                                domiciliaria.</p>
                        </div>
                        <div
                            class="flex p-3 items-center justify-center rounded-xl bg-blue-600 text-white shadow-lg shadow-blue-600/20">
                            <i class="fa-solid fa-map-marked-alt text-xl"></i>
                        </div>
                    </div>

                    <form onsubmit="handleQuerySubmit(event, '/api/v1/consultas/fd/dir/{dni}', 'resultado-fd-dir')"
                        class="space-y-4">
                        <div>
                            <label
                                class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">DNI</label>
                            <input type="text" name="dni" maxlength="8" required placeholder="00000000"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        </div>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-blue-700 transition active:scale-[0.99]">
                            <i class="fa-solid fa-magnifying-glass"></i> Consultar Dirección
                        </button>
                    </form>
                </div>
                <div id="resultado-fd-dir" class="mt-4 hidden col-span-1 xl:col-span-2"></div>
            </section>

            <!-- 10. Sueldo -->
            <section id="busqueda-fd-suel"
                class="rounded-2xl border border-blue-100 bg-gradient-to-br from-blue-50/50 to-white p-5 shadow-sm dark:border-blue-900/60 dark:from-blue-950/30 dark:to-gray-900">
                <div>
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span
                                class="inline-flex items-center rounded-full bg-blue-100 px-3 py-1 text-[10px] font-bold text-blue-700 dark:bg-blue-900/60 dark:text-blue-200">
                                INFORMACIÓN ECONÓMICA
                            </span>
                            <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">10. Consulta de Sueldo /
                                Renta</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Información de ingresos y
                                estimación de sueldo.</p>
                        </div>
                        <div
                            class="flex p-3 items-center justify-center rounded-xl bg-blue-600 text-white shadow-lg shadow-blue-600/20">
                            <i class="fa-solid fa-coins text-xl"></i>
                        </div>
                    </div>

                    <form onsubmit="handleQuerySubmit(event, '/api/v1/consultas/fd/suel/{dni}', 'resultado-fd-suel')"
                        class="space-y-4">
                        <div>
                            <label
                                class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">DNI</label>
                            <input type="text" name="dni" maxlength="8" required placeholder="00000000"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        </div>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-blue-700 transition active:scale-[0.99]">
                            <i class="fa-solid fa-magnifying-glass"></i> Consultar Sueldo
                        </button>
                    </form>
                </div>
                <div id="resultado-fd-suel" class="mt-4 hidden col-span-1 xl:col-span-2"></div>
            </section>

            <!-- 11. Teléfono Fijo -->
            <section id="busqueda-fd-telp"
                class="rounded-2xl border border-indigo-100 bg-gradient-to-br from-indigo-50/50 to-white p-5 shadow-sm dark:border-indigo-900/60 dark:from-indigo-950/30 dark:to-gray-900">
                <div>
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span
                                class="inline-flex items-center rounded-full bg-indigo-100 px-3 py-1 text-[10px] font-bold text-indigo-700 dark:bg-indigo-900/60 dark:text-indigo-200">
                                TELEFONÍA FIJA
                            </span>
                            <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">11. Teléfono por DNI</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Números telefónicos fijos
                                vinculados al DNI.</p>
                        </div>
                        <div
                            class="flex p-3 items-center justify-center rounded-xl bg-indigo-600 text-white shadow-lg shadow-indigo-600/20">
                            <i class="fa-solid fa-phone text-xl"></i>
                        </div>
                    </div>

                    <form onsubmit="handleQuerySubmit(event, '/api/v1/consultas/fd/telp/{dni}', 'resultado-fd-telp')"
                        class="space-y-4">
                        <div>
                            <label
                                class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">DNI</label>
                            <input type="text" name="dni" maxlength="8" required placeholder="00000000"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        </div>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-indigo-700 transition active:scale-[0.99]">
                            <i class="fa-solid fa-magnifying-glass"></i> Consultar Teléfono Fijo
                        </button>
                    </form>
                </div>
                <div id="resultado-fd-telp" class="mt-4 hidden col-span-1 xl:col-span-2"></div>
            </section>

            <!-- 12. Celular -->
            <section id="busqueda-fd-telp_cel"
                class="rounded-2xl border border-indigo-100 bg-gradient-to-br from-indigo-50/50 to-white p-5 shadow-sm dark:border-indigo-900/60 dark:from-indigo-950/30 dark:to-gray-900">
                <div>
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span
                                class="inline-flex items-center rounded-full bg-indigo-100 px-3 py-1 text-[10px] font-bold text-indigo-700 dark:bg-indigo-900/60 dark:text-indigo-200">
                                TELEFONÍA MÓVIL
                            </span>
                            <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">12. Consulta de Celular
                            </h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Información de titularidad de un
                                número celular.</p>
                        </div>
                        <div
                            class="flex p-3 items-center justify-center rounded-xl bg-indigo-600 text-white shadow-lg shadow-indigo-600/20">
                            <i class="fa-solid fa-mobile-screen-button text-xl"></i>
                        </div>
                    </div>

                    <form
                        onsubmit="handleQuerySubmit(event, '/api/v1/consultas/fd/telp/cel/{numero}', 'resultado-fd-telp_cel')"
                        class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Número de
                                Celular</label>
                            <input type="text" name="numero" maxlength="9" required placeholder="Ej: 987654321"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        </div>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-indigo-700 transition active:scale-[0.99]">
                            <i class="fa-solid fa-magnifying-glass"></i> Consultar Celular
                        </button>
                    </form>
                </div>
                <div id="resultado-fd-telp_cel" class="mt-4 hidden col-span-1 xl:col-span-2"></div>
            </section>

            <!-- 13. Denuncia Policial -->
            <section id="busqueda-fd-den"
                class="rounded-2xl border border-rose-100 bg-gradient-to-br from-rose-50/50 to-white p-5 shadow-sm dark:border-rose-900/60 dark:from-rose-950/30 dark:to-gray-900">
                <div>
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span
                                class="inline-flex items-center rounded-full bg-rose-100 px-3 py-1 text-[10px] font-bold text-rose-700 dark:bg-rose-900/60 dark:text-rose-200">
                                ANTECEDENTES POLICIALES
                            </span>
                            <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">13. Denuncia Policial</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Consulta de denuncias policiales
                                registradas.</p>
                        </div>
                        <div
                            class="flex p-3 items-center justify-center rounded-xl bg-rose-600 text-white shadow-lg shadow-rose-600/20">
                            <i class="fa-solid fa-file-circle-exclamation text-xl"></i>
                        </div>
                    </div>

                    <form onsubmit="handleQuerySubmit(event, '/api/v1/consultas/fd/den/{dni}', 'resultado-fd-den')"
                        class="space-y-4">
                        <div>
                            <label
                                class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">DNI</label>
                            <input type="text" name="dni" maxlength="8" required placeholder="00000000"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-rose-500 focus:ring-2 focus:ring-rose-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        </div>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-rose-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-rose-700 transition active:scale-[0.99]">
                            <i class="fa-solid fa-magnifying-glass"></i> Consultar Denuncia
                        </button>
                    </form>
                </div>
                <div id="resultado-fd-den" class="mt-4 hidden col-span-1 xl:col-span-2"></div>
            </section>

            <!-- 14. Denuncias Lista -->
            <section id="busqueda-fd-denuncias"
                class="rounded-2xl border border-rose-100 bg-gradient-to-br from-rose-50/50 to-white p-5 shadow-sm dark:border-rose-900/60 dark:from-rose-950/30 dark:to-gray-900">
                <div>
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span
                                class="inline-flex items-center rounded-full bg-rose-100 px-3 py-1 text-[10px] font-bold text-rose-700 dark:bg-rose-900/60 dark:text-rose-200">
                                LISTADO DE DENUNCIAS
                            </span>
                            <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">14. Lista de Denuncias
                            </h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Listado histórico de ocurrencias
                                registradas.</p>
                        </div>
                        <div
                            class="flex p-3 items-center justify-center rounded-xl bg-rose-600 text-white shadow-lg shadow-rose-600/20">
                            <i class="fa-solid fa-file-pdf text-xl"></i>
                        </div>
                    </div>

                    <form
                        onsubmit="handleQuerySubmit(event, '/api/v1/consultas/fd/denuncias/{dni}', 'resultado-fd-denuncias')"
                        class="space-y-4">
                        <div>
                            <label
                                class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">DNI</label>
                            <input type="text" name="dni" maxlength="8" required placeholder="00000000"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-rose-500 focus:ring-2 focus:ring-rose-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        </div>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-rose-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-rose-700 transition active:scale-[0.99]">
                            <i class="fa-solid fa-magnifying-glass"></i> Consultar Lista Denuncias
                        </button>
                    </form>
                </div>
                <div id="resultado-fd-denuncias" class="mt-4 hidden col-span-1 xl:col-span-2"></div>
            </section>

            <!-- 15. Requisitorias -->
            <section id="busqueda-fd-rqh"
                class="rounded-2xl border border-rose-100 bg-gradient-to-br from-rose-50/50 to-white p-5 shadow-sm dark:border-rose-900/60 dark:from-rose-950/30 dark:to-gray-900">
                <div>
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span
                                class="inline-flex items-center rounded-full bg-rose-100 px-3 py-1 text-[10px] font-bold text-rose-700 dark:bg-rose-900/60 dark:text-rose-200">
                                JUDICIAL Y POLICIAL
                            </span>
                            <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">15. Requisitorias</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Verificación de requisitorias u
                                órdenes judiciales.</p>
                        </div>
                        <div
                            class="flex p-3 items-center justify-center rounded-xl bg-rose-600 text-white shadow-lg shadow-rose-600/20">
                            <i class="fa-solid fa-gavel text-xl"></i>
                        </div>
                    </div>

                    <form onsubmit="handleQuerySubmit(event, '/api/v1/consultas/fd/rqh/{dni}', 'resultado-fd-rqh')"
                        class="space-y-4">
                        <div>
                            <label
                                class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">DNI</label>
                            <input type="text" name="dni" maxlength="8" required placeholder="00000000"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-rose-500 focus:ring-2 focus:ring-rose-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        </div>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-rose-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-rose-700 transition active:scale-[0.99]">
                            <i class="fa-solid fa-magnifying-glass"></i> Consultar Requisitorias
                        </button>
                    </form>
                </div>
                <div id="resultado-fd-rqh" class="mt-4 hidden col-span-1 xl:col-span-2"></div>
            </section>

            <!-- 16. Facial Top -->
            <section id="busqueda-fd-facial-top"
                class="rounded-2xl border border-amber-100 bg-gradient-to-br from-amber-50/50 to-white p-5 shadow-sm dark:border-amber-900/60 dark:from-amber-950/30 dark:to-gray-900">
                <div>
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span
                                class="inline-flex items-center rounded-full bg-amber-100 px-3 py-1 text-[10px] font-bold text-amber-700 dark:bg-amber-900/60 dark:text-amber-200">
                                RECONOCIMIENTO BIOMÉTRICO
                            </span>
                            <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">16. Facial Top</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Sube una imagen para buscar
                                coincidencias faciales en la base de datos.</p>
                        </div>
                        <div
                            class="flex p-3 items-center justify-center rounded-xl bg-amber-600 text-white shadow-lg shadow-amber-600/20">
                            <i class="fa-solid fa-ranking-star text-xl"></i>
                        </div>
                    </div>

                    <form
                        onsubmit="handleQuerySubmit(event, '/api/v1/consultas/fd/facial/top', 'resultado-fd-facial-top', 'POST')"
                        class="space-y-4">
                        <div>
                            <label
                                class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Seleccionar
                                Foto / Imagen</label>
                            <input type="file" id="file-facial-top" accept="image/*"
                                onchange="handleImageFileUpload(this, 'input-facial-top-foto', 'preview-facial-top')"
                                class="w-full text-xs text-gray-500 dark:text-gray-400 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-amber-600 file:text-white hover:file:bg-amber-700 cursor-pointer">

                            <input type="hidden" id="input-facial-top-foto" name="image_facial" required>

                            <div id="preview-container-facial-top"
                                class="hidden mt-3 p-2 rounded-xl bg-gray-900 border border-amber-500/50 flex items-center gap-3">
                                <img id="preview-facial-top" src="" alt="Vista previa"
                                    class="h-16 w-16 object-cover rounded-lg border border-gray-700">
                                <div class="text-xs text-gray-300">
                                    <div class="font-bold text-amber-400">Imagen convertida a Base64</div>
                                    <div class="text-[10px] text-gray-400">Lista para ser enviada a la API</div>
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-amber-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-amber-700 transition active:scale-[0.99]">
                            <i class="fa-solid fa-camera-retro"></i> Ejecutar Facial Top
                        </button>
                    </form>
                </div>
                <div id="resultado-fd-facial-top" class="mt-4 hidden col-span-1 xl:col-span-2"></div>
            </section>

            <!-- 17. Placa Vehicular -->
            <section id="busqueda-fd-pla"
                class="rounded-2xl border border-emerald-100 bg-gradient-to-br from-emerald-50/50 to-white p-5 shadow-sm dark:border-emerald-900/60 dark:from-emerald-950/30 dark:to-gray-900">
                <div>
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span
                                class="inline-flex items-center rounded-full bg-emerald-100 px-3 py-1 text-[10px] font-bold text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-200">
                                SUNARP - VEHICULAR
                            </span>
                            <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">17. Placa Vehicular</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Información vehicular por número
                                de placa.</p>
                        </div>
                        <div
                            class="flex p-3 items-center justify-center rounded-xl bg-emerald-600 text-white shadow-lg shadow-emerald-600/20">
                            <i class="fa-solid fa-car-side text-xl"></i>
                        </div>
                    </div>

                    <form onsubmit="handleQuerySubmit(event, '/api/v1/consultas/fd/pla/{placa}', 'resultado-fd-pla')"
                        class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Número de
                                Placa</label>
                            <input type="text" name="placa" required placeholder="Ej: ABC123"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white uppercase">
                        </div>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-emerald-700 transition active:scale-[0.99]">
                            <i class="fa-solid fa-magnifying-glass"></i> Consultar Placa
                        </button>
                    </form>
                </div>
                <div id="resultado-fd-pla" class="mt-4 hidden col-span-1 xl:col-span-2"></div>
            </section>

            <!-- 18. Placa Denuncia -->
            <section id="busqueda-fd-denpla"
                class="rounded-2xl border border-emerald-100 bg-gradient-to-br from-emerald-50/50 to-white p-5 shadow-sm dark:border-emerald-900/60 dark:from-emerald-950/30 dark:to-gray-900">
                <div>
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span
                                class="inline-flex items-center rounded-full bg-emerald-100 px-3 py-1 text-[10px] font-bold text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-200">
                                DENUNCIAS DE VEHÍCULO
                            </span>
                            <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">18. Placa Denuncia</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Reportes de ocurrencias o robo
                                por número de placa.</p>
                        </div>
                        <div
                            class="flex p-3 items-center justify-center rounded-xl bg-emerald-600 text-white shadow-lg shadow-emerald-600/20">
                            <i class="fa-solid fa-folder-tree text-xl"></i>
                        </div>
                    </div>

                    <form
                        onsubmit="handleQuerySubmit(event, '/api/v1/consultas/fd/denpla/{placa}', 'resultado-fd-denpla')"
                        class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Número de
                                Placa</label>
                            <input type="text" name="placa" required placeholder="Ej: ABC123"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white uppercase">
                        </div>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-emerald-700 transition active:scale-[0.99]">
                            <i class="fa-solid fa-magnifying-glass"></i> Consultar Placa Denuncia
                        </button>
                    </form>
                </div>
                <div id="resultado-fd-denpla" class="mt-4 hidden col-span-1 xl:col-span-2"></div>
            </section>

            <!-- 19. Placa Titular -->
            <section id="busqueda-fd-plat"
                class="rounded-2xl border border-emerald-100 bg-gradient-to-br from-emerald-50/50 to-white p-5 shadow-sm dark:border-emerald-900/60 dark:from-emerald-950/30 dark:to-gray-900">
                <div>
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span
                                class="inline-flex items-center rounded-full bg-emerald-100 px-3 py-1 text-[10px] font-bold text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-200">
                                PROPIETARIO DE VEHÍCULO
                            </span>
                            <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">19. Placa Titular</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Información del titular o
                                propietario del vehículo.</p>
                        </div>
                        <div
                            class="flex p-3 items-center justify-center rounded-xl bg-emerald-600 text-white shadow-lg shadow-emerald-600/20">
                            <i class="fa-solid fa-car-rear text-xl"></i>
                        </div>
                    </div>

                    <form onsubmit="handleQuerySubmit(event, '/api/v1/consultas/fd/plat/{placa}', 'resultado-fd-plat')"
                        class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Número de
                                Placa</label>
                            <input type="text" name="placa" required placeholder="Ej: ABC123"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white uppercase">
                        </div>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-emerald-700 transition active:scale-[0.99]">
                            <i class="fa-solid fa-magnifying-glass"></i> Consultar Placa Titular
                        </button>
                    </form>
                </div>
                <div id="resultado-fd-plat" class="mt-4 hidden col-span-1 xl:col-span-2"></div>
            </section>

            <!-- 20. Historial SOAT -->
            <section id="busqueda-fd-hsoat"
                class="rounded-2xl border border-emerald-100 bg-gradient-to-br from-emerald-50/50 to-white p-5 shadow-sm dark:border-emerald-900/60 dark:from-emerald-950/30 dark:to-gray-900">
                <div>
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span
                                class="inline-flex items-center rounded-full bg-emerald-100 px-3 py-1 text-[10px] font-bold text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-200">
                                SEGURO OBLIGATORIO
                            </span>
                            <h3 class="mt-2 text-lg font-bold text-gray-900 dark:text-white">20. Historial SOAT</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Historial y vigencia de SOAT por
                                placa.</p>
                        </div>
                        <div
                            class="flex p-3 items-center justify-center rounded-xl bg-emerald-600 text-white shadow-lg shadow-emerald-600/20">
                            <i class="fa-solid fa-file-shield text-xl"></i>
                        </div>
                    </div>

                    <form
                        onsubmit="handleQuerySubmit(event, '/api/v1/consultas/fd/hsoat/{placa}', 'resultado-fd-hsoat')"
                        class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Número de
                                Placa</label>
                            <input type="text" name="placa" required placeholder="Ej: ABC123"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 shadow-sm outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 dark:border-gray-700 dark:bg-gray-800 dark:text-white uppercase">
                        </div>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-emerald-700 transition active:scale-[0.99]">
                            <i class="fa-solid fa-magnifying-glass"></i> Consultar Historial SOAT
                        </button>
                    </form>
                </div>
                <div id="resultado-fd-hsoat" class="mt-4 hidden col-span-1 xl:col-span-2"></div>
            </section>

        </div>

    </main>

    <!-- Footer -->
    <footer class="mt-16 border-t border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 py-6">
        <div class="max-w-7xl mx-auto px-4 text-center text-xs text-gray-500 dark:text-gray-400">
            <p>Codart API Client &copy; {{ date('Y') }} — Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- JavaScript Handler for AJAX Queries, Base64 Rendering & Centered Tabs UI -->
    <script>
        // Cache for storing query responses per container
        const queryResultsCache = {};

        // Convert image file upload to Base64
        function handleImageFileUpload(fileInput, hiddenTargetId, previewImgId) {
            const file = fileInput.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                const base64Data = e.target.result;
                document.getElementById(hiddenTargetId).value = base64Data;

                const previewImg = document.getElementById(previewImgId);
                const container = document.getElementById('preview-container-facial-top');

                if (previewImg && container) {
                    previewImg.src = base64Data;
                    container.classList.remove('hidden');
                }
            };
            reader.readAsDataURL(file);
        }

        async function handleQuerySubmit(event, endpoint, containerId, httpMethod = 'GET') {
            event.preventDefault();
            const form = event.target;
            const submitBtn = form.querySelector('button[type="submit"]');
            const resultBox = document.getElementById(containerId);

            // Extract form inputs into object
            const formData = new FormData(form);
            const params = {};
            formData.forEach((val, key) => {
                if (val !== '' && val !== null) {
                    params[key] = val;
                }
            });

            // UI loading state
            const originalBtnHtml = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML =
                `<i class="fa-solid fa-circle-notch fa-spin"></i> Consultando (esperando respuesta)...`;

            resultBox.classList.remove('hidden');
            resultBox.innerHTML = `
                <div class="p-4 rounded-xl bg-gray-900 text-gray-200 text-xs font-mono border border-gray-800 animate-pulse flex items-center justify-between">
                    <span>Enviando petición a la API (Timeout: 50s)...</span>
                    <i class="fa-solid fa-spinner fa-spin text-purple-400"></i>
                </div>
            `;

            try {
                const response = await fetch('/api/execute-query', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        endpoint: endpoint,
                        method: httpMethod,
                        params: params
                    })
                });

                const data = await response.json();
                queryResultsCache[containerId] = data;
                renderDualResultContainer(containerId, 'rendered');
            } catch (err) {
                const errorData = {
                    status: 500,
                    success: false,
                    error: err.message || 'Error inesperado al conectar con el servidor.'
                };
                queryResultsCache[containerId] = errorData;
                renderDualResultContainer(containerId, 'json');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnHtml;
            }
        }

        function switchViewTab(containerId, viewMode) {
            renderDualResultContainer(containerId, viewMode);
        }

        function renderDualResultContainer(containerId, activeMode = 'rendered') {
            const container = document.getElementById(containerId);
            const data = queryResultsCache[containerId] || {};
            const isSuccess = data.success !== false && data.status >= 200 && data.status < 300;
            const badgeColor = isSuccess ? 'bg-emerald-500' : 'bg-rose-500';
            const formattedJson = JSON.stringify(data, null, 2);

            const isRendered = activeMode === 'rendered';
            const isJson = activeMode === 'json';

            const tabRenderedBtn = `
                <button type="button" onclick="switchViewTab('${containerId}', 'rendered')" 
                    class="px-4 py-1.5 rounded-lg text-xs font-semibold transition flex items-center gap-1.5 ${isRendered ? 'bg-purple-600 text-white shadow-sm' : 'bg-gray-800 text-gray-300 hover:bg-gray-700'}">
                    <i class="fa-solid fa-eye text-xs"></i> Vista Renderizada
                </button>
            `;

            const tabJsonBtn = `
                <button type="button" onclick="switchViewTab('${containerId}', 'json')" 
                    class="px-4 py-1.5 rounded-lg text-xs font-semibold transition flex items-center gap-1.5 ${isJson ? 'bg-purple-600 text-white shadow-sm' : 'bg-gray-800 text-gray-300 hover:bg-gray-700'}">
                    <i class="fa-solid fa-code text-xs"></i> Respuesta JSON
                </button>
            `;

            let bodyContent = '';

            if (isJson) {
                bodyContent = `
                    <div class="relative bg-gray-950 p-4 font-mono text-xs text-emerald-400 overflow-x-auto max-h-[32rem] leading-relaxed border-t border-gray-800">
                        <button onclick="copyToClipboard(this)" data-json='${formattedJson.replace(/'/g, "&apos;")}' type="button" 
                            class="absolute top-3 right-3 z-10 inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-gray-800/90 hover:bg-gray-700 text-gray-200 transition border border-gray-700 backdrop-blur-md shadow-md">
                            <i class="fa-regular fa-copy"></i> Copiar JSON
                        </button>
                        <pre class="pt-8">${escapeHtml(formattedJson)}</pre>
                    </div>
                `;
            } else {
                bodyContent = `
                    <div class="p-4 bg-gray-900 border-t border-gray-800">
                        ${renderFormattedView(data.data || data)}
                    </div>
                `;
            }

            container.innerHTML = `
                <div class="rounded-2xl border border-gray-800 bg-gray-950 overflow-hidden shadow-2xl w-full">
                    <div class="px-4 py-3 bg-gray-900 flex items-center justify-between gap-3 border-b border-gray-800 relative">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full ${badgeColor}"></span>
                            <span class="text-xs font-mono font-bold text-gray-200">Status: ${data.status || 200}</span>
                        </div>

                        <!-- Centered View Switcher Buttons -->
                        <div class="flex items-center gap-2 mx-auto">
                            ${tabRenderedBtn}
                            ${tabJsonBtn}
                        </div>
                    </div>
                    ${bodyContent}
                </div>
            `;
        }

        function renderFormattedView(payload) {
            if (!payload || (typeof payload !== 'object' && !Array.isArray(payload))) {
                return renderSingleValue('RESPUESTA', payload);
            }

            // Extract inner data payload if wrapped
            let realData = payload;
            if (payload.data !== undefined && typeof payload.data === 'object' && payload.data !== null) {
                realData = payload.data;
            }

            if (Array.isArray(realData)) {
                if (realData.length === 0) {
                    return `<div class="text-xs text-gray-400 italic">Lista vacía.</div>`;
                }
                return `
                    <div class="space-y-4">
                        ${realData.map((item, idx) => `
                                            <div class="p-4 rounded-xl bg-gray-800/80 border border-gray-700 shadow-md">
                                                <div class="text-[11px] font-bold text-purple-400 uppercase tracking-wider mb-3 flex items-center gap-2">
                                                    <span class="w-2 h-2 rounded-full bg-purple-500"></span>
                                                    Registro ${idx + 1}
                                                </div>
                                                ${renderObjectFields(item)}
                                            </div>
                                        `).join('')}
                    </div>
                `;
            }

            return renderObjectFields(realData);
        }

        function renderSingleValue(label, val) {
            return `
                <div class="p-3 rounded-xl bg-gray-950/60 border border-gray-800/80">
                    <div class="text-[10px] font-bold text-gray-400 mb-1 tracking-wider">${escapeHtml(label)}</div>
                    <div class="font-medium text-gray-100 break-all text-xs">${escapeHtml(String(val ?? '-'))}</div>
                </div>
            `;
        }

        function renderObjectFields(obj) {
            if (typeof obj !== 'object' || obj === null) {
                return renderSingleValue('VALOR', obj);
            }

            const entries = Object.entries(obj);
            if (entries.length === 0) {
                return `<span class="text-xs text-gray-400 italic">Objeto vacío</span>`;
            }

            return `
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 text-xs">
                    ${entries.map(([key, val]) => renderFieldItem(key, val)).join('')}
                </div>
            `;
        }

        function renderFieldItem(key, val) {
            const label = key.replace(/_/g, ' ').toUpperCase();

            if (val === null || val === undefined || val === '') {
                return `
                    <div class="p-3 rounded-xl bg-gray-950/60 border border-gray-800/80">
                        <div class="text-[10px] font-bold text-gray-400 mb-1 tracking-wider">${escapeHtml(label)}</div>
                        <div class="text-gray-500 font-mono text-xs">-</div>
                    </div>
                `;
            }

            if (typeof val === 'boolean') {
                const badge = val ?
                    `<span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-950 text-emerald-300 border border-emerald-800">SÍ</span>` :
                    `<span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-rose-950 text-rose-300 border border-rose-800">NO</span>`;
                return `
                    <div class="p-3 rounded-xl bg-gray-950/60 border border-gray-800/80 flex items-center justify-between">
                        <div class="text-[10px] font-bold text-gray-400 tracking-wider">${escapeHtml(label)}</div>
                        <div>${badge}</div>
                    </div>
                `;
            }

            // Check if string is Base64 Image or PDF
            if (typeof val === 'string') {
                const cleanStr = val.trim();

                // Base64 Image Detection
                if (cleanStr.startsWith('data:image/') || isRawBase64Image(cleanStr) || ['foto', 'imagen', 'data_uri',
                        'foto_base64', 'huella', 'firma'
                    ].includes(key.toLowerCase())) {
                    const imgSrc = cleanStr.startsWith('data:image/') ? cleanStr : `data:image/jpeg;base64,${cleanStr}`;
                    return `
                        <div class="p-3 rounded-xl bg-gray-950/80 border border-purple-900/60 col-span-1 md:col-span-2 lg:col-span-3 flex flex-col items-center justify-center">
                            <div class="text-[10px] font-bold text-purple-400 mb-2 tracking-wider self-start flex items-center gap-1.5">
                                <i class="fa-regular fa-image"></i> ${escapeHtml(label)} (IMAGEN)
                            </div>
                            <img src="${imgSrc}" alt="${escapeHtml(label)}" class="max-h-72 rounded-xl border border-gray-700 shadow-xl object-contain hover:scale-105 transition duration-200">
                        </div>
                    `;
                }

                // Base64 PDF Detection
                if (cleanStr.startsWith('data:application/pdf') || isRawBase64Pdf(cleanStr) || ['pdf', 'documento_pdf',
                        'pdf_base64', 'archivo_pdf', 'denuncias_pdf'
                    ].includes(key.toLowerCase())) {
                    const pdfSrc = cleanStr.startsWith('data:application/pdf') ? cleanStr :
                        `data:application/pdf;base64,${cleanStr}`;
                    return `
                        <div class="p-4 rounded-xl bg-gray-950/90 border border-rose-900/60 col-span-1 md:col-span-2 lg:col-span-3 flex flex-col gap-3">
                            <div class="text-[10px] font-bold text-rose-400 tracking-wider flex items-center justify-between flex-wrap gap-2">
                                <span class="flex items-center gap-1.5"><i class="fa-solid fa-file-pdf text-sm"></i> ${escapeHtml(label)} (DOCUMENTO PDF)</span>
                                <div class="flex items-center gap-2">
                                    <a href="${pdfSrc}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-gray-700 text-gray-200 font-semibold text-xs border border-gray-700 transition">
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i> Abrir en Pestaña
                                    </a>
                                    <a href="${pdfSrc}" download="${label}.pdf" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-rose-600 hover:bg-rose-700 text-white font-semibold text-xs shadow-md transition">
                                        <i class="fa-solid fa-download"></i> Descargar PDF
                                    </a>
                                </div>
                            </div>
                            <iframe src="${pdfSrc}" class="w-full h-96 rounded-xl border border-gray-800 bg-gray-900 shadow-inner"></iframe>
                        </div>
                    `;
                }
            }

            if (typeof val === 'object') {
                return `
                    <div class="p-3 rounded-xl bg-gray-950/80 border border-gray-800 col-span-1 md:col-span-2 lg:col-span-3">
                        <div class="text-[10px] font-bold text-purple-400 mb-2 tracking-wider flex items-center gap-1.5">
                            <i class="fa-solid fa-layer-group"></i> ${escapeHtml(label)}
                        </div>
                        ${renderFormattedView(val)}
                    </div>
                `;
            }

            return `
                <div class="p-3 rounded-xl bg-gray-950/60 border border-gray-800/80">
                    <div class="text-[10px] font-bold text-gray-400 mb-1 tracking-wider">${escapeHtml(label)}</div>
                    <div class="font-medium text-gray-100 break-all text-xs">${escapeHtml(String(val))}</div>
                </div>
            `;
        }

        function isRawBase64Image(str) {
            if (typeof str !== 'string' || str.length < 50) return false;
            return str.startsWith('/9j/') || str.startsWith('iVBORw0KG') || str.startsWith('R0lGOD') || str.startsWith(
                'Qk');
        }

        function isRawBase64Pdf(str) {
            if (typeof str !== 'string' || str.length < 50) return false;
            return str.startsWith('JVBER');
        }

        function escapeHtml(text) {
            return String(text)
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
                setTimeout(() => {
                    btn.innerHTML = originalHtml;
                }, 2000);
            });
        }
    </script>
</body>

</html>
