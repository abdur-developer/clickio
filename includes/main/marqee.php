<!-- Marqee -->
<style>
    :root {
        --neon-blue: #0ff0fc;
        --neon-pink: #ff2ced;
        --dark-bg: #0a0a1a;
        --glow: 0 0 10px;
    }

    .ticker-container {
        margin: 0;
        font-family: 'Rajdhani', 'Orbitron', 'Arial Narrow', sans-serif;
        background: var(--dark-bg);
        background: linear-gradient(90deg, rgba(10,10,26,0.9) 0%, rgba(15,15,40,0.95) 100%);
        border-top: 1px solid var(--neon-blue);
        box-shadow: 0 -5px 20px rgba(0, 242, 252, 0.2);
        z-index: 1000;
        backdrop-filter: blur(3px);
        animation: glow-pulse 3s ease-in-out infinite alternate;
    }

    .ticker-track {
        height: 50px;
        width: 100%;
        overflow: hidden;
        position: relative;
        display: flex;
        align-items: center;
    }

    .ticker-content {
        display: flex;
        position: absolute;
        animation: ticker-scroll 25s linear infinite;
    }

    .ticker-item {
        flex-shrink: 0;
        padding: 0 3rem;
        color: white;
        font-size: 1.1rem;
        font-weight: 600;
        letter-spacing: 1px;
        white-space: nowrap;
        position: relative;
        text-transform: uppercase;
        text-shadow: var(--glow) var(--neon-blue);
    }

    .ticker-item:nth-child(2) {
        color: var(--neon-pink);
        text-shadow: var(--glow) var(--neon-pink);
    }

    .ticker-item:nth-child(3) {
        color: #00ff88;
        text-shadow: var(--glow) #00ff88;
    }

    .ticker-item::after {
        content: "❖";
        color: rgba(255, 255, 255, 0.3);
        position: absolute;
        right: 0.5rem;
        font-size: 1.5rem;
    }

    @keyframes ticker-scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(-33.33%); }
    }

    @keyframes glow-pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.8; }
    }

    @media (max-width: 768px) {
        .ticker-item {
            font-size: 0.9rem;
            padding: 0 1.8rem;
        }
        .ticker-track {
            height: 40px;
        }
    }
</style>
<div class="ticker-container">
    <div class="ticker-track">
        <div class="ticker-content">
            <span class="ticker-item">⚠️ লিখিত অনুমতি ছাড়া পুনরুৎপাদন, পরিবর্তন, বা বাণিজ্যিক ব্যবহার নিষিদ্ধ ⚠️</span>
            <span class="ticker-item">🚀 এই ওয়েবসাইটটি কপিরাইট দ্বারা সুরক্ষিত - অননুমোদিত ব্যবহারের বিরুদ্ধে *** করা হবে। 🚀</span>
            <span class="ticker-item">🔒 সমস্ত বিষয়বস্তু বৌদ্ধিক সম্পত্তি - ডিজিটাল অধিকারকে সম্মান করুন 🔏</span>
        </div>
    </div>
</div>
