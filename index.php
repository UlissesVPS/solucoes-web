<?php
// --- BASE DE DADOS DE PRODUTOS ---
$products = [
    [
        'id' => 1,
        'category' => 'fontes', // Categorias: fontes, servidor, scripts
        'name' => "ALUGUEL FONTE 1K",
        'price' => "R$ 220",
        'oldPrice' => "R$ 350",
        'badges' => ['MENSAL', 'INICIAL'],
        'description' => "Fonte de canais estável com 1.000 linhas disponíveis para início imediato.",
        'features' => [
            "50 Conexões Simultâneas",
            "Escalável até 500 conexões",
            "Incluso VODs (Filmes/Séries)",
            "25k Filmes + 4k Séries",
            "Suporte via Grupo VIP"
        ],
        'whatsapp_msg' => "Tenho interesse no Aluguel de Fonte 1K"
    ],
    [
        'id' => 2,
        'category' => 'servidor',
        'name' => "SERVIDOR COMPLETO IPTV",
        'price' => "R$ 1.000",
        'oldPrice' => "R$ 2.000",
        'badges' => ['MAIS VENDIDO', 'SETUP'],
        'description' => "Tenha sua própria operação. Painel XUI, App Android e Fontes já configuradas.",
        'features' => [
            "Painel XUI + Módulo Revenda",
            "App Android (Sua Marca)",
            "Fonte Canais + VODs (30 Dias)",
            "Renovação Fonte: ~R$ 200/mês",
            "Entrega em 48 Horas"
        ],
        'whatsapp_msg' => "Quero montar meu Servidor Completo"
    ],
    [
        'id' => 3,
        'category' => 'scripts',
        'name' => "SISTEMA DRM V4",
        'price' => "R$ 1.500",
        'oldPrice' => "R$ 2.500",
        'badges' => ['CÓDIGO FONTE', 'PREMIUM'],
        'description' => "Sistema avançado para puxar canais Sky, Claro, Pluto e GloboPlay com alta estabilidade.",
        'features' => [
            "Média 500 Canais (Fechados/Abertos)",
            "GloboPlay + Desenhos 24h",
            "Script + Instalador Automático",
            "Vídeos Tutoriais Inclusos",
            "Entrega Flash: Até 8 Horas"
        ],
        'whatsapp_msg' => "Tenho interesse no Sistema DRM V4"
    ],
    [
        'id' => 4,
        'category' => 'scripts',
        'name' => "EXTRATOR WEB V7",
        'price' => "R$ 600",
        'oldPrice' => "R$ 997",
        'badges' => ['REGIONAL', 'ESPORTES'],
        'description' => "Focado em canais regionais e esportes. A solução perfeita para complementar sua grade.",
        'features' => [
            "Extrai Globos Regionais (120+)",
            "Premiere e SportTV Inclusos",
            "Média 140 Canais Estáveis",
            "Script + Tutorial + Instalação",
            "Sem mensalidade de fontes"
        ],
        'whatsapp_msg' => "Quero o Extrator Web V7"
    ],
    [
        'id' => 5,
        'category' => 'fontes',
        'name' => "PACOTE REVENDA MASTER",
        'price' => "R$ 800",
        'oldPrice' => "R$ 1.200",
        'badges' => ['ATACADO'],
        'description' => "Para quem já possui painel e precisa de muito volume de conexões.",
        'features' => [
            "500 Conexões Diretas",
            "Painel de Gerenciamento",
            "Rota Premium Anti-Travamento",
            "CDN Privada",
            "Suporte Prioritário"
        ],
        'whatsapp_msg' => "Interesse no Pacote Revenda 500 conexões"
    ]
];
?>

<!DOCTYPE html>
<html lang="pt-BR" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOLUÇÕES WEB - Catálogo</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    
    <script src="https://unpkg.com/lucide@latest"></script>

    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300;400;600;700&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --neon-blue: #2563eb;
            --neon-cyan: #06b6d4;
            --dark-bg: #020617;
            --whatsapp-green: #25D366;
        }
        
        body { 
            font-family: 'Chakra Petch', sans-serif; 
            background-color: var(--dark-bg);
            color: #e2e8f0;
        }
        
        .font-mono { font-family: 'JetBrains Mono', monospace; }

        /* SCROLLBAR CUSTOMIZADA */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #020617; }
        ::-webkit-scrollbar-thumb { background: #1e293b; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--neon-blue); }

        /* EFEITOS DE FUNDO */
        .bg-cyberpunk {
            background-color: var(--dark-bg);
            background-image: 
                linear-gradient(rgba(37, 99, 235, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(37, 99, 235, 0.05) 1px, transparent 1px);
            background-size: 30px 30px;
        }
        
        .bg-scanlines {
            background: repeating-linear-gradient(0deg, rgba(0,0,0,0.15) 0px, rgba(0,0,0,0.15) 1px, transparent 1px, transparent 2px);
            pointer-events: none;
        }

        /* CARD DO PRODUTO */
        .product-card {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(30, 41, 59, 0.8);
            transition: all 0.3s ease;
        }
        .product-card:hover {
            border-color: var(--neon-cyan);
            box-shadow: 0 0 20px rgba(6, 182, 212, 0.15);
            transform: translateY(-5px);
        }

        /* INPUT DE PESQUISA */
        .search-input {
            background: rgba(2, 6, 23, 0.8);
            border: 1px solid #1e293b;
            box-shadow: inset 0 0 10px rgba(0,0,0,0.5);
        }
        .search-input:focus {
            border-color: var(--neon-blue);
            box-shadow: 0 0 15px rgba(37, 99, 235, 0.3), inset 0 0 10px rgba(0,0,0,0.5);
            outline: none;
        }

        /* BOTÃO WHATSAPP */
        .float-whatsapp {
            position: fixed; bottom: 20px; right: 20px;
            width: 60px; height: 60px;
            background-color: var(--whatsapp-green);
            color: #FFF; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 0 20px rgba(37, 211, 102, 0.5);
            z-index: 100; transition: all 0.3s ease;
        }
        .float-whatsapp:hover { transform: scale(1.1); box-shadow: 0 0 40px rgba(37, 211, 102, 0.8); }
        .float-whatsapp::after {
            content: ''; position: absolute; width: 100%; height: 100%;
            border-radius: 50%; border: 2px solid var(--whatsapp-green);
            animation: pulse-green 2s infinite;
        }
        @keyframes pulse-green {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(1.5); opacity: 0; }
        }

        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="bg-cyberpunk min-h-screen selection:bg-cyan-500/30 selection:text-white"
      x-data="shopData()">

    <div class="fixed inset-0 z-50 bg-scanlines opacity-20 pointer-events-none"></div>

    <a href="https://wa.me/5586988893817?text=Ol%C3%A1%2C%20vim%20pelo%20site%20e%20preciso%20de%20ajuda." 
       target="_blank" class="float-whatsapp" title="Suporte via WhatsApp">
       <i data-lucide="message-circle" class="w-8 h-8 fill-current"></i>
    </a>

    <header class="fixed top-0 left-0 right-0 z-40 bg-[#020617]/90 backdrop-blur-md border-b border-blue-900/30 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-4">
            <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                
                <div class="flex items-center gap-3 animate-pulse shrink-0">
                    <div class="p-2 bg-blue-500/10 rounded border border-blue-500/30">
                        <i data-lucide="server" class="w-6 h-6 text-cyan-400"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold tracking-[0.2em] text-sm text-cyan-100 leading-none">SOLUÇÕES</span>
                        <span class="font-mono text-xs text-blue-500 tracking-widest">WEB SYSTEMS</span>
                    </div>
                </div>

                <div class="relative w-full md:max-w-md group">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-blue-500/50 group-focus-within:text-cyan-400 transition-colors">
                        <i data-lucide="search" class="w-5 h-5"></i>
                    </div>
                    <input type="text" 
                           x-model="search" 
                           placeholder="Buscar produto, serviço ou tecnologia..." 
                           class="search-input w-full py-3 pl-12 pr-4 rounded text-blue-100 placeholder-blue-500/30 font-mono text-sm">
                    <div class="absolute right-3 top-1/2 -translate-y-1/2 hidden md:block">
                        <span class="text-[10px] text-blue-500/30 border border-blue-500/20 px-1 rounded">CTRL+K</span>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <main class="pt-32 pb-20 px-4 max-w-7xl mx-auto min-h-screen flex flex-col">

        <div class="text-center mb-10" x-show="search === ''">
            <h1 class="text-3xl md:text-5xl font-black text-white mb-2 tracking-tighter">
                INFRAESTRUTURA <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-cyan-400">IPTV</span>
            </h1>
            <p class="text-blue-400/60 font-mono text-sm md:text-base">
                Selecione abaixo a categoria ideal para sua operação.
            </p>
        </div>

        <nav class="flex overflow-x-auto pb-4 gap-2 mb-8 no-scrollbar justify-start md:justify-center">
            <template x-for="cat in categories" :key="cat.id">
                <button @click="filterCategory(cat.id)"
                        class="px-6 py-2 rounded-full border text-sm font-bold uppercase tracking-wider whitespace-nowrap transition-all"
                        :class="activeCategory === cat.id 
                            ? 'bg-gradient-to-r from-blue-600 to-cyan-600 border-transparent text-white shadow-[0_0_15px_blue]' 
                            : 'bg-transparent border-blue-900/50 text-blue-400 hover:border-cyan-500 hover:text-cyan-300'">
                    <span x-text="cat.label"></span>
                </button>
            </template>
        </nav>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <template x-for="product in filteredProducts" :key="product.id">
                <div class="product-card rounded-xl overflow-hidden flex flex-col h-full group relative" data-aos="fade-up">
                    
                    <div class="absolute top-4 left-4 z-10 flex flex-wrap gap-2">
                        <template x-for="badge in product.badges">
                            <span class="px-2 py-1 bg-black/60 backdrop-blur border border-cyan-500/30 text-[10px] font-mono text-cyan-300 uppercase rounded" x-text="badge"></span>
                        </template>
                    </div>

                    <div class="p-6 pb-0 relative">
                        <i data-lucide="cpu" class="absolute top-4 right-4 w-24 h-24 text-blue-500/5 rotate-12 pointer-events-none group-hover:text-cyan-500/10 transition-colors"></i>
                        
                        <div class="h-12 flex items-center mb-4">
                            <h3 class="text-xl font-bold text-white leading-tight group-hover:text-cyan-300 transition-colors" x-text="product.name"></h3>
                        </div>
                        
                        <div class="mb-4">
                            <span class="text-xs text-gray-500 line-through font-mono" x-text="product.oldPrice"></span>
                            <div class="flex items-end gap-1">
                                <span class="text-3xl font-black text-white tracking-tighter" x-text="product.price"></span>
                            </div>
                        </div>
                    </div>

                    <div class="px-6 py-4 border-t border-blue-900/30 bg-black/20 flex-1">
                        <p class="text-sm text-gray-300 mb-4 leading-relaxed" x-text="product.description"></p>
                        
                        <ul class="space-y-2 mb-4">
                            <template x-for="feat in product.features">
                                <li class="flex items-start gap-2 text-xs text-blue-200/70">
                                    <i data-lucide="check-circle-2" class="w-4 h-4 text-cyan-500 shrink-0"></i>
                                    <span x-text="feat"></span>
                                </li>
                            </template>
                        </ul>
                    </div>

                    <div class="p-4 bg-black/40 border-t border-blue-900/30">
                        <a :href="'https://wa.me/5586988893817?text=' + encodeURIComponent(product.whatsapp_msg)" 
                           target="_blank"
                           class="flex items-center justify-center gap-2 w-full py-3 bg-blue-600 hover:bg-cyan-500 text-white font-bold uppercase text-sm tracking-widest rounded transition-all shadow-[0_0_15px_rgba(37,99,235,0.3)] hover:shadow-[0_0_25px_rgba(6,182,212,0.5)]">
                            <span>Contratar</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                    </div>
                </div>
            </template>
            
            <div x-show="filteredProducts.length === 0" class="col-span-full text-center py-20 opacity-50">
                <i data-lucide="alert-circle" class="w-12 h-12 text-blue-500 mx-auto mb-4"></i>
                <h3 class="text-xl text-white font-bold">Nenhum resultado encontrado</h3>
                <p class="text-sm text-gray-400">Tente buscar por "Scripts", "Painel" ou "App".</p>
                <button @click="resetFilters()" class="mt-4 text-cyan-400 underline hover:text-white cursor-pointer">Limpar filtros</button>
            </div>

        </div>

    </main>

    <footer class="border-t border-blue-900/30 bg-[#020617] py-8 text-center text-gray-500 font-mono text-xs">
        <p>&copy; 2025 SOLUÇÕES WEB. Todos os direitos reservados.</p>
        <p class="mt-2 text-blue-900">SYSTEM V3.0 // ONLINE</p>
    </footer>

    <script>
        function shopData() {
            return {
                search: '',
                activeCategory: 'all',
                
                categories: [
                    { id: 'all', label: 'Todos os Produtos' },
                    { id: 'servidor', label: 'Servidores' },
                    { id: 'scripts', label: 'Scripts & Sistemas' },
                    { id: 'fontes', label: 'Fontes & Revenda' },
                    { id: 'app', label: 'Apps Android' }
                ],

                // INJETANDO DADOS PHP NO JAVASCRIPT
                products: <?php echo json_encode($products); ?>,

                get filteredProducts() {
                    let term = this.search.toLowerCase();
                    
                    return this.products.filter(item => {
                        // Filtro de Categoria
                        let catMatch = (this.activeCategory === 'all') || (item.category === this.activeCategory);
                        
                        // Filtro de Texto (Nome ou Descrição)
                        let textMatch = item.name.toLowerCase().includes(term) || 
                                        item.description.toLowerCase().includes(term) ||
                                        item.features.some(f => f.toLowerCase().includes(term));
                        
                        return catMatch && textMatch;
                    });
                },

                filterCategory(catId) {
                    this.activeCategory = catId;
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                },
                
                resetFilters() {
                    this.search = '';
                    this.activeCategory = 'all';
                },

                init() {
                    // Inicializar Ícones
                    this.$watch('filteredProducts', () => {
                        setTimeout(() => lucide.createIcons(), 50);
                    });
                    setTimeout(() => lucide.createIcons(), 50);
                }
            }
        }
    </script>
</body>
</html>
