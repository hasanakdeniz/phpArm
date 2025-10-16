<!DOCTYPE html>
<html lang="auto">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="htmlTitle">Bakım Modu</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #2a2a2a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #e0e0e0;
            line-height: 1.6;
        }

        .container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 60px 40px;
            text-align: center;
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.25),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            max-width: 480px;
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
        }

        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        }

        .emoji {
            font-size: 4rem;
            margin-bottom: 30px;
            animation: float 3s ease-in-out infinite;
            filter: drop-shadow(0 5px 15px rgba(0, 0, 0, 0.3));
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(5deg); }
        }

        h1 {
            font-size: 2.2rem;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #ffffff, #a0a0a0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 300;
            letter-spacing: -0.5px;
            line-height: 1.3;
        }

        .site-name {
            font-size: 1.1rem;
            margin-bottom: 30px;
            color: #b0b0b0;
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 3px;
            position: relative;
            display: inline-block;
        }

        .site-name::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 1px;
            background: linear-gradient(90deg, transparent, #808080, transparent);
        }

        p {
            font-size: 1.05rem;
            margin-bottom: 40px;
            color: #c0c0c0;
            font-weight: 300;
            line-height: 1.7;
        }

        .progress-container {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            height: 6px;
            margin: 40px 0;
            overflow: hidden;
            position: relative;
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #808080, #ffffff, #808080);
            border-radius: 12px;
            animation: progress 2s ease-in-out infinite;
            position: relative;
        }

        .progress-bar::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            animation: shine 2s ease-in-out infinite;
        }

        @keyframes progress {
            0% { transform: translateX(-100%); }
            50% { transform: translateX(0%); }
            100% { transform: translateX(100%); }
        }

        @keyframes shine {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .copyright {
            margin-top: 40px;
            font-size: 0.8rem;
            color: #808080;
            line-height: 1.5;
        }

        .copyright .site-name {
            font-size: 0.8rem;
            margin: 0;
            display: inline;
            color: #a0a0a0;
            font-weight: 400;
            letter-spacing: 1px;
        }

        .legal-links {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .legal-links a {
            color: #909090;
            text-decoration: none;
            font-size: 0.75rem;
            padding: 6px 12px;
            border-radius: 15px;
            transition: all 0.3s ease;
            border: 1px solid transparent;
            background: rgba(255, 255, 255, 0.03);
        }

        .legal-links a:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.2);
        }

        /* Modal Stilleri */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(15px);
            z-index: 1000;
            animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.9);
            background: rgba(30, 30, 30, 0.95);
            padding: 40px;
            border-radius: 20px;
            text-align: left;
            box-shadow: 
                0 30px 60px rgba(0, 0, 0, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            max-width: 550px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
            animation: modalPop 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        @keyframes modalPop {
            to { transform: translate(-50%, -50%) scale(1); }
        }

        .modal-header {
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .modal-emoji {
            font-size: 2.5rem;
            margin-bottom: 15px;
            animation: spin 1s ease;
        }

        @keyframes spin {
            from { transform: rotate(0deg) scale(0.8); }
            to { transform: rotate(360deg) scale(1); }
        }

        .modal-title {
            font-size: 1.5rem;
            margin-bottom: 8px;
            background: linear-gradient(135deg, #ffffff, #a0a0a0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 300;
        }

        .modal-subtitle {
            font-size: 0.9rem;
            color: #a0a0a0;
            margin-bottom: 20px;
        }

        .modal-body {
            margin-bottom: 30px;
            line-height: 1.7;
            color: #c0c0c0;
        }

        .modal-body h3 {
            color: #ffffff;
            margin: 20px 0 12px 0;
            font-size: 1.1rem;
            font-weight: 400;
        }

        .modal-body p {
            margin-bottom: 15px;
            font-size: 0.9rem;
            color: #b0b0b0;
        }

        .modal-body ul {
            margin: 12px 0 18px 20px;
        }

        .modal-body li {
            margin-bottom: 8px;
            font-size: 0.9rem;
            color: #b0b0b0;
        }

        .modal-close {
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 12px 30px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 400;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            display: block;
            margin: 25px auto 0 auto;
            text-align: center;
            backdrop-filter: blur(10px);
        }

        .modal-close:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .container {
                padding: 50px 25px;
                margin: 10px;
            }
            
            h1 {
                font-size: 1.8rem;
            }
            
            .site-name {
                font-size: 1rem;
            }

            .modal-content {
                padding: 30px 20px;
            }

            .legal-links {
                flex-direction: column;
                gap: 8px;
            }
        }

        @media (max-width: 480px) {
            .emoji {
                font-size: 3.2rem;
            }
            
            h1 {
                font-size: 1.6rem;
            }
            
            .modal-title {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="emoji">⚙️</div>
        <h1 id="title">Sistem Bakımda</h1>
        <div class="site-name" id="siteNameDisplay">SITEMIZ</div>
        <p id="message">Web sitemiz şu anda planlı bakım çalışmaları nedeniyle geçici olarak kullanılamıyor. Hizmetinize en kısa sürede dönmek için çalışıyoruz.</p>
        
        <div class="progress-container">
            <div class="progress-bar"></div>
        </div>

        <div class="copyright">
            © <span id="currentYear">2025</span> • <span class="site-name" id="copyrightSiteName">SITEMIZ</span> • <span id="copyrightText">Tüm hakları saklıdır.</span>
        </div>

        <div class="legal-links">
            <a href="#" id="privacyPolicyLink">Gizlilik Politikası</a>
            <a href="#" id="termsOfUseLink">Kullanım Koşulları</a>
        </div>
    </div>

    <!-- Gizlilik Politikası Modal -->
    <div class="modal" id="privacyModal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-emoji">🔒</div>
                <h3 class="modal-title" id="privacyModalTitle">Gizlilik Politikası</h3>
                <div class="modal-subtitle">Son güncelleme: <span id="privacyDate"></span></div>
            </div>
            <div class="modal-body" id="privacyModalBody">
                <!-- İçerik JavaScript ile eklenecek -->
            </div>
            <button class="modal-close" id="closeModalx" onclick="closeModal('privacyModal')">- KAPAT -</button>
        </div>
    </div>

    <!-- Kullanım Koşulları Modal -->
    <div class="modal" id="termsModal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-emoji">📄</div>
                <h3 class="modal-title" id="termsModalTitle">Kullanım Koşulları</h3>
                <div class="modal-subtitle">Son güncelleme: <span id="termsDate"></span></div>
            </div>
            <div class="modal-body" id="termsModalBody">
                <!-- İçerik JavaScript ile eklenecek -->
            </div>
            <button class="modal-close" id="closeModalx" onclick="closeModal('termsModal')">- KAPAT -</button>
        </div>
    </div>

    <script>
        // Site adını URL'den al ve BÜYÜK harf yap
        function getSiteNameFromURL() {
            const hostname = window.location.hostname;
            let siteName = hostname.replace(/^www\./, '');
            siteName = siteName.split('.')[0];
            return siteName.toUpperCase();
        }

        // Dil otomatik algılama
        function getBrowserLanguage() {
            const browserLang = navigator.language || navigator.userLanguage;
            const supportedLangs = ['tr', 'en', 'de', 'fr', 'es', 'it', 'ja', 'ko', 'ar', 'ru'];
            const lang = browserLang.split('-')[0];
            return supportedLangs.includes(lang) ? lang : 'en';
        }

        const siteName = getSiteNameFromURL();
        const currentLang = getBrowserLanguage();

        const translations = {
            tr: {
                htmlTitle: "SITEMIZ - Bakım Modu",
                title: "Sistem Bakımda",
                message: "Web sitemiz şu anda planlı bakım çalışmaları nedeniyle geçici olarak kullanılamıyor. Hizmetinize en kısa sürede dönmek için çalışıyoruz.",
                copyright: "Tüm hakları saklıdır.",
                privacyPolicy: "Gizlilik Politikası",
                termsOfUse: "Kullanım Koşulları",
                closeModalx: "- KAPAT -"
            },
            en: {
                htmlTitle: "SITEMIZ - Maintenance Mode",
                title: "System Maintenance",
                message: "Our website is currently unavailable due to planned maintenance work. We are working to return to service as soon as possible.",
                copyright: "All rights reserved.",
                privacyPolicy: "Privacy Policy",
                termsOfUse: "Terms of Use",
                closeModalx: "- CLOSE -"
            },
            de: {
                htmlTitle: "SITEMIZ - Wartungsmodus",
                title: "Systemwartung",
                message: "Unsere Website ist derzeit aufgrund von Wartungsarbeiten nicht verfügbar. Wir arbeiten daran, den Service so schnell wie möglich wieder aufzunehmen.",
                copyright: "Alle Rechte vorbehalten.",
                privacyPolicy: "Datenschutzerklärung",
                termsOfUse: "Nutzungsbedingungen",
                closeModalx: "- SCHLIEßEN -"
            },
            fr: {
                htmlTitle: "SITEMIZ - Mode Maintenance",
                title: "Maintenance Système",
                message: "Notre site web est actuellement indisponible en raison de travaux de maintenance planifiés. Nous travaillons pour revenir en service dès que possible.",
                copyright: "Tous droits réservés.",
                privacyPolicy: "Politique de Confidentialité",
                termsOfUse: "Conditions d'Utilisation",
                closeModalx: "- FERMER -"
            },
            es: {
                htmlTitle: "SITEMIZ - Modo Mantenimiento",
                title: "Mantenimiento del Sistema",
                message: "Nuestro sitio web no está disponible actualmente debido a trabajos de mantenimiento planificados. Estamos trabajando para volver al servicio lo antes posible.",
                copyright: "Todos los derechos reservados.",
                privacyPolicy: "Política de Privacidad",
                termsOfUse: "Términos de Uso",
                closeModalx: "- CERRAR -"
            },
            it: {
                htmlTitle: "SITEMIZ - Modalità Manutenzione",
                title: "Manutenzione del Sistema",
                message: "Il nostro sito web è attualmente non disponibile a causa di lavori di manutenzione programmati. Stiamo lavorando per tornare al servizio il prima possibile.",
                copyright: "Tutti i diritti riservati.",
                privacyPolicy: "Privacy Policy",
                termsOfUse: "Termini di Utilizzo",
                closeModalx: "- CHIUDI -"
            },
            ja: {
                htmlTitle: "SITEMIZ - メンテナンスモード",
                title: "システムメンテナンス",
                message: "当ウェブサイトは現在、計画的なメンテナンス作業のため利用できません。できるだけ早くサービスを再開できるよう作業しています。",
                copyright: "無断複写・転載を禁じます。",
                privacyPolicy: "プライバシーポリシー",
                termsOfUse: "利用規約",
                closeModalx: "- 閉じる -"
            },
            ko: {
                htmlTitle: "SITEMIZ - 점검 모드",
                title: "시스템 점검",
                message: "현재 웹사이트가 계획된 점검 작업으로 인해 이용할 수 없습니다. 최대한 빨리 서비스를 재개할 수 있도록 노력하고 있습니다。",
                copyright: "모든 권리 보유.",
                privacyPolicy: "개인정보 처리방침",
                termsOfUse: "이용약관",
                closeModalx: "- 닫기 -"
            },
            ar: {
                htmlTitle: "SITEMIZ - وضع الصيانة",
                title: "صيانة النظام",
                message: "موقعنا الإلكتروني غير متاح حاليًا due لأعمال الصيانة المخطط لها. نحن نعمل على العودة إلى الخدمة في أقرب وقت ممكن.",
                copyright: "جميع الحقوق محفوظة.",
                privacyPolicy: "سياسة الخصوصية",
                termsOfUse: "شروط الاستخدام",
                closeModalx: "- إغلاق -"
            },
            ru: {
                htmlTitle: "SITEMIZ - Режим Обслуживания",
                title: "Обслуживание Системы",
                message: "Наш веб-сайт в настоящее время недоступен due к плановым работам по техническому обслуживанию. Мы работаем над тем, чтобы вернуться к работе как можно скорее.",
                copyright: "Все права защищены.",
                privacyPolicy: "Политика Конфиденциальности",
                termsOfUse: "Условия Использования",
                closeModalx: "- ЗАКРЫТЬ -"
            }
        };

        // Gizlilik politikası içerikleri
        const privacyContent = {
            tr: `
                <h3>Veri Toplama</h3>
                <p>${siteName} olarak, ziyaretçilerimizin gizliliğine önem veriyoruz. Bakım sayfası sırasında aşağıdaki verileri topluyoruz:</p>
                <ul>
                    <li>IP adresi (anonimleştirilmiş)</li>
                    <li>Tarayıcı türü ve versiyonu</li>
                    <li>Ziyaret saati ve tarihi</li>
                </ul>

                <h3>Veri Güvenliği</h3>
                <p>Topladığımız sınırlı veriler uygun güvenlik önlemleriyle korunmaktadır.</p>

                <h3>Değişiklikler</h3>
                <p>Bu gizlilik politikasını güncelleme hakkını saklı tutarız. Değişiklikler bu sayfada yayınlanacaktır.</p>
            `,
            en: `
                <h3>Data Collection</h3>
                <p>At ${siteName}, we value our visitors' privacy. During maintenance, we collect the following data:</p>
                <ul>
                    <li>IP address (anonymized)</li>
                    <li>Browser type and version</li>
                    <li>Visit time and date</li>
                </ul>

                <h3>Data Security</h3>
                <p>The limited data we collect is protected with appropriate security measures.</p>

                <h3>Changes</h3>
                <p>We reserve the right to update this privacy policy. Changes will be posted on this page.</p>
            `,
            de: `
                <h3>Datenerfassung</h3>
                <p>Bei ${siteName} schätzen wir die Privatsphäre unserer Besucher. Während der Wartung erfassen wir folgende Daten:</p>
                <ul>
                    <li>IP-Adresse (anonymisiert)</li>
                    <li>Browsertyp und Version</li>
                    <li>Besuchszeit und Datum</li>
                </ul>

                <h3>Datensicherheit</h3>
                <p>Die begrenzten Daten, die wir sammeln, werden mit angemessenen Sicherheitsmaßnahmen geschützt.</p>

                <h3>Änderungen</h3>
                <p>Wir behalten uns das Recht vor, diese Datenschutzerklärung zu aktualisieren. Änderungen werden auf dieser Seite veröffentlicht.</p>
            `
        };

        const termsContent = {
            tr: `
                <h3>Kabul</h3>
                <p>Bu bakım sayfasını kullanarak, aşağıdaki kullanım koşullarını kabul etmiş olursunuz.</p>

                <h3>Hizmet Kesintisi</h3>
                <p>${siteName} şu anda planlı bakım çalışmaları nedeniyle geçici olarak kullanılamamaktadır.</p>

                <h3>Kullanıcı Sorumlulukları</h3>
                <p>Bu sayfayı kullanırken:</p>
                <ul>
                    <li>Sayfayı kötüye kullanmamayı kabul edersiniz</li>
                    <li>Otomatik botlar veya script'ler kullanmayacaksınız</li>
                </ul>

                <h3>Değişiklik Hakkı</h3>
                <p>${siteName}, bu kullanım koşullarını herhangi bir zamanda değiştirme hakkını saklı tutar.</p>
            `,
            en: `
                <h3>Acceptance</h3>
                <p>By using this maintenance page, you accept the following terms of use.</p>

                <h3>Service Interruption</h3>
                <p>${siteName} is currently temporarily unavailable due to planned maintenance work.</p>

                <h3>User Responsibilities</h3>
                <p>When using this page, you agree to:</p>
                <ul>
                    <li>Not misuse the page</li>
                    <li>Not use automated bots or scripts</li>
                </ul>

                <h3>Right to Modify</h3>
                <p>${siteName} reserves the right to modify these terms of use at any time.</p>
            `,
            de: `
                <h3>Annahme</h3>
                <p>Durch die Nutzung dieser Wartungsseite akzeptieren Sie die folgenden Nutzungsbedingungen.</p>

                <h3>Serviceunterbrechung</h3>
                <p>${siteName} ist derzeit aufgrund geplanter Wartungsarbeiten vorübergehend nicht verfügbar.</p>

                <h3>Benutzerverantwortlichkeiten</h3>
                <p>Bei der Nutzung dieser Seite erklären Sie sich damit einverstanden:</p>
                <ul>
                    <li>Die Seite nicht zu missbrauchen</li>
                    <li>Keine automatisierten Bots oder Skripte zu verwenden</li>
                </ul>

                <h3>Änderungsrecht</h3>
                <p>${siteName} behält sich das Recht vor, diese Nutzungsbedingungen jederzeit zu ändern.</p>
            `
        };

        // Sayfa yüklendiğinde
        document.addEventListener('DOMContentLoaded', function() {
            const translation = translations[currentLang] || translations['en'];
            
            // HTML title'ı güncelle (tarayıcı sekmesinde görünen)
            document.getElementById('htmlTitle').textContent = translation.htmlTitle.replace('SITEMIZ', siteName);
            
            // Sayfa başlığını güncelle (içerikte görünen)
            document.getElementById('title').textContent = translation.title.replace('SITEMIZ', siteName);
            
            // Diğer içerikleri güncelle
            document.getElementById('message').textContent = translation.message;
            document.getElementById('copyrightText').textContent = translation.copyright;
            document.getElementById('closeModalx').textContent = translation.closeModalx;
            document.getElementById('privacyPolicyLink').textContent = translation.privacyPolicy;
            document.getElementById('termsOfUseLink').textContent = translation.termsOfUse;
            
            // Site adını ayarla
            document.getElementById('siteNameDisplay').textContent = siteName;
            document.getElementById('copyrightSiteName').textContent = siteName;
            
            // Yılı güncelle
            document.getElementById('currentYear').textContent = new Date().getFullYear();
            
            // Modal içeriklerini güncelle
            document.getElementById('privacyModalTitle').textContent = translation.privacyPolicy;
            document.getElementById('termsModalTitle').textContent = translation.termsOfUse;
            document.getElementById('privacyModalBody').innerHTML = (privacyContent[currentLang] || privacyContent['en']).replace(/SITEMIZ/g, siteName);
            document.getElementById('termsModalBody').innerHTML = (termsContent[currentLang] || termsContent['en']).replace(/SITEMIZ/g, siteName);
            
            // Tarihleri güncelle
            const now = new Date();
            document.getElementById('privacyDate').textContent = now.toLocaleDateString(currentLang);
            document.getElementById('termsDate').textContent = now.toLocaleDateString(currentLang);
            
            // Emoji değiştirme
            rotateEmoji();
        });

        // Emoji değiştirme
        function rotateEmoji() {
            const emojis = ['⚙️', '🔧', '🛠️', '⏳', '📱', '💻'];
            const emojiElement = document.querySelector('.emoji');
            let currentIndex = 0;
            
            setInterval(() => {
                currentIndex = (currentIndex + 1) % emojis.length;
                emojiElement.textContent = emojis[currentIndex];
            }, 5000);
        }

        // Modal işlemleri
        document.getElementById('privacyPolicyLink').addEventListener('click', function(e) {
            e.preventDefault();
            openModal('privacyModal');
        });

        document.getElementById('termsOfUseLink').addEventListener('click', function(e) {
            e.preventDefault();
            openModal('termsModal');
        });

        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Modal dışına tıklayınca kapat
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('modal')) {
                closeModal(e.target.id);
            }
        });
    </script>
</body>
</html>
