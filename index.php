<?php
// --- DADOS DO SISTEMA SOLUÇÕES WEB (ATUALIZADO) ---
$questions = [
    [
        'id' => 'gatekeeper',
        'question' => "Qual seu objetivo atual?",
        'subtext' => "Identificando o perfil da sua operação.",
        'options' => [
            ['label' => "Quero Montar meu Servidor (Ser Dono)", 'value' => 'owner', 'icon' => 'server'],
            ['label' => "Quero Scripts/Sistemas Prontos", 'value' => 'dev', 'icon' => 'code-2'],
            ['label' => "Quero meu App Próprio (Android)", 'value' => 'app', 'icon' => 'smartphone']
        ]
    ],
    [
        'id' => 'infrastructure',
        'question' => "Você já possui Infraestrutura?",
        'subtext' => "VPS, Dedicado ou Painel já contratado?",
        'options' => [
            ['label' => "Sim, já tenho VPS/Painel", 'icon' => 'hard-drive'],
            ['label' => "Não, vou começar do zero", 'icon' => 'power'],
            ['label' => "Tenho apenas revenda", 'icon' => 'users'] 
        ]
    ],
    [
        'id' => 'scale',
        'question' => "Meta de Faturamento Mensal:",
        'subtext' => "Para qual escala devemos preparar seu projeto?",
        'options' => [
            ['label' => "Iniciante (R$ 1k - 5k)", 'emoji' => "🚀"],
            ['label' => "Pro (R$ 10k - 50k)", 'emoji' => "💎"],
            ['label' => "Enterprise (R$ 100k+)", 'emoji' => "🏢"]
        ]
    ]
];

// --- NOVOS PLANOS E PREÇOS ---
$plans = [
    [
        'id' => 1,
        'name' => "ALUGUEL FONTE 1K",
        'oldPrice' => "R$ 350",
        'price' => "R$ 220",
        'period' => "/mês (Inicial)",
        'features' => [
            "50 Conexões (Plano Inicial)",
            "Até 500 Conexões (Escalável)",
            "Fonte de VODs Inclusa",
            "25k Filmes + 4k Séries",
            "1.000 Linhas Disponíveis"
        ],
        'highlight' => false,
        'installment' => null
    ],
    [
        'id' => 2,
        'name' => "SERVIDOR COMPLETO IPTV",
        'oldPrice' => "R$ 2.000",
        'price' => "R$ 1.000",
        'period' => "/único",
        'features' => [
            "Painel XUI + Módulo Revenda",
            "App Android com Sua Logo",
            "Fonte Canais + VODs (30 Dias Grátis)",
            "Renovação Fonte: ~R$ 200/mês",
            "Entrega em 48 Horas"
        ],
        'highlight' => true, // O "Flagship" (Melhor Custo Benefício para iniciantes)
        'installment' => "O Mais Vendido"
    ],
    [
        'id' => 3,
        'name' => "SISTEMA DRM V4",
        'oldPrice' => "R$ 2.500",
        'price' => "R$ 1.500",
        'period' => "/único",
        'features' => [
            "Média 500 Canais (Sky/Claro/Pluto)",
            "GloboPlay + Abertos + Desenhos",
            "Script + Instalador Automático",
            "Vídeos Tutoriais Inclusos",
            "Entrega Flash: Até 8 Horas"
        ],
        'highlight' => false,
        'installment' => "Alta Tecnologia"
    ],
    [
        'id' => 4,
        'name' => "EXTRATOR WEB V7",
        'oldPrice' => "R$ 997",
        'price' => "R$ 600",
        'period' => "/único",
        'features' => [
            "Extrai Globos Regionais (120+)",
            "Premiere e SportTV Inclusos",
            "Média 140 Canais Estáveis",
            "Script + Tutorial + Instalação",
            "Sem mensalidade de fontes"
        ],
        'highlight' => false,
        'installment' => null
    ]
];
?>

<!DOCTYPE html>
<html lang="pt-BR" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOLUÇÕES WEB - Infraestrutura IPTV</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    
    <script src="https://unpkg.com/lucide@latest"></script>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.0/vanilla-tilt.min.js"></script>

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

        /* --- BACKGROUND SERVER ROOM --- */
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

        /* --- EFEITOS HOLOGRÁFICOS --- */
        .holo-card {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(6, 182, 212, 0.3);
            box-shadow: 0 0 20px rgba(6, 182, 212, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        /* VSL Container */
        .vsl-container {
            position: relative;
            border: 1px solid var(--neon-blue);
            box-shadow: 0 0 40px rgba(37, 99, 235, 0.2);
        }
        .vsl-container::before {
            content: "SOLUÇÕES WEB // APRESENTAÇÃO";
            position: absolute; top: -12px; left: 50%; transform: translateX(-50%);
            background: #020617; color: var(--neon-cyan); padding: 0 10px;
            font-family: 'JetBrains Mono'; font-size: 10px; letter-spacing: 2px;
            z-index: 10; border: 1px solid rgba(6,182,212,0.3);
        }

        .glitch-text { text-shadow: 2px 0 rgba(37, 99, 235, 0.7), -2px 0 rgba(6, 182, 212, 0.7); }

        /* --- ANIMAÇÕES --- */
        @keyframes pulse-network { 0%, 100% { box-shadow: 0 0 10px var(--neon-blue); } 50% { box-shadow: 0 0 30px var(--neon-cyan); } }
        .animate-network { animation: pulse-network 3s infinite alternate; }

        .btn-conversion {
            background: linear-gradient(90deg, #2563eb, #06b6d4);
            color: white; font-weight: 800; text-transform: uppercase; letter-spacing: 2px;
            border: none; clip-path: polygon(10% 0, 100% 0, 90% 100%, 0 100%);
        }
        .btn-conversion:hover {
            background: linear-gradient(90deg, #06b6d4, #2563eb);
            box-shadow: 0 0 30px rgba(6, 182, 212, 0.6);
        }

        /* WHATSAPP FLOAT */
        .float-whatsapp {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 30px;
            right: 30px;
            background-color: var(--whatsapp-green);
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 0 0 20px rgba(37, 211, 102, 0.5);
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        .float-whatsapp:hover {
            transform: scale(1.1);
            box-shadow: 0 0 40px rgba(37, 211, 102, 0.8);
        }
        .float-whatsapp::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 2px solid var(--whatsapp-green);
            animation: pulse-green 2s infinite;
        }
        @keyframes pulse-green {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(1.5); opacity: 0; }
        }

        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="bg-cyberpunk min-h-screen overflow-x-hidden selection:bg-blue-500/30 selection:text-white"
      x-data="appData()" x-init="initApp()">

    <div class="fixed inset-0 z-50 bg-scanlines opacity-20 pointer-events-none"></div>

    <a href="https://wa.me/5586988893817?text=Ol%C3%A1%2C%20tenho%20interesse%20nas%20solu%C3%A7%C3%B5es%20de%20Servidor%20IPTV" 
       target="_blank" 
       class="float-whatsapp"
       title="Falar com Especialista">
       <i data-lucide="message-circle" style="width: 32px; height: 32px; fill: white;"></i>
    </a>

    <header class="fixed top-0 left-0 right-0 z-40 p-4 flex justify-between items-center backdrop-blur-md border-b border-blue-900/30">
        <div class="flex items-center gap-3 animate-pulse">
            <i data-lucide="server" class="w-5 h-5 text-cyan-400"></i>
            <span class="font-bold tracking-[0.2em] text-sm text-cyan-100">SOLUÇÕES WEB</span>
        </div>
        <div class="hidden md:flex items-center gap-4 font-mono text-xs text-blue-400/80">
            <span>STATUS: <span class="text-green-400">ONLINE</span></span>
        </div>
    </header>

    <main class="relative z-10 pt-20 min-h-screen flex flex-col">
        
        <div x-show="step === 'hero'" 
             x-transition:enter="transition ease-out duration-1000"
             x-transition:enter-start="opacity-0 scale-90 blur-sm"
             x-transition:enter-end="opacity-100 scale-100 blur-0"
             class="flex-1 flex flex-col items-center justify-center px-6 text-center">
            
            <div class="mb-8 inline-flex items-center gap-2 px-4 py-2 bg-blue-950/30 border border-blue-500/50 rounded-sm text-blue-400 font-mono text-xs">
                <i data-lucide="database-zap" class="w-4 h-4 animate-pulse"></i>
                <span>CHEGA DE SER APENAS REVENDEDOR.</span>
            </div>

            <h1 class="text-5xl md:text-8xl font-black text-white mb-6 tracking-tighter leading-none glitch-text relative z-10">
                MONTE SUA<br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-500 via-cyan-400 to-white animate-network">
                    OPERAÇÃO PRÓPRIA
                </span>
            </h1>

            <p class="text-xl text-blue-200/70 max-w-2xl mb-12 font-light leading-relaxed relative z-10">
                Servidores Completos, Scripts DRM, Apps Android e Fontes de Canais. 
                <strong class="text-white">Tudo em um só lugar.</strong>
            </p>

            <div data-tilt data-tilt-scale="1.05" class="relative z-20">
                <button @click="startQuiz()" class="btn-conversion px-12 py-6 text-xl group relative transition-transform">
                    <span class="relative flex items-center gap-4 z-10">
                        INICIAR ANÁLISE <i data-lucide="chevron-right" class="w-6 h-6 group-hover:translate-x-2 transition-transform"></i>
                    </span>
                </button>
            </div>
        </div>

        <div x-show="step === 'quiz'" x-cloak
             class="flex-1 flex flex-col items-center justify-center px-4 w-full max-w-3xl mx-auto py-10">
            
            <div class="w-full mb-16 font-mono">
                <div class="flex justify-between text-cyan-500 text-xs mb-2">
                    <span>PROGRESSO: <span x-text="Math.round(((currentQuizIndex + 1) / totalQuestions) * 100) + '%'"></span></span>
                    <span>ETAPA: <span x-text="currentQuizIndex + 1"></span>/<span x-text="totalQuestions"></span></span>
                </div>
                <div class="h-2 w-full bg-black/50 border border-blue-900/50 relative overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-blue-600 to-cyan-400 shadow-[0_0_20px_blue] transition-all duration-500 relative"
                         :style="'width: ' + (((currentQuizIndex + 1) / totalQuestions) * 100) + '%'">
                    </div>
                </div>
            </div>

            <?php foreach ($questions as $index => $q): ?>
                <div x-show="currentQuizIndex === <?= $index ?>" 
                     x-transition:enter="transition ease-out duration-500"
                     class="w-full">
                    
                    <h2 class="text-3xl md:text-5xl font-bold text-white mb-4 leading-tight"><?= $q['question'] ?></h2>
                    <p class="text-blue-400/70 text-lg mb-12 font-light border-l-4 border-blue-500/50 pl-6"><?= $q['subtext'] ?></p>

                    <div class="grid gap-4">
                        <?php foreach ($q['options'] as $opt): ?>
                            <div data-tilt data-tilt-max="5" data-tilt-glare data-tilt-max-glare="0.1" class="w-full">
                                <button @click="handleAnswer('<?= $q['id'] ?>', '<?= isset($opt['value']) ? $opt['value'] : $opt['label'] ?>')"
                                        class="holo-card w-full text-left p-6 rounded-sm flex items-center gap-6 group transition-all relative hover:bg-blue-900/20">
                                    <div class="w-16 h-16 rounded-sm bg-black/50 flex items-center justify-center border border-cyan-500/30 group-hover:border-cyan-400 transition-colors relative">
                                        <?php if(isset($opt['icon'])): ?>
                                            <i data-lucide="<?= $opt['icon'] ?>" class="w-8 h-8 text-cyan-500/50 group-hover:text-cyan-100 transition-colors"></i>
                                        <?php elseif(isset($opt['emoji'])): ?>
                                            <span class="text-3xl"><?= $opt['emoji'] ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <span class="text-xl font-bold text-white group-hover:text-cyan-300 transition-colors flex-1"><?= $opt['label'] ?></span>
                                    <i data-lucide="chevron-right" class="w-6 h-6 text-cyan-500 opacity-0 group-hover:opacity-100 transition-all"></i>
                                </button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div x-show="step === 'processing'" x-cloak
             class="flex-1 flex flex-col items-center justify-center px-6 bg-[#020617] relative overflow-hidden">
            <div class="relative w-64 h-64 mb-12 flex items-center justify-center">
                <div class="absolute inset-0 bg-blue-500/5 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute w-full h-full border-2 border-blue-500/20 rounded-full animate-spin [animation-duration:8s]"></div>
                <div class="absolute w-3/4 h-3/4 border-2 border-cyan-500/30 rounded-full animate-spin [animation-duration:4s] border-dashed"></div>
                <i data-lucide="server-cog" class="w-32 h-32 text-white relative z-10 animate-bounce drop-shadow-[0_0_20px_blue]"></i>
            </div>
            <div class="w-full max-w-md space-y-2 font-mono text-center relative z-10">
                <h2 class="text-2xl font-bold text-white mb-2 glitch-text" x-text="processStatus"></h2>
                <div class="h-1 w-full bg-gray-900 relative overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-blue-500 via-white to-cyan-500 shadow-[0_0_30px_blue]" :style="'width: ' + processPercent + '%'"></div>
                </div>
            </div>
        </div>

        <div x-show="step === 'sales'" x-cloak
             class="flex-1 py-10 px-4 overflow-y-auto w-full relative z-10 bg-[#020617]/90 backdrop-blur-xl">
             
             <div class="max-w-7xl mx-auto"> <div class="mb-16" data-aos="fade-down">
                    <h1 class="text-3xl md:text-5xl font-black text-center text-white mb-8">
                        COMO TER SUA PRÓPRIA <span class="text-cyan-400">FONTE DE LUCRO</span>
                    </h1>
                    
                    <div class="vsl-container w-full aspect-video bg-black rounded-sm overflow-hidden relative group max-w-4xl mx-auto">
                        <iframe class="w-full h-full" src="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=0&controls=0&rel=0" title="Soluções Web VSL" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="absolute inset-0 bg-scanlines opacity-10 pointer-events-none"></div>
                    </div>
                </div>

                <div class="flex justify-center mb-16">
                    <div class="flex items-center gap-4 px-6 py-3 border border-blue-500/50 bg-blue-950/20 animate-pulse">
                        <span class="text-blue-400 font-black font-mono text-2xl tracking-widest" x-text="formatTime(timeLeft)"></span>
                        <span class="text-[10px] text-blue-300 uppercase tracking-widest border-l border-blue-500/50 pl-4">Oferta por Tempo Limitado</span>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4 gap-6 items-start pb-20">
                    <?php foreach ($plans as $plan): ?>
                        <div class="relative transition-all duration-500 transform <?= $plan['highlight'] ? 'md:scale-105 z-20 shadow-[0_0_50px_rgba(6,182,212,0.2)]' : 'scale-100 z-10 hover:scale-105 opacity-90 hover:opacity-100' ?>">
                            
                            <?php if ($plan['highlight']): ?>
                                <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 via-cyan-500 to-blue-600 blur-2xl opacity-40 animate-network"></div>
                                <div class="absolute -top-5 left-1/2 -translate-x-1/2 bg-gradient-to-r from-blue-600 to-cyan-500 text-white text-[10px] font-black px-4 py-1 uppercase tracking-[0.2em] z-30 shadow-[0_0_20px_blue] whitespace-nowrap">
                                    Recomendado
                                </div>
                            <?php endif; ?>

                            <div class="holo-card h-full flex flex-col p-6 rounded-sm
                                        <?= $plan['highlight'] ? 'border-cyan-400/80 bg-[#020617]' : 'border-blue-900/30 bg-[#020617]/80' ?>">
                                
                                <h3 class="text-lg font-black text-white mb-2 tracking-wider uppercase text-center h-14 flex items-center justify-center leading-tight"><?= $plan['name'] ?></h3>
                                <div class="w-12 h-1 bg-blue-500/50 mx-auto mb-6"></div>

                                <div class="text-center mb-6 relative">
                                    <div class="text-gray-500 line-through text-xs font-mono mb-1"><?= $plan['oldPrice'] ?></div>
                                    <div class="flex items-center justify-center gap-1 relative z-10">
                                        <span class="text-xs text-cyan-300 align-top">R$</span>
                                        <span class="text-4xl font-black text-white tracking-tighter glitch-text"><?= $plan['price'] ?></span>
                                    </div>
                                    <span class="text-gray-400 text-xs font-bold"><?= $plan['period'] ?></span>
                                    <?php if ($plan['installment']): ?>
                                        <div class="mt-2 text-cyan-300 text-[10px] font-mono font-bold bg-cyan-900/30 border border-cyan-500/30 inline-block px-2 py-1 rounded-full">
                                            <?= $plan['installment'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <ul class="space-y-3 mb-8 flex-1">
                                    <?php foreach ($plan['features'] as $feat): ?>
                                        <li class="flex items-start gap-3 text-xs text-gray-300 group">
                                            <i data-lucide="check" class="w-4 h-4 text-cyan-500 shrink-0 mt-0.5"></i>
                                            <span class="group-hover:text-white transition-colors leading-tight"><?= $feat ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                                <a href="https://wa.me/5586988893817?text=Quero%20comprar%20o%20plano%20<?= urlencode($plan['name']) ?>" target="_blank" class="block">
                                    <?php if ($plan['highlight']): ?>
                                        <button class="btn-conversion w-full py-4 text-sm group relative overflow-hidden">
                                            <span class="relative z-10 flex items-center justify-center gap-2">
                                                ADQUIRIR AGORA <i data-lucide="zap" class="w-4 h-4"></i>
                                            </span>
                                            <div class="absolute inset-0 bg-white/30 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                                        </button>
                                    <?php else: ?>
                                        <button class="w-full py-3 bg-white/5 hover:bg-white/10 border border-white/20 text-white text-xs font-bold uppercase tracking-widest hover:border-cyan-500 transition-all flex items-center justify-center gap-2">
                                            Ver Detalhes <i data-lucide="arrow-right" class="w-3 h-3"></i>
                                        </button>
                                    <?php endif; ?>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="text-center text-gray-500 font-mono text-xs pb-10 opacity-50">
                    &copy; 2025 SOLUÇÕES WEB. INFRAESTRUTURA DIGITAL.
                </div>
             </div>
        </div>

    </main>

    <script>
        function appData() {
            return {
                step: 'hero',
                currentQuizIndex: 0,
                totalQuestions: <?= count($questions) ?>,
                processStatus: "Aguardando...",
                processPercent: 0,
                timeLeft: 3600,

                initApp() {
                    this.refreshIcons();
                },

                refreshIcons() {
                    setTimeout(() => {
                        lucide.createIcons();
                        if (typeof VanillaTilt !== 'undefined') {
                             VanillaTilt.init(document.querySelectorAll("[data-tilt]"));
                        }
                    }, 50);
                },

                startQuiz() {
                    this.step = 'quiz';
                    this.refreshIcons();
                },

                handleAnswer(id, val) {
                    if (this.currentQuizIndex < this.totalQuestions - 1) {
                        this.currentQuizIndex++;
                        this.refreshIcons();
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    } else {
                        this.startProcessing();
                    }
                },

                startProcessing() {
                    this.step = 'processing';
                    this.processPercent = 0;
                    
                    let interval = setInterval(() => {
                        if (this.processPercent < 100) {
                            this.processPercent += Math.floor(Math.random() * 3) + 1;
                        } else {
                            clearInterval(interval);
                        }
                    }, 50);

                    // Mensagens GENÉRICAS
                    const statuses = [
                        "Analisando perfil...",
                        "Verificando disponibilidade de slots...",
                        "Buscando as melhores fontes...",
                        "Finalizando diagnóstico...",
                        "PREPARANDO OFERTA EXCLUSIVA..."
                    ];
                    
                    statuses.forEach((status, index) => {
                        setTimeout(() => this.processStatus = status, index * 900);
                    });
                    
                    setTimeout(() => {
                        this.step = 'sales';
                        this.refreshIcons();
                        this.triggerConfetti();
                        this.startTimer();
                    }, 5000);
                },

                triggerConfetti() {
                    const colors = ['#2563eb', '#06b6d4', '#ffffff'];
                    confetti({ particleCount: 150, spread: 100, origin: { y: 0.6 }, colors: colors, disableForReducedMotion: true });
                },

                startTimer() {
                    setInterval(() => { if (this.timeLeft > 0) this.timeLeft--; }, 1000);
                },

                formatTime(seconds) {
                    const h = Math.floor(seconds / 3600);
                    const m = Math.floor((seconds % 3600) / 60);
                    const s = seconds % 60;
                    return `${h}:${m < 10 ? '0'+m : m}:${s < 10 ? '0'+s : s}`;
                }
            }
        }
    </script>
</body>
</html>