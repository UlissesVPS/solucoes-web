<?php
// --- CONFIGURAÇÃO GERAL ---
$whatsapp_number = "5586988893817";

// --- SEUS PRODUTOS (Basta editar aqui) ---
$produtos = [
    [
        'id' => 'fonte-canais',
        'categoria' => 'servicos',
        'nome' => "Aluguel de Fonte 1.000 Linhas",
        'subtitulo' => "Conexões Híbridas + VODs",
        'preco' => "A partir de R$ 220",
        'icone' => "signal", // Icone do Lucide
        'destaque' => false,
        'detalhes' => [
            "50 Conexões: R$ 220",
            "100 Conexões: R$ 350",
            "300 Conexões: R$ 600",
            "Incluso: 25k Filmes e 4k Séries"
        ],
        'btn_msg' => "Olá, tenho interesse no Aluguel de Fonte de Canais."
    ],
    [
        'id' => 'servidor-completo',
        'categoria' => 'pacotes',
        'nome' => "Servidor IPTV Completo",
        'subtitulo' => "Sua Operação Pronta em 24h",
        'preco' => "R$ 1.000,00",
        'icone' => "server",
        'destaque' => true, // Produto Principal
        'detalhes' => [
            "Painel XUI + Revenda Configurada",
            "Aplicativo Android com SUA LOGO",
            "30 Dias de Fonte Grátis",
            "Treinamento de Gestão"
        ],
        'btn_msg' => "Olá, quero comprar o Servidor Completo com App Próprio."
    ],
    [
        'id' => 'drm-v4',
        'categoria' => 'scripts',
        'nome' => "Sistema DRM V4 Vitalício",
        'subtitulo' => "Scripts Premium + Instalação",
        'preco' => "R$ 1.500,00",
        'icone' => "shield-check",
        'destaque' => false,
        'detalhes' => [
            "Canais Sky, Claro, Pluto, GloboPlay",
            "Média de 500 Canais Estáveis",
            "Instalador Automático Incluso",
            "Entrega em até 8 horas"
        ],
        'btn_msg' => "Tenho interesse no Script DRM V4 Vitalício."
    ],
    [
        'id' => 'extrator-globo',
        'categoria' => 'scripts',
        'nome' => "Extrator Web V7 Globoplay",
        'subtitulo' => "Regionais e Esportes",
        'preco' => "R$ 600,00",
        'icone' => "globe",
        'destaque' => false,
        'detalhes' => [
            "Puxa +120 Canais Regionais",
            "Premiere e SportTV Inclusos",
            "Script + Tutorial de Uso",
            "Valor Único (Sem mensalidade)"
        ],
        'btn_msg' => "Quero o Extrator Globoplay V7."
    ]
];
?>

<!DOCTYPE html>
<html lang="pt-BR" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soluções Web - Estrutura para Provedores</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    
    <script src="https://unpkg.com/lucide@latest"></script>

    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300;400;600;700&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">

    <style>
        /* CONFIGURAÇÕES DE CORES E EFEITOS */
        :root {
            --neon-blue: #06b6d4; /* Ciano */
            --neon-purple: #7c3aed; /* Roxo */
            --dark-bg: #05050a; /* Preto Fundo */
        }
        
        body { 
            font-family: 'Chakra Petch', sans-serif; 
            background-color: var(--dark-bg);
            color: #e2e8f0;
        }
        
        .font-mono { font-family: 'JetBrains Mono', monospace; }

        /* Fundo Tecnológico */
        .bg-tech {
            background-color: var(--dark-bg);
            background-image: 
                radial-gradient(circle at 50% 0%, rgba(6, 182, 212, 0.15) 0%, transparent 50%),
                linear-gradient(rgba(6, 182, 212, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(6, 182, 212, 0.03) 1px, transparent 1px);
            background-size: 100% 100%, 40px 40px, 40px 40px;
        }

        /* Card de Vidro (Glassmorphism) */
        .glass-card {
            background: rgba(10, 10, 20, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(6, 182, 212, 0.15);
            box-shadow: 0 0 20px rgba(6, 182, 212, 0.05);
            transition: all 0.3s ease;
        }
        .glass-card:hover {
            border-color: var(--neon-blue);
            box-shadow: 0 0 30px rgba(6, 182, 212, 0.15);
            transform: translateY(-5px);
        }

        /* Botão Neon */
        .btn-neon {
            background: linear-gradient(45deg, var(--neon-blue), #0ea5e9);
            color: black;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: none;
            position: relative;
            overflow: hidden;
        }
        .btn-neon::after {
            content: '';
            position: absolute;
            top: -50%; left: -50%; width: 200%; height: 200%;
            background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(255,255,255,0.3) 50%, rgba(255,255,255,0) 100%);
            transform: rotate(45deg);
            animation: shine 3s infinite;
        }

        @keyframes shine { 0% { transform: translateX(-100%) rotate(45deg); } 100% { transform: translateX(100%) rotate(45deg); } }
        .glitch-text { text-shadow: 2px 0 rgba(6, 182, 212, 0.7), -2px 0 rgba(124, 58, 237, 0.7); }
        
        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="bg-tech min-h-screen overflow-x-hidden" x-data="{ filtro: 'todos', modalOpen: false, produtoAtual: null }">

    <header class="fixed top-0 w-full z-50 border-b border-cyan-900/30 bg-black/80 backdrop-blur-md">
        <div class="max-w-6xl mx-auto px-4 h-16 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-cyan-500/20 rounded flex items-center justify-center border border-cyan-500">
                    <i data-lucide="cpu" class="text-cyan-400"></i>
                </div>
                <span class="font-bold text-xl tracking-wider text-white">SOLUÇÕES <span class="text-cyan-400">WEB</span></span>
            </div>
            <a href="https://wa.me/<?= $whatsapp_number ?>" target="_blank" class="hidden md:flex items-center gap-2 text-sm font-mono text-cyan-400 border border-cyan-900/50 px-4 py-2 rounded hover:bg-cyan-900/20 transition">
                <i data-lucide="message-circle" class="w-4 h-4"></i>
                SUPORTE ONLINE
            </a>
        </div>
    </header>

    <section class="pt-32 pb-20 px-4 text-center relative">
        <div class="absolute top-20 left-1/2 -translate-x-1/2 w-[300px] h-[300px] bg-cyan-500/20 blur-[120px] rounded-full -z-10"></div>
        
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-cyan-500/30 bg-cyan-950/30 text-cyan-400 text-xs font-mono mb-6 animate-pulse">
            <span class="w-2 h-2 rounded-full bg-green-500"></span> SISTEMA ONLINE
        </div>

        <h1 class="text-5xl md:text-7xl font-black text-white mb-6 leading-tight glitch-text">
            A SOLUÇÃO QUE VOCÊ<br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-600">PRECISA ESTÁ AQUI</span>
        </h1>
        
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-10 font-light">
            Deixe de ser refém de revendas. Tenha seus próprios scripts, servidores e infraestrutura completa.
        </p>

        <div class="flex flex-col md:flex-row justify-center gap-4">
            <a href="#vitrine" class="btn-neon px-8 py-4 rounded text-lg shadow-[0_0_20px_rgba(6,182,212,0.4)]">
                VER PRODUTOS
            </a>
            <a href="https://wa.me/<?= $whatsapp_number ?>" class="px-8 py-4 rounded border border-white/10 hover:bg-white/5 text-white font-mono transition">
                FALAR COM ESPECIALISTA
            </a>
        </div>
    </section>

    <section id="vitrine" class="max-w-6xl mx-auto px-4 py-20">
        
        <div class="flex justify-center gap-4 mb-12 flex-wrap">
            <button @click="filtro = 'todos'" :class="filtro === 'todos' ? 'bg-cyan-600 text-white' : 'bg-black/40 text-gray-400 border-white/10'" class="px-6 py-2 rounded-full border transition-all text-sm font-mono">TODOS</button>
            <button @click="filtro = 'servicos'" :class="filtro === 'servicos' ? 'bg-cyan-600 text-white' : 'bg-black/40 text-gray-400 border-white/10'" class="px-6 py-2 rounded-full border transition-all text-sm font-mono">FONTES</button>
            <button @click="filtro = 'scripts'" :class="filtro === 'scripts' ? 'bg-cyan-600 text-white' : 'bg-black/40 text-gray-400 border-white/10'" class="px-6 py-2 rounded-full border transition-all text-sm font-mono">SCRIPTS</button>
            <button @click="filtro = 'pacotes'" :class="filtro === 'pacotes' ? 'bg-cyan-600 text-white' : 'bg-black/40 text-gray-400 border-white/10'" class="px-6 py-2 rounded-full border transition-all text-sm font-mono">SERVIDORES</button>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($produtos as $prod): ?>
                <div x-show="filtro === 'todos' || filtro === '<?= $prod['categoria'] ?>'" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-90"
                     x-transition:enter-end="opacity-100 scale-100"
                     class="glass-card rounded-xl p-6 flex flex-col relative overflow-hidden group">
                    
                    <?php if($prod['destaque']): ?>
                        <div class="absolute top-0 right-0 bg-gradient-to-bl from-cyan-500 to-blue-600 text-black text-xs font-bold px-3 py-1 rounded-bl-xl z-10">
                            MAIS VENDIDO
                        </div>
                        <div class="absolute inset-0 bg-cyan-500/5 group-hover:bg-cyan-500/10 transition-colors"></div>
                    <?php endif; ?>

                    <div class="mb-4 w-12 h-12 bg-cyan-900/30 rounded-lg flex items-center justify-center border border-cyan-500/30 text-cyan-400 group-hover:scale-110 transition-transform">
                        <i data-lucide="<?= $prod['icone'] ?>"></i>
                    </div>

                    <h3 class="text-2xl font-bold text-white mb-1"><?= $prod['nome'] ?></h3>
                    <p class="text-gray-400 text-sm mb-4 h-10"><?= $prod['subtitulo'] ?></p>
                    
                    <div class="mt-auto pt-4 border-t border-white/10">
                        <div class="text-cyan-300 font-mono text-xl font-bold mb-4"><?= $prod['preco'] ?></div>
                        
                        <button @click="modalOpen = true; produtoAtual = <?= str_replace('"', "'", json_encode($prod)) ?>" 
                                class="w-full py-3 rounded bg-white/5 hover:bg-white/10 border border-white/20 text-white font-bold tracking-wider transition-all hover:border-cyan-500/50 hover:text-cyan-400">
                            VER DETALHES
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <footer class="border-t border-white/10 bg-black/80 py-10 text-center">
        <p class="text-gray-500 font-mono text-sm">© 2025 SOLUÇÕES WEB - TECNOLOGIA EM SERVIDORES</p>
    </footer>

    <div x-show="modalOpen" style="display: none;" class="fixed inset-0 z-[100] flex items-center justify-center px-4">
        <div @click="modalOpen = false" x-transition.opacity class="absolute inset-0 bg-black/90 backdrop-blur-sm"></div>
        
        <div x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-10 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             class="bg-gray-900 border border-cyan-500/30 w-full max-w-lg rounded-2xl p-6 relative z-10 shadow-[0_0_50px_rgba(6,182,212,0.2)]">
            
            <button @click="modalOpen = false" class="absolute top-4 right-4 text-gray-400 hover:text-white">
                <i data-lucide="x"></i>
            </button>

            <template x-if="produtoAtual">
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-3 bg-cyan-500/20 rounded-lg text-cyan-400 border border-cyan-500/30">
                            <i data-lucide="box" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white" x-text="produtoAtual.nome"></h2>
                            <p class="text-cyan-400 font-mono" x-text="produtoAtual.preco"></p>
                        </div>
                    </div>

                    <div class="space-y-3 mb-8">
                        <template x-for="item in produtoAtual.detalhes">
                            <div class="flex items-center gap-3 text-gray-300 text-sm">
                                <i data-lucide="check-circle-2" class="w-4 h-4 text-green-500"></i>
                                <span x-text="item"></span>
                            </div>
                        </template>
                    </div>

                    <a :href="'https://wa.me/<?= $whatsapp_number ?>?text=' + encodeURIComponent(produtoAtual.btn_msg)" 
                       target="_blank"
                       class="btn-neon w-full py-4 rounded block text-center shadow-lg text-lg">
                        COMPRAR AGORA <i data-lucide="arrow-right" class="inline w-5 h-5 ml-2"></i>
                    </a>
                </div>
            </template>
        </div>
    </div>

    <script>
        // Inicializa os ícones
        lucide.createIcons();
        
        // Re-inicializa ícones quando o modal abre (gambiarra necessária pro Lucide + Alpine)
        document.addEventListener('alpine:init', () => {
            Alpine.effect(() => {
                // Monitora mudanças e atualiza icones
                setTimeout(() => lucide.createIcons(), 100);
            });
        });
    </script>
</body>

</html>
